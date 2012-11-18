<?php 
############################
## CopyRight For Hloun.in ##
## Dev By Baha'a Odeh     ##
## 18/11/2012 - 1:13AM    ##
## Hloun Live             ##
## 2.0.0                  ##
############################
class sup{
					
	public $xmldata;
	public $v;
	public $rssz;
	function __construct($url,$v,$rsz) {
			 
		$this->xmldata = $this->get($url);
		
		$this->v = $v;
		
		$this->rssz = $rsz;
	}
					
	public function LoadRss(){
			
		$url = $this->rssz;
		
		$rss = @simplexml_load_file($url);
		
		if($rss){
			
			$items = $rss->channel->item;
				
				foreach($items as $item){
						
					$title = $item->title;
					
					$link = $item->link;
					
					$published_on = $item->pubDate;
					
					$description = $item->description;
					
					$all .= ' <a href="'.$link.'" class="newrss" target="_blank">'.$title.'</a> ';
				
				}
				
	}else{
		
				$all = 'الخاصية غير متاحة في هذا السيرفر';
		}
	
	return $all;

  }				
					
					
  public function get($url) {
	    
		  $data = @file_get_contents($url);
	    
		  if(empty($data)){
					
				$ch = curl_init();
				
				curl_setopt($ch, CURLOPT_HEADER, 0);
			
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
				curl_setopt($ch, CURLOPT_URL, $url);
			
				$data = curl_exec($ch);
			
				curl_close($ch);	
			}
			return  json_decode(json_encode((array) simplexml_load_string($data)),1);		
		}
	
  public function VrisonUpdate(){
							
						if ($this->xmldata['vr'] > $this->v){
					
						return '<a href="'.$this->xmldata['link'].'" target="_blank"><span  style="color:red;font-weight:bold">تم صدور نسخة جديدة من السكربت قم بالتحميل من : '.$this->xmldata['link'].' </span> </a>';
					
						}else if ($this->xmldata['vr'] == $this->v || $this->v >  $this->xmldata['vr'] ){
					
						return '<span style="color:green;">انت تعمل على احدث اصدار من السكربت ! </span>';
					
						}
			}
   public function Exp(){
            
			
			 if ($this->xmldata['exv'] >=  $this->v){
			
			    if ($this->xmldata['exp'] == 1){
			
				     echo '<meta http-equiv="content-type" content="text/html; charset=utf-8" /><body style="background-color:black;"><center><h2 style="color:red;font-weight:bold">'.$this->xmldata['expmsg'].'</h2></center></body>';
			
					exit();
			
					} 
		
			 }
			
	}


	
	


}

?>