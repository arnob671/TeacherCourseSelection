<?php 
require_once 'database.php';
session_start(); 
require_once('header.php');
require_once('sidebar.php');
    if(!$_SESSION['user'])
    {
        header('Location: login2.php');
    }


    //User or Admin

        $stid = "SELECT * FROM user_info";
		$run = mysql_query($stid);
		 
		
		while($row= mysql_fetch_assoc($run))
		{
			$arr[]= $row['username'];
		}	

		for($i=0;$i< $count=mysql_num_rows($run);$i++)
		{
			$_SESSION["arr[$i]"]= $arr[$i];
		}
		$_SESSION["num_rows"]= mysql_num_rows($run);
   

   
   
?>




<div id="dashboard-section">
    <ul id="dashboardlist">
	<!--li><table style="background: lightgrey; ">
		<tr ><td><p>Total Admins : </p></td></tr>
		<tr>
		<?php  
		for($i=0 ;$i< $_SESSION['num_rows'] ; $i++)
		{
		if(($i%2)==0){	?> <td style="background:#efefef none repeat scroll 0 0;font-weight: bold; font-size: 18px;" class="dashboardlist"><?php  echo ($i+1) .") ".$_SESSION["arr[$i]"]  ;?></td><?php } 
		}?>
		</tr>
		<tr>
		<?php 
		for($i=0 ;$i< $_SESSION['num_rows'] ; $i++)
		{
		if(($i%2)==1){	?> <td style="background:#d3d6be none repeat scroll 0 0; font-weight: bold; font-size: 18px;" class="dashboardlist"><?php  echo ($i+1) .") ".$_SESSION["arr[$i]"]  ;?></td><?php }
		}
		?>
		</tr>
		</table>
	</li-->
        <!--li>
            <p>Donor Number : <span class="dash"><?php echo $donor_count; ?></span> </p>
        </li>
        <li>
            <p>Total Donations : <span class="dash"><?php echo $item_count; ?></span></p>
        </li>
        <li>
            <p>Total Requests : <span class="dash"><?php echo $item_req; ?></span></p>
        </li-->
        
        <li><p>Total Admins : <?php echo ($_SESSION['num_rows'] ); ?></p><hr/>
			 <?php 
			for($i=0 ;$i< $_SESSION['num_rows'] ; $i++)
			{
				if($i%2==0)
				{?><span style="  line-height:60px; padding : 15px;   font-size: 20px;background: lightgrey;"><?php
					echo ($i+1) .") ".$_SESSION["arr[$i]"];?></span><?php
				}
				else
				{ ?><span style=" line-height:60px; padding : 15px;    font-size: 20px;background: grey;"><?php
					echo ($i+1) .") ".$_SESSION["arr[$i]"] ;
?></span><?php 					
				}
				if(($i+1)%5==0){echo "<br/>" ;}
			}  
			 
		?>
			</li><br/><br/>
         <li>
		 <p>Donor Number : <span class="dash"><?php $query = "SELECT * FROM donor";
     $run = mysql_query($query); echo mysql_num_rows($run) ;?></span> </p>
	 <?php echo '<table>
            <tr>
            <td>Name </td>
            <td>Address </td>
            <td>Donated Item </td>
            <td>Phone </td>
            <td>Email </td>
            </tr>';

        while ($row = mysql_fetch_assoc($run)) {
			echo '<tr>
            <td>' .$row["d_name"]. '</td>
            <td>' .$row["address"].'</td>
            <td>'.$row["donated_item"]. '</td>
            <td>'.$row["phone"].'</td>
            <td>'.$row["email"].'</td>
            </tr>';
            }
        
     echo '</table>';
	 ?>
		 </li><br/><br/>
		 <li>
		 <p>Donation Requests: <span class="dash"><?php $query = "SELECT * FROM item_request";
     $run = mysql_query($query); echo mysql_num_rows($run) ;?></span></p>
	 <?php
	 echo '<table>
            <tr>
            <td>Name</td>
            <td>Phone</td>
            <td>Address</td>
            <td>Item Name</td>
            <td>Item Amount</td>
            </tr>';

        while ($row = mysql_fetch_assoc($run)) {
   
		echo '<tr>
		<td>'.$row["name"].'</td>
		<td>'.$row["phone"].'</td>
		<td>'.$row["address"].'</td>
		<td>'.$row["item_name"].' </td>
		<td>'.$row["item_amount"].'</td>
		</tr>';
        }
     echo '</table>';
	 ?>
		 </li>
    </ul>
    
    <!--div class="dashboard-links">
	<a href="add-donor.php" class="hlink">Add New Donor</a>
    <a href="add-request.php" class="hlink">Add New Request</a>
	<a href="add-user.php" class="hlink">Add New Admin</a>
            
          
    </div-->
            
</div>

<?php require_once('footer.php');
?>
