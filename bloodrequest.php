<?php 
require 'file/connection.php'; 
session_start();
  if(!isset($_SESSION['hid']))
  {
  header('location:login.php');
  }
  else {
    $hid = $_SESSION['hid'];
    $sql = "select bloodrequest.*, receivers.* from bloodrequest, receivers where hid='$hid' && bloodrequest.rid=receivers.id";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Blood Requests"; ?>
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
	  <link rel="stylesheet" href="CSS/bloodrequest.css">
	  <link rel="shortcut icon" type="image/jpeg" href="image/favicon.jpg">

</head>

<body>
	<?php require 'header.php'; ?>
	

		<?php require 'message.php'; ?>

	<table class="table_table">
		<thead>	<tr><th colspan="9" class="title">Blood requests</th></tr></thead>
	<tbody>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>City</th>
			<th>Phone</th>
			<th>Blood Group</th>
			<th>Status</th>
			<th colspan="2">Action</th>
		</tr>

		    <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color: white;
                background-color: red;
                padding: 7px;
                left: 71px;
                top: 160px;
                position: absolute;
                border-radius: 15px 50px;">No one has requested yet. </b>';
            }
            ?>
            </div>

		<?php while($row = mysqli_fetch_array($result)) { ?>

		<tr>
			<td><?php echo ++$counter;?></td>
			<td><?php echo $row['rname'];?></td>
			<td><?php echo $row['remail'];?></td>
			<td><?php echo $row['rcity'];?></td>
			<td><?php echo $row['rphone'];?></td>
			<td><?php echo $row['bg'];?></td>
			<td><?php echo 'You have '.$row['status'];?></td>
			<td><?php if($row['status'] == 'Accepted'){ ?> <a href="" class="btn">Accepted</a> <?php }
			else{ ?>
				<a href="file/accept.php?reqid=<?php echo $row['reqid'];?>" class="btn">Accept</a>
			<?php } ?>
			</td>
			<td><?php if($row['status'] == 'Rejected'){ ?> <a href="" class="btn">Rejected</a> <?php }
			else{ ?>
				<a href="file/reject.php?reqid=<?php echo $row['reqid'];?>" class="btn">Reject</a>
			<?php } ?>
			</td>
			
		</tr>
		<?php } ?>
		</tbody>
	</table>

    <?php require 'footer.php'; ?>
</body>
</html>
<?php } ?>