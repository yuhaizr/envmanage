<?php
namespace Home\Controller;
use Home\Model\AttendanceModel;

class AttendanceController extends BaseController {

    public function showList(){

        $searchDate = I('searchDate');
        $model = new AttendanceModel();
        $data = $model->showList($searchDate);
        
        $cuid = $_SESSION['id'];
        $date = date('Y-m-d');
        $where['cuid'] = $cuid;
        $where['date'] = $date;
        $attendance = M('Attendance');
        $info = $attendance->where($where)->find();
    
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->assign('searchDate',$searchDate);
        
        if ($info){
            if ($info['am_time'] == '0000-00-00 00:00:00'){
                $info['am_time'] = '';
            }
            if ($info['pm_time'] == '0000-00-00 00:00:00'){
                $info['pm_time'] = '';
            }
        }
        
        $this->assign('info',$info);
        $this->display();
    }
    
    public function add(){
        $type = I('type');
        
        if ($type && ($type == 'am' || $type == 'pm')){
            $cuid = $_SESSION['id'];
            $date = date('Y-m-d');
            $where['cuid'] = $cuid;
            $where['date'] = $date;
        }else{
            $this->error("type 不正确");
        }
        
        $attendance = M('Attendance');
        $info = $attendance->where($where)->find();
        $data = $where;
        if ($type == 'am'){
            $data['am_time'] = date('Y-m-d H:i:s');
        }
        if ($type == 'pm'){
            if (($info['am_time'] == '0000-00-00 00:00:00')
                ||(!$info['am_time'])){
                $this->error("上午还没打卡",'showList');
                
            }
            $data['pm_time'] = date('Y-m-d H:i:s');
        }       
        if($info){
            $res = $attendance->where($where)->save($data);
        }else{
            $res = $attendance->add($data);
        }
        
        if ($res){
            $this->success('打卡成功','showList');
        }else{
            $this->error('打卡失败','showList');
        }
        
  
        
    }
 
    
    
}