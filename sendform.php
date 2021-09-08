<?php
	session_start();
	include_once 'config.php';

	$conn=mysqli_connect($host,$username,$password,$db_name);
	if(!$conn){
	 die('Could not Connect My Sql:' .mysqli_error());
	}
	
	$name = $_POST['name']; 
	$email = $_POST['email']; 
	$phone = $_POST['phone']; 
	$message = $_POST['message']; 
	
	$name = stripslashes($name);
	$email = stripslashes($email);
	$phone = stripslashes($phone);
	$message = stripslashes($message);
	$name = mysqli_real_escape_string($conn,$name);
	$email = mysqli_real_escape_string($conn,$email);
	$phone = mysqli_real_escape_string($conn,$phone);
    $message = mysqli_real_escape_string($conn,$message);
    $tbl_name= "contact_form";

	$sql= "INSERT INTO $tbl_name (`form_id`, `name`, `email`,`phone`,`message`) VALUES (NULL,'$name', '$email', '$phone','$message')";
    mysqli_query($conn,$sql) or die(mysqli_error());
    
    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Message Sent Successfully!! </div>';

	
?>
