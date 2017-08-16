<?php 
    namespace Home\Model;
    use Think\Model;
    
    class MemberModel extends Model{
        
        function queryAll(){
            return $this->select();  
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