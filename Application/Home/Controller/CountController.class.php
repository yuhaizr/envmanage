<?php
namespace Home\Controller;
use Home\Model\CountModel;

class CountController extends BaseController {

  
    public function bizCount(){
        
        $searchDate = I('searchDate');
        $business_id = I('business_id');
        $prowled_obj_id = I('prowled_obj_id');
        
        $this->assign('business_id',$business_id);
        $this->assign('prowled_obj_id',$prowled_obj_id);
        $this->assign('searchDate',$searchDate);
        
        $business= M('Business');
        $where['is_valid'] = '1';
        $business_list = $business->where($where)->select();
        $this->assign('business_list',$business_list);
        
        $prowled_obj = M('Prowled_obj');
        $where['type_id'] = '1';
        $biz_prowled_obj_list = $prowled_obj->where($where)->select();
        $this->assign('biz_prowled_obj_list',$biz_prowled_obj_list);
        
        if (!$business_id || !$prowled_obj_id){
            $this->assign('legend','');
            $this->assign('data','');
            $this->assign('avgdata','');
            $this->display();
            exit();
        }
        
        if (!$searchDate){
            $searchDate =date('Y-m-d',time() - 10*24*60*60)."__". date('Y-m-d');
        }
        
        $countModel = new CountModel();
        $res = $countModel->bizCount($searchDate,$business_id,$prowled_obj_id);
        
        
        
  
        $this->assign('legend',$res['legend']);
        $this->assign('data',$res['data']);
        $this->assign('avgdata',$res['avgdata']);
        

        
        $this->display();
    }
    
    
    public function areaCount(){
        $searchDate = I('searchDate');

        $prowled_obj_id = I('prowled_obj_id');

        $this->assign('prowled_obj_id',$prowled_obj_id);
        $this->assign('searchDate',$searchDate);
        
        $prowled_obj = M('Prowled_obj');
        $where['type_id'] = '2';
        $area_prowled_obj_list = $prowled_obj->where($where)->select();
        $this->assign('area_prowled_obj_list',$area_prowled_obj_list); 
        
        if (  !$prowled_obj_id){
            $this->assign('legend','');
            $this->assign('data','');
            $this->assign('avgdata','');
            $this->display();
            exit();
        }
        
        if (!$searchDate){
            $searchDate =date('Y-m-d',time() - 10*24*60*60)."__". date('Y-m-d');
        }
        
        $countModel = new CountModel();
        $res = $countModel->areaCount($searchDate,$prowled_obj_id);
        
        
        
        
        $this->assign('legend',$res['legend']);
        $this->assign('data',$res['data']);
        $this->assign('avgdata',$res['avgdata']);
        

        
        $this->display();
    }
    
    
}