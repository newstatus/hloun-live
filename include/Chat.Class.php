<?php
############################
## CopyRight For Hloun.in ##
## Dev By Baha'a Odeh     ##
## 18/11/2012 - 1:13AM    ##
## Hloun Live             ##
## 2.0.0                  ##
############################

class chat{
	public function install(){
		
	}




public function settings($data,$wt=null,$value=null){
					
					if ($wt==null){
					$s=$this->SQL("select * from settings","array");
					return $this->secure($s[$data],'html','get');		
					}elseif($wt=='update'){
					return $this->SQL("update settings set $data='$value'");
					
					}
}
public function welcomeadmin(){
$onz=($this->settings('onof')==1) ? 'Online' : 'Ofline';

$a ='	<div class="leftwidgets">
	<!-- Liast -->	
		<div class="lWidget">
				<div class="leftWidgetTop"><h2>الرئيسية</h2></div>
				<div class="leftWidgetContent">		
					<ul>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>عنوان الموقع</a></td>
						<td align="center" width="50%"><a>'.$this->settings('title').'</a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>رابط الموقع</a></td>
						<td align="center" width="50%"><a style="direction:ltr">'.$this->settings('site_url').'</a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>الكلمات المفتاحية</a></td>
						<td align="center" width="50%"><a>'.$this->settings('keyword').'</a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>وصف الموقع</a></td>
						<td align="center" width="50%"><a>'.$this->settings('descript').'</a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>حالة الدعم</a></td>
						<td align="center" width="50%"><a>'.$onz.'</a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>رابط الافلاين</a></td>
						<td align="center" width="50%"><a style="direction:ltr">'.$this->settings('offline_link').'</a></td>
						</tr></table>
						</li>
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>كود الجافا سكربت</a></td>
						<td align="center" width="50%"><a style="direction:ltr">
						<textarea style="width:250px;height:50px;"  id="codetext"><script src="'.$this->settings('site_url').'/js.php"></script></textarea></a></td>
						</tr></table>
						</li>
						
						
						
					</ul>
				</div>
				<div class="leftWidgetBtm"></div>
		</div>
	<!-- End Liast -->
	
</div><script type="text/javascript">
    var textBox = document.getElementById("codetext");
    textBox.onfocus = function() {
        textBox.select();

      
        textBox.onmouseup = function() {
            // Prevent further mouseup intervention
            textBox.onmouseup = null;
            return false;
        };
    };
</script>

';
$a .='	<div class="leftwidgets">
	<!-- Liast -->	
		<div class="lWidget">
				<div class="leftWidgetTop"><h2>معلومات السكربت</h2></div>
				<div class="leftWidgetContent">		
					<ul>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>الاصدار الحالي</a></td>
						<td align="center" width="50%"><a>'.$this->scriptinfo('v').'</a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>فحص الاصدار</a></td>
						<td align="center" width="50%"><a style="direction:ltr">'.$this->scriptinfo('update').'</a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>الحقوق</a></td>
						<td align="center" width="50%"><a>'.$this->scriptinfo('powred').'</a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>برمجة</a></td>
						<td align="center" width="50%"><a>'.$this->scriptinfo('by').'</a></td>
						</tr></table>
						</li>
						
					
						
					</ul>
				</div>
				<div class="leftWidgetBtm"></div>
		</div>
	<!-- End Liast -->
	
</div>';
$a .='<center>'.$this->Powered().'</center>';
echo $a;
}


public function updatesetting(){
	
if(isset($_POST['wt']) and $_POST['wt']=='Edit'){

$title = $this->secure($_POST['title'],'html');	
$keyword = $this->secure($_POST['keyword'],'html');	
$descript =$this->secure( $_POST['descript'],'html');	
$onof = $this->secure($_POST['onof'],'id');	
$offline_link = $this->secure($_POST['offline_link'],'html');	
$online_image = $this->secure($_POST['online_image'],'html');
$oflline_image = $this->secure($_POST['oflline_image'],'html');	
$openchat_msg = $this->secure($_POST['openchat_msg'],'html');	
$site_url = $this->secure($_POST['site_url'],'html');	
if(empty($title) || empty($keyword) || empty($descript) || empty($onof) || empty($offline_link) || empty($online_image) || empty($oflline_image) || empty($openchat_msg) || empty($site_url) ){
	$xzf =  '<center><h2>اسف جميع الحقوق مطلوبة</h2></center>';
}else{
$title = $this->settings('title','update',$title);		
$keyword = $this->settings('keyword','update',$keyword);		
$descript = $this->settings('descript','update',$descript);		
$onof = $this->settings('onof','update',$onof);		
$offline_link = $this->settings('offline_link','update',$offline_link);		
$online_image = $this->settings('online_image','update',$online_image);		
$oflline_image = $this->settings('oflline_image','update',$oflline_image);		
$openchat_msg = $this->settings('openchat_msg','update',$openchat_msg);		
$site_url = $this->settings('site_url','update',$site_url);		
$xzf =  '<center><h2>تم التعديل بنجاح</h2></center>';
}	
}
	
if($this->settings('onof')==1){ $x = 'selected="selected"'; }else{$b = 'selected="selected"';}
						
$a ='	<form method="post"><div class="leftwidgets">
	<!-- Liast -->	
		<div class="lWidget">
				';
				if($xzf!='' && !empty($xzf)) { $a .='<div class="leftWidgetTop"><h2>'.$xzf.'</h2></div>';}
				$a .='<div class="leftWidgetTop"><h2>الرئيسية</h2></div>
				<div class="leftWidgetContent">		
					<ul>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>عنوان الموقع</a></td>
						<td align="center" width="50%"><a><input type="text"  name="title" value="'.$this->settings('title').'"/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>رابط الموقع</a></td>
						<td align="center" width="50%"><a style="direction:ltr"><input type="text"  name="site_url" value="'.$this->settings('site_url').'"/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>الكلمات المفتاحية</a></td>
						<td align="center" width="50%"><a><input type="text"  name="keyword" value="'.$this->settings('keyword').'"/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>وصف الموقع</a></td>
						<td align="center" width="50%"><a><input type="text"  name="descript" value="'.$this->settings('descript').'/"></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>حالة الدعم</a></td>
						<td align="center" width="50%"><a>
						<select name="onof">
						<option value="1" '.$x.'>مفتوح</option>
						<option value="2" '.$b.'>مغلق</option>
						</select>
						</a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>رابط الافلاين</a></td>
						<td align="center" width="50%"><a style="direction:ltr"><input type="text"  name="offline_link" value="'.$this->settings('offline_link').'"/></a></td>
						</tr></table>
						</li>
						
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>صورة الانلاين</a></td>
						<td align="center" width="50%"><a style="direction:ltr"><input type="text"  name="online_image" value="'.$this->settings('online_image').'"/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>صورة الافلاين</a></td>
						<td align="center" width="50%"><a style="direction:ltr"><input type="text"  name="oflline_image" value="'.$this->settings('oflline_image').'"/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>الرسالة الافتراضية للمحادثة</a></td>
						<td align="center" width="50%"><a style="direction:ltr">
						<textarea   name="openchat_msg" >'.$this->settings('openchat_msg').'</textarea>
						</a></td>
						</tr></table>
						</li>
						
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="100%" colspan="2""><a style="direction:ltr"><input type="submit"  name="wt" value="Edit"/></a></td>
						</tr></table>
						</li>
						
					</ul>
				</div>
				<div class="leftWidgetBtm"></div>
		</div>
	<!-- End Linast -->
	
</div></form>';
echo $a;	
}

public function newroom($name,$email,$section){
	$name = $name;
	$email = $email;
	$ip = $this->getRealIpAddr();
	$stime = time();
	$etime = time();
	$replayed = 0;
	$stt = 0;
	$section = $section;
	$sql = $this->SQL("insert into rooms (name,email,ip,stime,etime,replayed,stt,section)values('$name','$email','$ip','$stime','$etime','$replayed','$stt','$section')","id");
	return $sql;
	
}
public function addmsg($roomid,$msg,$user=0){
	if(empty($roomid) or empty($msg)){ return false;}else{
	$time = time();
	$roomid = $this->secure($roomid,"id");
	
	$user = ($user==0) ? $user :  $this->secure($user,"id"); 
	if($user!=0){
	$this->SQL("update rooms set wlcmsg='1' where id='$roomid'");	
	}
	$this->SQL("update rooms set replayed='$user' where id='$roomid'");
	$msg = $this->secure($msg,'html');
	$sql = $this->SQL("insert into msgs (msg,roomid,who,time) values('$msg','$roomid','$user','$time')");
	if($sql){
		return true;
	}
 }
}
	public function getnewmsgs($roomid,$lastid)
	{
	 $lastid = $this->secure($lastid,'id');
	 $roomid = $this->secure($roomid,'id');
	 		if(empty($roomid) or empty($lastid)){
				return false;
			}else{
			$sql = mysql_query("select * from msgs where roomid='$roomid' and id>$lastid order by id asc");
			if(mysql_num_rows($sql)>=1){
				
			if($this->roominfo($roomid,'stt')==1 || $this->roominfo($roomid)==0){ return false; }else{
				$all ='';	
				while($row=mysql_fetch_array($sql)){
				$bclas = ($row['who']==0) ? '' : 'admin-message';	
				$name = ($row['who']==0) ? $this->secure($this->roominfo($roomid,'name'),'html','get') : $this->secure($this->userinfo($row['who'],'nkname'),'html','get');	
				#$avatr = ($row['who']==0) ? $this->avatar($this->roominfo($roomid,'email')) : $this->avatar($this->userinfo($row['who'],'email'));
				$time =  date("d/m/y - h : i",$row['time']);
				$id = $row['id'];
				$msg = $this->To_Link($this->secure($row['msg'],'html','get'));
				$all .='<div class="'.$bclas.' msgs" msgid="'.$id.'">
				  <dt>
				  	<a href="#" title="">'.$name.'</a> 
				  	<sub class="muted"><time datetime="'.$time.'">'.$time.'</time></sub> 
				  </dt>
				  <dd class="texticon">'.$msg.'</dd>
				</div>';
				}
				return $all;	
				
			}
			
				
			}else{
				return false;
			}	
		}
	}
	
