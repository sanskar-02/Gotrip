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
    <?php include('includes/header.php'); ?>

    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white animated slideInDown" data-aos="zoom-in" data-aos-delay="200">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-4">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <!-- <h6 class="section-title bg-white text-center  px-3">Contact Us</h6> -->
                <h1 class="mb-5">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s" data-aos="fade-up" data-aos-delay="150">
                    <h5>Get In Touch</h5>
                    <p class="mb-4"> If you have any travel-related questions or need information, feel free to ask, and I'll do my best to help!</p>
                    <div class="d-flex align-items-center mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="fa fa-map-marker-alt  icn"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="">Office</h5>
                            <p class="mb-0">Location, City, Country</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 ">
                            <i class="fa fa-phone-alt  icn"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="">Mobile</h5>
                            <p class="mb-0">+91 91XXXXXXXX</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 ">
                            <i class="fa fa-envelope-open  icn"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="">Email</h5>
                            <p class="mb-0">gotrip@gmail.com</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s" data-aos="fade-up" data-aos-delay="450">

                    <form method="post" id="form">
                        <div class="row g-2">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="name" onkeydown="return/[a-z A-Z]/i.test(event.key)" required>
                                    <label for="name">name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="phone" onkeypress="return validateNumber(event)" maxlength="10" required>
                                    <label for="phone">phone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
                                    <label for="email">email</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="message" name="message" id="message" style="height: 100px" required></textarea>
                                    <label for="message">message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn w-20 py-3" name="submit" id="submit" type="submit">Submit</button>
                                <span style="color:green;font-size:17px;" id="msg"></span>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row col-lg-12 col-md-12 col-sm-12 mt-3 wow fadeInUp" data-wow-delay="0.3s" data-aos="fade-up" data-aos-delay="300">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d875.4957435856332!2d77.3788733392548!3d28.630272369724146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ceff8864e0cf1%3A0xa20290bf75099ebd!2sBSI%20Business%20Park%20H15!5e0!3m2!1sen!2sin!4v1705300901731!5m2!1sen!2sin" height="300px;"></iframe>
            </div>
        </div>
    </div>



    <?php include('includes/footer.php'); ?>




    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script>
        jQuery('#form').on('submit', function(e) {
            jQuery('#msg').html('');
            jQuery('#submit').html('Please wait');
            jQuery('#submit').attr('disabled', true);
            jQuery.ajax({
                url: 'submit.php',
                type: 'post',
                data: jQuery('#form').serialize(),
                success: function(result) {
                    jQuery('#msg').html(result);
                    setTimeout(function() {
                        jQuery('#msg').empty();
                    }, 3000);
                    jQuery('#submit').html('Submit');
                    jQuery('#submit').attr('disabled', false);
                    jQuery('#form')[0].reset();
                }
            });
            e.preventDefault();
        });
    </script>




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