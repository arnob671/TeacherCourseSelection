<?php 
require_once 'database.php';
session_start();
require_once('header.php');
require_once('sidebar.php');


    if(!$_SESSION['user'])
    {
        header('Location: login2.php');
    }

    if(isset($_POST['submit']))
    {
        add_new_user();
    }

    function add_new_user()
    {
        if(!empty($_POST['name']) && !empty($_POST['password'])) 
        {
            $name = $_POST['name'];
            $password = $_POST['password'];
                
            $query = "INSERT INTO user_info(username,password) VALUES ( '$name', '$password')";

             $run = mysql_query($query);
                
                if(!$run) {
                    ?>
					<script>alert('Failed\ntry with different Username');</script>
					<?php
                }
				else {
                    ?><script>alert('Operation Completed');</script><?php 
                    header('Location: user.php');
                }

        }else {
            echo "<p id=\"warning\">Fill All The Information !</p>";
        }
    }
?>

<div class="donor-section">
    <h1 class="menu-title">Add New User : </h1>
    <a href="user.php" class="hlink cat-link">Back to User List</a>
    
    <form id="add-donor-form" name="donorform" action="add-user.php" method="post">
       <br>
        <p class="form-text">User Name : </p>
        <input name="name" class="form-field" type="text" placeholder="Name">
        
        <p class="form-text">Password : </p>
        <input name="password" class="form-field" type="password" placeholder="Password">
        
        
        <br>
        <input type="submit" name="submit" id="submit" value="Add New User" class="form-field">
        
    </form>
</div>


<?php require_once('footer.php')?>
