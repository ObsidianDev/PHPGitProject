<?php 	
	//user class, stores username and password
	class User
	{
		protected $username;
		protected $pw;
		
		function __construct($username,$pw)
		{
			$this->username = $username;
			$this->pw=$pw;
		}
		public function getUser()
  		{
    		return $this -> username;
  		}
  		public function getPW()
  		{
    		return $this -> pw;
  		}
  		public function setUser($username)
  		{
    		$this->username = $username;
  		}
  		public function setPW($pw)
  		{
    		$this->pw = $pw;
  		}
	}
	
?>