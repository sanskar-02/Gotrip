<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    <link rel="stylesheet" href="css/bootstrap.min.css">


    <link type="text/css" rel="stylesheet" href="css/style.css">


    <title>GoTrip</title>
</head>

<body>
<?php include('includes/header.php');?>	
    <!-- <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="index.html" data-aos="zoom-in-left" data-aos-delay="150" class="logo">Go<span>Trip</span></a>

        <nav class="navbar">
            <a href="index.html" data-aos="zoom-in-left" data-aos-delay="300">Home</a>
            <a href="about.html" data-aos="zoom-in-left" data-aos-delay="450">About</a>
            <a href="service.html" data-aos="zoom-in-left" data-aos-delay="600">Services</a>
            <a href="destination.html" data-aos="zoom-in-left" data-aos-delay="750">Destination</a>
            <a href="gallery.html" data-aos="zoom-in-left" data-aos-delay="900">Gallery</a>
            <a href="contact.html" data-aos="zoom-in-left" data-aos-delay="1050">Contact</a>


        </nav>

        <a href="login.php" class="btn" data-aos="zoom-in-left" data-aos-delay="1200">Log In</a>
    </header> -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white animated slideInDown" data-aos="zoom-in" data-aos-delay="200" >Our Services</h1>
                </div>
            </div>
        </div>
    </div>



    <section class="container-xl service" id="services">
        <div class="heading">
            <!-- <span>our services</span> -->
            <h1>cost effective</h1>
        </div>
        <div class="box-container">
            <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
                <i class="fas fa-globe"></i>
                <h3>worldwide</h3>
                <p>Dive into our Global Destinations section, where we showcase the beauty of every continent. </p>
            </div>
            <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
                <i class="fas fa-hiking"></i>
                <h3>adventure</h3>
                <p>For the thrill-seekers, our adventure packages offer adrenaline-pumping activities, such as hiking, snorkeling, and more.</p>
            </div>
            <div class="box" data-aos="zoom-in-up" data-aos-delay="450">
                <i class="fas fa-utensils"></i>
                <h3>food & drinks</h3>
                <p>Explore our Foodie Destinations section for in-depth guides on where to find the best local dishes, hidden gems, and must-try delicacies.</p>
            </div>
            <div class="box" data-aos="zoom-in-up" data-aos-delay="600">
                <i class="fas fa-hotel"></i>
                <h3>affordable hotels</h3>
                <p>In order to guarantee your customer happiness, we collaborate with hotels and resorts that provide great services.</p>
            </div>
            <div class="box" data-aos="zoom-in-up" data-aos-delay="750">
                <i class="fas fa-wallet"></i>
                <h3>affordable price</h3>
                <p>Discover comfortable and wallet-friendly accommodations without compromising on quality. </p>
            </div>
            <div class="box" data-aos="zoom-in-up" data-aos-delay="900">
                <i class="fas fa-headset"></i>
                <h3>24/7 support</h3>
                <p>Our dedicated support team is available around the clock to assist with any queries or concerns during your travels.</p>
            </div>
        </div>
    </section>

    <?php include('includes/footer.php');?>
    <script src="js/jquery-3.1.1.min.js"></script>

    <script src="js/script.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>

        AOS.init({
            duration: 800,
            offset: 150,
        });


    </script>
</body>

</html>