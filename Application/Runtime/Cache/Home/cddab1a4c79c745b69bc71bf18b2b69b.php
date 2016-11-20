<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<!--Head xmlns="http://www.w3.org/1999/xhtml"-->
<head>
    <meta charset="utf-8" />
    <title><?php echo ($page_title); ?></title>

    <meta name="description" content="<?php echo ($page_description); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/envmanage/Public/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="/envmanage/Public/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="/envmanage/Public/css/font-awesome.min.css" rel="stylesheet" />
    

    <!--Beyond styles-->
    <link id="beyond-link" href="/envmanage/Public/css/beyond.min.css" rel="stylesheet" />
    <link href="/envmanage/Public/css/demo.min.css" rel="stylesheet" />
    <link href="/envmanage/Public/css/animate.min.css" rel="stylesheet" />
    <link href="/envmanage/Public/css/load.css" rel="stylesheet" />
    <link href="/envmanage/Public/css/skins/deepblue.min.css" rel="stylesheet"  type="text/css" />
 	
	<script type="text/javascript">
	var __URL = '/envmanage/index.php/Home/Business';
	var __APP = '/envmanage/index.php';
	var __PUBLIC = '/envmanage/Public';
	var __AJAX;
	</script>
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
   <script src="/envmanage/Public/js/skins.min.js"></script> 
    
    <script src="/envmanage/Public/js/jquery-1.10.2.min.js"></script>
    
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
                            <!-- <img src="/envmanage/Public/img/logo.png" alt="" /> -->
                            <font size ='2'>
                           		浔阳区环保网格化管理系统
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
                    	<marquee style="color: #FBFBFB;" scrollamount="4" width="300" style="width: 300px;"><?php echo ($notice); ?></marquee>
                    
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
		                                                   <?php echo ($_SESSION['nickname']); ?>
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
                                			<span class="col-sm-6"><button class="btn btn-sm"><a href="/envmanage/index.php/Home/Task/taskList" target="_blank">显示所有消息</a></button></span>
                                		</li>
	                                </ul>      
             				</li>      
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                 <!--    <div class="avatar" title="View your public profile">
                                        <img src="">
                                    </div> -->
                                    <section>
                                        <h2><span class="profile"><span><?php echo ($_SESSION['nickname']); ?></span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                        
                                    <!--Theme Selector Area-->
                 <!--                  <li class="theme-area">
                                        <ul class="colorpicker" id="skin-changer">
                                            <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;" rel="/envmanage/Public/css/skins/blue.min.css"></a></li>
                                            <li><a id='azure_div' class="colorpick-btn" href="#" style="background-color:#2dc3e8;" rel="/envmanage/Public/css/skins/azure.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;" rel="/envmanage/Public/css/skins/teal.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;" rel="/envmanage/Public/css/skins/green.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;" rel="/envmanage/Public/css/skins/orange.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;" rel="/envmanage/Public/css/skins/pink.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;" rel="/envmanage/Public/css/skins/darkred.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;" rel="/envmanage/Public/css/skins/purple.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;" rel="/envmanage/Public/css/skins/darkblue.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#585858;" rel="/envmanage/Public/css/skins/gray.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#474544;" rel="/envmanage/Public/css/skins/black.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#001940;" rel="/envmanage/Public/css/skins/deepblue.min.css"></a></li>
                                        </ul>
                                    </li>  -->
                                    
                                    <!--/Theme Selector Area-->
                                    <li class="dropdown-footer">
                                        <a href="/envmanage/index.php/Home/login/logout">
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
                        <a href="/envmanage/index.php/Home/Index/index">
                            <i class="menu-icon glyphicon glyphicon-home"></i>
                            <span class="menu-text"> Home </span>
                        </a>
                    </li>
                    <!--Tables-->
                    <?php if(is_array($menu)): foreach($menu as $key=>$value): ?><li  <?php if($value["link"] == $NOW_MENU): ?>class='open'<?php endif; ?>  >
                   			 <a href= "#" class="menu-dropdown">
	                            <i class="menu-icon glyphicon glyphicon-tasks"></i>
	                            <span class="menu-text"> <?php echo ($value["title"]); ?>   </span>
	                            <i class="menu-expand"></i>
                        	</a>
                        	<ul class="submenu">
                        		<?php if(is_array($value["childs"])): foreach($value["childs"] as $key=>$v): ?><li   <?php if($v["link"] == $SECOND_NOW_MENU): ?>class='open'<?php endif; ?> >
                        				<?php if(empty($v["childs"])): ?><a href="/envmanage/index.php<?php echo ($v["link"]); ?>" >
			                                    <span class="menu-text"><?php echo ($v["title"]); ?></span>
			                               
			                                </a> 
		                               	<?php else: ?>
		                               		<a href="#" class="menu-dropdown">
			                                    <span class="menu-text"><?php echo ($v["title"]); ?></span>
			                                    <i class="menu-expand"></i>
				                            </a> 
				                            <ul class="submenu">
				                                <?php if(is_array($v["childs"])): foreach($v["childs"] as $key=>$cv): ?><li>
						                                	  <a href="/envmanage/index.php<?php echo ($cv["link"]); ?>" >
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
         <div class="col-lg-12 col-sm-12 col-xs-12">
             <div class="row">
                 <div class="col-xs-12">
                     <div class="widget radius-bordered">
                         <div class="widget-header">
                             <span class="widget-caption">公司信息</span>      
                         </div>
                         <div class="widget-body">
                          
    
    <!-- 					 <form action="/envmanage/index.php/Home/Business/add" method="post" enctype="multipart/form-data" >
    					 				<?php if(!empty($info)): ?><input type="hidden" class="form-control"  name="id" value="<?php echo ($info["id"]); ?>" ><?php endif; ?> -->
					        
					                    <div class='row'>
				 					         <label class="col-lg-2 control-label" style="height: 34px;line-height: 34px;text-align: right;">公司名称</label>
		                                     <div class="col-lg-6">
		                                         <input disabled="disabled" required="required"  type="text" class="form-control"  name="name" id="name"  value="<?php echo ($info["name"]); ?>" >
		                                         
		                                     </div>
					                    </div>
					                    <div class='row'>
					                    	<label class="col-lg-2 control-label" style="height: 34px;line-height: 34px;text-align: right;">公司类别</label>
						 					<div class="col-sm-4">
				 					
							 					<select  disabled="disabled" required="required"  id='type_id_select' name='type_id' >
											    	<option value=''> 请选择公司类别</option>
											    	<?php if(is_array($business_type_list)): foreach($business_type_list as $key=>$vo): ?><option <?php if( $info['type_id'] == $vo["id"] ): ?>selected="selected"<?php endif; ?> value='<?php echo ($vo["id"]); ?>'><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
											    	
											 	</select> 
						 					
						 					</div>
						 				</div>	
						 				
						 				 <div class='row'>
				 					         <label class="col-lg-2 control-label" style="height: 34px;line-height: 34px;text-align: right;">公司地址</label>
		                                     <div class="col-lg-4">
		                                         <input  disabled="disabled" required="required"  type="text" class="form-control"  name="addr" id="addr"  value="<?php echo ($info["addr"]); ?>" >
		                                         
		                                     </div>
					                    </div>
						 				 <div class='row'>
				 					         <label class="col-lg-2 control-label" style="height: 34px;line-height: 34px;text-align: right;">成立日期</label>
		                                     <div class="col-lg-6">
		                                         <input  disabled="disabled" readonly="readonly" type="text" class="form-control dateView"  name="cdate" id="cdate"   value="<?php echo ($info["cdate"]); ?>"  >
		                                     </div>
					                    </div>					                    
							 			<div class='row'>
				 					         <label class="col-lg-2 control-label" style="height: 34px;line-height: 34px;text-align: right;">法人代表</label>
		                                     <div class="col-lg-6">
		                                         <input  disabled="disabled"   type="text" class="form-control"  name="legal_person" id="legal_person"  value="<?php echo ($info["legal_person"]); ?>" >
		                                     </div>
					                    </div>				                    
							 			<div class='row'>
				 					         <label class="col-lg-2 control-label" style="height: 34px;line-height: 34px;text-align: right;">法人代表联系方式</label>
		                                     <div class="col-lg-6">
		                                         <input  disabled="disabled"   type="text" class="form-control"  name="legal_person_phone" id="legal_person_phone"  value="<?php echo ($info["legal_person_phone"]); ?>" >
		                                     </div>
					                    </div>	
							 			<div class='row'>
				 					         <label class="col-lg-2 control-label" style="height: 34px;line-height: 34px;text-align: right;">营业执照号</label>
		                                     <div class="col-lg-6">
		                                         <input  disabled="disabled"   type="text" class="form-control"  name="business_license" id="business_license"  value="<?php echo ($info["business_license"]); ?>" >
		                                     </div>
					                    </div>			
					                    
			                    		<div class='row'>
				 					         <label class="col-lg-2 control-label" style="height: 34px;line-height: 34px;text-align: right;">营业执照号图片</label>
		                                     <div class="col-lg-2">
		                                         <input  disabled="disabled" type="file" class="form-control"  name="business_license_link"  >
		                                     </div>
		                                     <?php if(!empty($info['business_license_link'])): ?><div class="col-lg-2">
		                                     	<img class='imgdiv' alt="单击查看大图" style="width: 150px;100px;" src="/envmanage/<?php echo ($info['business_license_link']); ?>">
		                                     </div><?php endif; ?>
					                    </div>				                    			                    					
					                     <div class='row'>
				 					         <label class="col-lg-2 control-label" style="height: 34px;line-height: 34px;text-align: right;">备注</label>
		                                     <div class="col-lg-6">
		                      
		                                         <textarea  disabled="disabled" name='mark' id='mark' rows="10" cols="100" ><?php echo ($info["mark"]); ?></textarea>
		                                         
		                                     </div>
					      				 </div>						                    
					     <!-- 				 <div class='row' style="margin-top: 20px;margin-bottom: 20px;">
					                    	<div class='col-lg-4 col-lg-offset-5'>
					                    	<input class="btn btn-palegreen" type="submit" id="saveRecord" value="保存公司类别">
					                    	</div>
					                    </div>
					               		</form> -->
    
    
    
    
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
   		.select2-container{
			width: 100%;
   		}
   		
   </style>
       <script>
    	$(function(){
 
    		
 /*    		if(my_del_btn == '1'){
    			$(".my_del_btn").show();
    		}
    		if(my_modify_btn == '1'){
    			$(".my_modify_btn").show();
    			$(".my_detail_btn").hide();
    		}
    		 */

    	});
    	
    	function SetCookie(name,value)
    	{
    	var Days = 3000; //此 cookie 将被保存 30 天
    	var exp = new Date();
    	exp.setTime(exp.getTime() + Days*24*60*60*1000);
    	document.cookie = name + "="+ escape (value) + ";path=/;expires=" + exp.toGMTString();
    	}
    	  
    </script>
    <link href="/envmanage/Public/css/skins/deepblue.min.css" rel="stylesheet"  type="text/css" />
    
    
 <link href="/envmanage/Public/css/bootstrap-datetimepicker.css" rel="stylesheet" />

