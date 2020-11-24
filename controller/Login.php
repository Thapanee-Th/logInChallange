<?php 

require_once ("DBController.php");
	
	class login extends User
	{
		
		function __construct()
		{
			$this->db_handle = new DBController();
			$this->pass = new Password();
		}
		function register($data){
			$password = $this->pass->passwordHash($data['password']);
			$this->insertUser($data['username'], $data['name'], $data['lastname'], $password);

		}
		function login($username, $password){
			if ($this->pass->verifyPassword($username, $password)===true) {
				$result = $this->getUserByUsername($username);
				if (!empty($result)) {	
					return true;
				}
			}else{
				return false;
			}
		}
	}

	class Password extends User{
	function __construct()
	{
		$this->db_handle = new DBController();
		$this->user = new User();
		$this->new = [
			'options' => ['cost' => 12],
			'algo' => PASSWORD_DEFAULT,
			'hash' => null
		];
	}
	function passwordHash($password){
		$hashed_password = password_hash($password, PASSWORD_BCRYPT, $this->new['options']);
		return $hashed_password;
	}
	function verifyPassword($username, $password){
		$result = $this->user->getUserByUsername($username);
		$boolean = false;
		if (!empty($result )) {
			$userpassword = $result[0]['user_password'];
			if (password_verify($password, $userpassword)) {
				$boolean = true;
				if (true === password_needs_rehash($userpassword, $this->new['algo'], $this->new['options'])) {
        		//rehash/store plain-text password using new hash
					$newHash = password_hash($password, $this->new['algo'], $this->new['options']);
					$this->user->updatePassword($username, $newHash);
				}
			}			
		}
		return $boolean;		
	}
}
	
?>