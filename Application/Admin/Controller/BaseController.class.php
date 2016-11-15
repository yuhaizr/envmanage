<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\FlashData;


class BaseController extends Controller
{

    public function __construct ()
    {
        parent::__construct();
        $menu = C('menu');
        $this->assign('menu',$menu);
        
        $info = $_SESSION;
        if (!isset($info) || !$info){
        
            $this->error("您没有登入请登入",__APP__."/Admin/Login/index");
            exit();
        }

        if (isset($info['type']) && $info['type'] == '1'){
            $this->assign('my_modify_btn','1');
            $this->assign('my_del_btn','1');
        }else if (isset($info['type']) && $info['type'] == '2'){
            $this->assign('my_modify_btn','0');
            $this->assign('my_del_btn','0');
        }else{
            $this->error("您没有权限访问该页面");
        }
        
        
        
        
    }




    protected function crmSuccess ($message, $url = '')
    {
        $this->_flashRediect($message, 'success', $url);
    }

    protected function crmError ($message, $url = '')
    {
        $this->_flashRediect($message, 'error', $url);
    }

    private function _flashRediect ($message = '', $type = 'success', $url = '')
    {
        FlashData::flash('__SYS_MESSAGE__', $message);
        FlashData::flash('__SYS_MESSAGE_TYPE__', $type);
        
        if (empty($url)) {
            $url = $_SERVER['HTTP_REFERER'];
        }
        
        redirect($url);
    }

 
}

?>