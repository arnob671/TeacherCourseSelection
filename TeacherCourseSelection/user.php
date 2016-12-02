<?php 
require_once 'database.php';
session_start(); 
require_once('header.php');
require_once('sidebar.php');

    if(!$_SESSION['user'])
    {
        header('Location: login2.php');
    }
     if(isset($_POST['edit']))
	 {
		$username = mysql_real_escape_string($_POST['uname']);
		$password = mysql_real_escape_string($_POST['pass']);
		$uid = mysql_real_escape_string($_POST['uid']);
		$query = "UPDATE user_info set username='$username' , password='$password' where user_id=$uid ";
		
		$run = mysql_query($query);
		if($run)
		 {?>
			<script>alert('User Updated');</script>	
	<?php }
	 }
	 
	 if(isset($_POST['delete']))
	 {
		 $username = mysql_real_escape_string($_POST['uname']);
		 $query = "DELETE from user_info where username='$username'";
		 $run = mysql_query($query);
		 if($run)
		 {?>
			 <script>alert('User Deleted');</script>
		 <?php }
		 else echo "Operation Failed: ". mysql_error();
	 }
 
?>

<div class="donor-section">
    <h1 class="menu-title">Admins : </h1>
    <a href="add-user.php" class="hlink cat-link">Add New Admin</a>
    <!--a href="log.php" class="hlink cat-link">Admins Log Report</a-->
    
    <?php

       
       $query = "SELECT * FROM user_info order by user_id ASC";
        $run = mysql_query($query);
    echo '<p>Total admin: '.mysql_num_rows($run).'</p>';
        echo '<table >
            <tr>
            <td>User_ID</td>
            <td>Username</td>
			<td>Password</td>
            <td>Edit</td>
			<td>Delete</td>
            </tr>';

        while ($row = mysql_fetch_assoc($run)) {
            
            echo '<form action="" method="POST"><tr>
			<td>'.$row["user_id"]. '<input type="hidden" name="uid" value=' . $row["user_id"]. '></input></td>
            <td><input class="form-control" type="text" name="uname" value=' . $row["username"]. '></input></td>
			<td><input class="form-control" type="password" name="pass" value=' . $row["password"]. '></input></td>
			<td><button id="edit"  name="edit">Edit</button></td>
             <td><button id="edit" onclick="return checkDelete()" name="delete">Delete</button></td>
            </tr></form>';
        }
     echo '</table>';

    ?>
</div>


<?php require_once('footer.php')?>
