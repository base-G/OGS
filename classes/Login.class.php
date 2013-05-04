<?php
include("/var/www/include/send.php");


/**
 * class Login
 * 
 * creates db connection, logs in the user, creates session
 * 
 * @author Panique <panique@web.de>
 * @version 1.0
 * @package SimplePHPLogin
 */

class Login {

    protected   $db                     = null;                     // database connection
    private     $logged_in              = false;                    // status of login    
    public      $errors                 = array();                  // collection of error messages
	public      $errors2                = array();                  // collection of error messages

    public      $messages               = array();                  // collection of success / neutral messages

    
    private     $user_name              = "";                       // user's name
    private     $user_email             = "";                       // user's email
	private     $first_name             = "";                       // user's first name
	private     $last_name              = "";                       // user's last name
	private     $city                   = "";                       // user's city
	private     $state                  = "";                       // user's state
	private     $userID                 = "";                       // user's identification number
    private     $user_password          = "";                       // user's password (what comes from POST)
    private     $confirm_password       = "";                       // user's password comfirmation
    private     $user_password_hashed   = "";                       // user's hashed and saltes password
    private     $user_salt              = "";                       // user's personal salt
    private     $user_activated         = 0;                        // user's activation status
	private     $account_type           = "";                       // user's account type
    
    
    public function __construct() {
        
        include_once("/var/www/config/db.php");                  // include database constants        
        
        if ($this->checkDatabase()) {                   // check for database connection
            
            session_start();                            // create session


            if ($this->logout()) {                      // checking for logout, performing login            
                // do nothing, you are logged out now   // this if construction just exists to prevent unnecessary method calls
            } elseif ($this->loginWithSessionData()) {
                $this->logged_in = true;
            } elseif ($this->loginWithPostData()) {
                $this->logged_in = true;
            }        

            $this->registerNewUser();                   // check for registration data            
        } else {
            $this->errors[] = "No MySQL connection.";
			$this->errors2[] = "No MySQL connection.";

        }        
    }    
    
    
    private function checkDatabase() {
        
        if (!$this->db) {                                                       // does db connection exist ?
            $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);         // create db connection     
            return (!$this->db->connect_errno ? true : false);                  // if no connect errors return true else false
        }
        
    }
    

    private function loginWithSessionData() {
        
        if (!empty($_SESSION['user_email']) && ($_SESSION['user_logged_in']==1)) {
            return true;
        } else {
            return false;
        }
        
    }
    

    private function loginWithPostData() {
        
        if(isset($_POST["login"]) && !empty($_POST['user_email']) && !empty($_POST['user_password'])) {
            $this->user_email = $this->db->real_escape_string($_POST['user_email']);            
            $checklogin = $this->db->query("SELECT user_id, AccountType, user_first_name, user_last_name, user_email, user_password, user_salt, user_activated FROM Accounts WHERE user_email = '".$this->user_email."';");

            
            if($checklogin->num_rows == 1) {
                $result_row = $checklogin->fetch_object();   
				
                if (hash("sha256", $_POST["user_password"].$result_row->user_salt) == $result_row->user_password) {
                    //$_SESSION['user_name'] = $result_row->user_name;
                    $_SESSION['user_email'] = $result_row->user_email;
					$_SESSION['user_id'] = $result_row->user_id;

	                	if($result_row->user_activated == 0){
							$this->errors[] = "User account is not activated. Please activate account and try again.";
							//$this->errors2[] = "User account is not activated. Please activate account and try again.";

							return false;
						}
						
					
                    $_SESSION['user_logged_in'] = 1;                    
                    return true;                    
                } else {
                    $this->errors[] = "Password was wrong.";
				    //$this->errors2[] = "Password was wrong.";

                    return false;                    
                }                
            } else {                
                $this->errors[] = "This user does not exist.";
				//$this->errors2[] = "This user does not exist.";

                return false;
            }
        } elseif (isset($_POST["login"]) && !empty($_POST['user_email']) && empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
			//$this->errors2[] = "Password field was empty.";

        }      
        
    }
    
    
    public function logout() {  
        
        if (isset($_GET["action"]) && $_GET["action"]=="logout") {
            $_SESSION = array();
            session_destroy();
            return true;
        }        
    }
    
    
    public function isLoggedIn() {
        
        return $this->logged_in;
        
    }
    
    
    public function checkForRegisterPage() {
        
        if (isset($_GET["action"]) && $_GET["action"]=="register") {
            
            return true;
            
        } else {
            
            return false;
            
        }
        
    }


    private function registerNewUser() {

        if(isset($_POST["register"]) && !empty($_POST['user_password']) && !empty($_POST['user_email'])) {

                //$this->user_name = $this->db->real_escape_string($_POST['user_name']);
                $this->user_password = $this->db->real_escape_string($_POST['user_password']);
                $this->confirm_password = $this->db->real_escape_string($_POST['confirm_password']);
                $this->user_email = $this->db->real_escape_string($_POST['user_email']);
				$this->first_name = $this->db->real_escape_string($_POST['first_name']);
                $this->last_name = $this->db->real_escape_string($_POST['last_name']);
				$this->account_type = $this->db->real_escape_string($_POST['account_type']);

               
                
                // generate 64 char long random string "salt", a string to "encrypt" the password hash
                // this is a basic salt, you might replace this with a more advanced function
                // @see http://en.wikipedia.org/wiki/Salt_(cryptography)
                $this->user_salt = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 64);
                // double md5 hash the plain password + salt
                //$user_password_hashed = md5(md5($_POST['user_password'].$user_salt));
                
                // hash the combined string of password+salt via the sha256 algorithm, result is a 64 char string                 
                $this->user_password_hashed = hash("sha256", $this->user_password.$this->user_salt);
                $this->user_activated = 0;
				$activationKey =  mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();

                

                //$query_check_user_name = $this->db->query("SELECT * FROM Accounts WHERE user_name = '".$this->user_name."'");
                $query_check_user_email = $this->db->query("SELECT * FROM Accounts WHERE user_email = '".$this->user_email."'");
               


              /*  if($query_check_user_name->num_rows == 1)
                {
                    //$this->errors[] = "<p>Sorry, that username is taken. Please go back and try again.</p>";
					$this->errors2[] = "<p>Sorry, that username is taken. Please go back and try again.</p>";

                }
				else */if($query_check_user_email->num_rows == 1)
				{
					//$this->errors[] = "<p>Sorry, that email has already been used. Please go back and try again.</p>";
					$this->errors2[] = "<p>Sorry, that email has already been used. Please go back and try again.</p>";

				}else if($this->confirm_password != $this->user_password)
				{
					//$this->errors[] = "<p>Sorry, the passwords do not match. Please go back and try again.</p>";
					$this->errors2[] = "<p>Sorry, the passwords do not match. Please go back and try again.</p>";

					
                }else
                {
                    $query_new_user_insert = $this->db->query("INSERT INTO Accounts (AccountType, user_first_name, user_last_name, user_email, user_password, user_salt, user_activated, activationkey) VALUES('".$this->account_type."', '".$this->first_name."', '".$this->last_name."', '".$this->user_email."', '".$this->user_password_hashed."', '".$this->user_salt."', '".$this->user_activated."', '".$activationKey."')");
					
							
							
}
                    if($query_new_user_insert)
                    {
						
						
					

            
			
					
					
				
					
                        $this->messages[] = "<p>Your account was successfully created. An email has been sent with an activation key. Please <a href='process.php'>click here to login</a>.</p>";
						
						$subject = "base-G Registration";

						$email_message = "Welcome to base-G!\r\r You can complete registration by clicking the following link:\rhttp://baseg.codemelody.com/verify.php?$activationKey\r\rIf this is an error, ignore this email.\r\rRegards,\r base-G";

						

					        sendmail($this->user_email,$subject,$email_message);
						}
						

                    }
                    else
                    {
                        
						
						if(isset($_POST["register"])) {
	//$this->errors[] = "<p>Sorry, your registration failed. Please go back and try again.</p>";
	$this->errors2[] = "<p>Sorry, your registration failed. Please go back and try again.</p>";

	
			        //$this->errors[] = "<p>Sorry, you did not enter the required information. Please go back and try again.</p>";
					$this->errors2[] = "<p>Sorry, you did not enter the required information. Please go back and try again.</p>";

                

        }
                    }
                 


	}
}
 


