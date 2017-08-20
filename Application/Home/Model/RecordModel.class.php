<?php 
    namespace Home\Model;
    use Think\Model;
    
    class RecordModel extends Model{
        function queryById($m_id){
            return $this->where(array('m_id'=>$m_id,'gradetype'=>'N'))->sum('grade');
        }
        function queryByToday($time,$gradeType,$vipid){
            $map['gradetime'] = array('LIKE',$time);
            $map['gradetype'] = array('eq',$gradeType);
            $map['m_id'] = array('eq',$vipid);
            return $this->where($map)->sum('grade');
        
        }
        function queryCountY($m_id){
            return $this->where(array('m_id'=>$m_id,'gradetype'=>'Y'))->count();
        }
        function queryCountN($m_id){
            return $this->where(array('m_id'=>$m_id,'gradetype'=>'N'))->count();
        }
    }