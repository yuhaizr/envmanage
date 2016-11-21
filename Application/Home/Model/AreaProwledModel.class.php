<?php
namespace Home\Model;

use Think\Page;
use Home\Model\BaseModel;
class AreaProwledModel extends BaseModel
{
    public function showList($prowled_obj_id){
    
        $paramer = array(
            'prowled_obj_id' => $prowled_obj_id
        );
    
        $model = M('AreaProwled');
        $where = array();
        $where['is_valid'] = '1';

        if ($prowled_obj_id){
            $where['prowled_obj_id'] = $prowled_obj_id;
        }
        if ($_SESSION['type'] == 2){
            $where['cuid'] = $_SESSION['id'];
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
        $business = M("Business");
        
        $model = M('Score_set');
        $where['is_valid'] = 1;
        $score_set_list =  $model->where($where)->select();
        
        if (is_array($list)){
            foreach ($list as $key => &$val){

                $score = $val['score'];
                if (isset($val['level'])){
                    $flag = 0;
                    foreach ($score_set_list as $k => $v){
                        $start = $v['start'];
                        $end = $v['end'];
                        $name = $v['name'];
                        if ($score >= $start && $score <= $end ){
                           $val['level'] = $name;
                           $flag = 1;
                        }
                    }
                    if (!$flag){
                        $val['level'] = '未设置标准分数';
                    }
                    
      /*               if ($score >= 0 && $score <= 49){
                        $val['level'] = '差';
                    }elseif ($score <= 59){
                        $val['level'] = '未达标';
                    }elseif ($score <= 79){
                        $val['level'] = '达标';
                    }elseif ($score <= 89){
                        $val['level'] = '良好';
                    }elseif ($score <= 100){
                        $val['level'] = '优秀';
                    }else{
                        $val['level'] = '分数异常';
                    } */
                }
                if (isset($val['prowled_obj_id']) && $val['prowled_obj_id']){
                    $prowled_obj = M('Prowled_obj');
                    $where['id'] = $val['prowled_obj_id'];
                    $info = $prowled_obj->where($where)->find();
                    $val['prowled_obj_id'] = $info['name'];
                }

            }
    
        }
    
    
        return $list;
    }
}