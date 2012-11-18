<?php include 'include/include.php';
############################
## CopyRight For Hloun.in ##
## Dev By Baha'a Odeh     ##
## 18/11/2012 - 1:13AM    ##
## Hloun Live             ##
## 2.0.0                  ##
############################
?>
<?php $chat->offline_redirect(); ?>
<?php 
$_SESSION['roomid']='';
unset($_SESSION['roomid']);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$chat->settings('title');?></title>
<meta name="keywords" content="<?=$chat->settings('keyword');?>" />
<meta name="description" content="<?=$chat->settings('descript');?>" />
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
	
<script type="text/javascript" src="js/jquery.emotions.js"></script>
<script>
var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	$(function(){

		/*$(".boxmsg").scrollTop($(".boxmsg")[0].scrollHeight); 

		$("html").css("overflow", "hidden");
		$(".msgs").emotions();*/


		$("#formregister").submit(function(){
			name = $("#rename").val();
			email = $("#reemail").val();
			section = $("#resection").val();
			if(name==""){ 
				$('.msgss').html("الرجاء اضافة اسم");
			}else if (email==""){
				$('.msgss').html("الرجاء اضافة اميل");
			}else if (section==""){
				$('.msgss').html("الرجاء اختيار  قسم");
				
			}else if(!ck_email.test(email)){
				$('.msgss').html("الرجاء اضافة اميل صحيح");
			}else{
				$('.msgss').html("<img src='images/ajax-loader.gif'/>");
				register(name,email,section);
			}
			return false;
		});



$('#message-send').keypress(function(e){
		if(e.keyCode == 13 && !e.shiftKey){
			     if ($(this).val() != "" ){ 
					add($(this).val());
			     	return false;
			     	 }else{
				    return false;
				}
		}
		
		});
/* End add msg */
	});
	
	
function register(name,email,section){
	data = {"name":name,"email":email,"section":section};
	$.ajax({type:"POST",url:"new.php?step=register",data:data,async: false,
			beforeSend:function(){ $(".msgss").html("<img src='images/ajax-loader.gif'/>");  },
			success:function(b){  if (b=='DONE'){  $(".notrgisted").hide();  $(".registedone").show(); $("#messages").scrollTop($("#messages")[0].scrollHeight);  }	}
			});
}

function add(value){
		  var data = {"msg":value} 
			$.ajax({
						type:"POST",
						url:"new.php?step=addmsg",
						data:data,
						async: false,
						beforeSend:function(){  },
						success:function(b){  if (b=='DONE'){    $('#message-send').val("");  getnew(); } else if (b=='DONE2'){ $('#message-send').val("");  getnew();  }	}
			});		
		}	
		
		
 function getnew(){
    	 var lastid =  $('.msgs:last-child').attr("msgid");
		  var data = {"lastid":lastid} 
		  $.ajax({
						type:"POST",
						url:"new.php?step=new",
						data:data,
						async: false,
						beforeSend:function(){ },
						success:function(b){ 
							if(b=='NOT'){}else{
							$('.msgs:last-child').after(b);
							$(".texticon").emotions();
							$("#messages").scrollTop($("#messages")[0].scrollHeight); 
							
							}
							
						}
					
			});
			
    	
    }
    
 	setInterval('getnew()',3000);			    		
</script>
</head>
<body>
<header>
		<div class="navbar navbar-fixed-top">
		  <div class="navbar-inner">
		  	<div class="container-fluid">
			    <a class="brand" href="index.php"><?=$chat->settings('title');?></a>
			    <ul class="nav">
			      <li><a href="index.php" target="_blank">الرئيسية</a></li>
			      <li><a href="javascript:close_window();" onClick="window.close();">خروج</a></li>
			    </ul>
		    </div>
		  </div>
		</div>
	</header>	
	<div class="container-fluid  notrgisted" style="margin-top:50px">
		<div class="row-fluid">
			<div class="span6">
				<form class="form-horizontal" method="post" id="formregister">
				  <div class="control-group">
				    <label class="control-label" for="name">الاسم</label>
				    <div class="controls">
				      <input type="text" name="name" id="rename"  placeholder="الاسم الكريم">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="email">البريد الالكتروني</label>
				    <div class="controls">
				      <input type="email" name="email" id="reemail" placeholder="me@example.com">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="section">الفرع</label>
				    <div class="controls">
				     
				      <select id="resection" name="section">
							<?=$chat->getsection(null,'home');?>
					</select>
				    </div>
				  </div>
				  <div class="control-group">
				    <div class="controls">
				      <button type="submit" class="btn">افتح!</button>
				     
				    </div>
				    
				  </div>
				  
				</form>
				
			</div>
			
		</div>
		<center> <div class="msgss"></div></center>
	</div>
	<div class="registedone" style="display: none;">
	<!-- -->
	<div class="container-fluid">
		

		<div id="messages">
			<div class="row-fluid">
				<div class="admin-message msgs" msgid="1">
				  <dt>
				  	<a href="#" title="">النظام</a> 
				  	<sub class="muted"><time datetime="<?=date("d/m/y - h : i",time());?>"><?=date("d/m/y - h : i",time());?></time></sub> 
				  </dt>
				  <dd class="texticon">	
					<?=$chat->settings('openchat_msg');?>	
				  </dd>
				</div>
				  
			</div>
		</div>
		<br>
		<div class="row-fluid">
			<input type="text" name="message" id="message-send" class="span12">
		</div>
	</div>
	<!-- -->	
	</div>
	
	<footer>
		<p class="align-center"><?=$chat->Powered(1)?></p>
	</footer>
<!--	<div class="chatbox">
		
		
		<div id="registerd">
	<div>
			<ul class="lasttop">
				<li><a href="#">Exit</a></li>
				<li><a href="#">Email</a></li>
				<li><a href="#">Site</a></li>
				<li><a href="#">help</a></li>
				
			</ul>
			<div class="clear"></div>
		</div>
		
	<div class="boxmsg">
		
		
		
			
		<table width="100%" cellpadding="0" cellspacing="0" class="table todelete" msgid="1"><tr>
				<td align="top" valign="top" ><div  class="lefimage"><img src="<?=$chat->settings('online_image');?>" width="50px" height="50px"/></div></td>
				<td align="top" valign="top" class="msgandtitle" ><div class="name"><?=$chat->settings('title');?><span class="time"><?=date("d/m/y - h : i",time());?></span></div>
						<div class="msgs"><?=$chat->settings('openchat_msg');?></div>
				</td>
			</tr></table>
	     
	
	</div>
		<div class="sendbox">
			<textarea id="textCom" placeholder="Write Your Post Here" name="post"></textarea>
		</div>
	</div>	
	</div>
	<center><?=$chat->Powered()?></center>-->
</body>
</html>
