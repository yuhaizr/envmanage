<?php
namespace Home\Model;

use Think\Page;
use Home\Model\BaseModel;
class ScoreSetModel extends BaseModel
{
    public function showList(){
    
        $paramer = array(

        );
    
        $model = M('Score_set');
        $where = array();

    
        $total = $model->where($where)->count();
    
        $page = new Page($total,20,$paramer);
        $show = $page->show();
        $list = $model
        ->where($where)
        ->order(' start DESC ')
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
                
            }
        }
    
    
        return $list;
    }
}