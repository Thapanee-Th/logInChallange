<?php 
require_once ("controller/DBController.php");
require_once ("controller/User.php");
require_once ("controller/Login.php");
$action = null;
if (!empty($_GET["action"])) {
	$action = $_GET["action"];
}

switch ($action) {
	case 'login-validate';
	if (isset($_POST)) {
		$login = new Login();
			echo $login->login($_POST['username'], $_POST['password']);
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
		if(session_destroy()) {
		header("Location: ./"); // Redirecting To Home Page
		$_SESSION['timeout'] = null;
	}
	break;
	case 'register':
		require_once "view/register.php";
	break;
	case 'new-user':
	if (isset($_POST)) {
		$login = new Login();
		echo $login->register($_POST);
	}
	break;
	default:
	if(!isset($_SESSION['username'])){
		require_once "view/login.php";
		exit(); 
	}else{
		$username = $_SESSION['username'];
		require_once "view/index.php";
}
		break;
}

 ?>