<?php
namespace Home\Controller;

use Home\Model\HotelModel;
use Think\Upload;

/**
 * 酒店管理
 * @author Administrator
 *
 */
class HotelController extends BaseController
{
    
    public function showList(){
        $searchValue = I('searchValue');
        $model = new HotelModel();
        $data = $model->showList($searchValue);
        
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->assign('searchValue',$searchValue);
        $this->display();
    }
    
    public function detail(){
        $hotel = M('Hotel');
        $id = I('id');
        if (isset($id) && $id){
            $where['id'] = $id;
            $info = $hotel->where($where)->find();
            $this->assign('info',$info);
        }else{
            $this->error('id缺失');
        }
        $this->display();
    }
    public function modify(){
        $hotel = M('Hotel');
        $id = I('id');
        if (isset($id) && $id){
            $where['id'] = $id;
            $info = $hotel->where($where)->find();
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
        
        if ($_FILES['imglink']['name'] ){
            $imageinfo = $this->saveImage();
            if(isset($imageinfo['imglink']) && $imageinfo['imglink']){
                $data['imglink'] = $imageinfo['imglink'];
            }else{
                unset($data['imglink']);
            }
        
        }else{
            unset($data['imglink']);
        }
        
        $hotel = M('Hotel');
        $this->check($data);
        
        $data['ctime'] = date('Y-m-d H:i:s');
        $data['cuid'] = $_SESSION['authId'];
        $res = $hotel->add($data);
        if ($res == false){
            $this->error('添加失败');
        }else{
            $this->success('添加成功','showList');
        }
        
    }
    
    public function save(){
        $id = I('id');
        $data = $_POST;
        $hotel = M('Hotel');
        $this->check($data);
        
        
        if (isset($id) && $id){
            if ($_FILES['imglink']['name'] ){
                $imageinfo = $this->saveImage();
                if(isset($imageinfo['imglink']) && $imageinfo['imglink']){
                    $data['imglink'] = $imageinfo['imglink'];
                }else{
                    unset($data['imglink']);
                }
              
            }else{
                unset($data['imglink']);
            }
        
            $where['id'] = $id;
            $res = $hotel->where($where)->save($data);
             
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

        $scenicSpot = M('ScenicSpot');

        if (isset($id) && $id){
            $data['is_valid'] = '0';
            $where['id'] = $id;
            $res = $scenicSpot->where($where)->save($data);
             
            if ($res === false){
                $this->error('删除失败');
            }else{
                $this->success('删除成功','showList');
            }
        
        
        }else{
            $this->error('id 丢失');
        }
    }
    
    

  
    
    private function check($data){
        if (isset($data['name']) && mbstrlen($data['name']) > 30 ){
            $this->error('酒店名称必须小于30字');
        }
        if (isset($data['intro']) && mbstrlen($data['intro']) > 300 ){
            $this->error('酒店概况必须小于300字');
        }
        if (isset($data['addr']) && mbstrlen($data['addr']) > 100 ){
            $this->error('酒店概况必须小于100字');
        }
       

    }
    
    private function saveImage(){
    
        $rootPath = __REAL_APP_ROOT__."/Public/upload/";
        if (!is_dir(__REAL_APP_ROOT__."/Public/upload/")){
            mkdir(__REAL_APP_ROOT__."/Public/upload/",0777);
    
        }
        
        $config = array(
            'rootPath' => $rootPath
            ,'subName' => ''
            ,'replace' => true
            ,'callback' => true
            ,'exts' => array('png','gif','jpg','jpeg')
        );
    
        $upload = new Upload($config);
        $upload->autoSub = true;
        $upload->subName = array('date',"Ymd");
        $upload->saveName = time()."_".mt_rand();
        $info = $upload->upload();
    
    
        if (!$info){
            $this->crmError($upload->getError());
        }else {
            $filenameArr = array();
            foreach ($info as $key => $val){
                $savepath = $val['savepath'];
                $savename = $val['savename'];
                $filename = "/Public/upload/".$savepath . $savename;
                $filenameArr[$key] = $filename;
            }
            return $filenameArr;
        }
    }
    
    
}