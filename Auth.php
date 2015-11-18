<?php

require_once 'Log.php';

class Auth
{
	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';


	public static function attempt($username, $password)
	{
		if($username == 'Guest' && password_verify($password, self::$password)){
			$_SESSION['LOGGED_IN_USER'] = $username;
			return true;
		}
		return false;
	}

	public static function check()
	{
		if(isset($_SESSION['LOGGED_IN_USER'])) {
			return true;
		}
		return false;
	}

	public static function user()
	{
		return $_SESSION['LOGGED_IN_USER'];
	}

	public static function logout()
	{
		$_SESSION = array();

	    if (ini_get("session.use_cookies")) {
	        $params = session_get_cookie_params();
	        setcookie(session_name(), '', time() - 42000,
	            $params["path"], $params["domain"],
	            $params["secure"], $params["httponly"]
	        );
	    }

    	session_destroy();
	}
}

?>