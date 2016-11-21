<?php
namespace Home\Controller;
use Home\Model\ScoreSetModel;
use Home\Controller\BaseController;


class ScoreSetController extends BaseController {
    
    public function __construct(){
        parent::__construct();
        
        

    }
    

    public function showList(){
        $searchValue = I('searchValue');
        $prowled_obj_id = I("prowled_obj_id");
        $business_id= I("business_id");
     
        $model = new ScoreSetModel();
        $data = $model->showList($business_id,$prowled_obj_id);
    
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->assign('business_id',$business_id);
        $this->assign('prowled_obj_id',$prowled_obj_id);
        $this->display();
    }
    
    public function detail(){
        $model = M('Score_set');
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
        $model = M('Score_set');
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
        $model = M('Score_set');
        $this->check($data,"add?type=menu");
    
        $data['ctime'] = date('Y-m-d H:i:s');
        $data['cuid'] = $_SESSION['id'];
       
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
        $model = M('Score_set');
    
        $this->check($data,"modify?id=".$id);
    
    
        if (isset($id) && $id){
    
            $where['id'] = $id;

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
    
        $model = M('Score_set');
    
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

        if (isset($data['id']) && $data['id']){
            $where['_string'] = " id != {$data['id']} "; 
        }
        $model = M('Score_set');
        $where['is_valid'] = '1';
        $score_set_list = $model->where($where)->select();
        if (isset($data['start']) ){
            foreach ($score_set_list as $key => $val){
                $start = $val['start'];
                $end = $val['end'];
                if ($data['start'] >= $start && $data['start'] <= $end ){
                    $this->error("评分范围不能交叉设置",$gourl);
                }
            }
        }
       
        if (isset($data['end']) ){
            foreach ($score_set_list as $key => $val){
                $start = $val['start'];
                $end = $val['end'];
                if ($data['end'] >= $start && $data['end'] <= $end ){
                    $this->error("评分范围不能交叉设置",$gourl);
                }
            }
        }       
        
        if ($data['start'] > 100 || $data['end'] > 100) {
            $this->error('评分范围不能大于100',$gourl);
        }
        
        
        
    
    }
    
}