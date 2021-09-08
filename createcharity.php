<?php
	session_start();
	include_once 'config.php';

	$conn=mysqli_connect($host,$username,$password,$db_name);
if(!$conn){
 die('Could not Connect My Sql:' .mysqli_error());
}

	
	$charityname = $_POST['charityname']; 
	$charitytype = $_POST['charitytype']; 
	$charitydescription = $_POST['charitydescription']; 
	$charitydate = $_POST['charitydate']; 
    $charitygoals = $_POST['charitygoals']; 
    $charityfund = $_POST['charityfund']; 
    $charityaddress = $_POST['charityaddress']; 

	$charityname = stripslashes($charityname);
	$charitytype = stripslashes($charitytype);
	$charitydescription = stripslashes($charitydescription);	
	$charitydate = stripslashes($charitydate);
	$charitygoals = stripslashes($charitygoals);
	$charityfund = stripslashes($charityfund);	
	$charityaddress = stripslashes($charityaddress);	
	$charityname = mysqli_real_escape_string($conn,$charityname);
	$charitytype = mysqli_real_escape_string($conn,$charitytype);
	$charitydescription = mysqli_real_escape_string($conn,$charitydescription);	
	$charitydate = mysqli_real_escape_string($conn,$charitydate);
	$charitygoals = mysqli_real_escape_string($conn,$charitygoals);
	$charityfund = mysqli_real_escape_string($conn,$charityfund);	
	$charityaddress = mysqli_real_escape_string($conn,$charityaddress);	
	
	$tbl_name = 'charities';
		$userid = $_SESSION['userid'];
	$sql = "INSERT INTO $tbl_name (`charity_id`, `user_id`, `charity_name`,`charity_type`,`charity_description`,`date`,`charity_goal`,`charity_fund`,`charity_address`,`date_created`) VALUES (NULL,'$userid', '$charityname','$charitytype','$charitydescription','$charitydate','$charitygoals','$charityfund','$charityaddress',NULL)";
	mysqli_query($conn,$sql) or die(mysqli_error());
	echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Charity Created Successfully!! </div>';
   


?>
