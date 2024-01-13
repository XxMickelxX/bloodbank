<html>
<?php
require 'file/connection.php';
session_start();
if (!isset($_SESSION['did'])) {
    header('location:login.php');
} else {
    if (isset($_SESSION['did'])) {
        $id = $_SESSION['did'];
        $sql = "SELECT * FROM doner WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];

    $insertQuery = "UPDATE  donaterequest SET DonerID='$id', donatedate='$date', status='Pending'";
    if ($conn->query($insertQuery) === TRUE) {
        $msg = 'You have requested for donation, waiting for your arravial.';
        header( "location:SentDonerRequest.php?msg=".$msg);
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
        header( "location:drequest.php?error=".$error );
    }
    $conn->close();
    mysqli_query($conn, $insertQuery);
}
?>

<head>
    <link rel="stylesheet" href="CSS/request.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="shortcut icon" type="image/jpeg" href="image/favicon.jpg">

</head>

<body>
    <?php include("header.php"); ?>
    <div class="bodyy">
        <form method="post">
            <label for="date">Enter the date for making your donation:</label>
            <input type="date" id="date" name="date" required>
            <input type="submit" value="Send Request">
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>