	public function avatar($email){
		$email=$email;
		$lowercase = strtolower($email);
		$image = md5($lowercase);
		return 'http://www.gravatar.com/avatar.php?gravatar_id='.$image.'?d=mm';
	}

	public function To_Link($text)
{
$text = html_entity_decode($text);
$text = " ".$text;
$text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)','<a href="\\1" target="_blank">\\1</a>', $text);
$text = eregi_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)','<a href="\\1" target="_blank">\\1</a>', $text);
$text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)','\\1<a href="http://\\2" target="_blank">\\2</a>', $text);
$text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})','<a href="mailto:\\1">\\1</a>', $text);
return $text;
}
	public function roominfo($roomid,$info=null){
	$roomid = $this->secure($roomid, "id");	
	if($info!=null){	
	
	$sql = $this->SQL("select * from rooms where id='$roomid'","array");
	return $sql[$info];	
	}else{
	$sqlnum = $this->SQL("select * from rooms where id='$roomid'","num");
	return $sqlnum;	
	}
	
	}
	
	public function userinfo($id,$info=null){
	$id = $this->secure($id,'id');
	$sql = $this->SQL("select * from users where id='$id'","array");
	if($info==null){
	return $sql;
	}else{
	return $sql[$info];	
	}
	}
	public function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=mysql_real_escape_string($_SERVER['HTTP_CLIENT_IP']);
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=mysql_real_escape_string($_SERVER['HTTP_X_FORWARDED_FOR']);
    }
    else
    {
      $ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
    }
    return $ip;
}

