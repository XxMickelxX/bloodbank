<?php 
session_start();
if (isset($_SESSION['hid'])) {
  header("location:bloodrequest.php");
}elseif (isset($_SESSION['rid'])) {
  header("location:sentrequest.php");
}else{
?>
<!DOCTYPE html>
<head>
<?php $title="Blood Bank | Register"; ?>
<title><?php echo $title ?></title>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" type="text/css" href="/donate_css/footer.css">
    <link rel="shortcut icon" type="image/jpeg" href="image/favicon.jpg">
    <link rel="stylesheet" href="css/register.css">
<script>
 function register(showId, hideId, hideid) {
  var showDiv = document.getElementById(showId);
  var hideDiv = document.getElementById(hideId);
  var hidediv = document.getElementById(hideid);
  if (showDiv.style.display === "none") {
    showDiv.style.display = "block";
    hideDiv.style.display = "none";
    hidediv.style.display = "none";
  }
}


</script>
</head>
<html>
<?php require 'head.php'; ?>

<?php $title="Bloodbank | Register"; ?>

<body>
  <?php require 'header.php'; ?>

    <div class="container cont">
      <img src="images/red-blood-cell-1861640_1920.png">
      
    <?php require 'message.php'; ?>

      <div class="mina12">
        <div class="mina13">
          <div class="card rounded">
            <ul class=" nav-tabs " style="padding: 20px">
              <li class="nav-item">
                <a class="nav-link " data-toggle="tab"onclick="register('hospitals', 'receivers', 'doners')" href="#hospitals">Hospitals</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" onclick="register('receivers', 'hospitals', 'doners')"href="#receivers">Receivers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" onclick="register('doners' ,'receivers', 'hospitals')"href="#doners">Doners</a>
              </li>
            </ul>

    <div class="tab-content">

       <div class="shown_r_area" id="hospitals">

        <form action="file/hospitalReg.php" method="post" enctype="multipart/form-data">
          <input type="text" name="hname" placeholder="Hospital Name"  required>
          <input type="text" name="hcity" placeholder="Hospital City"required>
          <input type="tel" name="hphone" placeholder="Hospital Phone Number" required pattern="[0,6-9]{1}[0-9]{9,11}" title="Password must have start from 0,6,7,8 or 9 and must have 10 to 12 digit">
          <input type="email" name="hemail" placeholder="Hospital Email"  required>
          <input type="password" name="hpassword" placeholder="Hospital Password"  required minlength="6">
          <input type="submit" name="hregister" value="Register" class="btn">
        </form>

       </div>


       <div class="hidden_r_area" id="receivers"style="display:none">

         <form action="file/receiverReg.php" method="post" enctype="multipart/form-data">
          <input type="text" name="rname" placeholder="Receiver Name" class="form-control mb-3" required>
          <select name="rbg" class="form-control mb-3" required>
                <option disabled="" selected="">Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
          </select>
          <input type="text" name="rcity" placeholder="Receiver City"  required>
          <input type="tel" name="rphone" placeholder="Receiver Phone Number"  required pattern="[0,6-9]{1}[0-9]{9,11}" title="Mobile no. must start from 0,6,7,8 or 9 and must have 10 to 12 digit">
          <input type="email" name="remail" placeholder="Receiver Email"  required>
          <input type="password" name="rpassword" placeholder="Receiver Password"  required minlength="6">
          <input type="submit" name="rregister" value="Register" class="btn ">
        </form>

       </div>
       <div class="hidden_r_area" id="doners"style="display:none">

        <form action="file/donerReg.php" method="post" enctype="multipart/form-data">
        <input type="text" name="dname" placeholder="Doner Name" class="form-control mb-3" required>
        <input type="text" name="dcity" placeholder="Doner City"  required>
        <input type="tel" name="dphone" placeholder="Doner Phone Number"  required pattern="[0,6-9]{1}[0-9]{9,11}" title="Mobile no. must start from 0,6,7,8 or 9 and must have 10 to 12 digit">
        <input type="email" name="demail" placeholder="Doner Email"  required>
        <input type="password" name="dpassword" placeholder="Doner Password"  required minlength="6">
        <input type="submit" name="dregister" value="Register" class="btn ">
        </form>

        </div>

    </div>
    <a href="login.php"  title="Click here">Already have account?</a>
</div>
</div>
</div>
</div>
<?php require 'footer.php' ?>
</body>
</html>
<?php } ?>