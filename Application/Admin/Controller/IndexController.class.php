<?php
namespace Admin\Controller;
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
}