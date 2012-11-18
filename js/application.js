$(function() { 
	/* Sticky Footer 
	*/
	$(window).bind("load", function() { 
		//
		function positionFooter() { var mFoo = $("body > footer"); if ((($(document.body).height() + mFoo.height()) < $(window).height() && mFoo.css("position") == "fixed") || ($(document.body).height() < $(window).height() && mFoo.css("position") != "fixed")) { mFoo.css({ position: "fixed", bottom: "0px" }); } else { mFoo.css({ position: "static" }); } } $(document).ready(function () { positionFooter(); $(window).scroll(positionFooter); $(window).resize(positionFooter); $(window).load(positionFooter); });
		positionFooter();
	});
	
	$('[title!=""]').tooltip();

	
	/* APPLICATION ELEMENTS SELECTORS*/
	var messages = '#messages',
		messageText = '#message-text',
		sendButton = '#send';

	$(messages).scrollTop($(messages)[0].scrollHeight); 

	$(messages).scrollTop($(messages)[0].scrollHeight);

	$(messageText).keypress(function(e){
		if(e.keyCode == 13 && !e.shiftKey)
		{
			if ($(this).val() != "" )
			{ 
				//clearInterval(int); 	 	
				add($(this).val());
				//setTimeout(function() {  int = setInterval('getnew()',3000);  });
			}
			return false;
		}
	});
		
			
	$('#send').click(function() // Skip This!
	{ 
		
		if ($(messageText).val() != "" )
		{ 
			//clearInterval(int); 	 	
			add($(messageText).val());
			//setTimeout(function() {  int = setInterval('getnew()',3000);  });
			return false;
		}
		else
		{
			return false;
		}
	});

});

function add(value){
	var data = {"msg":value} 
	$.ajax({
		type:"POST",
		url:"new.php",
		data:data,
		beforeSend:function(){  },
		success:function(b){  if (b=='DONE'){   getnew(); $(messageText).val(""); }	}
	});
}

function getnew(){
	var lastid =  $('#lastid').attr("comid");
	var data = {"lastid":lastid} 
	$.ajax({
		type:"POST",
		url:"new.php?step=new",
		data:data,
		beforeSend:function(){ },
		success:function(b){ 
			$("#lastid").remove();$(messages).append(b);$(messages).scrollTop($(messages)[0].scrollHeight);
		}
	});
}