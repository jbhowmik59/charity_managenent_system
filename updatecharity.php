<?php
	session_start();
	include_once 'config.php';

	
	$conn=mysqli_connect($host,$username,$password,$db_name);
if(!$conn){
 die('Could not Connect My Sql:' .mysqli_error());
}

	
	$charityid = $_POST['charityid']; 
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
	$charitytype = mysqli_real_escape_string($conn,,$charitytype);
	$charitydescription = mysqli_real_escape_string($conn,$charitydescription);	
	$charitydate = mysqli_real_escape_string($conn,$charitydate);
	$charitygoals = mysqli_real_escape_string($conn,$charitygoals);
	$charityfund = mysqli_real_escape_string($conn,$charityfund);	
	$charityaddress = mysqli_real_escape_string($conn,$charityaddress);	
	
	$tbl_name = 'charities';
		
$sql = "UPDATE  $tbl_name SET  `charity_name`='$charityname',`charity_type`='$charitytype',`charity_description`='$charitydescription',`date`='$charitydate',`charity_goal`='$charitygoals',`charity_address`='$charityaddress',`charity_fund`='$charityfund' WHERE charity_id='$charityid'";
	mysqli_query($conn,$sql) or die(mysqli_error());
	echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Charity Created Successfully!! </div>';
   


?>