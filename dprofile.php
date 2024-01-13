<?php
require 'file/connection.php';
session_start();
if(!isset($_SESSION['did']))
{
  header('location:login.php');
}
else {
	if(isset($_SESSION['did'])){
		$id=$_SESSION['did'];
		$sql = "SELECT * FROM doner WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
	}
}
?>

<!DOCTYPE html>
<head>
<?php $title="Blood Bank | Doner Profile"; ?>

<title><?php echo $title ?></title>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" type="text/css" href="/donate_css/footer.css">
    <link rel="shortcut icon" type="image/jpeg" href="image/favicon.jpg">
	<link rel="stylesheet" href="CSS/rprofile.css">
    <link rel="shortcut icon" type="image/jpeg" href="image/favicon.jpg">

</head>
<html>

<body>
	<?php require 'header.php'; ?>

	<div class="container cont">

		<?php require 'message.php'; ?>

		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 col-sm-8 mb-5">
				<div class="card">
	
					<div class="card-body">
					   <form action="file/updateprofile.php" method="post">
					   	<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Doner Name</label>
						<input type="text" name="dname" value="<?php echo $row['dname']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Doner Email</label>
						<input type="email" name="demail" value="<?php echo $row['demail']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Doner Password</label>
						<input type="text" name="dpassword" value="<?php echo $row['dpassword']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Doner Phone Number</label>
						<input type="text" name="dphone" value="<?php echo $row['dphone']; ?>" class="form-control mb-3">
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Doner City</label>
						<input type="text" name="dcity" value="<?php echo $row['dcity']; ?>" class="form-control mb-3">
						<input type="submit" name="update" class="btn" value="Update">
					   </form>
					</div>
					<a href="index.php" class="text-center">Cancel</a><br>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>