<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<!--Head xmlns="http://www.w3.org/1999/xhtml"-->
<head>
    <meta charset="utf-8" />
    <title><?php echo ($page_title); ?></title>

    <meta name="description" content="<?php echo ($page_description); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/hotel/Public/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="/hotel/Public/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="/hotel/Public/css/font-awesome.min.css" rel="stylesheet" />
    

    <!--Beyond styles-->
    <link id="beyond-link" href="/hotel/Public/css/beyond.min.css" rel="stylesheet" />
    <link href="/hotel/Public/css/demo.min.css" rel="stylesheet" />
    <link href="/hotel/Public/css/animate.min.css" rel="stylesheet" />
    <link href="/hotel/Public/css/load.css" rel="stylesheet" />
 	
	<script type="text/javascript">
	var __URL = '/hotel/index.php/Home/User';
	var __APP = '/hotel/index.php';
	var __PUBLIC = '/hotel/Public';
	var __AJAX;
	</script>
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
   <script src="/hotel/Public/js/skins.min.js"></script> 
    
    <script src="/hotel/Public/js/jquery-1.10.2.min.js"></script>
    <script src="/hotel/Public/base.js"></script>
    
    <script type="text/javascript">
    
	/* 在ajax 请求返回结果之前做些处理判断用户是否有权访问  */
	$(function(){
		__AJAX = $.ajax;
		var ajax = $.ajax;
	    $.ajax = function (opt) {
	        //备份opt中error和success方法
	        var fn = {
	            success: function (data, textStatus, jqXHR) {
	            }
	        }
	        if (opt.success) {
	            fn.success = opt.success;
	        }
	        //扩展增强处理
	        var _opt = $.extend(opt, {
	            success: function (data, textStatus, jqXHR) {
	                //alert('重写success事件');
	                $('.sk-circle').hide();
	                $('.mask').hide();
	                if (data.info) {
	                    alert(data.info);
	                    return;
	                }
	                fn.success(data, textStatus, jqXHR);
	            },
	        	beforeSend:function(){
	        		$('.sk-circle').show();
	        		$('.mask').show();
	        	}
	        });
	        var def = ajax.call($, _opt);                                                                                                                             // 兼容不支持异步回调的版本
	        if('done' in def){
	            var done = def.done;
	            def.done = function (func) {
	                function _done(data) {
		                $('.sk-circle').hide();
		                $('.mask').hide();
	                    if (data.info) {
	                        alert(data.info);
	                        return;
	                    }
	                    func(data);
	                }
	                done.call(def, _done);
	                return def;
	            };
	        }
	        return def;
	    };
	}); 
    </script>    
    
    
</head>
<!--Head Ends-->
<!--Body-->
<body>

<!-- ajax loading -->
	<div class='mask opacity'></div>
    <div class="sk-circle">
      <div class="sk-circle1 sk-child"></div>
      <div class="sk-circle2 sk-child"></div>
      <div class="sk-circle3 sk-child"></div>
      <div class="sk-circle4 sk-child"></div>
      <div class="sk-circle5 sk-child"></div>
      <div class="sk-circle6 sk-child"></div>
      <div class="sk-circle7 sk-child"></div>
      <div class="sk-circle8 sk-child"></div>
      <div class="sk-circle9 sk-child"></div>
      <div class="sk-circle10 sk-child"></div>
      <div class="sk-circle11 sk-child"></div>
      <div class="sk-circle12 sk-child"></div>
    </div>
<!-- ajax loading -->

