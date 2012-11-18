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
   if($_SESSION['groups']==1){ ?>
<?php  if($chat->login()==false){ $inclued=1; include 'login.php'; exit(); die(); }else{ ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$chat->settings('title');?></title>
<meta name="keywords" content="<?=$chat->settings('keyword');?>" />
<meta name="description" content="<?=$chat->settings('descript');?>" />
<link type="text/css" rel="stylesheet" href="style.css"/></head>
<script src="../js/jquery-1.8.2.min.js"></script>
<script>
$(function(){
$(".delete").click(function(){
		var r=confirm("�� ��� ����� �� ����� �");
		if(r==true){
		return true;
		}else{
		return false;
		}

});

});
</script>

<body>
<?php 
if(!isset($_GET['step']) or $_GET['step']==''){
$chat->allsection();	
}elseif($_GET['step']=='add'){
$chat->addsection();
}elseif($_GET['step']=='edit'){
$chat->updatesection();
}elseif($_GET['step']=='delete'){
$chat->deeltesection();
}

?>
	<center><?=$chat->Powered()?></center>

</body>
</html>
<?php } } ?>