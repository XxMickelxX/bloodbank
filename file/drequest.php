<?php
session_start(); 
require 'connection.php';
if(!isset($_SESSION['did']))
{
	header('location:../login.php');
}
else {
	if(isset($_POST['request'])){
		$hid = $_POST['hid'];
		$did = $_SESSION['did'];
		$check_data = mysqli_query($conn, "SELECT reqid FROM donaterequest where hid='$hid' and DonerID='$did'");
		if(mysqli_num_rows($check_data) > 0){
			$error= 'You have already requested for blood sample from this Hospital.';
			header( "location:../BeforeDRequest.php?error=".$error );
}else{
		$sql="INSERT INTO donaterequest (hid, DonerID) VALUES ('$hid', '$did')";
		if ($conn->query($sql) === TRUE) {
			// $msg = 'You have requested for blood group '.$bg.'. Our team will contact you soon.';
			header( "location:../drequest.php?msg=");
		} else {
			$error = "Error: " . $sql . "<br>" . $conn->error;
            header( "location:../BeforeDRequest.php?error=".$error );
		}
		$conn->close();
	}
}
}
?>