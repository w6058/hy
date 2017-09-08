<?php 
    namespace Home\Model;
    use Think\Model;
    
    class MemberModel extends Model{
        
        function queryAll(){
            $count = $this->field('t_member.id,m_nickname,m_card,m_phone,m_num,m_level')->
            join('t_member_level on t_member.l_id = t_member_level.id')->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show       = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $this->field('t_member.id,m_nickname,m_card,m_phone,m_num,m_level')->
            join('t_member_level on t_member.l_id = t_member_level.id')->
            order('create_at desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            return array('list'=>$list,'page'=>$show);
        }
        function queryY($id,$type){
            return $this->join('t_record ON t_member.id = t_record.m_id')->
            join("t_shop ON t_shop.id = t_record.s_id")->
            where(array("t_member.id"=>$id,"t_record.gradetype"=>$type))->
            select();
        }
        function queryById($id){
            return $this->find($id);
        }
        function saveMember($arr){
            return $this->save($arr);
        }
    }