<?php
namespace Home\Model;

use Think\Page;
use Home\Model\BaseModel;
class NoticeModel extends BaseModel
{
    public function showList($searchValue){
    
        $paramer = array(
            'searchValue' => $searchValue,
        );
    
        $model = M('Notice');
        $where = array();
        $where['is_valid'] = '1';
        if ($searchValue){
            $where['_string'] = " content LIKE  '%".$searchValue."%' ";
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
    
        if (is_array($list)){
            foreach ($list as $key => &$val){
                if (isset($val['is_show']) && $val['is_show']){
                    $val['is_show'] = '是';
                }else{
                    $val['is_show'] = '否';
                }
            }
    
        }
    
    
        return $list;
    }
}