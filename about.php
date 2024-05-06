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
 
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white animated slideInDown" data-aos="zoom-in" data-aos-delay="200">About Us</h1>
                </div>
            </div>
        </div>
    </div>



    <section class="container-xl about" id="about">
        <div class="row">
            <div class=" col-md-10 col-xs-10  slider-container" data-aos="fade-right" data-aos-delay="300">
                <div class="slider ">
                  <div class="slide"><video src="video/video4.mp4" autoplay loop muted></video></div>
                  <div class="slide"><video src="video/video5.mp4" autoplay loop muted></video></div>
                  <div class="slide"><video src="video/video6.mp4" autoplay loop muted></video></div>

                </div>
                <button class="button1" id="prev" onclick="prevSlide()">&#8249;</button>
                <button class="button1" id="next" onclick="nextSlide()">&#8250;</button>
            </div>
            <div class="col-lg-6 col-md-10 col-sm-10 content" data-aos="fade-left" data-aos-delay="600">
                <span>Who we are ?</span>
                <h3>A Smiling trip for you</h3>
                <p>At GoTrip, we are passionate about creating unforgettable travel experiences. Our team of travel enthusiasts is dedicated to providing you with the best information, tips, and recommendations to make your journeys seamless and enjoyable. Discover the world with confidence, guided by our expertise and love for travel.At the core of GoTrip is a mission to inspire a global community of explorers to embark on meaningful journeys. We aim to provide valuable insights, expert travel tips, and a platform for sharing personal stories that capture the essence of wanderlust. </p>
               
            </div>
        </div>
    </section>

    <section class="container-xl vision">
        <div class="row g-5" data-aos="fade-right" data-aos-delay="150">
            <div class="col-lg-5 col-md-12 content">
                <span>our vision</span>
                <h3>helping you explore the world...</h3>
                <p>We envision a world where travel goes beyond sightseeing; it becomes a means of connecting people, fostering cultural understanding, and leaving a positive impact on the places we visit. Through our platform, we aim to promote responsible and sustainable travel practices that benefit both travelers and the communities they explore.</p>
            </div>
            <div class="col-lg-5 col-md-12 container"  data-aos="fade-left" data-aos-delay="300">
                <video src="video/video3.mp4" autoplay muted loop plays-inline class="video"></video>
            </div>
        </div>

    </section>
    
    <section id="counter-stats" class="wow fadeInRight" data-wow-duration="1.4s">
        <div class="container">
            <div class="row stat">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-delay="150">
                    <div class="milestone-counter">
                        <!-- <i class="fa fa-user fa-3x"></i> -->
                        <span class="stat-count highlight">1000+</span>
                        <div class="milestone-details">Happy Customers</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-delay="300">
                    <div class="milestone-counter">
                        <!-- <i class="fa fa-coffee fa-3x"></i> -->
                        <span class="stat-count highlight">99%</span>
                        <div class="milestone-details">peoples suggested to others</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-delay="450">
                    <div class="milestone-counter">
                        <!-- <i class="fa fa-trophy fa-3x"></i> --> 
                        <span class="stat-count highlight">500+</span>
                        <div class="milestone-details">premium packages</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-delay="600">
                    <div class="milestone-counter">
                        <!-- <i class="fa fa-camera fa-3x"></i> -->
                        <span class="stat-count highlight">500+</span>
                        <div class="milestone-details">Photos Taken</div>
                    </div>
                </div>
            </div><!-- stat -->
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