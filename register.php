<?php
error_reporting(0);
include("./admin/includes/config.php");

if (isset($_POST['register_btn'])) {
  $username = $_POST['username'];
  $fname = $_POST['fname'];
  $mnumber = $_POST['Mobilenumber'];
  $email = $_POST['email'];
  $password = ($_POST['password']);
  $sql = "INSERT INTO  tblusers(Username,FullName,MobileNumber,EmailId,Password) VALUES(:username,:fname,:Mobilenumber, :email, :password)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':username', $username, PDO::PARAM_STR);
  $query->bindParam(':fname', $fname, PDO::PARAM_STR);
  $query->bindParam(':Mobilenumber', $mnumber, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);

  
  if (  $query->execute()) {
    // $_SESSION['msg'] = "You are Scuccessfully registered. Now you can login ";
    header('location:login.php');
    exit;
  } else {
    // $_SESSION['msg'] = "Something went wrong. Please try again.";
    // header('location:thankyou.php');
    echo "<script>alert(hii)</script>";
  }
}
?>
<!--Javascript for check email availabilty-->
<script>
  function checkAvailability() {

    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check_availability.php",
      data: 'emailid=' + $("#email").val(),
      type: "POST",
      success: function(data) {
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
      },
      error: function() {}
    });
  }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>GoTrip</title>
</head>

<body>

  <div class=" register">
    <video src="video/video2.mp4" autoplay muted loop plays-inline></video>
    <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Holy guacamole!</strong> You should check in on some of those fields below.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> -->
    <div class="form-box">
      <a href="#" data-aos="zoom-in" data-aos-delay="150" class="logo text-light">Go<span>Trip</span></a>

      <div class="button-box">
        <!-- <div id="btn"></div> -->
        <h2 style="color:#dbdbdb;">Register</h2>
      </div>
      <form action="" id="register" class="input-group" method="post">
        <input type="text" name="username" class="input-field" placeholder="username" autocomplete="off" required>
        <input type="text" name="fname" class="input-field" placeholder="Name"   onkeydown="return/[a-z A-Z]/i.test(event.key)" autocomplete="off" required>
        <input type="email" name="email" class="input-field" placeholder="Email" required>
        <input type="text" name="Mobilenumber" onkeypress="return validateNumber(event)" maxlength="10" class="input-field" placeholder="Phone Number" required>
        <input type="password" name="password" class="input-field" placeholder="Enter your password" required>
        <button type="submit" name="register_btn" class="submit-btn "> Register</button>
      </form>
    </div>

  </div>

  <script src="js/script.js"></script>
</body>

</html>