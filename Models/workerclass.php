<?php
	include_once("userclass.php");
	//worker class, child of User that stores the name and rank of each user
	class Worker extends User
	{
		protected $name;
		protected $rank;
		function __construct($name, $rank)
		{
			$this->name=$name;
			$this->rank=$rank;
		}
		public function getName()
  		{
    		return $this -> name;
  		}
  		public function getRank()
  		{
    		return $this -> rank;
  		}
	}
?>