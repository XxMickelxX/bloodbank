<?php 
session_start();
if (isset($_SESSION['hid'])) {
  header("location:bloodrequest.php");
}elseif (isset($_SESSION['rid'])) {
  header("location:sentrequest.php");
}else{
?>
<!DOCTYPE html>
<html>
<?php $title="Blood Bank | Login"; ?>
<head>
<title><?php echo $title ?></title>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" type="text/css" href="/donate_css/footer.css">
    <link rel="shortcut icon" type="image/jpeg" href="image/favicon.jpg">
<link rel="stylesheet" href="css/login.css">
<script>
 function login(showId, hideId, hideid) {
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

<body>
  <?php require 'header.php'; ?>

    <div class="container ">
   
      <?php require 'message.php'; ?>

      <div class="row">
        <div class="x1">

          <div class="card rounded">
          <img src="images/4956036.png">
            <ul class="nav-tabs" style="padding: 20px;">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" onclick="login('hospitals', 'receivers','doners')"href="#hospitals">Hospitals</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" data-toggle="tab" onclick="login('receivers', 'hospitals', 'doners')" href="#receivers" >Receivers</a>
     </li>
     <li class="nav-item">
        <a class="nav-link" data-toggle="tab" onclick="login('doners', 'receivers', 'hospitals')" href="#doners" >Doners</a>
     </li>
    </ul>

    <div class="tab-content">
       <div style="display:block" class="tab-pane container active" id="hospitals">
        <form action="file/hospitalLogin.php" method="post">
          <label class="inarea" class="inarea">Hospital Email</label>
          <input type="email" name="hemail" placeholder="Hospital Email" class="form-control mb-4">
          <label class="inarea" class="inarea">Hospital Password</label>
          <input type="password" name="hpassword" placeholder="Hospital Password" class="form-control mb-4">
          <input type="submit" name="hlogin" value="Login" class="btn">
        </form>
       </div>


      <div style="display:none" class="log_area" id="receivers">
         <form action="file/receiverLogin.php" method="post">
          <label class="inarea" class="inarea">Receiver Email</label>
          <input type="email" name="remail" placeholder="Receiver Email" class="form-control mb-4">
          <label class="inarea" class="inarea">Receiver Password</label>
          <input type="password" name="rpassword" placeholder="Receiver Password" class="form-control mb-4">
          <input type="submit" name="rlogin" value="Login" class="btn">
        </form>
      </div>

      <div style="display:none" class="log_area" id="doners">
         <form action="file/donerLogin.php" method="post">
          <label class="inarea" class="inarea">Doner Email</label>
          <input type="email" name="demail" placeholder="Doner Email" class="form-control mb-4">
          <label class="inarea" class="inarea">Doner Password</label>
          <input type="password" name="dpassword" placeholder="Doner Password" class="form-control mb-4">
          <input type="submit" name="dlogin" value="Login" class="btn">
        </form>
      </div>
    </div>
    <a href="register.php" class="no_account" title="Click here">Don't have account?</a>
</div>
</div>
</div>
</div>
<?php require 'footer.php' ?>
</body>
</html>
<?php } ?>