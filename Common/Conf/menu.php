<?php
return array(

	
	array(
			'title' => '企业管理',
			'link' => '/Admin/Business',
			'icon' => '',
			'childs' => array(
                array(
                    'title' => '添加企业类型',
                    'link' => '/Admin/BusinessType/add?type=menu'
                ),
		        array(
		                'title' => '企业类型列表',
		                'link' => '/Admin/BusinessType/showList?type=menu'
		        ),
			    array(
			        'title' => '添加企业信息',
			        'link' => '/Admin/Business/add?type=menu'
			    ),
			    array(
			        'title' => '企业信息列表',
			        'link' => '/Admin/Business/showList?type=menu'
			    ),
			)
	),	
    array(
        'title' => '巡查管理',
        'link'  => '/Admin/Prowled',
        'icon' => '',
        'childs' => array(
            array(
                'title' => '添加企业日常巡查情况',
                'link' => '/Admin/BizProwled/add?type=menu'
            ),            
            array(
                'title' => '企业日常巡查情况列表',
                'link' => '/Admin/BizProwled/showList?type=menu'
            ), 
            array(
                'title' => '地区日常巡查情况',
                'link' => '/Admin/AreaProwled/add?type=menu'
            ),
            array(
                'title' => '地区日常巡查情况列表',
                'link' => '/Admin/AreaProwled/showList?type=menu'
            ),                      
        )
    ),
    array(
        'title' => '人员管理',
        'link' => '/Admin/User',
        'icon' => '',
        'childs' => array(
            array(
                'title' => '添加人员',
                'link' => '/Admin/User/add?type=menu'
            ),
            array(
                'title' => '人员列表',
                'link' => '/Admin/User/showList?type=menu'
            ),
            array(
                'title' => '考勤',
                'link' => '/Admin/Worker/add?type=menu'
            ),
            array(
                'title' => '考勤列表',
                'link' => '/Admin/Worker/showList?type=menu'
            ),
        )
    ),
	array(
			'title' => '系统管理',
			'link' => '/Admin/System',
			'icon' => '',
			'childs' => array(
                array(
                    'title' => '添加巡查对象',
                    'link' => '/Admin/ProwledObj/add?type=menu'
                ),
		        array(
		                'title' => '巡查对象列表',
		                'link' => '/Admin/ProwledObj/showList?type=menu'
		        ),
			)
	),	
    array(
        'title' => '公告管理',
        'link' => '/Admin/Notice',
        'icon' => '',
        'childs' => array(
            array(
                'title' => '添加公告',
                'link' => '/Admin/Notice/add?type=menu'
            ),
            array(
                'title' => '公告列表',
                'link' => '/Admin/Notice/showList?type=menu'
            ),       
        )
    ),
		
)
?>