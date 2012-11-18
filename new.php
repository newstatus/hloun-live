<?php 
include 'include/include.php';
############################
## CopyRight For Hloun.in ##
## Dev By Baha'a Odeh     ##
## 18/11/2012 - 1:13AM    ##
## Hloun Live             ##
## 2.0.0                  ##
############################
define(step,$_GET['step']);

if(step=='register'){
$name = $chat->secure($_POST['name'],"html");
$email = $chat->secure($_POST['email'],"html");
$section = $chat->secure($_POST['section'],"id");
if(!empty($name) && !empty($email) && !empty($section)){
$rom = $chat->newroom($name,$email,$section);
$_SESSION['roomid']=$rom;
if(!empty($_SESSION['roomid'])){ echo 'DONE'; }
}
}elseif(step=='addmsg'){
$sent = $chat->addmsg($_SESSION['roomid'],$_POST['msg']);

if($sent){
$rmd=$_SESSION['roomid'];
$s=$chat->SQL("select * from rooms where id='$rmd'","array");
if($s['wlcmsg']=='1'){ echo 'DONE2'; }else{
echo 'DONE';
}
}else{ exit(); }

}elseif(step=='new'){
$new = $chat->getnewmsgs($_SESSION['roomid'],$_POST['lastid']);
if($new){ echo $new; }else{ echo 'NOT';}
}

?>