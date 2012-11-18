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
if($chat->login()==false){ $inclued=1; include 'login.php'; exit(); die(); }else{ ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$chat->settings('title');?></title>
<meta name="keywords" content="<?=$chat->settings('keyword');?>" />
<meta name="description" content="<?=$chat->settings('descript');?>" />
<link type="text/css" rel="stylesheet" href="style.css"/></head>
<body>
<?php 
if(!isset($_GET['step']) or $_GET['step']==''){
$chat->welcomeadmin();	
}elseif($_GET['step']=='edit'){
 if($_SESSION['groups']==1){ $chat->updatesetting();	}
}
?>

</body>
</html>
<?php } ?>