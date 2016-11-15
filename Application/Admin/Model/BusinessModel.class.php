<?php
namespace Admin\Model;

use Think\Page;
use Home\Model\BaseModel;
class BusinessModel extends BaseModel
{
    public function showList($searchValue,$type_id){
    
        $paramer = array(
            'searchValue' => $searchValue,
            'type_id' => $type_id
        );
    
        $model = M('Business');
        $where = array();
        $where['is_valid'] = '1';
        if ($searchValue){
            $where['_string'] = " name LIKE  '%".$searchValue."%' ";
        }
        if ($type_id){
            $where['type_id'] = $type_id;
        }
    
        $total = $model->where($where)->count();
    
        $page = new Page($total,2,$paramer);
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
                if (isset($val['type_id']) && $val['type_id']){
                    $where['id'] = $val['type_id'];
                    $info = $business_type->where($where)->find();
                    if ($info){
                        $val['type_id'] = $info['name'];
                    }
                }
            }
    
        }
    
    
        return $list;
    }
}