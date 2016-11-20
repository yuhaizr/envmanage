<?php
namespace Home\Model;

use Think\Page;
use Home\Model\BaseModel;
class AttendanceModel extends BaseModel
{
    public function showList($searchDate){
    
        $paramer = array(
            'searchDate' => $searchDate,
        );
    
        $where = array();
        if($searchDate){
            $time_rane = fix_range_date($searchDate);
            $where['date'] = array(array('EGT',$time_rane['start_date']),array('ELT',$time_rane['end_date'])) ;
        }

        if ($_SESSION['type'] == 2){
            $where['cuid'] = $_SESSION['id'];
        }
        
        $model = M('Attendance');
     
    
  
    
    
        $total = $model->where($where)->count();
    
        $page = new Page($total,20,$paramer);
        $show = $page->show();
        $list = $model
        ->where($where)
        ->order(' id DESC ')
        ->limit($page->firstRow, $page->listRows)
        ->select();
        $list = $this->fixList($list);
        return array(
            'list' => $list,
            'page' => $show,
        );
    }
    
    private function fixList($list){
    
        if (is_array($list)){
            foreach ($list as $key => &$val){
                
             
                    $am_type = '';
                    $pm_type = '';
                    if (!$val['am_time']){
                        $am_type = "上午旷工";
                    }else{
                        if (date("H:i:s",strtotime($val['am_time'])) > "08:00"
                            && date("H:i:s",strtotime($val['am_time'])) < "09:00" ){
                            $am_type = "迟到";
                        }else if (date("H:i:s",strtotime($val['am_time'])) > "09:00"  ){
                            $am_type = "上午旷工";
                        }                        
                    }

                    if (!$val['pm_time']){
                        $pm_type = "下午旷工";
                    }else{
                        if (date("H:i:s",strtotime($val['pm_time'])) < "17:30"
                            && date("H:i:s",strtotime($val['pm_time'])) > "16:00" ){
                            $pm_type = "早退";
   
                        }else if (date("H:i:s",strtotime($val['pm_time'])) < "16:00" ){
                            $pm_type = "下午旷工";
                        }                      
                    }

                    
                    if (!$am_type && !$pm_type){
                        $val['type'] = '正常';
                    }else{
                        $val['type'] = $am_type.' '.$pm_type;
                    }
                    
                    
                    
           
            }
    
        }
    
    
        return $list;
    }
}