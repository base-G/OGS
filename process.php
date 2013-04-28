<?php

spl_autoload_register( function($class) {
    include('classes/' . $class . '.class.php');
});

$login = new Login();


//echo($_SESSION['user_name']);


if ($login->checkForRegisterPage()) {
        include("views/login/sign-in.php#signup");

} else {
	
	 if ($login->isLoggedIn()) {
        #include("views/login/coming-soon.php");
	include("index.html");
        // further stuff here
    } else {
        // not logged in, showing the login form
        include("views/login/sign-in.php");
    }
}





?>

