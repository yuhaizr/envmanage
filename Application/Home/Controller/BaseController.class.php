<?php
namespace Home\Controller;
use Think\Controller;
use Org\Util\FlashData;
use Think\Upload;


class BaseController extends Controller
{

    public function __construct ()
    {
        parent::__construct();

        
        $info = $_SESSION;
        if (!isset($info) || !$info){
        
            $this->error("您没有登入请登入",__APP__."/Home/Login/index");
            exit();
        }
        $menu = array();

        if (isset($info['type']) && $info['type'] == '1'){
            $this->assign('my_modify_btn','1');
            $this->assign('my_del_btn','1');
            
            $menu = C('menu');
            $this->assign('menu',$menu);
            
        }else if (isset($info['type']) && $info['type'] == '2'){
            $this->assign('my_modify_btn','0');
            $this->assign('my_del_btn','0');
            $menu = C('menu2');
            $this->assign('menu',$menu);
        }else{
            $this->error("您没有权限访问该页面");
        }
        
        
        
        $notice = M("Notice");
        $where['is_valid'] = '1';
        $where['is_show'] = '1';
        $nowtime = date("Y-m-d H:i:s");
        $where['_string'] = " starttime <='{$nowtime}' AND endtime >= '{$nowtime}' ";
        $info = $notice->where($where)->order("id DESC")->find();

        if ($info){
            $this->assign('notice',$info['content']);
        }
        


        
        
        $module = MODULE_NAME;
        $action = CONTROLLER_NAME;
        $function = ACTION_NAME;
        

        
        
        $NOW_MENU = "/{$module}/$action/$function";
      
        
        $res = $this->get_now_menu($NOW_MENU, $menu);
        if (isset($res['SECOND_NOW_MENU']) && $res['SECOND_NOW_MENU']) {
            $this->assign('SECOND_NOW_MENU', $res['SECOND_NOW_MENU']);
        }
        if (isset($res['NOW_MENU']) && $res['NOW_MENU']) {
            $this->assign('NOW_MENU', $res['NOW_MENU']);
        }

        
    }


    private function get_now_menu ($NOW_MENU, $list)
    {
        $flag = false;
        $res = array();
        foreach ($list as $key => $val) {
            if (isset($val['childs']) && $val['childs']) {
    
                $childs = $val['childs'];
                foreach ($childs as $k => $v) {
                    if (isset($v['childs']) && $v['childs']) {
                        $res = $this->get_now_menu($NOW_MENU,
                            array(
                                $v
                            ));
                        if ($res) {
                            $res['SECOND_NOW_MENU'] = $res['NOW_MENU'];
                            $res['NOW_MENU'] = $val['link'];
                            return $res;
                        }
                    } else {
    
                        $link = $v['link'];
                        if (strstr($link, $NOW_MENU)) {
                            $res['NOW_MENU'] = $val['link'];
                            return $res;
                        }
                    }
                }
            } else {
                $res['NOW_MENU'] = $val['link'];
                return $res;
            }
            if ($flag) {
                break;
            }
        }
    
        return $res;
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

 
    function saveImage(){
    
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
    //    $upload->saveName = time()."_".mt_rand();
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
    
    /**
     * 根据分数获取级别
     * 1、优秀90-100     2、良好80-89   3、达标60-79  4、未达标50-59   5、差0-49
     * @param unknown $score
     */
    public function getLevelByScore($score){
        $score = intval($score);
        if ($score >= 0 && $score <= 49){
            return 5;
        }elseif ($score <= 59){
            return 4;
        }elseif ($score <= 79){
            return 3;
        }elseif ($score <= 89){
            return 2;
        }elseif ($score <= 100){
            return 1;
        }else{
            return 0;
        }
    }
    
}

?>