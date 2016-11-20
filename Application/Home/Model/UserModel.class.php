<?php
namespace Home\Model;

use Think\Page;
use Home\Model\BaseModel;
class UserModel extends BaseModel
{

    
    public function showList($searchValue,$type){
    
        $paramer = array(
            'searchValue' => $searchValue,
            'type' => $type
        );
    
        $model = M('User');
        $where = array();
        $where['is_valid'] = '1';
        if ($searchValue){
            $where['_string'] = " nickname LIKE  '%".$searchValue."%' ";
        }
        if ($type){
            $where['type'] = $type;
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
        $business_type = M("Business_type");
        
        if (is_array($list)){
            foreach ($list as $key => &$val){
                if (isset($val['type']) && $val['type']){
                    if ($val['type'] == 1){
                        $val['type'] = "管理员";
                    }
                    if ($val['type'] == 2){
                        $val['type'] = "巡查员";
                    }                   
                }
                
                
            }
    
        }
    
    
        return $list;
    }
}