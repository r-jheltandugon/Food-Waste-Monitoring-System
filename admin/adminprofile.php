<?php
// Include the database connection file
include("connect.php");

// Check if the admin is logged in
if ($_SESSION['name'] == '') {
    header("location:signin.php");
    exit();
}

// Fetch the current admin details
$admin_id = $_SESSION['Aid']; // Assuming the admin ID is stored in the session
$query = "SELECT * FROM admin WHERE Aid='$admin_id'";
$result = mysqli_query($connection, $query);

if ($result) {
    $admin = mysqli_fetch_assoc($result);
} else {
    echo "Error fetching admin details: " . mysqli_error($connection);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);

    // Encrypt the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Update admin details in the database
    $update_query = "UPDATE admin SET name='$name', email='$email', password='$hashed_password', address='$address' WHERE Aid='$admin_id'";
    if (mysqli_query($connection, $update_query)) {
        // Refresh the page to show the updated details
        header("Location: adminprofile.php");
        exit(); // Ensure that the script stops executing after the redirect
    } else {
        echo "Error updating profile: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Profile</title>
    <style>
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input-group input, .input-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .input-group textarea {
            resize: none;
            height: 100px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #000;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
        }

        button:hover {
            background-color: #05a355;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo-name">
            <span class="logo_name">ADMIN</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="analytics.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="donate.php">
                    <i class="uil uil-heart"></i>
                    <span class="link-name">Donates</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Profile</span>
                </a></li>
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
            <p class="logo"><b style="color: #06C167;">Food Waste Monitoring System</b></p>
            <p class="user"></p>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-user"></i>
                    <span class="text">Admin Profile</span>
                </div>

                <div class="container">
                    <form action="adminprofile.php" method="POST">
                        <div class="input-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="<?php echo $admin['name']; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo $admin['email']; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" value="<?php echo $admin['password']; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" required><?php echo $admin['address']; ?></textarea>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="admin.js"></script>
</body>
</html>
