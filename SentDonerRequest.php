<?php 
require 'file/connection.php'; 
session_start();
  if(!isset($_SESSION['did']))
  {
  header('location:login.php');
  }
  else {
    $did = $_SESSION['did'];
    $sql = "select donaterequest.*, doner.* from donaterequest, doner where DonerID='$did' && donaterequest.DonerID=doner.id";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content=" " />
    <meta name="keywords" content="blood bank, Donate blood, , Doner" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;400&display=swap" rel="stylesheet">
    <title>Blood Bank</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="css/sentrequest.css">
    <link rel="shortcut icon" type="image/jpeg" href="image/favicon.jpg">

</style>
</head>

<html>
<?php $title="Bloodbank | Sent Requests"; ?>
<body>
	<?php require 'header.php'; ?>
	<div class="container">

		<?php require 'message.php'; ?>

	<table class="table_table">
		<thead><tr><th colspan="7" class="title">Sent requests</th></tr></thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>City</th>
			<th>Phone</th>
			<th>Status</th>
			<th>Action</th>
		</tr>

		    <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color: white;
				background-color: red;
				padding: 13px;
				top: -6px;
				position: absolute;
				border-radius: 15px 50px;">You have not requested yet. </b>';
            }
            ?>
            </div>

		<?php while($row = mysqli_fetch_array($result)) { ?>

		<tr>
			<td><?php echo ++$counter;?></td>
			<td><?php echo $row['dname'];?></td>
			<td><?php echo $row['demail'];?></td>
			<td><?php echo $row['dcity'];?></td>
			<td><?php echo $row['dphone'];?></td>
			<td><?php echo $row['status'];?></td>
			<td><?php if($row['status'] == 'Accepted'){ ?>
			<?php }
			else{ ?>
				<a href="file/dcancel.php?reqid=<?php echo $row['reqid'];?>" class="btn">Cancel</a>
			<?php } ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</div>
    <?php require 'footer.php'; ?>
</body>
</html>
<?php } ?>