public function secure($value,$wt,$un=null){
	if($wt=='id'){
		return abs(intval(trim($value)));
	}elseif($wt=='html'){
		if($un==null){
			return mysql_escape_string(htmlspecialchars(trim($value)));
		}elseif($un=='get'){
			return stripslashes(trim($value));
		}
		
	}
}
public function getsection($selct=null,$home=null){
		if($home=='home'){
		$sql = mysql_query("select * from section where stat='1' order by id desc");
			
		}else{
		$sql = mysql_query("select * from section order by id desc");
		}
		$b = '';
		while($row=mysql_fetch_array($sql)){
			if($row['id']==$selct){ $x='selected="selected"'; }
			$b .='<option value="'.$row['id'].'"  '.$x.'>'.$this->secure($row['name'],'html','get').'</option>';
		}
		return $b;
	
}

public function block(){
	$b .='<div class="leftwidgets"><!-- Liast -->	
				<div class="lWidget">
				<div class="leftWidgetTop"><h2>حظر </h2></div>
				<div class="leftWidgetContent"><ul>
			
<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>Ip</a></td>
						<td align="center" width="50%"><a>
						<form method="POST">
						<input type="text" name="ip" />
						<input type="submit" name="wtz" value="block"/>
						</form>
						</td>
						</tr></table>
						</li>
						

				</ul></div><div class="leftWidgetBtm"></div></div><!-- End Liast --></div>';
		
	if(isset($_GET['wtz']) and $_GET['wtz']=='delete'){
	$id=$this->secure($_GET['id'],'id');
	$this->SQL("delete from block where id='$id'");		
	}elseif(isset($_POST['wtz']) and $_POST['wtz']=='block'){
	$ip=$this->secure($_POST['ip'],'html');
	$this->SQL("insert into  block (ip)values('$ip')");		
	}
	
$sql =mysql_query("select * from block order by id desc");
		$b .='<div class="leftwidgets"><!-- Liast -->	<div class="lWidget"><div class="leftWidgetTop"><h2>الحظر</h2></div><div class="leftWidgetContent">		<ul>';
		$b .='<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>الايبي</a></td>
						<td align="center" width="50%"><a>حذف</a></td>
						</tr></table>
				 </li>
			';
		while($row=mysql_fetch_array($sql)){
			if($row['stat']=='1'){ $x='مفتوح'; }else{$x='مغلق';}
			#$b .='<option value="'.$row['id'].'"  '.$x.'>'.$row['name'].'</option>';
			$b .='<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>'.$row['ip'].'</a></td>
						<td align="center" width="50%"><a href="rooms.php?step=block&wtz=delete&id='.$row['id'].'">حذف</a></td>
						</tr></table>
				 </li>
			';
		}
		$b .='</ul></div><div class="leftWidgetBtm"></div></div><!-- End Liast --></div>';
		echo $b;
	
}

