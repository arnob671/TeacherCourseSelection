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
        add_new_request();
    }

    function add_new_request()
    {
		$irid= $_SESSION['irid'];
        $name = mysql_real_escape_string($_POST['name']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$address = mysql_real_escape_string($_POST['address']);
		$i_name = mysql_real_escape_string($_POST['i_name']);
		$iamount = mysql_real_escape_string($_POST['iamount']);
		
		
 $query = "update item_request set name ='$name', item_name ='$i_name', item_amount ='$iamount', address ='$address', phone ='$phone' where request_id=$irid ";

              
                $result = mysql_query($query);
                
                if($result) {
                   ?>
			 <script>alert('Item Request Updated');</script>
		 <?php  Header('Location: item-request.php');
                }else {
                   echo "Failed ! ". mysql_error();
                    
                } 

        
    }
	
	if(isset($_POST['delete']))
	{
		$irid = mysql_real_escape_string($_SESSION['irid']);
		 $query = "DELETE from item_request where request_id='$irid'";
		 $run = mysql_query($query);
		 if($run)
		 {?>
			 <script>alert('Request Deleted');</script>
		 <?php Header('Location: item-request.php');
		 }
		 else echo "Operation Failed: ". mysql_error();
	}
?>



<div class="donor-section">
    <h1 class="menu-title">Edit Requests: </h1>
    <a href="item-request.php" class="hlink cat-link">Back to Request List</a>
    
        <form id="add-donor-form"  action="" method="POST">
		 <?php $_SESSION['irid']=$_POST['irid'] ?>
       <br/>
        <p class="form-text">Name : </p>
        <input required name="name" class="form-field" type="text" placeholder="Name" value="<?php echo mysql_real_escape_string($_POST['name']); ?>"/>
        
        <p class="form-text">Phone : </p>
        <input required name="phone" class="form-field" type="text" placeholder="Phone" value="<?php echo mysql_real_escape_string($_POST['phone']);?>"/>
        
        <p id="pcat" class="form-text">Item Name : </p>
           <input required name="i_name" class="form-field" type="text" placeholder="Item Name" value="<?php echo mysql_real_escape_string($_POST['i_name']);?>"  required/>
        
        <p class="form-text">Address : </p>
        <textarea   name="address" id="textarea" class="form-field" cols="30" rows="2" placeholder="Address"><?php echo mysql_real_escape_string($_POST['address']);?></textarea>
        
        <p class="form-text">Item Amount : </p>
        <input name="iamount" class="form-field" type="text" placeholder="ITEM Amount" value="<?php echo mysql_real_escape_string($_POST['iamount']);?>"/>
        
        <br>
        <input type="submit" name="edit" id="edit" value="Update Request"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" name="delete" id="delete" value="Delete Request"/>
        
    </form>
</div>

 


<?php require_once('footer.php')?>
