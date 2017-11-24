<?php 
// sử dụng phương thức POST  gửi đến server
	class SendPostToService{
		private $postdata;
		private $json;
		private $result;
		function __construct($url){
			$this->postdata = http_build_query($_POST);
			$options = array('http' =>
			    array(
			        'method'  => 'POST',
			        'header'  => 'Content-type: application/x-www-form-urlencoded',
			        'content' => $this->postdata
			    )
  			);
  			$context = stream_context_create($options);
  			$this->json = file_get_contents($url, false, $context);
  			$this->result = json_decode($this->json,true);
		}
		public function getResult(){
			return $this->result;
		}
	}
?>