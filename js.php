<?php 
include 'include/include.php';
############################
## CopyRight For Hloun.in ##
## Dev By Baha'a Odeh     ##
## 18/11/2012 - 1:13AM    ##
## Hloun Live             ##
## 2.0.0                  ##
############################
Header("content-type: application/x-javascript");
if($chat->settings('onof')==1){
$link = $chat->settings('site_url').'/chat.php';
$image = $chat->settings('online_image');
?>
document.write("<div id='hlounlivesupport'><a href='javascript:void(window.open(\"<?=$link?>\",\"\",\"width=525,height=550,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes\"))'><img id='chat_button_image' src='<?=$image?>' border='0' alt='Live Help'></a></div>");

<?php
}else{
$link = $chat->settings('offline_link');
$image = $chat->settings('oflline_image');
?>
document.write("<div id='hlounlivesupport'><a href='<?=$link?>' target='_blank'><img id='chat_button_image' src='<?=$image?>' border='0' alt='Live Help'></a></div>");
<?php
}
?>

