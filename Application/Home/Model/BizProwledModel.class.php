<?php
namespace Home\Model;

use Think\Page;
use Home\Model\BaseModel;
class BizProwledModel extends BaseModel
{
    public function showList($business_id,$prowled_obj_id){
    
        $paramer = array(
            'business_id' => $business_id,
            'prowled_obj_id' => $prowled_obj_id
        );
    
        $model = M('BizProwled');
        $where = array();
        $where['is_valid'] = '1';
        if ($business_id){
            $where['business_id'] = $business_id;
        }
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
        
        if (is_array($list)){
            foreach ($list as $key => &$val){
                if (isset($val['business_id']) && $val['business_id']){
                    $where['id'] = $val['business_id'];
                    $info = $business->where($where)->find();
                    if ($info){
                        $val['business_name'] = $info['name'];
                        if (isset($info['type_id']) && $info['type_id']){
                            $where_type['id'] = $info['type_id'];
                            $info_type = $business_type->where($where_type)->find();
                           
                            if ($info_type){
                                $val['type_name'] = $info_type['name'];
                            }
                        }
                    }
                }
                $score = $val['score'];
                if (isset($val['level'])){
                    if ($score >= 0 && $score <= 49){
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
                    }
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