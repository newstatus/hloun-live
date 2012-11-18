<?php 
include '../include/include.php';
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
if($chat->login()==false){ $inclued=1; include 'login.php'; exit(); die(); }else{
define(step,$_GET['step']);
if(step=='addmsg'){
$sent = $chat->addmsg($_POST['roomid'],$_POST['msg'],$_SESSION['adminid']);
if($sent){ echo 'DONE'; }else{ exit(); }
}elseif(step=='new'){


$new = $chat->getnewmsgs($_POST['roomid'],$_POST['lastid']);

if($new){ echo $new; }else{ echo 'NOT';}
}elseif(step=='newroom'){
echo $chat->getnewrooms($_POST['lastroomid']);
}


}
?>