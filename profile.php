<?php
session_start();
error_reporting(0);
include('./admin/includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    $useremail = $_SESSION['login'];
    $sql = "SELECT * FROM tblusers WHERE EmailId=:useremail";
    $query = $dbh->prepare($sql);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>GoTrip</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Gotrip" />
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!-- Additional styles go here -->
        <style>
            /* 
            p{
                font-size:14px ;
                
            }
      
            /* body {
                background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            } */

            .emp-profile {
                padding: 3%;
                margin-top: 3%;
                margin-bottom: 3%;
                border-radius: 0.5rem;
                background: #fff;
            }

            .emp-profile label {
                font-size: 1.4rem;
                font-weight: 600;
            }

            .emp-profile p {
                font-size: 1.5rem;
            }

            .profile-img {
                text-align: center;
                border-radius: 100%;

            }

            .profile-img img {
                width: 40%;
                height: 40%;
                border-radius: 100%;
            }

            .pro {
                text-align: center;
            }

            .ptitle {
                font-weight: 900;
                font-size: 30px;
            }

            h2 .title {
                display: inline;

                font-weight: 700;
                font-size: 30px;
                color: rgb(194, 72, 72);

            }

            .btn5 {
                margin-top: 1rem;
                display: inline-block;
                padding: 0.8rem 2rem;
                font-size: 1.1rem;
                color: rgb(194, 72, 72);
                border: 0.2rem solid rgb(194, 72, 72);
                border-radius: 5rem;
                cursor: pointer;
                background: none;
            }

            .btn5:hover {
                background: rgb(194, 72, 72);
                color: #f8f9fc;
            }
        </style>

    </head>

    <body>
        <?php include('includes/header.php'); ?>
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown" data-aos="zoom-in" data-aos-delay="200">Profile</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="privacy">
            <div class="container">
                
                        <div class="pro">
                           
                            <p>Name:</p>
                            <p>Mobile Number: </p>
                            <p>Email Id: </p>
                            <p class><a  class="btn5 ">Edit Profile</a></p>
                        </div>
                        <!-- Additional user information goes here

               
            </div>
        </div> -->

        <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
        <?php
        if ($query->rowCount() > 0) {
            foreach ($results as $result) {
        ?>
                <div class="pro">
                    <h2 class="ptitle">Welcome To Mr/Miss.&nbsp;<p class="title"><?php echo htmlentities($result->FullName); ?></p>
                    </h2>
                    <h4>We are Glad You're here.</h4>
                </div>
                <div class="container emp-profile">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img src="img/dp.png"> <!-- <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file" />
                            </div> -->
                                </div>
                            </div>

                            <div class="col-md-8 mt-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>User name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo htmlentities($result->Username); ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> <?php echo htmlentities($result->FullName); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo htmlentities($result->EmailId); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo htmlentities($result->MobileNumber); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <a href="edit-profile.php" class="btn5" name="btnAddMore">Edit-Profile </a>
                                </div>


                            </div>

                        </div>


                    </form>
                </div>
        <?php
            }
        }
        ?>
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
<?php } ?>