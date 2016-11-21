<?php
namespace Home\Model;

use Think\Page;
use Home\Model\BaseModel;
class AreaModel extends BaseModel
{
    public function showList($searchValue){
    
        $paramer = array(
            'searchValue' => $searchValue,
        );
    
        $model = M('Area');
        $where = array();
        $where['is_valid'] = '1';
        if ($searchValue){
            $where['_string'] = " name LIKE  '%".$searchValue."%' ";
        }
    
    
        $total = $model->where($where)->count();
    
        $page = new Page($total,20,$paramer);
        $show = $page->show();
        $list = $model
        ->where($where)
        ->order(' ctime DESC ')
        ->limit($page->firstRow, $page->listRows)
        ->select();
        $list = $this->fixList($list);
        return array(
            'list' => $list,
            'page' => $show,
        );
    }
    
    private function fixList($list){
        $user = M("User");
        
        if (is_array($list)){
            foreach ($list as $key => &$val){
                if (isset($val['uid']) && $val['uid']){
                    $where = array();
                    $where['is_valid'] = '1';
                    $where['id'] = $val['uid'];
                    $info = $user->where($where)->find();
                    if ($info){
                        $val['uid'] = $info['nickname'];
                    }else{
                        $val['uid'] = '';
                    }
                }
      
            }
    
        }
    
    
        return $list;
    }
}