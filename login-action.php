<?php

require_once 'inc/conf.php';
require_once 'inc/functions.php';

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['user_id'] ))
{
    $message = 'Users is already logged in';
}


/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['username'], $_POST['password']))
{
    $message = 'Please enter a valid username and password';
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 4)
{
    $message = 'Incorrect Length for Username';
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
/*** check the password has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['password']) != true)
{
        /*** if there is no match ***/
        $message = "Password must be alpha numeric";
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/
    $password = sha1( $password );

    try
    {
        $dbh = new PDO("mysql:host=".SQL_HOST.";dbname=".SQL_DB, SQL_USER, SQL_PWD);

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT * FROM user_login 
                    JOIN user_types ON user_login.user_type = user_types.type_id
                    WHERE username = :username AND password = :password");

        /*** bind the parameters ***/
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
		
        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
		//print_r($stmt->fetchAll());
        $row = $stmt->fetch();
        $user_id = $row['user_id'];
		$pageType = $row['type_page'];
		

        /*** if we have no result then fail boat ***/
        if($user_id == false)
        {
                $message = 'Login Failed';
				$_SESSION['login_error'] = "Username or Password incorrect. Please enter your details in again";
				redirect('index.php');
        }
        /*** if we do have a result, all is well ***/
        else
        {
                // id of specific table depending on user type
                $_SESSION['user_id'] = $user_id;
                
                // user name
                $_SESSION['user_info'] = $row;

                // type of user - see table 'types'
                //$_SESSION['type_name'] = $row['type_name'];

                /*** tell the user we are logged in ***/
                $message = 'You are now logged in.';

                // todo: switch depending on type of user
                //redirect('admin-managers.php');
				//echo $pageType.'_homepage.php';
				redirect($pageType);
        }
    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later '.$e->getMessage();
    }
}
?>

<html>
<head>
<title>PHPRO Login</title>
</head>
<body>
<p><?php echo $message; ?>
</body>
</html>