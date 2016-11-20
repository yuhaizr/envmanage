<?php
namespace Home\Controller;
use Home\Model\NoticeModel;

class NoticeController extends BaseController {

    public function showList(){
        $searchValue = I('searchValue');
     
        $model = new NoticeModel();
        $data = $model->showList($searchValue);
    
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->assign('searchValue',$searchValue);
        $this->display();
    }
    
    public function detail(){
        $model = M('Notice');
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
        $model = M('Notice');
        $id = I('id');
        if (isset($id) && $id){
            $where['id'] = $id;
            $info = $model->where($where)->find();
            
            if (isset($info['starttime']) && $info['starttime']){
                $info['starttime'] = date("Y-m-d",strtotime($info['starttime']))."T".date("H:i:s",strtotime($info['starttime']));
            }
            if (isset($info['endtime']) && $info['endtime']){
                $info['endtime'] = date("Y-m-d",strtotime($info['endtime']))."T".date("H:i:s",strtotime($info['endtime']));;
            }
        
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
        $model = M('Notice');
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
        $model = M('Notice');
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
    
        $model = M('Notice');
    
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
        if (isset($data['content']) && mbstrlen($data['content']) > 30 ){
            $this->error('公告内容必须小于30字',$gourl);
        }

        if (isset($data['starttime']) && $data['starttime']){
            if (strtotime($data['starttime']) > strtotime($data['endtime'])){
                $this->error("开始时间不能大于结束时间",$gourl);
            }
        }

    
    }
    
}