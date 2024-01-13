<?php 
  require 'file/connection.php';
  session_start();
  if(!isset($_SESSION['hid']))
  {
  header('location:login.php');
  }
  else {
?>
<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" href="css/bloodinfo.css">
    <link rel="shortcut icon" type="image/jpeg" href="image/favicon.jpg">

</head>

<body>
  <?php require 'header.php'; ?>

    <div class="container cont">

      <?php require 'message.php'; ?>

      <div class="row">
          
         <div class="m11">
          <div class="card">
            <div class="card-header title">Add blood group available in your hospital</div>
        <div class="card-body">
        <form action="file/infoAdd.php" method="post">
          
          
          <select class="form-control" name="bg" required="">
                <option disabled selected>Blood Group</option>
                <option>A-</option>
                <option>A+</option>
                <option>B-</option>
                <option>B+</option>
                <option>AB-</option>
                <option>AB+</option>
                <option>O-</option>
                <option>O+</option>
          </select><br>
          <input type="submit" name="add" value="Add" class="btn"><br>
          <a href="index.php" class="float-right" title="click here">Cancel</a>
        </form>
         </div>
       </div>
     </div>

<?php   if(isset($_SESSION['hid'])){
    $hid=$_SESSION['hid'];
    $sql = "select * from bloodinfo where hid='$hid'";
    $result = mysqli_query($conn, $sql);
  }
  ?>
    <div class="rr">
          <table class="table_table">
             <thead><th colspan="4" class="title">Blood Bank</th></thead>
             
            <tr>
              <th>#</th>

              <th>Blood Samples</th>
              <th>Action</th>
            </tr>
            <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="olor: white;
                background-color: red;
                padding: 7px;
                position: absolute;
                border-radius: 15px 50px;
            };">Nothing to show.</b>';
            }
            ?>
            </div>
            <?php while($row = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo ++$counter; ?></td>

              <td><?php echo $row['bg'];?></td>
              <td><button class="btn-d"><a href="file/delete.php?bid=<?php echo $row['bid'];?>" class="btn-d-a">Delete</a></button></td>
            </tr>
            <?php } ?>
          </table>
      </div>

   </div>
</div>
<?php require 'footer.php' ?>
</body>
<?php } ?>