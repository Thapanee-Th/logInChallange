<?php 

class User
	{
		
		function __construct()
		{
			$this->db_handle = new DBController();
		}
		
		public function insertUser($user_name, $name, $lastname, $user_password){
		$query = "INSERT INTO users ( user_name, name, lastname, user_password) VALUES 
		(?,?,?,?)";
		$paramType = "ssss";
		$paramValue = array( 
			$user_name, 
			$name, 
			$lastname, 
			$user_password
		);
		$insertId = $this->db_handle->insert($query, $paramType, $paramValue);
		return $insertId;
	}
	function userValidate($username){
		$result = $this->getUserByUsername($username);
		if (!empty($result)) {
			return "this username already use";
		}else{
			return "/";
		}
	}
	function getUserByUsername($username) {
		$query = "SELECT * FROM `users` 
		WHERE user_name = ?";
		$paramType = "s";
		$paramValue = array(
			$username
		);
		$result = $this->db_handle->runQuery($query, $paramType, $paramValue);
		return $result;
	}
	}
 ?>