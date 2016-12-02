<?php 

require_once 'database.php';

session_start(); 

    //IF THE PREVIOUS SESSION VALUE REMAINS, 
    //THEN USER WILL BE REDIRECTED TO HOMEPAGE
    if(!empty($_SESSION['user']))
    {
        header('Location: home.php');
    }
    //SUBMIT BUTTON WILL RUN THE LOGIN FUNCTION
    if(isset($_POST['submit']))
    {
        login();
    }

function login()
{
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $username =   mysql_real_escape_string($_POST['username']);
        $password =  mysql_real_escape_string($_POST['password']);
        
        $stid = "SELECT * FROM user_info WHERE username='$username' AND password='$password' ";
        $result = @mysql_query($stid) or die("Could not process". mysql_error() );
        
        $row = mysql_fetch_array($result);
		$count = mysql_num_rows($result);

        // if the credentials are correct then user is redirected to homepage
        //AND IMPORTANTLY $_SESSION['user'] = $username;
        //SESSION VARIABLE USER IS SET TO THE NAME OF THE USER
        if($count!=0)
        {
            $_SESSION['user'] = $username;
            header('Location: home.php');
        }
        else {
            echo '<p id="failed">Login Failed !</p>';
        }

        
    }else {
        echo '<p id="failed">Fill All The Information</p>';
    }
}

?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]>-->
<!--[if !IE]> <!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<style type="text/css">
	body{
		text-align: center;
		padding-top: 12%;
		width: 90%;
	}
	input{
		height: 25px;
		border: 1px solid blue; /* some kind of blue border */

    /* other CSS styles */

    /* round the corners */
    -webkit-border-radius: 4px;
       -moz-border-radius: 4px;
            border-radius: 4px;


    
		
	}
	input:hover{
		/* make it glow! */
    -webkit-box-shadow: 0px 0px 4px #4195fc;
       -moz-box-shadow: 0px 0px 4px #4195fc;
            box-shadow: 0px 0px 4px #4195fc; 
	}
	input:focus{
		-webkit-box-shadow: 0px 0px 16px #CC0000;
       -moz-box-shadow: 0px 0px 16px #CC0000;
            box-shadow: 0px 0px 16px #CC0000; 
	}
	</style>
	

</head>

<body>

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <div class="logo"><h1>Online Donation Management System</h1></div>
        <div class=" ">
           <form action="login2.php" method="post" name="loginform" id="loginform" >
                
                <input name="username" type="text" value="" placeholder="Username" id="username" /> &nbsp;&nbsp;&nbsp;
                <input name="password" type="password" value="" placeholder="Password" id="password" />&nbsp;&nbsp;&nbsp;
                <input id="login_submit" type="submit" name="submit" value="Login">
            </form>
        </div>

</body> 

</html>