public function allsection(){
	$sql = mysql_query("select * from section order by id desc");
		
		$b ='<div class="leftwidgets"><!-- Liast -->	<div class="lWidget"><div class="leftWidgetTop"><h2>الاقسام</h2></div><div class="leftWidgetContent">		<ul>';
		$b .='<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="30%"><a>اسم القسم</a></td>
						<td align="center" width="30%"><a>حالة القسم</a></td>
						<td align="center" width="20%"><a>حذف</a></td>
						<td align="center" width="20%"><a>تعديل</a></td>
						</tr></table>
				 </li>
			';
		while($row=mysql_fetch_array($sql)){
			if($row['stat']=='1'){ $x='مفتوح'; }else{$x='مغلق';}
			#$b .='<option value="'.$row['id'].'"  '.$x.'>'.$row['name'].'</option>';
			$b .='<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="30%"><a>'.$this->secure($row['name'],"html","get").'</a></td>
						<td align="center" width="30%"><a>'.$x.'</a></td>
						<td align="center" width="20%"><a href="section.php?step=delete&id='.$row['id'].'" class="delete">حذف</a></td>
						<td align="center" width="20%"><a href="section.php?step=edit&id='.$row['id'].'">تعديل</a></td>
						</tr></table>
				 </li>
			';
		}
		$b .='</ul></div><div class="leftWidgetBtm"></div></div><!-- End Liast --></div>';
		echo $b;
}
public function updatesection(){
$id = $this->secure($_GET['id'],'id');
$num = $this->SQL("select * from section where id='$id'","num");
if($num>=1){
	
if ( isset($_POST['wt']) && $_POST['wt']=='Edit' ){
$name = $this->secure($_POST['name'],'html');
$stat = $this->secure($_POST['stat'],'id');
if(!empty($name) && !empty($stat)){
$this->SQL("update section set name='$name',stat='$stat' where id='$id'");	
}
}

$sql = $this->SQL("select * from section where id='$id'","array");

$x = ($sql['stat']==1) ? 'selected="selected"' : '' ;
$z = ($sql['stat']==2) ? 'selected="selected"' : '' ;

$b = '	<form method="post"><div class="leftwidgets">
	<!-- Liast -->	
		<div class="lWidget">
				<div class="leftWidgetTop"><h2>تعديل قسم</h2></div>
				<div class="leftWidgetContent">		
					<ul>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>اسم القسم</a></td>
						<td align="center" width="50%"><a><input type="text"  name="name" value="'.$this->secure($sql['name'],'html','get').'"/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>حالة القسم</a></td>
						<td align="center" width="50%"><a>
						<select name="stat">
						<option value="1" '.$x.'>متواجد</option>
						<option value="2" '.$z.'>غير متواجد</option>
						</select>
						</td>
						</tr></table>
						</li>
											
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="100%" colspan="2""><a style="direction:ltr"><input type="submit"  name="wt" value="Edit"/></a></td>
						</tr></table>
						</li>
						
					</ul>
				</div>
				<div class="leftWidgetBtm"></div>
		</div>
	<!-- End Liast -->
	
</div>
</form>	';
echo $b;
}else{
	echo 'Sorry This Section Not Found';
}
	
}
public function deeltesection(){
$id = $this->secure($_GET['id'],"id");
$sql = $this->SQL("select * from section where id='$id'","num");
if($sql>=1){	
$this->SQl("DELETE FROM section WHERE id = '$id'");
echo '<center><h1>تم الحذف بنجاح</h1></center>';
}else{
	echo 'Error';
}	
}

public function addsection(){
if ( isset($_POST['wt']) && $_POST['wt']=='Add' ){
$name = $this->secure($_POST['name'],'html');
$stat = $this->secure($_POST['stat'],'id');
if(!empty($name) && !empty($stat)){
$h3 = $this->SQL("insert into section  (name,stat) values('$name','$stat')");	
if(isset($h3)){
$bz = '1';	
}
}
}


$b = '	<form method="post"><div class="leftwidgets">
	<!-- Liast -->	
		<div class="lWidget">';
				if($bz==1){$b .='<div class="leftWidgetTop"><h2>تم اضافة القسم بنجاح</h2></div>'; }
				$b .='<div class="leftWidgetTop"><h2>اضافة قسم</h2></div>
				<div class="leftWidgetContent">		
					<ul>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>اسم القسم</a></td>
						<td align="center" width="50%"><a><input type="text"  name="name" value=""/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>حالة القسم</a></td>
						<td align="center" width="50%"><a>
						<select name="stat">
						<option value="1" >متواجد</option>
						<option value="2" >غير متواجد</option>
						</select>
						</td>
						</tr></table>
						</li>
											
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="100%" colspan="2""><a style="direction:ltr"><input type="submit"  name="wt" value="Add"/></a></td>
						</tr></table>
						</li>
						
					</ul>
				</div>
				<div class="leftWidgetBtm"></div>
		</div>
	<!-- End Liast -->
	
</div>
</form>	';
echo $b;
	
}



