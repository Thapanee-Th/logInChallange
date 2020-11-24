<?php 
require_once ("controller/DBController.php");
require_once ("controller/User.php");
require_once ("controller/Login.php");
$action = null;
if (!empty($_GET["action"])) {
	$action = $_GET["action"];
}
if(!isset($_SESSION)) 
					{ 
						session_start();
					}				
switch ($action) {
	case 'login-validate';
	if (isset($_POST)) {
		$login = new Login();
		if ($login->login($_POST['username'], $_POST['password'])) {

			$_SESSION['username'] = $_POST['username'];
			if(!isset($_SESSION)) 
					{ 
						session_start();
					}				

		}else{
			echo "Username or password is incorrect.";
		}
	}
	break;
	case 'user-validate':
		if (isset($_POST)) {
			$user = new User();
			echo $user->userValidate($_POST['username']);
		}
		break;
	case 'logout':
		session_start();
		echo "desstroy";
		if(session_destroy()) {
		header("Location: ./"); // Redirecting To Home Page
		$_SESSION['timeout'] = null;
		}
	break;
	case 'register':
		
		require_once "view/header.html";
		require_once "view/register.php";

	break;
	case 'test':
	require_once "view/header.html";
		require_once "view/test.php";

	break;
	case 'new-user':
	if (isset($_POST)) {
		$login = new Login();
		echo $login->register($_POST);
	}
	break;
	default:
	if(!isset($_SESSION['username'])){
		require_once "view/header.html";
		require_once "view/login.php";
		
		exit(); 
	}else{
		$username = $_SESSION['username'];
		require_once "view/header.html";
		require_once "view/index.php";
	
}
break;
}

 ?>