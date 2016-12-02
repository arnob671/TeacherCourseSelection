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
        add_new_donor();
    }

    function add_new_donor()
    {
        
            $name = mysql_real_escape_string($_POST['name']);
            $address = mysql_real_escape_string($_POST['address']);
            $bg = mysql_real_escape_string($_POST['d_item']);
            $phone = mysql_real_escape_string($_POST['phone']);
            $email = mysql_real_escape_string($_POST['email']);

          
                
            $query = "INSERT INTO donor(d_name, address, donated_item, phone, email) VALUES 
            ( '$name', '$address', '$bg', '$phone', '$email')";

               $result= mysql_query($query);
               
                 
                if(!$result) {
                    echo "Failed !";
                }else {
                    echo "Successfully added New Donor !";
                    header('Location: donor.php');
                }

        
       
    }
?>

<div class="donor-section">
    <h1 class="menu-title">Add New Donor : </h1>
    <a href="donor.php" class="hlink cat-link">Back to Donor List</a>
    
    <form id="add-donor-form" name="donorform" action="add-donor.php" method="post">
       <br>
        <p class="form-text">Donor Name : </p>
        <input name="name" class="form-field" type="text" placeholder="Name" required>
        
        <p class="form-text">Address : </p>
        <textarea name="address" id="textarea" class="form-field" cols="20" rows="5" placeholder="Address"></textarea>
        
        
        <p id="pcat" class="form-text">Item Name : </p> 
		<input name="d_item" id="textarea" class="form-field"   placeholder="Donated Item" required></input>
        
             
        <p class="form-text">Phone : </p>
        <input name="phone" class="form-field" type="phone" placeholder="Phone">
        
        <p class="form-text">Email : </p>
        <input name="email" class="form-field" type="email" placeholder="Email">
        
        <br>
        <input type="submit" name="submit" id="submit" value="Add New Donor" class="form-field">
        
    </form>
</div>


<?php require_once('footer.php')?>
