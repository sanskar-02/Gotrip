<?php session_start();
error_reporting(0);
include('includes/config.php'); ?>
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



    <title>GoTrip</title>
</head>

<body>
    <?php include('includes/header.php'); ?>


    <section class="home " id="home">
        <video src="video/video1.mp4" autoplay muted loop plays-inline></video>
        <div class="content">
            <span data-aos="fade-up" data-aos-delay="150" id="let">Let's Start</span>
            <!-- <h1 data-aos="fade-up" data-aos-delay="300" class="typewrite" data-period="2000"
                data-type='["Happiness is closer than you think","Adventure Awaits, go find it.","Dont be a tourist, be a traveler."]'>
            </h1> -->
            <h1>Adventure Awaits, go find it...</h1>
            <p data-aos="fade-up" data-aos-delay="450">"Travel makes one modest, you see what a tiny place you occupy in the world."</p>
            <a href="destination.php" class="btn" data-aos="fade-up" data-aos-delay="600">Explore Now <i class="fas fa-arrow-right" data-aos="zoom-in-right" data-aos-delay="700"></i></a>
        </div>


    </section>
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
                <p>At GoTrip, we are passionate about creating unforgettable travel experiences. Our team of travel enthusiasts is dedicated to providing you with the best information, tips, and recommendations to make your journeys seamless and enjoyable. Discover the world with confidence, guided by our expertise and love for travel. </p>
                <a href="about.php" class="btn">read more</a>
            </div>
        </div>
    </section>


    <section class="container-xl service" id="services">
        <div class="heading">
            <span>our services</span>
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
    <!-- ========================  -->
    <section class="container-xl packages mt-5" id="packages">
        <div class="heading">
            <span>Our Destination</span>
            <h1>Seeking beauty in every destination</h1>
        </div>           
        <div class="box-container ">
         <?php $sql = "SELECT * from tbltourpackages LIMIT 6";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
         if($query->rowCount() > 0)
          {
         foreach($results as $result)
         {	?>
            <div class="box" data-aos="fade-up" data-aos-delay="200">
                <div class="image">

                    <img src="admin/packageimages/<?php echo htmlentities($result->PackageImage);?>" alt="">
                </div>
                <div class="content card-body">
                    <h3> <span><?php echo htmlentities($result->PackageName);?></span> </h3>
                    <br><h4> Type : </h4> <span><?php echo htmlentities($result->PackageType);?></span>                                 <div class="rating">
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <h5>₹ <?php echo htmlentities($result->PackagePrice);?></h5>

                        
                    </div>
                    <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="btn btn-danger ">details</a>
                    
                </div>
            </div>
            <?php }} ?>
            <!-- <div class="box">
                <div class="image">

                    <img src="img/china.png" alt="">
                </div>
                <div class="content card-body">
                    <h3>China</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <div class="rating">
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                    </div>
                    <h5>Price $999</h5>
                    <a href="booking.php" class="btn btn-danger ">book now</a>
                </div>
            </div>  -->
        </div>
         

    </section>
     <!-- End of Popular Destinations Section -->


    <section class="container-xl destination" id="destination">
        <div class="heading">
            <span>Locations</span>
            <h1>keep looking up</h1>
        </div>
        <div class="box-container">
            <div class="box" data-aos="fade-up" data-aos-delay="150">
                <div class="image">
                    <img src="img/pic1.jpg" alt="image">

                </div>
                <div class="content">
                    <h3>Agra, India</h3>
                    <p>Explore the history, architecture, and significance of the Taj Mahal</p>
                </div>
            </div>

            <div class="box" data-aos="fade-up" data-aos-delay="300">
                <div class="image">
                    <img src="img/pic2.jpg" alt="image">
                </div>
                <div class="content">
                    <h3>Dubai, UAE</h3>
                    <p>Rising gracefully above the Dubai skyline, Burj Khalifa is more than a skyscraper.</p>
                </div>
            </div>
            <div class="box" data-aos="fade-up" data-aos-delay="450">
                <div class="image">
                    <img src="img/pic3.jpg" alt="image">
                </div>
                <div class="content">
                    <h3>New York,USA</h3>
                    <p>Unveil the symbolism of freedom embodied by the Statue of Liberty</p>
                </div>
            </div>
            <div class="box" data-aos="fade-up" data-aos-delay="600">
                <div class="image">
                    <img src="img/pic4.jpg" alt="image">
                </div>
                <div class="content">
                    <h3>Giza,Ezypt</h3>
                    <p>Uncover the mysteries of the Great Pyramid, the last of the Seven Wonders of the Ancient World.</p>
                </div>
            </div>
            <div class="box" data-aos="fade-up" data-aos-delay="750">
                <div class="image">
                    <img src="img/Great-Wall-of-China.jpg" alt="image">
                </div>
                <div class="content">
                    <h3>Beijing, China</h3>
                    <p>Adventure capital with stunning lakes and mountain scenery.</p>
                </div>
            </div>
            <div class="box" data-aos="fade-up" data-aos-delay="900">
                <div class="image">
                    <img src="img/rome.jpg" alt="image">
                </div>
                <div class="content">
                    <h3>The Colosseum, Rome</h3>
                    <p>Explore the history of gladiatorial combat within the Colosseum, where warriors faced off in epic battles.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container-xl gallery" id="gallery">
        <div class="heading">
            <span>our gallery</span>
            <h1>memories last forever</h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-xs-10 thumb" data-aos="fade-up" data-aos-delay="150">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/gal1.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/gal1.jpg" alt="Another alt text">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-10 thumb" data-aos="fade-up" data-aos-delay="200">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/gal2.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/gal2.jpg" alt="Another alt text">
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6 col-xs-10 thumb" data-aos="fade-up" data-aos-delay="250">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/gal3.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/gal3.jpg">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-10 thumb" data-aos="fade-up" data-aos-delay="300">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/gal4.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/gal4.jpg" alt="Another alt text">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-10 thumb" data-aos="fade-up" data-aos-delay="350">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/gal5.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/gal5.jpg" alt="Another alt text">
                        </a>
                    </div>



                    <div class="col-lg-4 col-md-6 col-xs-10 thumb" data-aos="fade-up" data-aos-delay="400">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/gal6.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/gal6.jpg">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-10 thumb" data-aos="fade-up" data-aos-delay="450">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/ab1.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/ab1.jpg" alt="Another alt text">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-10 thumb" data-aos="fade-up" data-aos-delay="500">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/ab2.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/ab2.jpg" alt="Another alt text">
                        </a>
                    </div>



                    <div class="col-lg-4 col-md-6 col-xs-10 thumb" data-aos="fade-up" data-aos-delay="550">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/ab3.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/ab3.jpg">
                        </a>
                    </div>

                </div>


                <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" style="margin-top:12rem;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="image-gallery-title"></h4>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="modal-body box1 ">
                                <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn2  float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                </button>

                                <button type="button" id="show-next-image" class="btn2  float-right"><i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        let modalId = $('#image-gallery');

        $(document)
            .ready(function() {

                loadGallery(true, 'a.thumbnail');

                //This function disables buttons when needed
                function disableButtons(counter_max, counter_current) {
                    $('#show-previous-image, #show-next-image')
                        .show();
                    if (counter_max === counter_current) {
                        $('#show-next-image')
                            .hide();
                    } else if (counter_current === 1) {
                        $('#show-previous-image')
                            .hide();
                    }
                }



                function loadGallery(setIDs, setClickAttr) {
                    let current_image,
                        selector,
                        counter = 0;

                    $('#show-next-image, #show-previous-image')
                        .click(function() {
                            if ($(this)
                                .attr('id') === 'show-previous-image') {
                                current_image--;
                            } else {
                                current_image++;
                            }

                            selector = $('[data-image-id="' + current_image + '"]');
                            updateGallery(selector);
                        });

                    function updateGallery(selector) {
                        let $sel = selector;
                        current_image = $sel.data('image-id');
                        $('#image-gallery-title')
                            .text($sel.data('title'));
                        $('#image-gallery-image')
                            .attr('src', $sel.data('image'));
                        disableButtons(counter, $sel.data('image-id'));
                    }

                    if (setIDs == true) {
                        $('[data-image-id]')
                            .each(function() {
                                counter++;
                                $(this)
                                    .attr('data-image-id', counter);
                            });
                    }
                    $(setClickAttr)
                        .on('click', function() {
                            updateGallery($(this));
                        });
                }
            });

        // build key actions
        $(document)
            .keydown(function(e) {
                switch (e.which) {
                    case 37: // left
                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                            $('#show-previous-image')
                                .click();
                        }
                        break;

                    case 39: // right
                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                            $('#show-next-image')
                                .click();
                        }
                        break;

                    default:
                        return; // exit this handler for other keys
                }
                e.preventDefault(); // prevent the default action (scroll / move caret)
            });
    </script>

    <section class="container-xl " id="review">
        <div class="heading">
            <span>testimonials</span>
            <h3> Good news from our clients</h3>
        </div>
        <div class="review">
            <div class="box-container" data-aos="fade-right" data-aos-delay="200">
                <div class="box">
                    <p>Wanderlust is not just a desire; it's a calling. Answer it with open arms, for the world is vast, and your spirit is boundless.</p>
                    <div class="user">
                        <img src="img/per3.png" alt="">
                        <div class="info">
                            <h3>harsh</h3>
                            <span>wanderlust</span>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <p>Wander often, wonder always. The world is a vast tapestry, and each journey adds a new thread to the story of your life.</p>
                    <div class="user">
                        <img src="img/per2.png" alt="">
                        <div class="info">
                            <h3>manish</h3>
                            <span>wanderlust</span>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <p>The wanderlust in your soul is a compass guiding you to extraordinary places. Trust it, follow it, and let the journey be your destination</p>
                    <div class="user">
                        <img src="img/per1.png" alt="">
                        <div class="info">
                            <h3>nandini</h3>
                            <span>wanderlust</span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <p>In a world full of routine, be the wanderer. Seek the extraordinary, dance with the unexpected, and let your curiosity be your guide</p>
                    <div class="user">
                        <img src="img/per1.png" alt="">
                        <div class="info">
                            <h3> sahiba</h3>
                            <span>wanderlust</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content" data-aos="fade-left" data-aos-delay="400">
                

                <ul style="font-size:20px">
                    <li>Meet the Explorers: Interviews with Travel Enthusiasts.</li>
                    <li>Travel Tales: Stories that Will Ignite Your Wanderlust.</li>
                    <li>Our travel tales are not just stories; they're windows into the soul of each destination.</li>
                    <li>Adventure isn't a destination; it's a state of mind. </li>
                    <li>Meet the Explorers: Interviews with Travel Enthusiasts.</li>
                    <li>Conquer the heights with us in our Mountain Majesty series.</li>
                </ul>
                <!-- <a href="" class="btn">read more</a> -->
            </div>
        </div>
    </section>









    <section class="container-xl blog" id="blogs">
        <div class="heading">
            <span>blogs & posts</span>
            <h1>clients experiences in words</h1>

        </div>
        <div class="box-container">
            <div class="box" data-aos="fade-up" data-aos-delay="150">
                <div class="image">
                    <img src="img/blog1.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="link">one mile at a time</a>
                    <p>Explore ways travelers can reduce their environmental impact and make more sustainable choices during their journeys.</p>
                </div>
                <div class="icon">
                    <a href="" style="color: brown;"><i class="fas fa-clock"></i> 2 jan 2024</a>
                    <a href="" style="color: brown;"><i class="fas fa-user"></i> by manish</a>
                </div>
            </div>
            <div class="box" data-aos="fade-up" data-aos-delay="300">
                <div class="image">
                    <img src="img/blog4.jpeg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="link">local adventure</a>
                    <p>Showcase the beauty of a particular destination through the eyes of a photographer, sharing tips.</p>
                </div>
                <div class="icon">
                    <a href="" style="color: brown;"><i class="fas fa-clock"></i> 31 Dec 2023</a>
                    <a href="" style="color: brown;"><i class="fas fa-user"></i> by nandini</a>
                </div>
            </div>
            <div class="box" data-aos="fade-up" data-aos-delay="450">
                <div class="image">
                    <img src="img/blog3.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="link">first abroad</a>
                    <p> Feature personal stories and insights from solo travelers, sharing their experiences, challenges, and the joys of traveling alone.</p>
                </div>
                <div class="icon">
                    <a href="" style="color: brown;"><i class="fas fa-clock"></i> 1 jan 2024</a>
                    <a href="" style="color: brown;"><i class="fas fa-user"></i> by john</a>
                </div>
            </div>
        </div>
    </section>

    <section class="container-xl">
        <div class="col-lg-12 banner">

            <div class="content" data-aos="fade-up" data-aos-delay="300">
                <span>start your adventure</span>
                <h3>let's explore worldwith us</h3>
                <p>Welcome to GoTrip - Your Gateway to Unforgettable Journeys!
                </p>
                <!-- <a href="booking.php" class="btn"> book now</a> -->
            </div>
        </div>

    </section>

    <?php include('includes/footer.php'); ?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

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