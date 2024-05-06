<?php
session_start();
include("./admin/includes/config.php");

$pid=$_GET['pkgid'];
// if(isset($_POST['submit2']))
// {
// $pid=intval($_GET['pkgid']);
// $useremail=$_SESSION['login'];
// $Fname=$_POST['fname'];
// $Lname=$_POST['lname'];
// $Email=$_POST['email'];
// $Mobile=$_POST['mobile'];
// $Travellercount=$_POST['travellercount'];
// $Dayscount=$_POST['dayscount'];
// $fromdate=$_POST['fromdate'];
// $todate=$_POST['todate'];
// $status=0;
// $sql="INSERT INTO tblbooking(PackageId,UserEmail,Fname,Lname,RegEmail,Mobile,Travellercount,Dayscount,FromDate,ToDate,status) VALUES(:pid,:useremail,:fname,:lname,:email,:mobile,:travellercount,:dayscount,:fromdate,:todate,:status)";
// $query = $dbh->prepare($sql);
// $query->bindParam(':pid',$pid,PDO::PARAM_STR);
// $query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
// $query->bindParam(':fname',$Fname,PDO::PARAM_STR);
// $query->bindParam(':lname',$Lname,PDO::PARAM_STR);
// $query->bindParam(':email',$Email,PDO::PARAM_STR);
// $query->bindParam(':mobile',$Mobile,PDO::PARAM_STR);
// $query->bindParam(':travellercount',$Travellercount,PDO::PARAM_STR);
// $query->bindParam(':dayscount',$Dayscount,PDO::PARAM_STR);
// $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
// $query->bindParam(':todate',$todate,PDO::PARAM_STR);
// $query->bindParam(':status',$status,PDO::PARAM_STR);
// $query->execute();
// $lastInsertId = $dbh->lastInsertId();
// if($lastInsertId)
// {
// $msg="Booked Successfully";
// }
// else 
// {
// $error="Something went wrong. Please try again";
// }

// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTrip</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
    <style>
        .form-holder .field-row input {
            margin: 0 0 10px;
        }
        .input-group {
    width: 100%;
    padding: 8px;
    background: transparent;
    color: #000;
    font-size: 1.6rem;

}
input, textarea {
    border: 1px solid #b3c1c9;
}
::placeholder{
    color: #999!important;
}
    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white animated slideInDown" data-aos="zoom-in" data-aos-delay="200">Book Your Journey Now</h1>
                </div>
            </div>
        </div>
    </div>
   
 

    <div class=" container-xl " style="padding-bottom:2rem;" >
        <div class="row ">
            <div class="contents col-lg-8 col-md-9">
                <h3 >Details</h3>
                <div class="form-holder">
                    <form action="payment.php?id=<?php echo $pid;?>" method="post" class="info-form">
                        <div class="field-row row">
                            <div class="col-sm-6 col-xs-12" id="content">
                                <input type="text" name="fname" class="input-group"   onkeydown="return/[a-z A-Z]/i.test(event.key)" placeholder="First Name">
                            </div>
                            <div class="col-sm-6 col-xs-12" id="content">
                                <input type="text" name="lname" class="input-group"   onkeydown="return/[a-z A-Z]/i.test(event.key)" placeholder="Last Name">
                            </div>

                        </div>
                        <div class="field-row row">
                            <div class="col-sm-6 col-xs-12" class="content">
                                <input type="email" name="email" class="input-group" placeholder="Enter Your Email">
                            </div>
                            <div class="col-sm-6 col-xs-12" class="content">
                                <input type="text" name="mobile" class="input-group" placeholder="Enter Your Number" onkeypress="return validateNumber(event)" maxlength="10">
                            </div>

                        </div>
                        <div class="field-row row">
                            <div class="col-sm-6 col-xs-12" class="content">
                            <input type="number" name="travellercount" class="input-group" placeholder="No of Travellers">                                                  
                            </div>
                            <div class="col-sm-6 col-xs-12" class="content">
                                <input type="number" name="dayscount" class="input-group" placeholder="No of Days">
                            </div>

                        </div>
                        <div class="field-row row">
                            <div class="col-sm-6 col-xs-12" class="content">
                                <input type="date" name="fromdate" class="input-group" placeholder="Departure Date">
                            </div>
                            <div class="col-sm-6 col-xs-12" class="content">
                                <input type="date" name="todate" class="input-group" placeholder="Return Date">
                            </div>

                        </div>

                        <button href="#" name="submit2" class="btn">Confirm Booking</button>
                    </form>
                </div>

            </div>
            <div class="col-lg-3" style="margin:2rem 0 0 2rem;">
                <h2>Need Help?</h2>

                <p style="font-size:1.3rem;"> Our experts would love to create a package just for you! Available
                    24/7 for your any kind of help.</p>
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