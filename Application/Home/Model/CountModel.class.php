<?php
namespace Home\Model;


use Home\Model\BaseModel;
class CountModel extends BaseModel
{
   public function bizCount($searchDate,$business_id,$prowled_obj_id){
       
       
       $legend = array();
       $data = array();
       $avgdata = array();
       
       $time_rane = fix_range_date($searchDate);
       $start_date = $time_rane['start_date'];
       $end_date = $time_rane['end_date'];
       
       $biz_prowled = M("Biz_prowled");
       
       while (true){
           $where = array();
           $legend[] = $start_date;
           $where['date'] = $start_date;
           $where['prowled_obj_id'] = $prowled_obj_id;
           $where['is_valid'] = '1';
           
           $avgscore = $biz_prowled->where($where)->avg('score');
           
           $where['business_id'] = $business_id;
           $info = $biz_prowled->where($where)->find();
           
           $data[] = isset($info['score']) ? $info['score'] : 0;
           $avgdata[] = isset($avgscore)&&$avgscore ? floatval($avgscore)  : 0;
           
           $start_date = date('Y-m-d',strtotime($start_date) + 24*60*60 );
           if ($start_date > $end_date){
               break;
           }
       }
       
       
       
       $legend = json_encode($legend);
       $data = json_encode($data);
       $avgdata = json_encode($avgdata);
       
       return array('legend'=>$legend
                   ,'data'=>$data
                   ,'avgdata'=>$avgdata

       );
   }
   
   
   public function areaCount($searchDate,$prowled_obj_id){

       $legend = array();
       $data = array();
       $avgdata = array();
       
       $time_rane = fix_range_date($searchDate);
       $start_date = $time_rane['start_date'];
       $end_date = $time_rane['end_date'];
        
       $biz_prowled = M("Area_prowled");
        
       while (true){
           $where = array();
           $legend[] = $start_date;
           $where['date'] = $start_date;
           
           $where['is_valid'] = '1';
            
           $avgscore = $biz_prowled->where($where)->avg('score');
            
           $where['prowled_obj_id'] = $prowled_obj_id;
           $info = $biz_prowled->where($where)->find();
            
           $data[] = isset($info['score']) ? $info['score'] : 0;
           $avgdata[] = isset($avgscore)&&$avgscore ? floatval($avgscore)  : 0;
            
           $start_date = date('Y-m-d',strtotime($start_date) + 24*60*60 );
           if ($start_date > $end_date){
               break;
           }
       }
        
        
        
       $legend = json_encode($legend);
       $data = json_encode($data);
       $avgdata = json_encode($avgdata);
        
       return array('legend'=>$legend
           ,'data'=>$data
           ,'avgdata'=>$avgdata
       
       );
   }
}