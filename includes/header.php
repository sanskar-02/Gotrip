<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />


    <link rel="stylesheet" href="css/bootstrap.min.css">
     

    <link type="text/css" rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    


    <title>GoTrip</title>
</head>

<body>
<header class="header">
        <div id="menu-btn" class="fas fa-bars" ></div>
        <a href="index.php" data-aos="zoom-in-left" data-aos-delay="150" class="logo">Go<span>Trip</span></a>

        <nav class="navbar">
            <a href="index.php" data-aos="zoom-in-left" data-aos-delay="300">Home</a>
            <a href="about.php" data-aos="zoom-in-left" data-aos-delay="450">About</a>
            <a href="service.php" data-aos="zoom-in-left" data-aos-delay="600">Services</a>
            <a href="destination.php" data-aos="zoom-in-left" data-aos-delay="750">Destination</a>
            <a href="gallery.php" data-aos="zoom-in-left" data-aos-delay="900">Gallery</a>
            <a href="contact.php" data-aos="zoom-in-left" data-aos-delay="1050">Contact</a>


        </nav>
        <?php if(isset($_SESSION['login'])){ ?>

             <div class="dropdown">
  <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fa-regular fa-user"></i>
                        <?php echo $_SESSION['name']?>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
    <li><a class="dropdown-item" href="tour-history.php">Mytrips</a></li>
    <li><a class="dropdown-item" href="logout.php">Log Out <i class="fa fa-sign-out"></i></a></li>
  </ul>
</div>
        
            <?php }else{ ?>
                <!-- <h1>Not set</h1> -->
                <a href="login.php" class="btn" data-aos="zoom-in-left" data-aos-delay="600"><i class="fa fa-sign-in"></i>Log in</a>
                <?php } ?>
        
              
</header>

