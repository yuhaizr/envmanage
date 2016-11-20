<?php
namespace Home\Controller;


use Think\Controller;
class LoginController extends Controller
{
    public function index(){
        $this->display();
    }
    
    public function logout ()
    {
        if (isset($_SESSION['id'])) {
            unset($_SESSION);
            session_destroy();
            $this->success('登出成功！','index');
        } else {
            $this->error('已经登出！',"index");
        }
    }
    
    public function login(){
        $account = I("account");
        $password = I("password");
        
        $user = M("User");
        $where['account'] = $account;
        $where['is_valid'] = '1';
        $userinfo = $user->where($where)->find();
     
        if (isset($userinfo) && $userinfo){
            if (md5($password) !== $userinfo['password']){
                $this->error("密码错误","index");
            }else{
                
                $_SESSION['nickname'] = $userinfo['nickname'];
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['account'] = $userinfo['account'];
                $_SESSION['type'] = $userinfo['type'];
                
                $this->success("登入成功",__APP__."/Home/Index/index");
            }
        }else{
            $this->error("用户不存在","index");
        }
        
    }
}