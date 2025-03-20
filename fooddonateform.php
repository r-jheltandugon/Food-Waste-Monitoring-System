<?php
include("login.php"); 
if($_SESSION['name']==''){
	header("location: signin.php");
}
// include("login.php"); 
$emailid= $_SESSION['email'];
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'demo');
if(isset($_POST['submit']))
{
    $foodname=mysqli_real_escape_string($connection, $_POST['foodname']);
    $category=$_POST['image-choice'];
    $quantity=mysqli_real_escape_string($connection, $_POST['quantity']);
    // $email=$_POST['email'];
    $phoneno=mysqli_real_escape_string($connection, $_POST['phoneno']);
    $address=mysqli_real_escape_string($connection, $_POST['address']);
    $name=mysqli_real_escape_string($connection, $_POST['name']);

    $query="insert into food_donations(email,food,category,phoneno,address,name,quantity) values('$emailid','$foodname','$category','$phoneno','$address','$name','$quantity')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {

        echo '<script type="text/javascript">alert("data saved")</script>';
        header("location:delivery.html");
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donate</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body style="    background-color: #06C167;">
    <div class="container">
        <div class="regformf" >
    <form action="" method="post">
        <p class="logo">Food <b style="color: #06C167; ">Donate</b></p>
        
       <div class="input">
        <label for="foodname"  > Food Name:</label>
        <input type="text" id="foodname" name="foodname" required/>
        </div>
        <div class="input">
          <label for="food">Select the Category:</label>
          <br><br>
          <div class="image-radio-group">
              <input type="radio" id="bio" name="image-choice" value="bio">
              <label for="bio">
                <img src="img/bio.png" alt="bio" >
              </label>
              <input type="radio" id="nonbio" name="image-choice" value="nonbio"checked>
              <label for="nonbio">
                <img src="img/nonbio.png" alt="nonbio" >
              </label>
          </div>
        </div>
        <div class="input-field">
            <label for="classification">Classification:</label>
            <select id="classification" name="classification">
                <option value="">Select Classification</option>
                <option value="fertilizer">Fertilizer</option>
                <option value="pet_food">Pet/Animal Food</option>
            </select>
        </div>
        <div class="input">
          <label for="quantity">Quantity:(number of person /kg)</label>
          <input type="text" id="quantity" name="quantity" required/>
        </div>
        <b><p style="text-align: center;">Contact Details</p></b>
        <div class="input">
          <div>
            <label for="name">Name:</label>
              <input type="text" id="name" name="name"value="<?php echo"". $_SESSION['name'] ;?>" required/>
          </div>
          <div>
            <label for="phoneno" >PhoneNo:</label>
              <input type="text" id="phoneno" name="phoneno" maxlength="11" pattern="[0-9]{11}" required />  
          </div>
        </div>
        <div class="input">
          <label for="address" style="padding-left: 10px;">Address:</label>
          <input type="text" id="address" name="address" required/><br>
        </div>
        <div class="btn">
            <button type="submit" name="submit"> submit</button>
        </div>
     </form>
     </div>
   </div>
     
    
</body>
</html>