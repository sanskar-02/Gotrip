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
                    <h1 class="display-3 text-white animated slideInDown" data-aos="zoom-in" data-aos-delay="200">Our Gallery</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="container-xl gallery pb-5" id="gallery">
        <div class="heading">
            <!-- <span>our gallery</span> -->
            <h1>memories last forever</h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-xs-10 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/gal1.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/gal1.jpg" alt="Another alt text">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-10 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/gal2.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/gal2.jpg" alt="Another alt text">
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6 col-xs-10 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/gal3.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/gal3.jpg">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-10 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/gal4.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/gal4.jpg" alt="Another alt text">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-10 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/gal5.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/gal5.jpg" alt="Another alt text">
                        </a>
                    </div>



                    <div class="col-lg-4 col-md-6 col-xs-10 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/gal6.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/gal6.jpg">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-10 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/ab1.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/ab1.jpg" alt="Another alt text">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-10 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/ab2.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/ab2.jpg" alt="Another alt text">
                        </a>
                    </div>



                    <div class="col-lg-4 col-md-6 col-xs-10 thumb">
                        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="img/ab3.jpg" data-target="#image-gallery">
                            <img class="img-thumbnail" src="img/ab3.jpg">
                        </a>
                    </div>

                </div>
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


                <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" style="margin-top:12rem;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="image-gallery-title"></h4>
                                <button type="button" class="close " data-dismiss="modal"><span aria-hidden="true" >×</span><span class="sr-only">Close</span>
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
    </div>
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