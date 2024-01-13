<?php 
session_start();
require 'file/connection.php';
if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id && bg LIKE '%$searchKey%'";
}else{
    $did = $_SESSION['did'];
    $fsql="SELECT * FROM doner WHERE id='$did'";
    $result = mysqli_query($conn, $fsql); 
    if ($result) {
        $row = mysqli_fetch_assoc($result); 
        $cname = $row['dcity'];
        $sql ="select  * from  hospitals where hospitals.hcity='$cname'";
}
}
$result = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="css/abs.css">
    <link rel="shortcut icon" type="image/jpeg" href="image/favicon.jpg">

</head>
<body>
<?php require 'header.php'; ?>
 <?php require 'message.php'; ?>
        <div class ="main">

        <table class="table_table">
          <thead>  <tr><th colspan="6" class="title">Available Hospitals</th></tr> </thead>
          <tbody> <tr>
                <th>#</th>
                <th>Hospital Name</th>
                <th>Hospital City</th>
                <th>Hospital Email</th>
                <th>Hospital Phone</th>
                <th>Action</th>
            </tr>

            <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color: white;
                background-color: red;
                padding: 7px;
                position: fixed;
                margin: 7px;
                border-radius: 15px 50px;">Nothing to show.</b>';
            }
            ?>
            </div>

         <?php while($row = mysqli_fetch_array($result)) { ?>

            <tr>
                <td><?php echo ++$counter;?></td>
                <td><?php echo $row['hname'];?></td>
                <td><?php echo ($row['hcity']); ?></td>
                <td><?php echo ($row['hemail']); ?></td>
                <td><?php echo ($row['hphone']); ?></td>

                <?php $hid= $row['id'];?>
                <form action="file/drequest.php" method="post">
                    <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                    <input type="hidden" name="hid" value="<?php echo $hid; ?>">
                    <input type="hidden" name="bg" value="<?php echo $bg; ?>">

                <?php if (isset($_SESSION['hid'])) { ?>
                <td><a href="javascript:void(0);" class="btn btn-info hospital">Donate</a></td>
                <?php } else {(isset($_SESSION['did']))  ?>
                <td><input type="submit" name="request" class="rs" value="Donate"></td>
                <?php } ?>
                
                </form>
            </tr>

         <?php } ?></tbody>
           
         </table>
    
        </div>
       
       
        <?php require 'footer.php' ?>
   
</body>

<script type="text/javascript">
    $('.hospital').on('click', function(){
        alert("Hospital user can't request for blood.");
    });
</script>