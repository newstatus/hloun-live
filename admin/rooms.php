<?php include '../include/include.php'; if (!file_exists('installd.install')){
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
<link type="text/css" rel="stylesheet" href="style.css"/></head>

<script src="../js/jquery-1.8.2.min.js"></script>
<link rel="stylesheet" href="images/messi.css" />
<script src="images/messi.js"></script>

<script>
$(function(){
$(".delete").click(function(){
		var r=confirm("هل انت متأكد من الحذف ؟");
		if(r==true){
		return true;
		}else{
		return false;
		}

});
});
<?php if(!isset($_GET['step']) and $_GET['step']==''){ ?>

	function getnotclose(){
	 lastromid = $(".listroom:last-child").attr("roomid");
	 newroomz = {"lastroomid":lastromid};
						$.ajax({type:"POST",url:"new.php?step=newroom",data:newroomz,async: false,
						success:function(b){ 
							
						if(b=="DONE"){}else{
							$(".listroom:last-child").after(b); 
							  $(".player").html('<object type="application/x-shockwave-flash" data="images/player_mp3.swf" width="1" height="1"><param name="movie" value="images/player_mp3.swf" /><param name="bgcolor" value="#ffffff" /><param name="FlashVars" value="mp3=images/file.mp3&amp;loop=1&amp;autoplay=1" />');
	
							OpenNewChat($(".listroom:last-child").attr("roomid"));
							
							 }}	
						});
							
	}
	 	setInterval('getnotclose()',3000);	
	 	

	function OpenNewChat(roomid){
	
	
	/*	var r=confirm("هنالك محداثة جديدة هل تريد فتحها ؟ اذا كانت النوافذ المنبثقة مغلقة اضغط على زر الفتح الموجود بالصفحة");
if (r==true)  
{			 
		window.open("chat.php?id=" + roomid,"","width=525,height=550,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=no");

 }else{
  }*/
  new Messi('هنالك محداثة جديدة هل تريد فتحها ؟ اذا كانت النوافذ المنبثقة مغلقة اضغط على زر الفتح الموجود بالصفحة.', {title: 'محادثة جديدة', buttons: [{id: 0, label: 'Yes', val: 'Y'}, {id: 1, label: 'No', val: 'N'}], callback: function(val) {  if(val=='Y'){window.open("chat.php?id=" + roomid,"","width=525,height=550,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=no"); }  $(".player").html(''); }});



  

  
  
	
	}

<?php } ?>



</script>
<body>
<?php 
if(!isset($_GET['step']) or $_GET['step']==''){
$chat->newrooms();	
}elseif($_GET['step']=='notclose'){
$chat->allrooms('notclose');
}elseif($_GET['step']=='close'){
$chat->allrooms('close');
}elseif($_GET['step']=='delete'){
$chat->deleteroom();
}elseif($_GET['step']=='makeclose'){
$chat->makeclose();
}elseif($_GET['step']=='block'){
	
  if($_SESSION['groups']==1){  $chat->block(); }	
}

?>
	<center><?=$chat->Powered()?></center>
<div class="player">
</div>

</body>
</html>

<?php } ?>