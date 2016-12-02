
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]>-->
<!--[if !IE]> <!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>ODMS</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
	

	<!-- Javascript -->
	 <script src="js/jquery.js"></script>  
	  <script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>

</head>

<body>
<div class="head-section">
    <h1 id="heading"><center>Online Donation Management System</center></h1>
</div>

<div id="mini-section" class="clearfix">
    <ul class="header-list">
	<li>
	<a href="add-donor.php" class=" ">Add New Donor</a></li>
    <li><a href="add-request.php" class=" ">Add New Request</a></li>
	<li><a href="add-user.php" class=" ">Add New Admin</a>
	</li>
        <li style="width: 200px;color:white;"> Logged in as <span style=" font-size: 16px "><?php echo $_SESSION['user']; ?></span></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

