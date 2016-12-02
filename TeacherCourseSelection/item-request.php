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
	header('Location: edit-request.php');
}

    
?>

<div class="donor-section">
    <h1 class="menu-title">Item Requests: </h1>
    <a href="add-request.php" class="hlink cat-link">Add New Item Request</a>
    
    <?php

        $query= "SELECT * FROM item_request";
        $stid = mysql_query($query);
      
        echo '<table>
            <tr>
            <td>Name</td>
            <td>Phone</td>
            <td>Address</td>
            <td>Item Name</td>
            <td>Item Amount</td>
            <td>Edit</td>
            <td>Delete</td>
            </tr>';

        while ($row = mysql_fetch_assoc($stid)) {
   
		echo '<form action="edit-request.php" method="POST">
		<tr>
		<input type="hidden" name="irid" value='.$row["request_id"].'  /> 
		<td>'.$row["name"].' <input type="hidden" name="name" value="'.$row["name"].'"/></td>
		<td>'.$row["phone"].'  <input type="hidden" name="phone" value="'.$row["phone"].'"/></td>
		<td>'.$row["address"].'  <input type="hidden" name="address" value="'.$row["address"].'"/></td>
		<td>'.$row["item_name"].'  <input type="hidden" name="i_name" value="'.$row["item_name"].'"/></td>
		<td>'.$row["item_amount"].'  <input type="hidden" name="iamount" value='.$row["item_amount"].' /></td>
		<td><button  id="edit" name="submit">Edit</button></td>
		<td> <button id="delete" onclick="return checkDelete()" name="delete">Delete</button></td>
		</tr></form>';
        }
     echo '</table>';


    ?>
    
</div>

<?php require_once('footer.php')?>
