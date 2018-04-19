<?php
	include_once("../Models/companyclass.php");
	if (empty(session_id())) {
		session_start(); //turn session up if it's down
	}
	$outTabe='';
	$varurl=$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	if (!isset($_SESSION['rank'])&&$varurl!=='localhost/PHPGitProject/Views/loginPage.php') { //knowing if the session var is set and the current URL, i know where to send the user
		header("LOCATION: ../Views/loginPage.php");
	}
	if (isset($_POST['loginBut'])) { //login handler
		$comp= new Company();
		$arrClass=$comp->fillArray(); //get user array from the Company Class
		$i=0; 
		foreach ($arrClass as $worker) { //go through the array to see users
			$i++;
			if ($worker->getUser()===$_POST['username']) { 
				if($worker->getPW()===$_POST['pw']){ //compare user info with form data
					$_SESSION['name']=$_POST['username'];
					$_SESSION['rank']=$worker->getRank();
					header("LOCATION: userPage.php");
					break;
				}
				else{
					$_SESSION['errorPW']="true";
				}
			}
		}
		if($i==count($arrClass)){
			$_SESSION['errorUser']="true";
		}
	}
	if (isset($_POST['sessDest'])){ //session destroy handler
		unset($_SESSION['name']);
		unset($_SESSION['rank']);
		session_destroy();
		header("LOCATION: ../Views/loginPage.php");
	}
	if (isset($_SESSION['rank'])) { //user page handler
		if ($varurl!=='localhost/PHPGitProject/Views/userPage.php') { //redirection in case a session is up and the user tries to go to the login page
			header("LOCATION: userPage.php");
		}
		$comp= new Company();
		$arrClass=$comp->fillArray();
		foreach ($arrClass as $worker) { //go through the array and fill in the table  according to the user's rank
			if ($worker->getRank()==='Administrator' && $_SESSION['rank']==='Administrator') {
				$outTabe.= '<tr style="text-align: center;">
		    	<td>'.$worker->getName().' </td>
		    	<td>'.$worker->getRank().' </td> 
		    	</tr>';
			}
			else if($worker->getRank()==='Director' && $_SESSION['rank']==='Director' || $_SESSION['rank']==='Administrator'){
				$outTabe.= '<tr style="text-align: center;">
		    	<td>'.$worker->getName().' </td>
		    	<td>'.$worker->getRank().' </td> 
		    	</tr>';
			}
			else if($worker->getRank()==='Worker' && $_SESSION['rank']==='Worker' || $_SESSION['rank']!=='Worker' && $worker->getRank()!=='Administrator'){
				$outTabe.= '<tr style="text-align: center;">
		    	<td>'.$worker->getName().' </td>
		    	<td>'.$worker->getRank().' </td> 
		    	</tr>';
			}
			
		}
	}
	if (isset($_SESSION['errorPW'])) { //verification for username error
		$outTabe.="The password for this user is incorrect. Please try again.";
		unset($_SESSION['errorPW']);
	}
	else if (isset($_SESSION['errorUser'])) { //verification for password error
		$outTabe.="User not found. Please try again.";
		unset($_SESSION['errorUser']);
	}

	 
?>