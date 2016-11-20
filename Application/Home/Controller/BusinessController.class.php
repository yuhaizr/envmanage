<?php
namespace Home\Controller;
use Home\Model\BusinessModel;
use Home\Controller\BaseController;


class BusinessController extends BaseController {
    
    public function __construct(){
        parent::__construct();
        
        $model = M('Business_type');
        $where['is_valid'] = '1';
        $business_type_list = $model->where($where)->select();
        $this->assign('business_type_list',$business_type_list);
        
    }
    

    public function showList(){
        $searchValue = I('searchValue');
        $type_id = I("type_id");
     
        $model = new BusinessModel();
        $data = $model->showList($searchValue,$type_id);
    
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->assign('searchValue',$searchValue);
        $this->assign('type_id',$type_id);
        $this->display();
    }
    
    public function detail(){
        $model = M('Business');
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
        $model = M('Business');
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
        $model = M('Business');
        $this->check($data,"add?type=menu");
    
        $data['ctime'] = date('Y-m-d H:i:s');
        $data['cuid'] = $_SESSION['id'];
        
        if ($_FILES['business_license_link']['name'] ){
            $imageinfo = $this->saveImage();
            if(isset($imageinfo['business_license_link']) && $imageinfo['business_license_link']){
                $data['business_license_link'] = $imageinfo['business_license_link'];
            }else{
                unset($data['business_license_link']);
            }
        
        }else{
            unset($data['business_license_link']);
        }
        
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
        $model = M('Business');
        $this->check($data,"modify?id=".$id);
    
    
        if (isset($id) && $id){
    
            $where['id'] = $id;

            if ($_FILES['business_license_link']['name'] ){
                $imageinfo = $this->saveImage();
                if(isset($imageinfo['business_license_link']) && $imageinfo['business_license_link']){
                    $data['business_license_link'] = $imageinfo['business_license_link'];
                }else{
                    unset($data['business_license_link']);
                }
            
            }else{
                unset($data['business_license_link']);
            }
            
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
    
        $model = M('Business');
    
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
        if (isset($data['name']) && mbstrlen($data['name']) > 30 ){
            $this->error('类型名称必须小于30字',$gourl);
        }


    
    }
    
}