<!-- Loading Container -->
    <div class="loading-container">
        <div class="loading-progress">
            <div class="rotator">
                <div class="rotator">
                    <div class="rotator colored">
                        <div class="rotator">
                            <div class="rotator colored">
                                <div class="rotator colored"></div>
                                <div class="rotator"></div>
                            </div>
                            <div class="rotator colored"></div>
                        </div>
                        <div class="rotator"></div>
                    </div>
                    <div class="rotator"></div>
                </div>
                <div class="rotator"></div>
            </div>
            <div class="rotator"></div>
        </div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar" >
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand" id="nav-title">
                        <small>
                            <!-- <img src="/hotel/Public/img/logo.png" alt="" /> -->
                            <font size ='2'>
                           		网上酒店预订系统设计与实现
                            </font>
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->

                <!-- Sidebar Collapse -->
   <!--              <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div> -->
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings --->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
							<li id="tasks" class="bg-themesecondary" style="<?php if($task_num == 0): ?>display:none;<?php endif; ?> ">
                                <a class="wave in dropdown-toggle" data-toggle="dropdown" title="Help" href="#">
                                    <i class="icon fa fa-envelope"></i>
                                    <span class="badge tasks-num"><?php echo ($task_num); ?></span>
                                </a>
                                <!--Messages Dropdown-->
                                 <ul class="pull-right dropdown-menu dropdown-arrow dropdown-messages">
	                                	<?php if(is_array($taskList)): foreach($taskList as $key=>$vo): ?><li data-url="<?php echo ($vo["url"]); ?>" data-id="<?php echo ($vo["id"]); ?>" class='read_message' style="cursor:pointer">
		                                        <a >
		                                          
		                                            <div class="message">
		                                                <span class="message-sender">
		                                                   <?php echo ($vo["from_nickname"]); ?>
		                                                </span>
		                                                <span class="message-time">
		                                                   <?php echo ($vo["ctime"]); ?>
		                                                </span>
		                          	                	<span class="message-subject">
		                                                   <!-- <?php echo ($vo["message"]); ?>  -->
		                                                </span>
		                                                <span class="message-body">
		                                                   <?php echo ($vo["message"]); ?> 
		                                                </span>
		                                            </div>
		                                        </a>
		                                    </li><?php endforeach; endif; ?>
                                   		<li style="font-size: 0.2em;text-align: right;">
                                   			<span class="col-sm-6"><button class="btn btn-sm readedAll">全部标记为已读</button></span>
                                			<span class="col-sm-6"><button class="btn btn-sm"><a href="/hotel/index.php/Home/Task/taskList" target="_blank">显示所有消息</a></button></span>
                                		</li>
	                                </ul>      
             				</li>      
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                 <!--    <div class="avatar" title="View your public profile">
                                        <img src="">
                                    </div> -->
                                    <section>
                                        <h2><span class="profile"><span><?php echo ($_SESSION['loginUserName']); ?></span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                        
                                    <!--Theme Selector Area-->
                 <!--                  <li class="theme-area">
                                        <ul class="colorpicker" id="skin-changer">
                                            <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;" rel="/hotel/Public/css/skins/blue.min.css"></a></li>
                                            <li><a id='azure_div' class="colorpick-btn" href="#" style="background-color:#2dc3e8;" rel="/hotel/Public/css/skins/azure.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;" rel="/hotel/Public/css/skins/teal.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;" rel="/hotel/Public/css/skins/green.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;" rel="/hotel/Public/css/skins/orange.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;" rel="/hotel/Public/css/skins/pink.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;" rel="/hotel/Public/css/skins/darkred.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;" rel="/hotel/Public/css/skins/purple.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;" rel="/hotel/Public/css/skins/darkblue.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#585858;" rel="/hotel/Public/css/skins/gray.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#474544;" rel="/hotel/Public/css/skins/black.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#001940;" rel="/hotel/Public/css/skins/deepblue.min.css"></a></li>
                                        </ul>
                                    </li>  -->
                                    
                                    <!--/Theme Selector Area-->
                                    <li class="dropdown-footer">
                                        <a href="/hotel/index.php/Home/login/logout">
                                            		注销
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            <!-- /Account Area -->
                            <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                            <!-- Settings -->
                        </ul>
                        <!-- Settings -->
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
       <!--          <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                </div> -->
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                 <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li class="active">
                        <a href="/hotel/index.php/Home/Index/index">
                            <i class="menu-icon glyphicon glyphicon-home"></i>
                            <span class="menu-text"> Home </span>
                        </a>
                    </li>
                    <!--Tables-->
                    <?php if(is_array($menu)): foreach($menu as $key=>$value): ?><li  <?php if($value["link"] == $NOW_MENU): ?>class='open'<?php endif; ?>  >
                   			 <a href= "#" class="menu-dropdown">
	                            <i class="menu-icon glyphicon glyphicon-tasks"></i>
	                            <span class="menu-text"> <?php echo ($value["title"]); ?> </span>
	                            <i class="menu-expand"></i>
                        	</a>
                        	<ul class="submenu">
                        		<?php if(is_array($value["childs"])): foreach($value["childs"] as $key=>$v): ?><li   <?php if($v["link"] == $SECOND_NOW_MENU): ?>class='open'<?php endif; ?> >
                        				<?php if(empty($v["childs"])): ?><a href="/hotel/index.php<?php echo ($v["link"]); ?>" target="_blank">
			                                    <span class="menu-text"><?php echo ($v["title"]); ?></span>
			                               
			                                </a> 
		                               	<?php else: ?>
		                               		<a href="#" class="menu-dropdown">
			                                    <span class="menu-text"><?php echo ($v["title"]); ?></span>
			                                    <i class="menu-expand"></i>
				                            </a> 
				                            <ul class="submenu">
				                                <?php if(is_array($v["childs"])): foreach($v["childs"] as $key=>$cv): ?><li>
						                                	  <a href="/hotel/index.php<?php echo ($cv["link"]); ?>" target="_blank">
							                                      <span class="menu-text"><?php echo ($cv["title"]); ?></span>
							                      
						                              		  </a>
					                                	</li><?php endforeach; endif; ?> 
				                            </ul><?php endif; ?>
		                            </li><?php endforeach; endif; ?>
                        	</ul>
                    	</li><?php endforeach; endif; ?>
                </ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
