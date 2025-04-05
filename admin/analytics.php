
<?php
ob_start(); 
// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, 'demo');
 include("connect.php"); 
if($_SESSION['name']==''){
	header("location:signin.php");
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="admin.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 

</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>

            <span class="logo_name">ADMIN</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Content</span>
                </a></li> -->
                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="donate.php">
                    <i class="uil uil-heart"></i>
                    <span class="link-name">Donates</span>
                </a></li>
                <li><a href="adminprofile.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Profile</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li> -->
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <!-- <p>Food Donate</p> -->
            <p  class ="logo" ><b style="color: #06C167; ">Food Waste Monitoring System</b></p>
             <p class="user"></p>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-chart"></i>
                    <span class="text">Analytics</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-user"></i>
                        <!-- <i class="fa-solid fa-user"></i> -->
                        <span class="text">Total users</span>
                        <?php
                           $query="SELECT count(*) as count FROM  login";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                        <!-- <span class="number">50,120</span> -->
                    </div>
                    <div class="box box3">
                        <i class="uil uil-heart"></i>
                        <span class="text">Total donates</span>
                        <?php
                           $query="SELECT count(*) as count FROM food_donations";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                        <!-- <span class="number">10,120</span> -->
                    </div>

                    <div class="box box2">
                        <i class="uil uil-flask"></i>
                        <span class="text">Total fertilizer</span>
                        <?php
                           $query="SELECT count(*) as count FROM food_donations WHERE classification='fertilizer'";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                    </div>

                    <div class="box box4">
                        <i class="uil uil-paw"></i>
                        <span class="text">Total pet/animal food</span>
                        <?php
                           $query="SELECT count(*) as count FROM food_donations WHERE classification='pet_food'";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                    </div>
                </div>
                <br>
                <br>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<br>
<canvas id="donateChart" style="width:100%;max-width:600px"></canvas>
<br>
<canvas id="classification" style="width:100%;max-width:600px"></canvas>

<script>
<?php
    // Database queries to fetch counts
    $query = "SELECT count(*) as count FROM login WHERE gender='male'";
    $q2 = "SELECT count(*) as count FROM login WHERE gender='female'";
    $result = mysqli_query($connection, $query);
    $res2 = mysqli_query($connection, $q2);
    $row = mysqli_fetch_assoc($result);
    $ro2 = mysqli_fetch_assoc($res2);
    $male = intval($row['count']);
    $female = intval($ro2['count']);

    $q3 = "SELECT count(*) as count FROM food_donations WHERE category='bio'";
    $res3 = mysqli_query($connection, $q3);
    $ro3 = mysqli_fetch_assoc($res3);
    $bio = intval($ro3['count']);

    $q4 = "SELECT count(*) as count FROM food_donations WHERE category='nonbio'";
    $res4 = mysqli_query($connection, $q4);
    $ro4 = mysqli_fetch_assoc($res4);
    $nonbio = intval($ro4['count']);

    $q5 = "SELECT count(*) as count FROM food_donations WHERE classification='fertilizer'";
    $res5 = mysqli_query($connection, $q5);
    $ro5 = mysqli_fetch_assoc($res5);
    $fertilizer = intval($ro5['count']);

    $q6 = "SELECT count(*) as count FROM food_donations WHERE classification='pet_food'";
    $res6 = mysqli_query($connection, $q6);
    $ro6 = mysqli_fetch_assoc($res6);
    $pet_food = intval($ro6['count']);
?>

var xValues = ["Male", "Female"];
var aplace = ["Fertilizer", "Pet Food"];
var xplace = ["Biodegradable", "Non-Biodegradable"];
var bValues = [<?php echo $fertilizer; ?>, <?php echo $pet_food; ?>];
var yplace = [<?php echo $bio; ?>, <?php echo $nonbio; ?>];
var yValues = [<?php echo $male; ?>, <?php echo $female; ?>];
var barColors = ["#06C167", "blue"];
var bar = ["red", "blue"];
var barColors2 = ["orange", "brown"];

// User Details Chart
new Chart("myChart", {
    type: "bar",
    data: {
        labels: ["Male", "Female"], // x-axis labels
        datasets: [{
            backgroundColor: ["blue", "red"], // bar colors
            data: [<?php echo $male; ?>, <?php echo $female; ?>] // y-axis data
        }]
    },
    options: {
        legend: { display: false },
        title: { 
            display: true, 
            text: "User Details" 
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true, // Start at 0
                    stepSize: 1, // Ensure whole numbers
                    callback: function(value) { return value.toFixed(0); } // Force whole numbers
                }
            }]
        }
    }
});

// Classification Details Chart
new Chart("classification", {
    type: "bar",
    data: {
        labels: ["Fertilizer", "Pet Food"], // x-axis labels
        datasets: [{
            backgroundColor: ["orange", "brown"], // bar colors
            data: [<?php echo $fertilizer; ?>, <?php echo $pet_food; ?>] // y-axis data
        }]
    },
    options: {
        legend: { display: false },
        title: { 
            display: true, 
            text: "Classification Details" 
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true, // Start at 0
                    stepSize: 1, // Ensure whole numbers
                    callback: function(value) { return value.toFixed(0); } // Force whole numbers
                }
            }]
        }
    }
});

// Food Donation Details Chart
new Chart("donateChart", {
    type: "bar",
    data: {
        labels: ["Biodegradable", "Non-Biodegradable"], // x-axis labels
        datasets: [{
            backgroundColor: ["#06C167", "yellow"], // bar colors
            data: [<?php echo $bio; ?>, <?php echo $nonbio; ?>] // y-axis data
        }]
    },
    options: {
        legend: { display: false },
        title: { 
            display: true, 
            text: "Food Donation Details" 
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true, // Start at 0
                    stepSize: 1, // Ensure whole numbers
                    callback: function(value) { return value.toFixed(0); } // Force whole numbers
                }
            }]
        }
    }
});
</script>

            </div>
        </div>
    </section>
    <script src="admin.js"></script>
</body>
</html>