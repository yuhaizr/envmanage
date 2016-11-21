<?php
namespace Home\Controller;
use Home\Model\BizProwledModel;
use Home\Controller\BaseController;


class BizProwledController extends BaseController {
    
    public function __construct(){
        parent::__construct();
        
        $model = M('Business_type');
        $where = array();
        $where['is_valid'] = '1';
        $business_type_list = $model->where($where)->select();
        $this->assign('business_type_list',$business_type_list);
        
 /*        if (strstr(__ACTION__, 'modify') 
            ||strstr(__ACTION__, 'detail')
            ||strstr(__ACTION__, 'add')
            ){ */
            $business= M('Business');
            $where = array();
            $business_list = array();
            if ($_SESSION['type'] == 2){
                $uid = $_SESSION['id'];
                $area_where['is_valid'] = '1';
                $area_where['uid'] = $uid;
                $area = M('Area');
                $areaList = $area->where($area_where)->select();
                $areaid = array();
                if ($areaList){
                    
                    foreach ($areaList as $key => $val){
                        $areaid[] = $val['id'];
                    }
                }
                
                if ($areaid){
                    $where['area_id'] = array('in',$areaid);
                    $where['is_valid'] = '1';
                    $business_list = $business->where($where)->select();
                    
                }
                
            }else{
                $where['is_valid'] = '1';
                $business_list = $business->where($where)->select();
            }
            $this->assign('business_list',$business_list);
            
            $prowled_obj = M('Prowled_obj');
            $where = array();
            $where['is_valid'] = '1';
            $where['type_id'] = '1';
            $biz_prowled_obj_list = $prowled_obj->where($where)->select();
            $this->assign('biz_prowled_obj_list',$biz_prowled_obj_list);
           // var_dump($biz_prowled_obj_list);exit();
            
/*             $where['type_id'] = '2';
            $area_prowled_obj_list = $prowled_obj->where($where)->select();
            $this->assign('area_prowled_obj_list',$area_prowled_obj_list); */
            
      /*   } */
        

    }
    

    public function showList(){
        $searchValue = I('searchValue');
        $prowled_obj_id = I("prowled_obj_id");
        $business_id= I("business_id");
     
        $model = new BizProwledModel();
        $data = $model->showList($business_id,$prowled_obj_id);
    
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->assign('business_id',$business_id);
        $this->assign('prowled_obj_id',$prowled_obj_id);
        $this->display();
    }
    
    public function detail(){
        $model = M('BizProwled');
        $id = I('id');
        if (isset($id) && $id){
            $where['id'] = $id;
            $info = $model->where($where)->find();
            $this->assign('info',$info);
        }else{
            $this->error('id缺失');
        }
        $this->display();
    }
    public function modify(){
        $model = M('BizProwled');
        $id = I('id');
        if (isset($id) && $id){
            $where['id'] = $id;
            $info = $model->where($where)->find();
           
            $this->assign('info',$info);
        }else{
            $this->error('id缺失');
        }
        $this->display();
    }
    public function  add(){
        if ('menu' == I('type')){
            $this->display();exit();
        }
        $data = $_POST;
        $model = M('BizProwled');
        $this->check($data,"add?type=menu");
    
        $data['ctime'] = date('Y-m-d H:i:s');
        $data['cuid'] = $_SESSION['id'];
        
        if ($_FILES['imagelink1']['name'] || $_FILES['imagelink2']['name'] || $_FILES['imagelink3']['name'] ){
                $imageinfo = $this->saveImage();
                if(isset($imageinfo['imagelink1']) && $imageinfo['imagelink1']){
                    $data['imagelink1'] = $imageinfo['imagelink1'];
                }else{
                    unset($data['imagelink1']);
                }
                
                if(isset($imageinfo['imagelink2']) && $imageinfo['imagelink2']){
                    $data['imagelink2'] = $imageinfo['imagelink2'];
                }else{
                    unset($data['imagelink2']);
                }
                if(isset($imageinfo['imagelink3']) && $imageinfo['imagelink3']){
                    $data['imagelink3'] = $imageinfo['imagelink3'];
                }else{
                    unset($data['imagelink3']);
                }
            
        }else{
            unset($data['imagelink1']);
            unset($data['imagelink2']);
            unset($data['imagelink3']);
        }
            

        $data['level'] = $this->getLevelByScore($data['score']);
        $res = $model->add($data);
        if ($res == false){
            $this->error('添加失败');
        }else{
            $this->success('添加成功','showList');
        }
    
    }
    
    public function save(){
        $id = I('id');
        $data = $_POST;
        $model = M('BizProwled');
        $this->check($data,"modify?id=".$id);
    
    
        if (isset($id) && $id){
    
            $where['id'] = $id;

                if ($_FILES['imagelink1']['name'] || $_FILES['imagelink2']['name'] || $_FILES['imagelink3']['name'] ){
                    $imageinfo = $this->saveImage();
                    if(isset($imageinfo['imagelink1']) && $imageinfo['imagelink1']){
                        $data['imagelink1'] = $imageinfo['imagelink1'];
                    }else{
                        unset($data['imagelink1']);
                    }
                    
                    if(isset($imageinfo['imagelink2']) && $imageinfo['imagelink2']){
                        $data['imagelink2'] = $imageinfo['imagelink2'];
                    }else{
                        unset($data['imagelink2']);
                    }
                    if(isset($imageinfo['imagelink3']) && $imageinfo['imagelink3']){
                        $data['imagelink3'] = $imageinfo['imagelink3'];
                    }else{
                        unset($data['imagelink3']);
                    }
            
                }else{
                    unset($data['imagelink1']);
                    unset($data['imagelink2']);
                    unset($data['imagelink3']);
                }
            
            $data['level'] = $this->getLevelByScore($data['score']);
            $res = $model->where($where)->save($data);
             
            if ($res === false){
                $this->error('保存失败');
            }else{
                $this->success('保存成功','showList');
            }
    
    
        }else{
            $this->error('id 丢失');
        }
    }
    
    public function del(){
        $id = I('id');
    
        $model = M('BizProwled');
    
        if (isset($id) && $id){
            $data['is_valid'] = '0';
            $where['id'] = $id;
            $res = $model->where($where)->save($data);
             
            if ($res === false){
                $this->error('删除失败');
            }else{
                $this->success('删除成功','showList');
            }
    
    
        }else{
            $this->error('id 丢失');
        }
    }
    private function check($data,$gourl){


    
    }
    
    
    /**
     * 重点巡查企业
     */
    public function mostList(){
        $model = M('Business');
        $where['is_valid'] = '1';
        $business_list = $model->where($where)->select();
        
        $biz_prowled = M("biz_prowled");
        foreach ($business_list as $key => $val){
            $item = array();
            $where = array();
            $where['business_id'] = $val['id'];
            $where['is_valid'] = '1';
            $where['score'] = array('lt',60);
            $month_ago = date("Y-m-d",strtotime("-1 month - day"));
            $where['_string']  = " date >= '{$month_ago}' ";
            $num = $biz_prowled->where($where)->count();

            if ($num >= 3){
                $item['id'] = $val['id'];
                $item['name'] = $val['name'];
                $item['num'] = $num;
                $list[] = $item;
            }
    
        }
        $this->assign('list',$list);

        $this->display();
    }
    
    
    
}