<?php
namespace Home\Controller;
use Home\Model\UserModel;
use Home\Controller\BaseController;



class UserController extends BaseController {
    
    public function __construct(){
        parent::__construct();
        
        $user_type_list = array(
            array(
                'id' => '1',
                'name' => '管理员'
            ),
            array(
                'id' => '2',
                'name' => '巡查员'
            )            
        );
        $this->assign('user_type_list',$user_type_list);
        
    }
    

    public function showList(){
        $searchValue = I('searchValue');
        $type = I("type");
        if ($type == 'menu'){
            $type = '';
        }
     
        $model = new UserModel();
        $data = $model->showList($searchValue,$type);
    
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->assign('searchValue',$searchValue);
        $this->assign('type',$type);
        $this->display();
    }
    
    public function detail(){
        $model = M('User');
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
        $model = M('User');
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
        $model = M('User');
        $this->check($data,"add?type=menu");
    
        $data['ctime'] = date('Y-m-d H:i:s');
        $data['cuid'] = $_SESSION['id'];
        $data['password'] = md5("123456");
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
        $model = M('User');
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
    
        $model = M('User');
    
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
            $this->error('姓名必须小于30字',$gourl);
        }
        if (isset($data['account']) && mbstrlen($data['account']) > 15 ){
            $this->error('账号必须小于15字',$gourl);
        }else{
            if (!isset($data['id']) || !$data['id']) {
                $where['account'] = $data['account'];
                $where['is_valid'] = '1';
                $user = M("User");
                $info = $user->where($where)->find();
                if ($info){
                    $this->error("账号已存在",$gourl);
                }
                
            }
        }   
        if (isset($data['addr']) && mbstrlen($data['addr']) > 100 ){
            $this->error('地址必须小于100字',$gourl);
        }
        
        

    
    }
    
}