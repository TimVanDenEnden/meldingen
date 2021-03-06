<?php

class Registration {

    public $errors = array();
    public $messages = array();

    public function __construct()
    {
        
    }
	
	public function register() {
		$this->reset();
		if (isset($_POST["register"])) {
            $this->registerNewUser();
        }
	}
	
	private function reset() {
		$errors = array();
		$messages = array();
	}

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    private function registerNewUser()
    {
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Empty Username";
			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
        } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $this->errors[] = "Empty Password";
			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $this->errors[] = "Password and password repeat are not the same";
			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $this->errors[] = "Password has a minimum length of 6 characters";
			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $this->errors[] = "Username cannot be shorter than 2 or longer than 64 characters";
			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            $this->errors[] = "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
        } elseif (empty($_POST['user_email'])) {
            $this->errors[] = "Email cannot be empty";
			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
        } elseif (strlen($_POST['user_email']) > 64) {
            $this->errors[] = "Email cannot be longer than 64 characters";
			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Your email address is not in a valid email format";
			header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
        } elseif (!empty($_POST['user_name'])
            && strlen($_POST['user_name']) <= 64
            && strlen($_POST['user_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
            && !empty($_POST['user_email'])
            && strlen($_POST['user_email']) <= 64
            && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
        ) {
            // change character set to utf8 and check it
            if (!APP::getMysqli()->set_charset("utf8")) {
                $this->errors[] = APP::getMysqli()->error;
            }

            // if no connection errors (= working database connection)
            if (!APP::getMysqli()->connect_errno) {

                // escaping, additionally removing everything that could be (html/javascript-) code
                $user_name = APP::getMysqli()->real_escape_string(strip_tags($_POST['user_name'], ENT_QUOTES));
                $user_email = APP::getMysqli()->real_escape_string(strip_tags($_POST['user_email'], ENT_QUOTES));

                $user_password = $_POST['user_password_new'];

                // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
                $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

                // check if user or email address already exists
                $sql = "SELECT * FROM "._DB_PREFIX."login_users WHERE user_name = ? OR user_email = ?";

                $stmt = APP::getMysqli()->prepare($sql);

                /* bind parameters for markers */
                $stmt->bind_param("ss", $user_name, $user_email);
				$stmt->execute();

                $query_check_user_name = $stmt->get_result();

                if ($query_check_user_name->num_rows == 1) {
                    $this->errors[] = "Sorry, that username / email address is already taken.";
					header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
                } else {
                    // write new user's data into database
                    $sql = "INSERT INTO "._DB_PREFIX."login_users (user_name, user_password_hash, user_email) VALUES(?, ?, ?);";

                    $stmt = APP::getMysqli()->prepare($sql);

                    /* bind parameters for markers */
                    $stmt->bind_param("sss", $user_name, $user_password_hash, $user_email);
                        
                    $query_new_user_insert = $stmt->execute();

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $this->messages[] = "Your account has been created successfully. You can now log in.";
						header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
                    } else {
                        $this->errors[] = "Sorry, your registration failed. Please go back and try again.";
						header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
                    }
                }
            } else {
                $this->errors[] = "Sorry, no database connection.";
				header($_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error");
            }
        } else {
            $this->errors[] = "An unknown error occurred.";
			header($_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error");
        }
    }
}