<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
    protected $connection = array(
        'db_type'  => 'mysql',
        'db_user'  => 'root',
        'db_pwd'   => 'root',
        'db_host'  => '127.0.0.1',
        'db_port'  => '3306',
        'db_name'  => 'sz24hours',
        'db_charset' =>'utf8',
    );
}
?>