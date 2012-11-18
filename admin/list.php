<?php include '../include/include.php';
if (!file_exists('installd.install')){
header('Location: ../install.php');
} 
############################
## CopyRight For Hloun.in ##
## Dev By Baha'a Odeh     ##
## 18/11/2012 - 1:13AM    ##
## Hloun Live             ##
## 2.0.0                  ##
############################
 ?>
<?php  if($chat->login()==false){ $inclued=1; include 'login.php'; exit(); die(); }else{ ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$chat->settings('title');?></title>
<meta name="keywords" content="<?=$chat->settings('keyword');?>" />
<meta name="description" content="<?=$chat->settings('descript');?>" />
<link href='http://fonts.googleapis.com/css?family=Paprika' rel='stylesheet' type='text/css'>
<link type="text/css" rel="stylesheet" href="style.css"/></head>

</head>
<body>
	<div class="leftwidgets">
	<!-- Liast -->	
		<div class="lWidget">
				<div class="leftWidgetTop"><h2>الرئيسية</h2></div>
				<div class="leftWidgetContent">		
					<ul>
						<li class="cat-item cat-item-76"><a href="home.php"  target="left">الصفحة الرئيسية</a></li>
						<?php if($_SESSION['groups']==1){ ?>
						<li class="cat-item cat-item-76"><a href="home.php?step=edit"  target="left">الاعدادات الرئيسية</a></li>
						<?php } ?>
						<li class="cat-item cat-item-76"><a href="logout.php"  target="_top">تسجيل الخروج</a></li>
					</ul>
				</div>
				<div class="leftWidgetBtm"></div>
		</div>
		
	<!-- End Liast -->
	
	<!-- Liast -->	
	<?php if($_SESSION['groups']==1){ ?>
		<div class="lWidget">
				<div class="leftWidgetTop"><h2>اقسام الدعم الفني</h2></div>
				<div class="leftWidgetContent">		
					<ul>
						<li class="cat-item cat-item-76"><a href="section.php"  target="left">الاقسام</a></li>
						<li class="cat-item cat-item-76"><a href="section.php?step=add"  target="left">اضافة قسم</a></li>
					</ul>
				</div>
				<div class="leftWidgetBtm"></div>
		</div>
		<?php } ?>
	<!-- End Liast -->
	
	<!-- Liast -->	
		<div class="lWidget">
				<div class="leftWidgetTop"><h2>الاعضاء</h2></div>
				<div class="leftWidgetContent">		
					<ul>
					<?php if($_SESSION['groups']==1){ ?>	
						<li class="cat-item cat-item-76"><a href="users.php"  target="left">الاعضاء</a></li>
						<li class="cat-item cat-item-76"><a href="users.php?step=add"  target="left">اضافة عضو</a></li>
					<?php } ?>
						<li class="cat-item cat-item-76"><a href="users.php?step=profile"  target="left">تعديل معلوماتك</a></li>
					</ul>
				</div>
				<div class="leftWidgetBtm"></div>
		</div>
	<!-- End Liast -->
	
	
	<!-- Liast -->	
		<div class="lWidget">
				<div class="leftWidgetTop"><h2>المحادثات</h2></div>
				<div class="leftWidgetContent">		
					<ul>
						<li class="cat-item cat-item-76"><a href="rooms.php"  target="left">استقبال المحداثات الجديدة</a></li>
						<li class="cat-item cat-item-76"><a href="rooms.php?step=notclose"  target="left">المحادثات الغير مغلقة</a></li>
						<li class="cat-item cat-item-76"><a href="rooms.php?step=close"  target="left">المحادثات المغلقة</a></li>
						<?php if($_SESSION['groups']==1){ ?>	
						<li class="cat-item cat-item-76"><a href="rooms.php?step=block"  target="left">الحظر</a></li>
						
						<?php } ?>

					</ul>
				</div>
				<div class="leftWidgetBtm"></div>
		</div>
	<!-- End Liast -->
	
	</div>
</body>
</html>
<?php } ?>