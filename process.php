<?php

// import the config file
include_once(__DIR__."/config.php");

?>
<?php

spl_autoload_register( function($class) {
    include('classes/' . $class . '.class.php');
});

$login = new Login($dbHost, $dbUser, $dbPass, $dbName);

if ($login->checkForRegisterPage()) {
        include("views/login/sign-in.php#signup");

} else {
	
	 if ($login->isLoggedIn()) {
        #include("views/login/coming-soon.php");
	include("views/login/user.php");
        // further stuff here
    } else {
        // not logged in, showing the login form
        include("views/login/sign-in.php");
    }
}





?>

