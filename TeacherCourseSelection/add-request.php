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
        add_new_request();
    }

    function add_new_request()
    {
        
            $name = mysql_real_escape_string($_POST['name']);
            $phone = mysql_real_escape_string($_POST['phone']);
            $address = mysql_real_escape_string($_POST['address']);
            $i_name = mysql_real_escape_string($_POST['i_name']);
            $iamount = mysql_real_escape_string($_POST['iamount']);
            
              
        $query = "INSERT INTO item_request( name, phone, item_name, address, item_amount) VALUES ('$name', '$phone', '$i_name', '$address', '$iamount')";

                $result = mysql_query($query);
                
                if(!$result) {
                    echo "Failed ! ".mysql_error();
                }else {
                    echo "Successfully added New Item Request !";
                    header('Location: item-request.php');
                }

        
    }
?>

<div class="donor-section">
    <h1 class="menu-title">Add New Requests: </h1>
    <a href="item-request.php" class="hlink cat-link">Back to Request List</a>
    
        <form id="add-donor-form" name="donorform" action="add-request.php" method="post">
       <br>
        <p class="form-text">Name : </p>
        <input name="name" class="form-field" type="text" placeholder="Name" required/>
        
        <p class="form-text">Phone : </p>
        <input name="phone" class="form-field" type="text" placeholder="Phone" required/>
       
        <p id="pcat" class="form-text">Item Name : </p>
             <input name="i_name" class="form-field" type="text" placeholder="Item Name"  required/>
        
        <p class="form-text">Address : </p>
        <textarea name="address" id="textarea" class="form-field" cols="30" rows="2" placeholder="Address" ></textarea>
        
        <p class="form-text">Item Amount : </p>
        <input name="iamount" class="form-field" type="text" placeholder="Item Amount">

        <br>
        <input type="submit" name="submit" id=" " value="Add New Request" class="form-field">
        
    </form>
</div>

<?php require_once('footer.php')?>
