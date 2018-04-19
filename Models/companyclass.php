<?php
	include_once("userclass.php");
	include_once("workerclass.php");
	//company class that stores the info of all workers into an array that is exported for use in the controller
	class Company
	{
		public $arrWorkers;

		function __construct()
		{
		}

		function fillArray(){ // this function is used to push static users into an array to be used in the controller
			$arrWorkers=array();
			$worker1= new Worker("Anthony","Administrator");
			$worker1->setUser("Anton");
			$worker1->setPW("123");
			$worker2= new Worker("Fred","Worker");
			$worker2->setUser("Fred");
			$worker2->setPW("1234");
			$worker3= new Worker("Lucy","Director");
			$worker3->setUser("Lucy");
			$worker3->setPW("12345");
			array_push($arrWorkers, $worker1, $worker3, $worker2);
			return $arrWorkers;
		}
	}
?>