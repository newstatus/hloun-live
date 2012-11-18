<?php if($inclued!=1)include '../include/include.php';?>
<?php
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
if(isset($_POST['wt'])){
 if($chat->ltlogin()=='not'){
 	$wt = 'border-color:red;color:red;';
 }else{
 				$currentFile = $_SERVER["PHP_SELF"];
    			$parts = Explode('/', $currentFile);
   			    $url =  $parts[count($parts) - 1];
				if($url=='login.php') $url = 'index.php';
				header('Location: '.$url);
				die();
				exit();
 }
} 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$chat->settings('title');?></title>
<meta name="keywords" content="<?=$chat->settings('keyword');?>" />
<meta name="description" content="<?=$chat->settings('descript');?>" />
<link href='http://fonts.googleapis.com/css?family=Paprika' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../js/jquery.emotions.js"></script>
	<link href="../css/bootstrap.rtl.css" rel="stylesheet">
	<link href="../css/application.css" rel="stylesheet">

<style>
	/*body{
		background-color:grey;
		
	}
	.logintable{
		padding: 50px;
		margin: 50px;
		background-color: #fff;
		-moz-border-radius: 10px;
		border-radius: 10px;
		
	}
	.logintable tr td{
		padding: 10px;
		text-align: center;
		font-family: 'Paprika';
	}
	.logintable tr td input[type=text],input[type=password],input[type=submit]{
		padding: 8px;
		width:200px;
	}*/
</style>
	<style type="text/css">
		body {
			padding-top: 60px;
		}
	</style>

	<!-- IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
	<header>
		<div class="navbar navbar-fixed-top">
		  <div class="navbar-inner">
		  	<div class="container-fluid">
			    <a class="brand" href="#"><?=$chat->settings('title');?></a>
			    
		    </div>
		  </div>
		</div>
	</header>	
	<div class="container" style="margin-top:100px;">
		<?php if($wt=='' && isset($_POST['wt'])){ echo '<h1>Sorry Error With Username And Password</h1>'; } ?>
		<div class="">
			<div class="">
				<form class="form-horizontal" method="post">
				  <div class="control-group">
				    <label class="control-label" for="name">الاسم</label>
				    <div class="controls">
				      <input type="text" name="username" id="username" style="<?=$wt?>" placeholder="الاسم الكريم">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="email">كلمة السر</label>
				    <div class="controls">
				      <input type="password" name="password" placeholder="*******">
				    </div>
				  </div>
				 
				  <div class="control-group">
				    <div class="controls">
				      <button type="submit" class="btn">دخول !</button>
				      <input type="hidden" name="wt" value="Login"/>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
	<footer>
		<p class="align-center"><?=$chat->Powered(1)?></p>
	</footer>

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
	
</body>
</html>