<!--Basic Scripts-->


    <script src="/envmanage/Public/js/bootstrap.min.js"></script>

    <!--Beyond Scripts-->
    <script src="/envmanage/Public/js/beyond.min.js"></script>

<!--Beyond Scripts-->
 <script src="/envmanage/Public/js/select2/select2.js"></script> 
<script src="/envmanage/Public/js/datetime/bootstrap-timepicker.js"></script>  


<script src="/envmanage/Public/js/datetime/bootstrap-datetimepicker.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
	    //$("#registrationForm").bootstrapValidator();
	    $("select").select2();
		$('.yearView').datetimepicker({
			autoclose: true,
			startView:4,minView:4,
	        lang:"ch",           
	        format:"yyyy",      
	        timepicker:false,  
	    
	        minDate: 0,   
	  
	        });
		
		
		$('.yearView').datetimepicker('setEndDate',(new Date()).getFullYear());
		
		$('.dateView').datetimepicker({
			autoclose: true,
			startView:2,minView:2,
	        lang:"ch",           
	        format:"yyyy-mm-dd",      
	        timepicker:false,  
	    
	        minDate: 0,   
	  
	        });
		
	});
	$(".imgdiv").click(function(){
		window.open($(this).attr('src'),'_blank');

	});

	$(function(){
	
		
	});
</script>
    
    

<style type="text/css">
	.select2-container{
		padding-left: 0px;
		padding-right: 0px;
	}
</style>
<script type="text/javascript">

	



</script>


</body>
<!--Body Ends-->
</html>