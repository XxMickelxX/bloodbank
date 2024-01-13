<?php
include "connection.php";
    $reqid=$_GET['reqid'];
	$status = "Confirmed";
	$sql = "update donaterequest SET status = '$status' WHERE reqid = '$reqid'";
    if (mysqli_query($conn, $sql)) {
	$msg="You have Confirmd the request.";
	header("location:../donationrequest.php?msg=".$msg );
    } else {
    $error= "Error changing status: " . mysqli_error($conn);
    header("location:../donationrequest.php?error=".$error );
    }
    mysqli_close($conn);
?>