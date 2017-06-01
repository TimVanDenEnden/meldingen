<?php

class Login {

	private $db_connection = null;
	public $errors = array();
	public $messages = array();
	
	public function __construct()
	{
		session_start();
	
		// check the possible login actions:
		// if user tried to log out (happen when user clicks logout button)
		if (isset($_GET["logout"])) {
			$this->doLogout();
		}
		// login via post data (if user just submitted a login form)
		elseif (isset($_POST["login"])) {
			$this->dologinWithPostData();
		}
	}
	
	/**
	* log in with post data
	*/
	private function dologinWithPostData()
	{
		// check login form contents
		if (empty($_POST['user_name'])) {
			$this->errors[] = "Username field was empty.";
		} elseif (empty($_POST['user_password'])) {
			$this->errors[] = "Password field was empty.";
		} elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
	
			// change character set to utf8 and check it
			if (!APP::getMysqli()->set_charset("utf8")) {
				$this->errors[] = APP::getMysqli()->error;
			}
	
			// if no connection errors (= working database connection)
			if (!APP::getMysqli()->connect_errno) {
	
				// escape the POST stuff
				$user_name = APP::getMysqli()->real_escape_string($_POST['user_name']);
	
				// database query, getting all the info of the selected user (allows login via email address in the
				// username field)
				$sql = "SELECT user_name, user_email, user_password_hash
						FROM users
						WHERE user_name = ? OR user_email = ?";


				$stmt = APP::getMysqli()->prepare($sql);

    			/* bind parameters for markers */
    			$stmt->bind_param("ss", $user_name, $user_email);
    			$stmt->execute();

    			/* execute query */
				$result_of_login_check = $stmt->get_result();

				// if this user exists
				if ($result_of_login_check->num_rows == 1) {
	
					// get result row (as an object)
					$result_row = $result_of_login_check->fetch_object();
	
					// using PHP 5.5's password_verify() function to check if the provided password fits
					// the hash of that user's password
					if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {
	
						// write user data into PHP SESSION (a file on your server)
						$_SESSION['user_name'] = $result_row->user_name;
						$_SESSION['user_email'] = $result_row->user_email;
						$_SESSION['user_login_status'] = 1;
	
					} else {
						$this->errors[] = "Wrong password. Try again.";
					}
				} else {
					$this->errors[] = "This user does not exist.";
				}
			} else {
				$this->errors[] = "Database connection problem.";
			}
		}
	}
	
	/**
	* perform the logout
	*/
	public function doLogout()
	{
		// delete the session of the user
		$_SESSION = array();
		session_destroy();
		// return a little feeedback message
		$this->messages[] = "You have been logged out.";
	
	}
	
	/**
	* simply return the current state of the user's login
	* @return boolean user's login status
	*/
	public function isUserLoggedIn()
	{
		if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
			return true;
		}
		// default return
		return false;
	}
}