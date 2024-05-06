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


    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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
                    <h1 class="display-3 text-white animated slideInDown" data-aos="zoom-in" data-aos-delay="200">Destinations</h1>
                </div>
            </div>
        </div>
    </div>
    
    
    <h1 style="text-align:center">Start Planning Your Dream Holiday</h1>
    
    
    <section class=" container_d ">
        <div class="slide">


            <div class="item" style="background-image: url(https://i.ibb.co/qCkd9jS/img1.jpg);">
                <div class="content">
                    <div class="name">Switzerland</div>
                    <div class="des">Explore Switzerland's charming cities and towns, focusing on Zurich, Geneva, Lucerne, and Bern. Highlight their historical architecture, cultural attractions, and vibrant atmospheres.</div>
                    <!-- <button>See More</button> -->
                </div>
            </div>
            <div class="item" style="background-image: url(img/forest.jpg);">
                <div class="content">
                    <div class="name">Finland</div>
                    <div class="des">Explore Finland's stunning landscapes, including the picturesque lakes, dense forests, and the Northern Lights (Aurora Borealis) during the winter months in Lapland.</div>
                    <!-- <button>See More</button> -->
                </div>
            </div>
            <div class="item" style="background-image: url(https://i.ibb.co/NSwVv8D/img3.jpg);">
                <div class="content">
                    <div class="name">Iceland</div>
                    <div class="des">Explore Iceland's glaciers, including Vatnajökull, Europe's largest glacier. Highlight opportunities for glacier hiking, ice cave exploration, and ice climbing.</div>
                    <!-- <button>See More</button> -->
                </div>
            </div>
            <div class="item" style="background-image: url(https://i.ibb.co/Bq4Q0M8/img4.jpg);">
                <div class="content">
                    <div class="name">Australia</div>
                    <div class="des">Showcase the natural wonder of the Great Barrier Reef, one of the world's most renowned coral reef systems. Discuss snorkeling and diving opportunities, as well as the importance of conservation efforts.</div>
                    <!-- <button>See More</button> -->
                </div>
            </div>
            <div class="item" style="background-image: url(https://i.ibb.co/jTQfmTq/img5.jpg);">
                <div class="content">
                    <div class="name">Netherland</div>
                    <div class="des">Start with an overview of the Netherlands, emphasizing its flat landscapes, extensive canal systems, and iconic windmills.</div>
                    <!-- <button>See More</button> -->
                </div>
            </div>
            <div class="item" style="background-image: url(https://i.ibb.co/RNkk6L0/img6.jpg);">
                <div class="content">
                    <div class="name">Ireland</div>
                    <div class="des"> Emphasize the beauty of Ireland's landscapes, dotted with castles, lakes, and rolling hills.</div>
                    <!-- <button>See More</button> -->
                </div>
            </div>

        </div>

        <div class="button">
            <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
        </div>


    </section>
    <script>
        // //////////////////////////////////////////////
        let next = document.querySelector('.next')
        let prev = document.querySelector('.prev')

        next.addEventListener('click', function () {
            let items = document.querySelectorAll('.item')
            document.querySelector('.slide').appendChild(items[0])
        })

        prev.addEventListener('click', function () {
            let items = document.querySelectorAll('.item')
            document.querySelector('.slide').prepend(items[items.length - 1]) // here the length of items = 6
        })
    </script>



    <section class="container-xl packages mt-5" id="packages">
        <div class="heading">
            <h1>Packages</h1>
        </div>           
        <div class="box-container ">
         <?php $sql = "SELECT * from tbltourpackages";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
         if($query->rowCount() > 0)
          {
         foreach($results as $result)
         {	?>
            <div class="box">
                <div class="image">

                    <img src="admin/packageimages/<?php echo htmlentities($result->PackageImage);?>" alt="">
                </div>
                <div class="content card-body">
                    <h3> <span><?php echo htmlentities($result->PackageName);?></span> </h3>
                    <br><h4> Type : </h4> <span><?php echo htmlentities($result->PackageType);?></span>                                 <div class="rating">
                        <!-- <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i> -->
                        <h5 class="float-right mx-4" >₹ <?php echo htmlentities($result->PackagePrice);?></h5>

                        
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
            </div>
            <div class="box">
                <div class="image">

                    <img src="img/Mexico.png" alt="">
                </div>
                <div class="content card-body">   
                    <h3>Mexico</h3>
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
            </div>
            <div class="box">
                <div class="image">

                    <img src="img/france.png" alt="">
                </div>
                <div class="content card-body">
                    <h3>France</h3>
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
            </div>
            <div class="box">
                <div class="image">

                    <img src="img/Greece.png" alt="">
                </div>
                <div class=" content card-body">
                    <h3>Greece</h3>
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
            </div>
            <div class="box">
                <div class="image">

                    <img src="img/Spain.png" alt="">
                </div>
                <div class="content card-body">
                    <h3>Spain</h3>
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
            </div>
            <div class="box">
                <div class="image">

                    <img src="img/Turkey.png" alt="">
                </div>
                <div class="content card-body">
                    <h3>Turkey</h3>
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
            </div> -->
        </div>
         

    </section>
    <?php include('includes/footer.php');?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>

        AOS.init({
            duration: 800,
            offset: 150,
        });

        $(document).ready(function () {
            $('.carousel').carousel();
        });




    </script>


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>




    <script src="js/jquery-3.1.1.min.js"></script>

    <script src="js/script.js"></script>

</body>

</html>