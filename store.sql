drop database if exists store;
create database store;
use store;
#总台用户表
create table t_admin(
	id int primary key auto_increment,
	a_username varchar(32) not null,
	a_password varchar(32) not null
);
#商铺用户表
create table t_shop(
	id int(11) NOT NULL primary key auto_increment,
  	s_name varchar(32) DEFAULT NULL COMMENT '店铺名称',
  	s_username varchar(32) DEFAULT NULL COMMENT '登陆账号',
  	s_password varchar(32) DEFAULT NULL,
  	s_card varchar(32) DEFAULT NULL COMMENT '身份证号码',
  	s_phone varchar(32) DEFAULT NULL,
  	s_address varchar(64) DEFAULT NULL COMMENT '地址',
  	s_email varchar(64) DEFAULT NULL COMMENT '邮箱',
  	s_num int(11) DEFAULT NULL COMMENT '商户积分',
  	s_license int(11) DEFAULT NULL COMMENT '营业执照号',
	create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT '商铺账号创建时间'
);
insert into t_shop(s_name,s_username,s_password,s_card,s_phone,s_address,s_email,s_num,s_license) values('绵阳1店','shop','111111','510722199302544875','12430013703','四川绵阳','anasdfdfassadf@163.com',9999999,12132423);
insert into t_shop(s_name,s_username,s_password,s_card,s_phone,s_address,s_email,s_num,s_license) values('花荄1店','shop1','111111','5107221993430254475','12430013703','四川绵阳','anasdfdfassadf@163.com',9999999,12132423);
	#商铺管理员表
-- create table t_shop_user(
-- 	id int(11) NOT NULL primary key auto_increment,
--   	u_username varchar(32) DEFAULT NULL COMMENT '登陆账号',
--   	u_password varchar(32) DEFAULT NULL,
--   	u_card varchar(32) DEFAULT NULL COMMENT '身份证号码',
--   	u_phone varchar(32) DEFAULT NULL,
--   	u_address varchar(64) DEFAULT NULL COMMENT '地址',
--   	u_email varchar(64) DEFAULT NULL COMMENT '邮箱',
--   	s_id int not null,
--   	foreign key fk1(s_id) references t_shop(id),
--     create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT '员工账号创建时间'
-- );
#总台商铺中间表
create table t_admin_shop(
	id int primary key auto_increment,
	a_id int not null,
	s_id int not null,
	num int comment'当次购买的积分',
	num_time TIMESTAMP default CURRENT_TIMESTAMP comment'商铺积分充值时间',
	foreign key fk1(a_id) references t_admin(id),
	foreign key fk2(s_id) references t_shop(id)
	
);

#vip用户表
create table t_member(
	id int primary key auto_increment,
	m_card varchar(32) not null unique comment '会员卡号',
	m_nickname varchar(32) not null comment'会员姓名',
	m_username varchar(32) not null comment'登陆账号',
	m_password varchar(32) not null default '111111' comment'登陆密码',
	m_idcard varchar(32) not null comment '身份证号码',
	m_phone varchar(32) not null comment '电话号码',
	m_phonenum varchar(32) comment"紧急联系人号码",
	m_address varchar(64) comment'地址',
	m_email varchar(64) comment'邮箱',
	m_num float(2) not null default 0 comment'用户总金额',
	m_fenqi float(2) default null comment'分期金额',
	m_day timestamp default null comment'金额分期天数',
	m_status int default null comment'是否发卡',
	create_at TIMESTAMP default now() comment'会员账号创建时间',
	l_id int not null default 1,
	foreign key fk2(l_id) references t_member_level(id)
);

create table t_member_level(
	id int primary key auto_increment,
	m_level varchar(32) comment "会员等级",
	term  int not null comment '等级判断条件'
);
insert into t_member_level(m_level,term) values('普通会员',0);
insert into t_member_level(m_level,term) values('白银会员',1000);
insert into t_member_level(m_level,term) values('黄金会员',2000);
insert into t_member_level(m_level,term) values('至尊会员',5000);

create table t_member_limit(
	id int primary key auto_increment,
	s_id int not null,
	m_id int not null,
	foreign key fk1(s_id) references t_shop(id),
	foreign key fk2(m_id) references t_member(id),
	m_limit float(2) default 10000 comment'每天限定使用的金额',
	create_at TIMESTAMP default now() comment'最后一次修改时间'
);

#vip积分表
create table t_shop_member(
	id int primary key auto_increment,	
	s_id int not null,
	m_id int not null,
	num float(2) comment 'vip用户购买的积分',
	foreign key fk1(s_id) references t_shop(id),
	foreign key fk2(m_id) references t_member(id),
	create_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);
create table t_record(
	id int primary key auto_increment,	
	s_id int not null,
	m_id int not null,
	grade float(2) comment 'vip用户当次购买的积分或者消费积分',
	gradetype enum('Y','N'),
	goods text default NULL comment '购物详情',
	gradetime TIMESTAMP default now() comment'vip积分充值时间或者消费时间',
	foreign key fk1(s_id) references t_shop(id),
	foreign key fk2(m_id) references t_member(id)
);
/*#店铺充值触发器，当t_shop_vip充值成功时 店铺库存相应减少
delimiter |
create trigger trigger_outshop after insert on t_shop_vip
for each row
begin
	declare num int default 0;#用于存储 商店 积分库存
	declare knum int default 0;#用于存储 店铺和vip中间表积分库存
	select shopgrade into num from t_shop where id= new.shopid;
	select grade into knum from t_shop_vip where id = new.id;
	update t_shop set shopgrade = num-knum where id= new.shopid;
end |
delimiter ;
set time_zone = '+8:00'; 
SET GLOBAL event_scheduler = 1;


DELIMITER |
# 如果原来存在该名字的任务计划则先删除  
drop event if exists update_to_vipgrade;
#on schedule 后面参数表示多久执行一次 1 second，3 minute，5 hour，9 day，1 month，1 quarter（季度），1 year
#starts 后参数表示执行开始时间
#begin~end 之间是执行事件
create event update_to_vipgrade
on schedule every 30 day
starts CURDATE() 
do
begin
update t_shop_vip set grade = 0;
end |
DELIMITER ;
#开启事件test_event
#alter event test_event on completion preserve enable;
#关闭事件test_event
#alter event test_event on completion preserve disable;*/
insert into t_admin(a_username,a_password) values('admin','111111');
#insert into t_shop(s_name,s_username,s_password) values('张学友','zhangxueyou','111111');
#insert into t_member(m_card,m_nickname,m_username,m_idcard,m_phone) values('1111111','张学友','zhangxueyou','457674394@qq.com','13350091678');
#insert into t_shop_member(s_id,m_id,num) values(1,1,10000);
#insert into t_record(s_id,m_id,grade,gradetype) values(1,1,1000,"Y");	

