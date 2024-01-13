<?php 
require 'file/connection.php'; 
session_start();
  if(!isset($_SESSION['hid']))
  {
  header('location:login.php');
  }
  else {
    $hid = $_SESSION['hid'];
    $sql = "select donaterequest.*, doner.* from donaterequest, doner where hid='$hid' && donaterequest.DonerID=doner.id";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Donation Requests"; ?>
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
		<thead>	<tr><th colspan="8" class="title">Donation requests</th></tr></thead>
	<tbody>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>City</th>
			<th>Phone</th>
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
			<td><?php echo $row['dname'];?></td>
			<td><?php echo $row['demail'];?></td>
			<td><?php echo $row['dcity'];?></td>
			<td><?php echo $row['dphone'];?></td>
			<td><?php echo 'You have '.$row['status'];?></td>
			<td><?php if($row['status'] == 'Confirmed'){ ?> <a href="" class="btn">Confirmed</a> <?php }
			else{ ?>
				<a href="file/daccept.php?reqid=<?php echo $row['reqid'];?>" class="btn">Confirm </a>
			<?php } ?>
			</td>
			<td><?php if($row['status'] == 'Rejected'){ ?> <a href="" class="btn">Rejected</a> <?php }
			else{ ?>
				<a href="file/dreject.php?reqid=<?php echo $row['reqid'];?>" class="btn">Incomplete</a>
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