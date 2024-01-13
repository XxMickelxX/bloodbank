<head>
<link rel="Webstie icon" href="images/seek.jpg">
<link rel="shortcut icon" type="image/jpeg" href="image/favicon.jpg">

</head>
<header >


    <link rel="stylesheet" href="css/header.css">
        <div class="header-container">
            <h1>Blood Bank</h1>
            <img src="images/Picture1.png" alt="Websti logo">
            <nav>
            <?php if (isset($_SESSION['hid'])) { ?>
                <ul>
                    <li><a href="bloodinfo.php">Add Blood Info</a></li>
                    <li><a href="bloodrequest.php">Blood Request</a></li>
                    <li><a href="donationrequest.php">Donation Request</a></li>
                    <li><a href="hprofile.php">Profile</a></li>
                    <li><a href="logout.php"><button class="log-btn">logout</button></a></li>
                  
                   
                </ul>
                <?php } elseif (isset($_SESSION['rid'])) { ?>
                    <ul>
                    <li><a href="sentrequest.php">Sent Blood Request</a></li>
                    <li><a href="abs.php">Search</a></li>
                    <li><a href="rprofile.php">Profile</a></li>
                    <li><a href="logout.php"><button class="log-btn">logout</button></a></li>
                   
                </ul>
                <?php } elseif (isset($_SESSION['did'])) { ?>
                    <ul>
                    <li><a href="SentDonerRequest.php">Sent Donate Request</a></li>
                    <li><a href="BeforeDRequest.php">Donate</a></li>
                    <li><a href="dprofile.php">Profile</a></li>
                    <li><a href="logout.php"><button class="log-btn">logout</button></a></li>
                   
                </ul>
                <?php }  else { ?>
                    <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="donate.php">learn about <img id="drop" src="images/pngwing.com.png" alt="" width="20px" height="20px"></a>
                    <ul class="dropdown">
                        <li><a href="donate.php">Donation</a></li>
                        <li><a href="blood types.php">Blood types</a></li>
                    </ul>
                    </li>
                    <li><a href="abs.php">Search</a></li>
                    <li><a href="register.php"><button class="signin-btn">Sign Up</button></a></li>
                    <li><a href="login.php"><button class="log-btn">Login</button></a></li>
                </ul>

                <?php } ?>
            </nav>
        </div>
    </header>




