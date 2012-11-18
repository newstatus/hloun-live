<?php 
include 'include/ini.php';
############################
## CopyRight For Hloun.in ##
## Dev By Baha'a Odeh     ##
## 18/11/2012 - 1:13AM    ##
## Hloun Live             ##
## 2.0.0                  ##
############################
include 'include/config.php';
include 'include/Chat.Class.php';
$chat = new chat();
if (file_exists('admin/installd.install')){
header('Location: index.php');
	exit();
	die();	
}
?>
<?php 
if(isset($_POST['install']) && $_POST['install']=='install'){
$title =  $chat->secure($_POST['title'],'html');	
$keyword =  $chat->secure($_POST['keyword'],'html');	
$descript = $chat->secure($_POST['descript'],'html');	
$offline_link = $chat->secure($_POST['offline_link'],'html');	
$online_image = $chat->secure($_POST['online_image'],'html');	
$onof = $chat->secure($_POST['onof'],'id');	
$oflline_image = $chat->secure($_POST['oflline_image'],'html');	
$openchat_msg  = $chat->secure($_POST['openchat_msg'],'html');	
$site_url  = $chat->secure($_POST['site_url'],'html');	
$name = $chat->secure($_POST['name'],'html');	
$nkname = $chat->secure($_POST['nkname'],'html');	
$email = $chat->secure($_POST['email'],'html');	
$password = $chat->secure($_POST['password'],'html');	
	if(empty($title) ||empty($keyword) ||empty($descript) ||empty($offline_link) ||empty($online_image) ||empty($onof) ||empty($oflline_image) ||empty($openchat_msg) ||empty($site_url) || empty($name) || empty($nkname) || empty($email) || empty($password) ){
		$msg='جميع الحقول مطلوبة';
	}else{
	
	$password=md5($password);
	$block = $chat->SQL("CREATE TABLE `block` (`id` int(11) NOT NULL auto_increment,`ip` varchar(255) NOT NULL, PRIMARY KEY  (`id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
	
	$msgs = $chat->SQL("CREATE TABLE `msgs` ( `id` int(11) NOT NULL auto_increment, `msg` text NOT NULL, `roomid` int(11) NOT NULL, `who` varchar(50) NOT NULL, `time` varchar(50) NOT NULL, PRIMARY KEY  (`id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
	
	$rooms = $chat->SQL("CREATE TABLE `rooms` (  `id` int(11) NOT NULL auto_increment,  `name` varchar(255) NOT NULL,  `email` varchar(255) NOT NULL, `ip` varchar(20) NOT NULL, `stime` varchar(50) NOT NULL, `etime` varchar(50) NOT NULL, `replayed` varchar(2) NOT NULL, `stt` varchar(2) NOT NULL, `section` int(11) NOT NULL, `wlcmsg` varchar(2) NOT NULL,  PRIMARY KEY  (`id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
	
	$section = $chat->SQL("CREATE TABLE `section` ( `id` int(11) NOT NULL auto_increment, `name` varchar(255) NOT NULL, `stat` varchar(1) NOT NULL,  PRIMARY KEY  (`id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
	
	$settings = $chat->SQL("CREATE TABLE `settings` (  `title` text NOT NULL,  `keyword` text NOT NULL,  `descript` text NOT NULL,  `onof` int(11) NOT NULL, `offline_link` text NOT NULL, `online_image` text NOT NULL,  `oflline_image` text NOT NULL,  `openchat_msg` text NOT NULL,  `site_url` text NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

	$settings_add = $chat->SQL("INSERT INTO `settings` VALUES ('$title', '$keyword', '$descript','$onof', '$offline_link', '$online_image', '$oflline_image', '$openchat_msg', '$site_url');");
		
	$users = $chat->SQL("CREATE TABLE `users` (  `id` int(11) NOT NULL auto_increment,  `name` varchar(255) NOT NULL,  `email` varchar(255) NOT NULL,  `password` varchar(255) NOT NULL,  `groups` varchar(10) NOT NULL,  `nkname` varchar(255) NOT NULL,  `section` int(11) NOT NULL,  PRIMARY KEY  (`id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
	
	$users_add = $chat->SQL("INSERT INTO `users` VALUES (null,'$name','$email','$password','1','$nkname','1')");
		
	if($block && $msgs && $rooms && $section && $settings && $settings_add && $users && $users_add ){
		$my_file = 'admin/installd.install';
		$handle = fopen($my_file, 'w') or die('الرجاء التأكد من ان صفحة install.php ومجلد admin.php يحملون الترخيص 777');
		fclose($handle);
		$insteld=true;
		unset($_POST);	
	}
	
	}

	}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Script Install</title>
	<!-- styles -->
	<link href="css/bootstrap.rtl.css" rel="stylesheet">
	<link href="css/application.css" rel="stylesheet">
	<style type="text/css">
		body {
			padding-top: 60px;
		}
	</style>

	<!-- IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-rtl.js"></script>
	<script type="text/javascript">
	$(function() { 
		/* Sticky Footer 
		*/
		$(window).bind("load", function() { 
		    //
		    function positionFooter() { var mFoo = $("body > footer"); if ((($(document.body).height() + mFoo.height()) < $(window).height() && mFoo.css("position") == "fixed") || ($(document.body).height() < $(window).height() && mFoo.css("position") != "fixed")) { mFoo.css({ position: "fixed", bottom: "0px" }); } else { mFoo.css({ position: "static" }); } } $(document).ready(function () { positionFooter(); $(window).scroll(positionFooter); $(window).resize(positionFooter); $(window).load(positionFooter); });
		    positionFooter();
		});
		
		$('[title!=""]').tooltip();

	});
	</script>
</head>
<body>

<header>
		<div class="navbar navbar-fixed-top">
		  <div class="navbar-inner">
		  	<div class="container-fluid">
			    <a class="brand" href="//hloun.in" target="_blank">ليون لايـــف</a>
			    <ul class="nav">
			    </ul>
		    </div>
		  </div>
		</div>
	</header>	
	<div class="container-fluid  notrgisted" style="margin-top:50px">
	<?php if($insteld==false){ ?> 
	<p class="lead">اهلا وسهلا بك في صفحة تنصيب سكربت ليون لايف
					التنصيب سهل فقط نحتاج بعض المعلومات
					الرجاء التاكد من انك قمت بتحميل اخر اصدار من الموقع الرسمي !</p>
		<div class="row-fluid">
		<form class="form-horizontal" method="post" id="formregister">	
			<div class="span5">
					
				
				  <div class="control-group">
				    <label class="control-label" for="title">عنوان الموقع</label>
				    <div class="controls">
				      <input type="text" name="title" id="rename"  placeholder="عنوان الموقع" value="<?=$_POST['title']?>">
				    </div>
				  </div>
				  
				  <div class="control-group">
				    <label class="control-label" for="keyword">الكلمات المفتاحية</label>
				    <div class="controls">
				      <input type="text" name="keyword" id="reemail" placeholder="الكلمات المفتاحية" value="<?=$_POST['keyword']?>">
				    </div>
				  </div>
				  
				  
				  <div class="control-group">
				    <label class="control-label" for="descript">وصف الموقع</label>
				    <div class="controls">
				      <input type="text" name="descript" id="reemail" placeholder="وصف الموقع"  value="<?=$_POST['descript']?>">
				    </div>
				  </div> 
				  
				
				  
				  
				  <div class="control-group">
				    <label class="control-label" for="onof">حالة الدعم</label>
				    <div class="controls">
				     
				      <select id="resection" name="onof">
							<option value="1">انلاين</option>
							<option value="2">افلاين</option>
					</select>
				    </div>
				  </div>
				  
				    
				  <div class="control-group">
				    <label class="control-label" for="offline_link">رابط الافلاين</label>
				    <div class="controls">
				      <input type="text" name="offline_link" id="reemail" placeholder="رابط الافلاين"   value="<?=$_POST['offline_link']?>">
				    </div>
				  </div> 
				     
				  <div class="control-group">
				    <label class="control-label" for="online_image">صورة الدعم المتواجد</label>
				    <div class="controls">
				      <input type="text" name="online_image" id="reemail" placeholder="صورة الدعم المتواجد"   value="<?=$_POST['online_image']?>">
				    </div>
				  </div> 
				  <div class="control-group">
				    <label class="control-label" for="oflline_image">صورة الدعم الغير متواجد</label>
				    <div class="controls">
				      <input type="text" name="oflline_image" id="reemail" placeholder="صورة الدعم الغير متواجد"   value="<?=$_POST['oflline_image']?>">
				    </div>
				  </div> 
				  
				   
				  
				 
				
				
				  
				
				
			</div>
			<div class="span5" >
			<div class="control-group">
				    <label class="control-label" for="openchat_msg">الرسالة الافتراضية عند فتح المحادثة</label>
				    <div class="controls">
				      <textarea  name="openchat_msg" rows="3" placeholder="الرسالة الافتراضية عند فتح المحادثة"><?=$_POST['openchat_msg']?></textarea>
				    </div>
		 </div>
			<div class="control-group">
				    <label class="control-label" for="site_url">رابط الموقع</label>
				    <div class="controls">
				      <input type="text" name="site_url" id="reemail" placeholder="رابط الموقع" value="<?=$_POST['site_url']?>">
				    </div>
				  </div>
			 <div class="control-group">
				    <label class="control-label" for="name">اسم المدير</label>
				    <div class="controls">
				      <input type="text" name="name" id="reemail" placeholder="اسم المدير" value="<?=$_POST['name']?>">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="nkname">الاسم المستعار</label>
				    <div class="controls">
				      <input type="text" name="nkname" id="reemail" placeholder="الاسم المستعار"  value="<?=$_POST['nkname']?>">
				    </div>
				  </div> 
				  <div class="control-group">
				    <label class="control-label" for="email">الاميل</label>
				    <div class="controls">
				      <input type="email" name="email" id="reemail" placeholder="الاميل"   value="<?=$_POST['email']?>">
				    </div>
				  </div> 
				  <div class="control-group">
				    <label class="control-label" for="password">كلمة السر</label>
				    <div class="controls">
				      <input type="password" name="password" id="reemail" placeholder="*******" value="<?=$_POST['password']?>">
				    </div>
				  </div> 
				
			
			 <button type="submit" class="btn">تنصيب !</button>
			 <input type="hidden" name="install" value="install"/>
			 <span class="msgs"><?=$msg?></span>
			</div>
			
		</form>	
		</div>
		<center> <div class="msgss"></div></center>
		<?php }else{ ?>
		 
	<p class="lead">تم تنصيب السكربت بنجاح !</p>
	<p class="lead"><a href="admin/index.php">لوحة التحكم</a></p>
	<p class="lead"><a href="index.php">الرئيسية</a></p>
	<p class="lead"><a href="index.php">كود الجافا سكربت للاستخدام</a></p>
	<p class="lead"><textarea rows="3"><script src="<?=$chat->settings('site_url')?>/js.php"></script></textarea></p>
	
		<?php } ?>
	</div>

	
	<footer>
		<p class="align-center"><?=$chat->Powered(1)?></p>
	</footer>
</body>
</html>