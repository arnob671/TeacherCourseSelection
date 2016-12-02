<?php 
require_once 'database.php';
session_start(); 
require_once('header.php');
require_once('sidebar.php');


    //IF THERE IS NO SESSION VALUE N $USER VARIABLE
    //THE SYSTEM REDIRECTS TO LOGIN PAGE
    if(!$_SESSION['user'])
    {
        header('Location: login2.php');
    }
	
	if(isset($_POST['edit']))
	 {
		$d_id = mysql_real_escape_string($_POST['d_id']);
		$name = mysql_real_escape_string($_POST['d_name']);
		$address = mysql_real_escape_string($_POST['d_address']);
		$donated_item = mysql_real_escape_string($_POST['d_item']);
		$phone = mysql_real_escape_string($_POST['d_phone']);
		$email = mysql_real_escape_string($_POST['d_email']);
		$query = "UPDATE donor set d_name='$name' , address='$address', donated_item='$donated_item', phone='$phone', email='$email' where d_id='$d_id' ";
		
		$run = mysql_query($query);
	 	if($run)
		 {?>
			<script>alert('Donor Updated');</script>	
	<?php }
	 }
	 
	 if(isset($_POST['delete']))
	 {
		 $d_id = mysql_real_escape_string($_POST['d_id']);
		 $query = "DELETE from donor where d_id='$d_id'";
		 $run = mysql_query($query);
		 if($run)
		 {?>
			 <script>alert('Donor Deleted');</script>
		 <?php }
		 else echo "Operation Failed: ". mysql_error();
	 }

    
?>
<style type="text/css">
 
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

    <h1 class="menu-title">Donor : </h1><hr/>
    <a href="add-donor.php" class="hlink cat-link">Add New Donor</a>
    <div class="donor-section">
    <?php

     $query = "SELECT * FROM donor order by d_id ASC";
     $run = mysql_query($query);
        echo '<table>
            <tr>
            <td>Name </td>
            <td>Address </td>
            <td>Donated Item </td>
            <td>Phone </td>
            <td>Email </td>
            <td>Edit</td>
			<td>Delete</td>
            </tr>';

        while ($row = mysql_fetch_assoc($run)) {
			echo '<form action="" method="POST"><tr>
            <input type="hidden" name="d_id" value=' . $row["d_id"]. '></input>
            <td><input name="d_name" value="' .$row["d_name"]. '"></input></td>
            <td><input name="d_address" value="' .$row["address"].'"></input></td>
            <td><input name="d_item" value="'.$row["donated_item"]. '"></input></td>
            <td><input name="d_phone" value="'.$row["phone"].'"></input></td>
            <td><input type="text" name="d_email" value="'.$row["email"].'"> </input></td>
            <td> <button id="edit" type="submit" name="edit">Edit</button></td>
            <td><button id="edit" onclick="return checkDelete()" type="submit" name="delete">Delete</button></td>
            </tr></form>';
            }
        
     echo '</table>';


    ?>
</div>


<?php require_once('footer.php')?>
