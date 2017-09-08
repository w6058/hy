<?php 
    namespace Home\Model;
    use Think\Model;
    
    class AdminModel extends Model{
        
        public function queryQX($id){
        	return $this->field("p_name,content")->
            join('t_admin_position on t_admin.id = t_admin_position.a_id')->
        	join('t_position on t_admin_position.p_id = t_position.id')->
        	join('t_position_restrict on t_position.id = t_position_restrict.p_id')->
        	where(array("t_admin.id"=>$id))->select();
        }
    }