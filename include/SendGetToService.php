<?php 
// sử dụng phương thức GET  gửi đến server
	class SendGetToService{
		private $result;
		private $json;
		function __construct($url){
			$this->json = file_get_contents($url);
			$this->result = json_decode($this->json,true);
		}
		public function getResult(){
			return $this->result;
		}
	}
?>