public function adduser(){
if ( isset($_POST['wt']) && $_POST['wt']=='Add' ){
$name = $this->secure($_POST['name'],'html');
$email = $this->secure($_POST['email'],'html');
$password = md5($this->secure($_POST['password'],'html'));
$groups = $this->secure($_POST['groups'],'id');

$section = $this->secure($_POST['section'],'id');

$nkname = $this->secure($_POST['nkname'],'html');

$isuser=$this->SQL("select * from users where name='$name'","num");
if($isuser==0){
if(!empty($name) && !empty($email) && !empty($password) && !empty($groups) && !empty($nkname) && !empty($section)){
$h3 = $this->SQL("insert into users  
					(groups,name,email,password,nkname,section) 
					values
					('$groups','$name','$email','$password','$nkname','$section')
				");	

if(isset($h3)){
$bz = '1';	
$msg = 'تم اضافة العضو بنجاح';
}

}

}else{
$bz='1';
$msg='هذا المستخدم موجود من قبل !';	
}
}

$b = '	<form method="post"><div class="leftwidgets">
	<!-- Liast -->	
		<div class="lWidget">';
				if($bz==1){$b .='<div class="leftWidgetTop"><h2>'.$msg.'</h2></div>'; }
				$b .='<div class="leftWidgetTop"><h2>اضافة عضو</h2></div>
				<div class="leftWidgetContent">		
					<ul>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>اسم العضو</a></td>
						<td align="center" width="50%"><a><input type="text"  name="name" value=""/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>اسم المستعار</a></td>
						<td align="center" width="50%"><a><input type="text"  name="nkname" value=""/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>الاميل</a></td>
						<td align="center" width="50%"><a><input type="text"  name="email" value=""/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>كلمة السر</a></td>
						<td align="center" width="50%"><a><input type="password"  name="password" value=""/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>حالة </a></td>
						<td align="center" width="50%"><a>
						<select name="groups">
						<option value="1" >مدير</option>
						<option value="2" >موظف</option>
						</select>
						</td>
						</tr></table>
						</li>
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>قسم الموظف (اذا كان مدير غير مهم)</a></td>
						<td align="center" width="50%"><a>
						<select name="section">
						'.$this->getsection().'
						</select>
						</td>
						</tr></table>
						</li>
						
											
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="100%" colspan="2""><a style="direction:ltr"><input type="submit"  name="wt" value="Add"/></a></td>
						</tr></table>
						</li>
						
					</ul>
				</div>
				<div class="leftWidgetBtm"></div>
		</div>
	<!-- End Liast -->
	
</div>
</form>	';

echo $b;	
}


public function edituser($id=null){
if(!empty($id) and $id !=''){ $id=$this->secure($id,'id'); $editwt='admin'; }else{	 $id = $this->secure($_GET['id'],'id'); }
$sqlidnum=$this->SQL("select * from users where id='$id'","num");
$slinfo=$this->SQL("select * from users where id='$id'","array");
if($slinfo['groups']=='1'){
$ad = 'selected="selected"';	
}else{
$nmrz = 'selected="selected"';	
}
if($sqlidnum>=1){		
if ( isset($_POST['wt']) && $_POST['wt']=='Edit' ){
	
$name = $this->secure($_POST['name'],'html');

$email = $this->secure($_POST['email'],'html');

$password = md5($this->secure($_POST['password'],'html'));

$groups = $this->secure($_POST['groups'],'id');
$nkname = $this->secure($_POST['nkname'], 'html');
$section = $this->secure($_POST['section'], 'id');

$isuser=$this->SQL("select * from users where name='$name'","num");

if($isuser==0 || $slinfo['name']==$name){
		
if(!empty($name) && !empty($email) && !empty($groups) && !empty($nkname)){
if($slinfo['groups']==1){	
if(empty($_POST['password'])){			
$sl = "update users set groups='$groups',name='$name',email='$email',nkname='$nkname',section='$section'  where id='$id'";	
}else{
$sl = "update users set groups='$groups',name='$name',email='$email',password='$password',nkname='$nkname',section='$section' where id='$id'";	
}

}else{
	if(empty($_POST['password'])){			
$sl = "update users set name='$name',email='$email',nkname='$nkname' where id='$id'";	
}else{
$sl = "update users set name='$name',email='$email',password='$password',nkname='$nkname' where id='$id'";	
}
	
	
}

$h3 = $this->SQL($sl);
if(isset($h3)){
	
$bz = '1';	

$msg = 'تم تعديل العضو بنجاح';

$slinfo=$this->SQL("select * from users where id='$id'","array");
if($slinfo['groups']=='1'){
$ad = 'selected="selected"';	
}else{
$nmrz = 'selected="selected"';	
}


}


}

}else{
$bz='1';
$msg='هذا المستخدم موجود من قبل !';	
}
}

$b = '	<form method="post"><div class="leftwidgets">
	<!-- Liast -->	
		<div class="lWidget">';
				if($bz==1){$b .='<div class="leftWidgetTop"><h2>'.$msg.'</h2></div>'; }
				$b .='<div class="leftWidgetTop"><h2>اضافة عضو</h2></div>
				<div class="leftWidgetContent">		
					<ul>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>اسم العضو</a></td>
						<td align="center" width="50%"><a><input type="text"  name="name" value="'.$this->secure($slinfo['name'],"html","get").'"/></a></td>
						</tr></table>
						</li>
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>اسم المستعار</a></td>
						<td align="center" width="50%"><a><input type="text"  name="nkname" value="'.$this->secure($slinfo['nkname'],"html","get").'"/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>الاميل</a></td>
						<td align="center" width="50%"><a><input type="text"  name="email" value="'.$this->secure($slinfo['email'],"html","get").'"/></a></td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>كلمة السر</a></td>
						<td align="center" width="50%"><a><input type="password"  name="password" value=""/></a></td>
						</tr></table>
						</li>
						';
						if($_SESSION['groups']==1){
						$b .='<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>حالة العضو</a></td>
						<td align="center" width="50%"><a>
						<select name="groups">
						<option value="1" '.$ad.'>مدير</option>
						<option value="2" '.$nmrz.'>عضو</option>
						</select>
						</td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>قسم الموظف</a></td>
						<td align="center" width="50%"><a>
						<select name="section">
						'.$this->getsection($slinfo['section']).'
						</select>
						</td>
						</tr></table>
						</li>';
						}else{
						$b .='<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>حالة العضو</a></td>
						<td align="center" width="50%"><a>
						<select name="groups" disabled="disabled">
						<option value="1" '.$ad.'>مدير</option>
						<option value="2" '.$nmrz.'>عضو</option>
						</select>
						</td>
						</tr></table>
						</li>
						
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>قسم الموظف</a></td>
						<td align="center" width="50%"><a>
						<select name="section" disabled="disabled">
						'.$this->getsection($slinfo['section']).'
						</select>
						</td>
						</tr></table>
						</li>';	
						}
						$b .= '					
						<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="100%" colspan="2""><a style="direction:ltr"><input type="submit"  name="wt" value="Edit"/></a></td>
						</tr></table>
						</li>
						
					</ul>
				</div>
				<div class="leftWidgetBtm"></div>
		</div>
	<!-- End Liast -->
	
</div>
</form>	';

echo $b;	
	
	
}else{
	echo 'No User With Is Id';
}

}


public function allusers(){
		$sql = mysql_query("select * from users order by id desc");
		
		$b ='<div class="leftwidgets"><!-- Liast -->	
		<div class="lWidget"><div class="leftWidgetTop"><h2>الاعضاء</h2></div><div class="leftWidgetContent">		<ul>';
		$b .='<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="30%"><a>اسم العضو</a></td>
						<td align="center" width="30%"><a>حالة العضو</a></td>
						<td align="center" width="20%"><a>حذف</a></td>
						<td align="center" width="20%"><a>تعديل</a></td>
						</tr></table>
				 </li>
			';
		while($row=mysql_fetch_array($sql)){
			if($row['groups']=='1'){ $x='مدير'; }else{$x='عضو';}
			#$b .='<option value="'.$row['id'].'"  '.$x.'>'.$row['name'].'</option>';
			$b .='<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="30%"><a>'.$this->secure($row['name'],"html","get").'</a></td>
						<td align="center" width="30%"><a>'.$x.'</a></td>
						<td align="center" width="20%"><a href="users.php?step=delete&id='.$row['id'].'" class="delete">حذف</a></td>
						<td align="center" width="20%"><a href="users.php?step=edit&id='.$row['id'].'">تعديل</a></td>
						</tr></table>
				 </li>
			';
		}
		$b .='</ul></div><div class="leftWidgetBtm"></div></div><!-- End Liast --></div>';
		echo $b;
		
	
}

public function deleteuser(){
$id = $this->secure($_GET['id'],"id");
$sql = $this->SQL("select * from users where id='$id'","num");
if($sql>=1){	
$this->SQl("DELETE FROM users WHERE id = '$id'");
echo '<center><h1>تم الحذف بنجاح</h1></center>';
}else{
	echo 'Error';
}	
}

public function singelsection($id,$valie){
	$id=$this->secure($id, 'id');
	
	$sql = $this->SQL("select * from section where id='$id'","array");
	return $sql[$valie];
}
public function newrooms(){
	
	if($_SESSION['groups']==1){
   	$sql = mysql_query("select * from rooms order by id DESC limit 0,1");
	}else{
		$sectionid= $this->userinfo($_SESSION['adminid'],'section');	
		if(isset($_POST['wtz']) and $_POST['wtz']=='edit'){
		$nz = $this->secure($_POST['stat'], 'id');
		$this->SQL("update section set stat='$nz' where id='$sectionid'");	
		}
		$x = ($this->singelsection($sectionid,'stat')==1) ? 'selected="selected"' : '' ;
		$z = ($this->singelsection($sectionid,'stat')==2) ? 'selected="selected"' : '' ;
		$sql = mysql_query("select * from rooms where section='$sectionid' order by id DESC limit 0,1");	
		$b .='<div class="leftwidgets"><!-- Liast -->	
				<div class="lWidget">
				<div class="leftWidgetTop"><h2>حالة القسم</h2></div>
				<div class="leftWidgetContent"><ul>
			
<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="50%"><a>حالة القسم</a></td>
						<td align="center" width="50%"><a>
						<form method="POST">
						<select name="stat">
						<option value="1" '.$x.'>متواجد</option>
						<option value="2" '.$z.'>غير متواجد</option>
						</select>
						<input type="submit" name="wtz" value="edit"/>
						</form>
						</td>
						</tr></table>
						</li>
						

				</ul></div><div class="leftWidgetBtm"></div></div><!-- End Liast --></div>';
		
	
	}
	
	
	
	$b .='<div class="leftwidgets"><!-- Liast -->	
		<div class="lWidget"><div class="leftWidgetTop"><h2>المحدثات</h2></div><div class="leftWidgetContent">		<ul>';
					
		$row=mysql_fetch_array($sql);
			if($row['replayed']==0){
				$repd='الزائر';
			}else{
				$repd=$this->secure($this->userinfo($row['replayed'],'nkname'),"html","get");
			}
			$scid = $row['section'];
			$sqlsection = $this->SQL("select * from section where id='$scid'","array");
			$section = $this->secure($sqlsection['name'], 'html','get');
			
						$b .='<li class="listroom" roomid="'.$row['id'].'">
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="15%"><a>الاسم</a></td>
						<td align="center" width="15%"><a>الاميل</a></td>
						<td align="center" width="15%"><a>تاريخ المحداثة</a></td>
						<td align="center" width="15%"><a>تاريخ اخر رد</a></td>
						<td align="center" width="5%"><a>اخر رد من</a></td>
						<td align="center" width="10%"><a>القسم</a></td>
						<td align="center" width="5%"><a>فتح</a></td>
						<td align="center" width="10%"><a>ip</a></td>
						<td align="center" width="5%"><a>حذف</a></td> ';
						if($wt=='notclose'){ $b .= '<td align="center" width="5%"><a>اغلاق</a></td>'; }
						
					$b .='</tr></table></li>';
						
		
		$b .='</ul></div><div class="leftWidgetBtm"></div></div><!-- End Liast --></div>';
		echo $b;
	
}

public function getnewrooms($lastid){
	$lastid = $this->secure($lastid,'id');
	if($_SESSION['groups']==1){
   	$sql = mysql_query("select * from rooms where stt='0' and id>$lastid");
	}else{
	$sectionid= $this->userinfo($_SESSION['adminid'],'section');
	$sql = mysql_query("select * from rooms where stt='0' and id>$lastid and section='$sectionid'");	
	}
	
	if(mysql_num_rows($sql)>=1){
			
		while($row=mysql_fetch_array($sql)){
				
				if($row['replayed']==0){
				$repd='الزائر';
			}else{
				$repd=$this->secure($this->userinfo($row['replayed'],'nkname'),"html","get");
			}
			$scid = $row['section'];
			$sqlsection = $this->SQL("select * from section where id='$scid'","array");
			$section = $this->secure($sqlsection['name'], 'html','get');
						$b .='<li class="listroom" roomid="'.$row['id'].'">
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="15%"><a>'.$this->secure($row['name'],'html','get').'</a></td>
						<td align="center" width="15%"><a>'.$this->secure($row['email'],'html','get').'</a></td>
						<td align="center" width="15%"><a>'.date("d/m/y - h : i",$row['stime']).'</a></td>
						<td align="center" width="15%"><a>'.date("d/m/y - h : i",$row['etime']).'</a></td>
						<td align="center" width="5%"><a>'.$repd.'</a></td>
						<td align="center" width="10%"><a>'.$section.'</a></td>
			<td align="center" width="5%"><a href=\'javascript:void(window.open("chat.php?id='.$row['id'].'","","width=525,height=550,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes"))\'>فتح</a></td>
						<td align="center" width="10%"><a>'.$this->secure($row['ip'],'html','get').'</a></td>
						<td align="center" width="5%"><a href="rooms.php?step=delete&id='.$row['id'].'" class="delete">حذف</a></td> ';
						if($wt=='notclose'){ $b .= '<td align="center" width="5%"><a href="rooms.php?step=makeclose&id='.$row['id'].'">اغلاق</a></td>'; }
						
					$b .='</tr></table></li>';
		}
		return $b;
	}else{
		return 'DONE';
	}
}
public function allrooms($wt){
			
		if($wt=='notclose'){
			#
			if($_SESSION['groups']==1){
		    		$sql = mysql_query("select * from rooms where stt='0' order by id DESC ");	
			}else{
				    $sectionid= $this->userinfo($_SESSION['adminid'],'section');
					$sql = mysql_query("select * from rooms where stt='0' and section='$sectionid'order by id DESC ");		
			}
			#
		
		
		}elseif($wt=='close'){
			
			#
			if($_SESSION['groups']==1){
		    		$sql = mysql_query("select * from rooms where stt='1' order by id DESC ");	
			}else{
				    $sectionid= $this->userinfo($_SESSION['adminid'],'section');
					$sql = mysql_query("select * from rooms where stt='1' and section='$sectionid'order by id DESC ");		
			}
			#
		
		}
		
		$b ='<div class="leftwidgets"><!-- Liast -->	
		<div class="lWidget"><div class="leftWidgetTop"><h2>المحدثات</h2></div><div class="leftWidgetContent">		<ul>';
					$b .='<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="15%"><a>الاسم</a></td>
						<td align="center" width="15%"><a>الاميل</a></td>
						<td align="center" width="15%"><a>تاريخ المحداثة</a></td>
						<td align="center" width="15%"><a>تاريخ اخر رد</a></td>
						<td align="center" width="5%"><a>اخر رد من</a></td>
						<td align="center" width="10%"><a>القسم</a></td>
						<td align="center" width="5%"><a>فتح</a></td>
						<td align="center" width="10%"><a>ip</a></td>
						<td align="center" width="5%"><a>حذف</a></td> ';
						if($wt=='notclose'){ $b .= '<td align="center" width="5%"><a>اغلاق</a></td>'; }
						
					$b .='</tr></table></li>';
						
		while($row=mysql_fetch_array($sql)){
			if($row['replayed']==0){
				$repd='الزائر';
			}else{
				$repd=$this->secure($this->userinfo($row['replayed'],'nkname'),"html","get");
			}
			$scid = $row['section'];
			$sqlsection = $this->SQL("select * from section where id='$scid'","array");
			$section = $this->secure($sqlsection['name'], 'html','get');
			$b .='<li>
						<table width="100%" align="center" dir="rtl"><tr>
						<td align="center" width="15%"><a>'.$this->secure($row['name'],'html','get').'</a></td>
						<td align="center" width="15%"><a>'.$this->secure($row['email'],'html','get').'</a></td>
						<td align="center" width="15%"><a>'.date("d/m/y - h : i",$row['stime']).'</a></td>
						<td align="center" width="15%"><a>'.date("d/m/y - h : i",$row['etime']).'</a></td>
						<td align="center" width="5%"><a>'.$repd.'</a></td>
						<td align="center" width="10%"><a>'.$section.'</a></td>
			<td align="center" width="5%"><a href=\'javascript:void(window.open("chat.php?id='.$row['id'].'","","width=525,height=550,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes"))\'>فتح</a></td>
						<td align="center" width="10%"><a>'.$this->secure($row['ip'],'html','get').'</a></td>
						<td align="center" width="5%"><a href="rooms.php?step=delete&id='.$row['id'].'" class="delete">حذف</a></td> ';
						if($wt=='notclose'){ $b .= '<td align="center" width="5%"><a href="rooms.php?step=makeclose&id='.$row['id'].'">اغلاق</a></td>'; }
						
					$b .='</tr></table></li>';
		}
		$b .='</ul></div><div class="leftWidgetBtm"></div></div><!-- End Liast --></div>';
		echo $b;
		
	
}

public function deleteroom(){
	
$id = $this->secure($_GET['id'],"id");

$sql = $this->SQL("select * from rooms where id='$id'","num");
if($sql>=1){	
$this->SQl("DELETE FROM rooms WHERE id = '$id'");
$this->SQl("DELETE FROM msgs WHERE roomid = '$id'");

echo '<center><h1>تم الحذف بنجاح</h1></center>';

}else{
	echo 'Error';
}	

	
}
public function makeclose(){
$id = $this->secure($_GET['id'],"id");

$sqlnum = $this->SQL("select * from rooms where id='$id'","num");
$sql = $this->SQL("select * from rooms where id='$id'","array");
if($sqlnum>=1 && $sql['stt']=='0'){	
$this->SQl("update  rooms set stt='1' WHERE id = '$id'");
echo '<center><h1>تم الاغلاق بنجاح</h1></center>';
}else{
	echo 'Error';
}	
	
}
public function offline_redirect(){ if($this->settings('onof')==2){ header( 'Location: '.$this->settings('offline_link') ) ; exit(); die(); } }

	public function Powered($x=null){
		if($x==null){
		return '<h3>Powred By <a href="//hloun.in" target="_blank">Hloun</a> Live 2.0.0</h3>';
		}else{
		return 'Powred By <a href="//hloun.in" target="_blank">Hloun</a> Live 2.0.0';
			
		}
	}
	public function scriptinfo($wt){
			if($wt=='by'){
				return 'Baha\'a Odeh';
			}elseif($wt=='v'){
				return '2.0.0';
			}elseif($wt=='update'){
			$sp = new sup('http://computarje.com/chat/update.xml',$this->scriptinfo('v'),'http://computarje.com/update.xml');
			return $sp->VrisonUpdate();
			}elseif($wt=='powred'){
				return 'Powred By  hloun support';
			}
	}
	public function SQL($v,$wt=null)
{
	
		if($wt==null){
			return mysql_query($v) or die(mysql_error());
		}elseif($wt=='id'){
			mysql_query($v) or die(mysql_error());
			return mysql_insert_id();
		}elseif($wt=='array'){
			$sql =  mysql_query($v) or die(mysql_error());
			return mysql_fetch_array($sql);
		}elseif($wt=='num'){
			$sql =  mysql_query($v) or die(mysql_error());
			return mysql_num_rows($sql);
		}
}


public function login(){
	if($_SESSION['adminid']=='' || empty($_SESSION['adminid']) || $_SESSION['adminid']=='0'){
	return false;		
	}else{
		return true;
	}
}

public function ltlogin(){
	if($_POST['wt']=='Login'){
	  $username = stripslashes(mysql_real_escape_string(strip_tags(htmlspecialchars($_POST['username']))));
	  $password = md5(mysql_real_escape_string(strip_tags(htmlspecialchars($_POST['password']))));
	  $login_query = mysql_query("SELECT * FROM `users`  WHERE name ='$username' and password = '$password' ") or die (mysql_error());	
	  $cheak_login = mysql_fetch_object($login_query);
		if ($cheak_login->name == $username and $cheak_login->password == $password) {
				 
				$_SESSION['name']     = $cheak_login->name;
				$_SESSION['adminid']     = $cheak_login->id;
				$_SESSION['groups']       = $cheak_login->groups;
				$_SESSION['email']       = $cheak_login->email;
							
				$currentFile = $_SERVER["PHP_SELF"];
    			$parts = Explode('/', $currentFile);
   			    $url =  $parts[count($parts) - 1];
				if($url=='login.php') $url = 'index.php';
				header('Location: '.$url);
				die();
				exit();
		}else{
			return 'not';
		}
	}
}



public function byifblock(){
	$ip=$this->getRealIpAddr();
	$sql=$this->SQL("select * from block where ip='$ip'","num");
	if($sql>=1){
	$img = $this->settings('site_url').'/images/banned.jpg';
	echo '<body style="background-color:#000;"><center><img src="'.$img.'"/></center></body>';		
	die();
	exit();	
	}
}

}


 ?>