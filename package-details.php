    <?php session_start();
    error_reporting(0);
    include("./admin/includes/config.php"); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

        <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
        <link rel="stylesheet" href="css/bootstrap.min.css">


        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/basictable.css">
        <link rel="stylesheet" href="css/table-style.css">


        <title>GoTrip</title>
        <style>
            .tab {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #f9f9f9;
            }

            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                font-size: 17px;
            }

            .tab button:hover {
                background-color: #ddd;
            }

            .tab button.active {
                background-color: #ccc;
            }

            .tabcontent {
                display: none;
                padding: 6px 12px;
                border: 1px solid #ccc;
                border-top: none;
            }

            img {
                height: 100%;
                width: 100%;
                padding: 3px;
                /* display: block; */
                object-fit: cover;
            }

            .accordion-item {
                color: #999;


            }

            .accordion-body {
                font-size: 1.4rem;
                background: #f5f5f5;
            }

            #Policies {
                font-size: 1.5rem;

            }

            #policies p {
                font-size: 1.7rem;
            }

            #Policies table {
                font-size: 1.7rem;

            }
        </style>
    </head>

    <body>
        <?php include('includes/header.php'); ?>


        <div class="selectroom">

            <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
            <?php
            $pid = intval($_GET['pkgid']);
            $sql = "SELECT * from tbltourpackages where PackageId=:pid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':pid', $pid, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {

                foreach ($results as $result) {
            ?>
                    <div class="container-fluid py-5 mb-5 hero-header">
                        <div class="container py-5">
                            <div class="row justify-content-center py-5">
                                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                                    <h2 class="display-3 text-white animated slideInDown" data-aos="zoom-in" data-aos-delay="200">
                                        <?php echo htmlentities($result->PackageName); ?></h2>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="selectroom_top">
                            <div class="row">
                                <div class="col-lg-6 selectroom_left wow fadeInLeft animated box2" data-wow-delay=".5s">
                                    <img src="admin/packageimages/<?php echo htmlentities($result->PackageImage); ?>" class="img-responsive" alt="">
                                </div>
                                <div class="col-lg-6 selectroom_left wow fadeInLeft animated box2" data-wow-delay=".5s">
                                    <img src="admin/packageimages/<?php echo htmlentities($result->PackageImage1); ?>" class="img-responsive" alt="">
                                </div>
                                <div class="col-lg-6 selectroom_left wow fadeInLeft animated box2" data-wow-delay=".5s">
                                    <img src="admin/packageimages/<?php echo htmlentities($result->PackageImage2); ?>" class="img-responsive" alt="">
                                </div>
                                <div class="col-lg-6 selectroom_left wow fadeInLeft animated box2" data-wow-delay=".5s">
                                    <img src="admin/packageimages/<?php echo htmlentities($result->PackageImage3); ?>" class="img-responsive" alt="">
                                </div>
                            </div>
                            <div class="tab">
                                <button class="tablinks" onclick="openTab(event, 'Overview')">Overview</button>
                                <button class="tablinks" onclick="openTab(event, 'PackageDetails')">Package Details</button>
                                <button class="tablinks" onclick="openTab(event, 'Policies')">Policies</button>
                                <button class="tablinks" onclick="openTab(event, 'Reviews')">Reviews</button>
                            </div>

                            <div id="Overview" class="tabcontent">
                                <!-- Overview content goes here -->
                                <div class="col-md-12 selectroom_right wow fadeInRight animated" data-wow-delay="5s">

                                    <p class="dow">#PKG-<?php echo htmlentities($result->PackageId); ?></p>
                                    <p><b>Package Type :</b> <?php echo htmlentities($result->PackageType); ?></p>
                                    <p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation); ?></p>
                                    <p><b>Features :</b> <?php echo htmlentities($result->PackageFetures); ?></p>

                                    <div class="grand">
                                        <p>Grand Total :</p>
                                        <h3>₹ <?php echo htmlentities($result->PackagePrice); ?></h3>
                                    </div>
                                    <?php if ($_SESSION['login']) { ?>
                                        <a href="Booking.php?pkgid=<?php echo $pid ?>" class="btn ">Book Now</a>
                                    <?php } else { ?>
                                        <a href="#" data-toggle="modal" data-target="#myModal4" class="btn" onclick="showLoginAlert()">Book Now</a>
                                    <?php } ?>
                                    <script>
                                        function showLoginAlert() {
                                            alert("Please log in to book the package.");
                                            // You can redirect to the login page here if needed
                                            // window.location.href = 'login.php';
                                        }
                                    </script>

                                </div>

                            </div>

                            <div id="PackageDetails" class="tabcontent">
                                <!-- Package Details content goes here -->
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Accommodation
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p style="font-size:1.4rem; "><?php echo htmlentities($result->Accommodation); ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Meals
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p style="font-size:1.4rem; "><?php echo htmlentities($result->Meal); ?> </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Sightseeing and Attraction
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p style="font-size:1.4rem; "><?php echo htmlentities($result->Sightseeing); ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Insurance
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p style="font-size:1.4rem; "><?php echo htmlentities($result->Insurance); ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                Others
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p style="font-size:1.4rem; "><?php echo htmlentities($result->Others); ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="Policies" class="tabcontent ">
                                <!-- Policies content goes here -->
                                <h2>Amendements</h2>
                                <hr>
                                <p>The Company may be required to collect cancellation fees from the Clie nt in the event that the Client agrees to change or cancel his or her reservation for any reason, including illness, death, accident, or other personal reasons such as failing to pay the remaining balance:.</p>
                                <table>
                                    <thead>
                                        <th>When a Cancellation is made</th>
                                        <th>Charges</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Prior to 46 days from the date of departure</td>
                                            <td>Non-Refundable Booking Deposit</td>
                                        </tr>
                                        <tr>
                                            <td>Between 45 - 31 days from the date of departure</td>
                                            <td>75% of the holiday cost</td>
                                        </tr>
                                        <tr>
                                            <td>Between 30 or below from the date of departure</td>
                                            <td>100% of the holiday cost</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p></p>

                                The services are scheduled several months in advance, and depending on when the cancellation is made to the Supplier, the Company may lose money if such services are canceled for a certain departure. As a result, the company's cancellation policies will apply to any cancelled tours or services. In addition to the terms and conditions set out by the company, the terms and conditions and cancellation policy of the third party you reserve a product or service from will also apply. Any cancellation of a trip or service must be made in writing and must provide a detailed explanation of the cancellation. You specifically accept the terms mentioned above.
                                <br>
                                <br>


                                Any Tour may be canceled by the firm up to departure, for any cause, at any time. In such a case, all of your payments will be immediately and entirely reimbursed in Indian Rupees alone; no compensation would be due. Any additional expenses or fees associated with the issue and/or cancellation of airline tickets or other arrangements made outside of the company are not covered by the firm's insurance.
                                <br>
                                <p>
                                    <b>Note:</b><br> The cancellation policy mentioned above is a general one that may vary according on the trip date, destination, package, and services that are reserved and paid for. The cancellation policy mentioned above might not apply to dynamic properties and confirmed reservations, and it might change.

                                </p>

                            </div>
                            <?php

                            // DB credentials.
                            define('DB_HOST', 'localhost');
                            define('DB_USER', 'root');
                            define('DB_PASS', '');
                            define('DB_NAME', 'tms');
                            // Establish database connection.
                            try {
                                $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                            } catch (PDOException $e) {
                                exit("Error: " . $e->getMessage());
                            }

                            if (isset($_POST['submitmain'])) {
                                if (($_POST['rating'] == "") || ($_POST['comment'] == "")) {
                                    echo " <small>Please fill out all fields.</small>";
                                } else {
                                    $username = $_SESSION['name'];

                                    $rating = $_POST['rating'];
                                    $comment = $_POST['comment'];

                                    // Insert review into the database
                                    $pid = intval($_GET['pkgid']);
                                    $sql = "INSERT INTO `reviews` (`pkgid`,`user`,`rating`, `comment`) VALUES ('$pid','$username', '$rating', '$comment')";
                                    $dbh->exec($sql);

                                    echo "<script>alert('Review submitted successfully!');</script>";
                                }
                            }
                            ?>



                            <style>
                                #Reviews {

                                    /* padding: 20px;
                                    border-radius: 8px; */
                                    /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); */
                                    text-align: center;
                                    /* width: 400px; */
                                }

                                h1 {
                                    font-size: 24px;
                                    margin: 0;
                                }

                                .rating {
                                    font-size: 20px;

                                }

                                .stars {
                                    font-size: 30px;

                                }

                                .star {
                                    cursor: pointer;
                                    margin: 0 5px;
                                }

                                .one {
                                    color: gold;
                                    text-shadow: 0 0 10px gold;
                                }

                                .two {
                                    color: gold;
                                    text-shadow: 0 0 10px gold;
                                }

                                .three {
                                    color: gold;
                                    text-shadow: 0 0 10px gold;
                                }

                                .four {
                                    color: gold;
                                    text-shadow: 0 0 10px gold;
                                }

                                .five {
                                    color: gold;
                                    text-shadow: 0 0 10px gold;
                                }

                                textarea {
                                    width: 60%;
                                    padding: 6px;
                                    border: 1px solid #ccc;
                                    border-radius: 4px;
                                    font-size: 14px;
                                }

                                .reviews {
                                    margin-top: 20px;
                                    text-align: left;
                                }

                                .review {
                                    border: 1px solid #ccc;
                                    border-radius: 4px;
                                    padding: 10px;
                                    margin: 10px 0;
                                }

                                p {
                                    font-size: 13px;
                                }

                                #thankyouMessage i {
                                    /* color : #fff ; */
                                    color: green;
                                    font-size: 100px;
                                    overflow: hidden;
                                    transition: all ease-out;

                                }

                                #thankyouMessage p {
                                    font-size: 20px;
                                }

                                .rating {
                                    opacity: 0;

                                }

                                .customer-rev {
                                    text-align: left;
                                    width: 100%;
                                    border: 1px solid #ccc;
                                }

                                .review-comments li {
                                    font-size: 2rem;
                                    font-weight: 600;
                                    margin: 2px 5px;


                                }

                                .review-comments span {
                                    font-size: 1.2rem;
                                    float: right;
                                    margin: 0px 5px 5px 0px;
                                }

                                .review-comments p {
                                    font-size: 1.3rem;
                                    font-weight: 500;
                                    margin: 0px 0px 0px 10px;
                                    
                                }
                                .review-comments .rat{
                                    font-size: 3rem;
                                    color: gold;
                                    text-shadow: 0 0 3px gold;
                                }
                            </style>

                            <div id="Reviews" class="tabcontent">

                                <form method="post" id="reviewform" onsubmit='return copyContent()'>
                                    <h1>Give your review</h1>
                                    <hr>
                                    <div class="rating">
                                        <span id="ratings">0</span>/5
                                    </div>
                                    <div class="stars" id="stars">
                                        <span class="star" data-value="1">★</span>
                                        <span class="star" data-value="2">★</span>
                                        <span class="star" data-value="3">★</span>
                                        <span class="star" data-value="4">★</span>
                                        <span class="star" data-value="5">★</span>
                                    </div>
                                    <p>Share your review:</p>
                                    <input type="hidden" name="rating" id="ratingValue" />

                                    <textarea id="review" name="comment" placeholder="Write your review here" required></textarea><br>
                                    <button class="btn5" name="submitmain" id="submitmain">Send </button>


                                </form>
                        <?php }
                } ?>
                        <?php
                        // Assuming you have already established a database connection

                        // Replace 'your_package_id' with the actual package I  D for which you want to fetch reviews
                        $pid = intval($_GET['pkgid']);

                        // Fetch reviews from the database for the specified package ID
                        $sql = "SELECT * FROM reviews WHERE pkgid = :pkgid";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':pkgid', $pid, PDO::PARAM_INT);
                        $query->execute();
                        $reviews = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <div class="customer-rev float-left my-4">
                            <h3 class="text-center my-3">Rating & reviews</h3>
                            <hr>
                            <div class="review-comments">
                                <ul>
                                    <?php foreach ($reviews as $review) {
                                        $rating = $review['rating'];
                                        $full_stars = intval($rating); // Get the integer part for full stars
                                        // $half_star = ($rating - $full_stars) >= 0.5 ? true : false; // Check for half star
                                    ?>
                                        <li>


                                            <?php echo $review['user'] ?>
                                        </li>
                                        <span><?php echo $review['created_at'] ?></span>
                                        <p><?php echo $review['comment'] ?></p>
                                        <p class="rat" > <?php
                                                    // Display full stars
                                                    for ($i = 0; $i < $full_stars; $i++) {
                                                        echo "★";

                                                    }
                                                    // Display half star if applicable
                                                    for ($i = $full_stars; $i < 5; $i++) {
                                                        echo "☆";
                                                    }
                                                    ?></p>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>



                            </div>






                        </div>

                    </div>



                    <?php include('includes/footer.php'); ?>

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