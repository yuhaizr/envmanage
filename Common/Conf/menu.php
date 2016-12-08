<?php
return array(

	
	array(
			'title' => '企业管理',
			'link' => '/Home/Business',
			'icon' => '',
			'childs' => array(
                array(
                    'title' => '添加企业类型',
                    'link' => '/Home/BusinessType/add?type=menu'
                ),
		        array(
		                'title' => '企业类型列表',
		                'link' => '/Home/BusinessType/showList?type=menu'
		        ),
			    array(
			        'title' => '添加企业信息',
			        'link' => '/Home/Business/add?type=menu'
			    ),
			    array(
			        'title' => '企业信息列表', 
			        'link' => '/Home/Business/showList?type=menu'
			    ),
			)
	),	
    array(
        'title' => '巡查管理',
        'link'  => '/Home/Prowled',
        'icon' => '',
        'childs' => array(
            array(
                'title' => '添加企业日常巡查情况',
                'link' => '/Home/BizProwled/add?type=menu'
            ),            
            array(
                'title' => '企业日常巡查情况列表',
                'link' => '/Home/BizProwled/showList?type=menu'
            ), 
            array(
                'title' => '添加区域日常巡查情况',
                'link' => '/Home/AreaProwled/add?type=menu'
            ),
            array(
                'title' => '区域日常巡查情况列表',
                'link' => '/Home/AreaProwled/showList?type=menu'
            ), 
            array(
                'title' => '重点巡查区域对象',
                'link' => '/Home/AreaProwled/mostList?type=menu'
            ),
            array(
                'title' => '重点巡查企业对象',
                'link' => '/Home/BizProwled/mostList?type=menu'
            ),

        )
    ),
    array(
        'title' => '人员管理',
        'link' => '/Home/User',
        'icon' => '',
        'childs' => array(
            array(
                'title' => '添加人员',
                'link' => '/Home/User/add?type=menu'
            ),
            array(
                'title' => '人员列表',
                'link' => '/Home/User/showList?type=menu'
            ),
            array(
                'title' => '考勤列表',
                'link' => '/Home/Attendance/showList?type=menu'
            ),
            array(
                'title' => '密码修改',
                'link' => '/Home/Index/modPassword?type=menu'
            ),
        )
    ),
	array(
			'title' => '系统管理',
			'link' => '/Home/System',
			'icon' => '',
			'childs' => array(
                array(
                    'title' => '添加巡查对象',
                    'link' => '/Home/ProwledObj/add?type=menu'
                ),
		        array(
		                'title' => '巡查对象列表',
		                'link' => '/Home/ProwledObj/showList?type=menu'
		        ),
			    array(
			        'title' => '添加评分标准',
			        'link' => '/Home/ScoreSet/add?type=menu'
			    ),
			    array(
			        'title' => '评分标准设置',
			        'link' => '/Home/ScoreSet/showList?type=menu'
			    ),
			    array(
			        'title' => '添加地区信息',
			        'link' => '/Home/Area/add?type=menu'
			    ),
			    array(
			        'title' => '地区信息列表',
			        'link' => '/Home/Area/showList?type=menu'
			    ),			     
		    
			)
	),	
    array(
        'title' => '公告管理',
        'link' => '/Home/Notice',
        'icon' => '',
        'childs' => array(
            array(
                'title' => '添加公告',
                'link' => '/Home/Notice/add?type=menu'
            ),
            array(
                'title' => '公告列表',
                'link' => '/Home/Notice/showList?type=menu'
            ),       
        )
    ),
    array(
        'title' => '统计分析',
        'link' => '/Home/Count',
        'icon' => '',
        'childs' => array(
            array(
                'title' => '企业巡查分数走势',
                'link' => '/Home/Count/bizCount?type=menu'
            ),
            array(
                'title' => '区域巡查分数走势',
                'link' => '/Home/Count/areaCount?type=menu'
            ),
        )
    ),
		
)
?>