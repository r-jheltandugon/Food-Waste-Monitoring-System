<?php
include("login.php"); 

if($_SESSION['name']==''){
    header("location: signup.php");
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo"><b style="color: #06C167;">Food Waste Monitoring System</b></div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="profile.php" class="active">Profile</a></li>
                <li><a href="logout.php" style="color: #06C167;">Logout</a></li>
            </ul>
        </nav>
    </header>
    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function() {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>

    <div class="profile">
        <div class="profilebox">
            <div class="info" style="padding-left:10px;">
                <p>Name: <?php echo $_SESSION['name']; ?></p><br>
                <p>Email: <?php echo $_SESSION['email']; ?></p><br>
                <p>Gender: <?php echo $_SESSION['gender']; ?></p><br>
            </div>
            <hr>
            <br>
            <p class="heading">Your donations</p>
            <div class="table-container">
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Food</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Classification</th>
                                <th>Date/Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $email = $_SESSION['email'];
                            $query = "SELECT * FROM food_donations WHERE email='$email'";
                            $result = mysqli_query($connection, $query);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>{$row['food']}</td><td>{$row['type']}</td><td>{$row['category']}</td><td>{$row['classification']}</td><td>{$row['date']}</td></tr>";
                                }
                            }
                            ?> 
                        </tbody>
                    </table>
                </div>
            </div>          
        </div>
    </div>

    <footer class="footer">
        <div class="footer-left col-md-4 col-sm-6">
          <p class="about">
            <span> About us</span>The basic concept of this project  Food Waste Monitoring is to collect the excess/leftover  food from donors such as hotels, restaurants, cafeteria , etc and distribute to  the  needy people. Additionally, we aim to transform food waste into fertilizer, promoting sustainability and environmental responsibility.
          </p>
        </div>
        <div class="footer-center col-md-4 col-sm-6">
          <div>
            <p><span> Contact</span> </p>
            
          </div>
          <div>
        
            <p> (+63) 000 000 0000 </p>
            
          </div>
          <div>
            <!-- <i class="fa fa-envelope" style="font-size: 17px;
            line-height: 38px; color:white;"></i> -->
            <p><a href="#"> foodwastemonitoringsystem@gmail.com</a></p>
          </div>
          
          <div class="sociallist">
            <ul class="social">
                <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook fa-2x"></i></a></li>
                <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter fa-2x"></i></a></li>
                <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram fa-2x"></i></a></li>
            </ul>
          </div>
          
        </div>
        <div class="footer-right col-md-4 col-sm-6">
          <h6><span> Food Waste Monitoring System</span></h6>
          <p class="menu">
            <a href="#"> Home</a> |
            <a href="about.html"> About</a> |
            <a href="profile.php"> Profile</a> |
            <a href="contact.html"> Contact</a>
          </p>
          <p class="name"> Food Waste Monitoring System &copy 2024</p>
        </div>
      </footer>

</body>
</html>
