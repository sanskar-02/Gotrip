<?php
session_start();
include("./admin/includes/config.php");

if (isset($_POST['login_btn'])) {
  $email = $_POST['email'];
  $password = ($_POST['password']);
  $sql = "SELECT Username,EmailId,Password FROM tblusers WHERE EmailId=:email and Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);

  $query->execute();
  $results = $query->fetch();
  if ($query->rowCount() > 0) {
    $_SESSION['login'] = $results['EmailId'];
    $_SESSION['name'] = $results['Username'];
    // print($_SESSION['name']);die;

    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
  } else {

    echo "<script>alert('Invalid Details');</script>";
  }
}
?>
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

  <div class=" login">
    <video src="video/video2.mp4" autoplay muted loop plays-inline></video>
    <div class="form-box">
      <a href="#" data-aos="zoom-in" data-aos-delay="150" class="logo text-light">Go<span>Trip</span></a>

      <div class="button-box">
        <h2 style="color:#dbdbdb;">Log In</h2>
      </div>
      <form method="post" id="login" class="input-group">
        <input type="email" class="input-field" name="email" placeholder="Email id" required>
        <input type="password" class="input-field" name="password" placeholder="Enter your password" required>
        <button type="submit" name="login_btn" class="submit-btn"> Log In</button>
        <span style="font-size: 15px; color:#fafafa;">don't have an account? <a href="register.php">Register</a></span>
      </form>
    </div>

  </div>
</body>

</html>