<!--                 <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="#">Home</a>
                            <?php echo ($NOW_PATH); ?>
                        </li>
                        <li class="active">Dashboard</li>
                    </ul>
                </div> -->
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
  <!--               <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            Dashboard
                        </h1>
                    </div>
                    Header Buttons
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    Header Buttons End
                </div> -->
                <!-- /Page Header -->
        		<!-- Page Body -->
        		<div class="page-body">
        		<?php if(!empty($_SESSION['__SYS_MESSAGE__'])): ?><div class="row">
        			<div class="col-xs-12 col-md-12">
	        		<?php if($_SESSION['__SYS_MESSAGE_TYPE__'] == 'error'): ?><div class="alert alert-danger fade in">
	        		<?php else: ?>
	        		<div class="alert alert-<?php echo (strtolower($_SESSION['__SYS_MESSAGE_TYPE__'])); ?> fade in"><?php endif; ?>
                     <button class="close" data-dismiss="alert">
                         ×
                     </button>
                     <?php if($_SESSION['__SYS_MESSAGE_TYPE__'] == 'success'): ?><i class="fa-fw fa fa-check"></i>
                     <?php elseif($_SESSION['__SYS_MESSAGE_TYPE__'] == 'error'): ?>
                     <i class="fa-fw fa fa-times"></i>
                     <?php else: ?>
                     <i class="fa-fw fa fa-<?php echo (strtolower($_SESSION['__SYS_MESSAGE_TYPE__'])); ?>"></i><?php endif; ?>
                     <strong><?php echo (ucfirst($_SESSION['__SYS_MESSAGE_TYPE__'])); ?></strong> <?php echo ($_SESSION['__SYS_MESSAGE__']); ?>
                 </div></div>
                 </div><?php endif; ?>
        		


