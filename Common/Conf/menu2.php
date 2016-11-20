<?php
return array(

	
	array(
			'title' => '企业管理',
			'link' => '/Home/Business',
			'icon' => '',
			'childs' => array(

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
        )
    ),
    array(
        'title' => '人员管理',
        'link' => '/Home/User',
        'icon' => '',
        'childs' => array(
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
		                'title' => '巡查对象列表',
		                'link' => '/Home/ProwledObj/showList?type=menu'
		        ),

		    
			)
	),	
    array(
        'title' => '公告管理',
        'link' => '/Home/Notice',
        'icon' => '',
        'childs' => array(
            array(
                'title' => '公告列表',
                'link' => '/Home/Notice/showList?type=menu'
            ),       
        )
    ),

		
)
?>