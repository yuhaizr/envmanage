<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){

        
        $info = $_SESSION;
/*         if (isset($info['type']) && $info['type'] == '1'){
            $this->display("Index/homepage1");
            $this->assign('my_modify_btn','1');
            $this->assign('my_del_btn','1');
        }else if (isset($info['type']) && $info['type'] == '2'){
            $this->display("Index/homepage2");
            $this->assign('my_modify_btn','0');
            $this->assign('my_del_btn','0');
        }else{
            $this->error("您没有权限访问该页面");
        } */
        $this->display();
    }
    
    
    
    
    
    
    
    
    
    
    /**
     * 密码修改页面
     */
    public function modPassword(){
    
        $this->display();
    
    }
    
    /**
     * 保存密码
     */
    public function savePassword(){
        $oldpassword = I('oldpassword');
        $password = I('password');
    
        if ( (mbstrlen($password) < 3 )||(mbstrlen($password) > 10)){
            $this->error("密码必须在3到10位");
        }
    

       $model = M("User");
    
    
        $where['id'] = $_SESSION['id'];
        $where['is_valid'] = 1;
        $info = $model->where($where)->find();
        if (!$info){
            $this->error("用户信息错误，请重新登入",U("Login/index"));
        }
    
        if (md5($oldpassword) == $info['password']){
            $data['password'] = md5($password);
            $res = $model->where($where)->save($data);
            if ($res !== false){
                $this->success("密码修改成功",U("Login/index"));
            }else{
                $this->error("密码修改失败");
            }
    
        }else{
            $this->error('原密码错误');
        }
    
    }
    
    
    
    
    
}