<div class="row">
	<div class="col-xs-12 col-md-12">
	        <div class="widget">
	            <div class="widget-header ">
	                <span class="widget-caption">用户列表</span>
	                <div class="widget-buttons">
	                    <a href="#" data-toggle="maximize">
	                        <i class="fa fa-expand"></i>
	                    </a>
	                    <a href="#" data-toggle="collapse">
	                        <i class="fa fa-minus"></i>
	                    </a>
	                    <a href="#" data-toggle="dispose">
	                        <i class="fa fa-times"></i>
	                    </a>
	                </div>
	            </div>
	            <div class="widget-body">
	      			<div class="table-toolbar row">
	      			<form action="/hotel/index.php/Home/User/showList" method="get" >
   	                 <div class="search-box col-sm-3" >
	                		<div>
	                			<span class="input-icon">
	                				<input type="text" name='searchValue' value="<?php echo ($searchValue); ?>" class="form-control" id="searchValue" placeholder="请输入用户昵称">
	                				<i class="glyphicon glyphicon-search circular blue"></i>
	                			</span>
	                		</div> 
	                	</div>	   
	 
	  					<div class="col-lg-2">
                       
           		   			<select   id="type" name='type' style="width:100%;">
           		   				<option   value="" >请选择用户类型</option>
                        		<option   value="1" <?php if($type == '1'): ?>selected = "selected"<?php endif; ?> >管理员</option>
                                <option   value="0" <?php if($type == '0'): ?>selected = "selected"<?php endif; ?> >普通用户</option>   
                                 
                           	</select>                  
                   		</div>

	                	<div class="col-sm-1">
	                		<input class="btn btn-palegreen" type="submit" id="search" value="搜索">
	                	</div>      
	                	</form>
	                	
	              
	           
	                </div>
		         
	                <table class="table table-striped table-hover table-bordered" id="editabledatatable">
	                    <thead>
	                        <tr role="row">
	                        	<th>序号</th>
	                        	<th>类型</th>
	                            <th>注册时间</th>
	                            <th>账号</th>
	                            <th>昵称</th>
	                            <th>邮箱</th>
	                            <th>手机号</th>
	                            
	       	                    <th style="min-width: 150px">操作</th>
	              
	                        </tr>
	                    </thead>
	
	                    <tbody id="tapeListTable">
	                    	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
		                            <td><?php echo ($key+1); ?></td>
		                            <td><?php echo ($vo["type"]); ?></td>
		                            <td><?php echo ($vo["ctime"]); ?></td>
		                            <td><?php echo ($vo["account"]); ?></td>
		                            <td><?php echo ($vo["nickname"]); ?></td>
		                            <td><?php echo ($vo["email"]); ?></td>
		                            <td><?php echo ($vo["phone"]); ?></td>
		                            

		                			<td>
		                		
		                			<a href="/hotel/index.php/Home/User/detail?type=menu&id=<?php echo ($vo["id"]); ?>" data-bb-handler="confirm" type="button"  class=" my_detail_btn btn btn-primary">详情</a>
		           					<a href="/hotel/index.php/Home/User/modify?type=menu&id=<?php echo ($vo["id"]); ?>" data-bb-handler="confirm" type="button" style="display: none;" class=" my_modify_btn btn btn-primary">修改</a>
		           					<a href="/hotel/index.php/Home/User/del?type=menu&id=<?php echo ($vo["id"]); ?>" data-bb-handler="confirm" type="button"    style="display: none;" class=" my_del_btn btn btn-danger  delete">删除</a>
		                			</td>
		          
		             
		                         
		                        </tr><?php endforeach; endif; ?>                        
	                    </tbody>
	                </table><br/>
               <div class="row DTTTFooter">
					<div class="col-sm-6">
						<div class="dataTables_info" id="simpledatatable_info" role="alert" aria-live="polite" aria-relevant="all"></div>
					</div>
					<div class="col-sm-8 pull-right">
						<div class="dataTables_paginate paging_bootstrap" id="simpledatatable_paginate">
							<ul class="pagination" id="pageUl">
								<?php echo ($page); ?>
							</ul>
						</div>
					</div>				
            	</div>  								
	        </div>
	    </div>
	</div>
</div>

         

        		</div>
				<!-- /Page Body -->
			</div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>
 
    <style type="text/css">

   		th,td{
   			text-align: center;
   		}
   		.navbar .navbar-inner{
			height: 100px;
   			
   		}
   		.main-container {
			margin-top: 56px;
   			    
   		}
   		.navbar-brand{
			height: 100px;
   			line-height: 100px;
   			width: 100%;
   			text-align: center;
   		}
   		.navbar-header{
	  	  width: 100%;
   		}
   		.navbar-brand font{
			font-size: 50px;

   		}
   		
   </style>
       <script>
    	$(function(){
 
    		
    		//if(my_del_btn == '1'){
    			$(".my_del_btn").show();
    		//}
    		//if(my_modify_btn == '1'){
    			$(".my_modify_btn").show();
    			$(".my_detail_btn").hide();
    		//}
    		

    	});
    	
    	function SetCookie(name,value)
    	{
    	var Days = 3000; //此 cookie 将被保存 30 天
    	var exp = new Date();
    	exp.setTime(exp.getTime() + Days*24*60*60*1000);
    	document.cookie = name + "="+ escape (value) + ";path=/;expires=" + exp.toGMTString();
    	}
    	  
    </script>
    <link href="/hotel/Public/css/skins/deepblue.min.css" rel="stylesheet"  type="text/css" />
    
    
<link href="/hotel/Public/css/bootstrap-datetimepicker.css" rel="stylesheet" />

<!--Basic Scripts-->
<script src="/hotel/Public/js/jquery-2.0.3.min.js"></script>
<script src="/hotel/Public/js/bootstrap.min.js"></script>

<!--Beyond Scripts-->
<script src="/hotel/Public/js/beyond.min.js"></script>
<script src="/hotel/Public/js/select2/select2.js"></script>  

<!--Bootstrap Date Picker-->
<script src="/hotel/Public/js/datetime/bootstrap-datepicker.js"></script>
<script src="/hotel/Public/js/datetime/bootstrap-datetimepicker.js"></script>

<!--Bootstrap Time Picker-->
<script src="/hotel/Public/js/datetime/bootstrap-timepicker.js"></script>

<script type="text/javascript">

$("#type").select2();
	


</script>




</body>
<!--Body Ends-->
</html>