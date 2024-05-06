<<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("./admin/includes/config.php");

// Check if BookingId is provided in the URL
if (!isset($_SESSION['login']) || !isset($_GET['bkid'])) {
  header("Location: login.php");
  exit;
}


// Fetch bookings associated with the logged-in user
$useremail = $_SESSION['login'];
$bid = $_GET['bkid'];
// $sql = "SELECT * FROM  tblbooking WHERE UserEmail = :useremail and  BookingID=:BookingID";
$sql = "SELECT b.*, p.PackageName, p.PackagePrice, p.PackageType, p.PackageLocation FROM tblbooking b JOIN tbltourpackages p ON b.PackageID = p.PackageID WHERE b.UserEmail = :useremail AND b.BookingID = :BookingID";
// $sql = "SELECT b.*, p.PackageName, p.PackagePrice, 
// (SELECT SUM(Amount) FROM payment WHERE BookingID = b.BookingID) AS TotalAmount
// FROM tblbooking b 
// JOIN tbltourpackages p ON b.PackageID = p.PackageID 
// WHERE b.UserEmail = :useremail AND b.BookingID = :BookingID";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->bindParam(':BookingID', $bid, PDO::PARAM_STR);
$query->execute();
// $booking = $query->fetchAll(PDO::FETCH_ASSOC);
if ($query->rowCount() > 0) {
  $booking = $query->fetch(PDO::FETCH_ASSOC); // Fetching only one row
} else {
  // Handle case where no booking is found
  // For example, redirect user or show an error message
  echo "<script>alert('No such Booking Found!');</script>";
}

// Now you can use $booking_details to access the data for the specific booking ID
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />


  <link rel="stylesheet" href="css/bootstrap.min.css">


  <link type="text/css" rel="stylesheet" href="css/style.css">

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>
  

  <style>
    #invoice{
      /* width: 100%;
      height: 100%; */
      position: relative;
     
    } 
    .text-danger strong {
      color: #9f181c;
    }

    .receipt-main {
      background: #ffffff none repeat scroll 0 0;
      border-bottom: 12px solid #333333;
      border-top: 12px solid #9f181c;
      padding: 10px 10px;
      position: relative;
      box-shadow: 0 1px 21px #acacac;
      color: #333333;
    }

    .receipt-main p {
      color: #333333;
      line-height: 1.42857;
    }

    .receipt-footer h1 {
      font-size: 15px;
      font-weight: 400 !important;
      margin: 0 !important;
    }

    .receipt-main::after {
      background: #414143 none repeat scroll 0 0;
      content: "";
      height: 5px;
      left: 0;
      position: absolute;
      right: 0;
      top: -13px;
    }

    .receipt-main thead {
      background: #414143 none repeat scroll 0 0;
    }

    .receipt-main thead th {
      color: #fff;
    }


    .receipt-right {
      font-size: 16px;
      font-weight: bold;

    }

    .receipt-right p {
      font-size: 12px;
      margin: 0px;
    }

    .receipt-right p i {
      text-align: center;
      width: 18px;
    }

    .receipt-main td {
      padding: 4px 10px !important;
    }

    .receipt-main th {
      padding: 7px 10px !important;
    }

    .receipt-main td {
      font-size: 13px;
      font-weight: initial !important;
    }


    .receipt-main td h2 {
      font-size: 20px;
      font-weight: 900;
      margin: 0;
      text-transform: uppercase;
    }

    .receipt-header-mid .receipt-left h1 {
      font-weight: 100;

      text-align: right;
      text-transform: uppercase;
    }

    .receipt-header-mid {

      overflow: hidden;
    }

    .container {
      background-color: #dcdcdc;
  
    }
    .receipt-main{
      position: relative;
    }
    
    #download {
      position: absolute;
      top: 110%;
      right: 33%;
      padding: 5px 5px;
      background: grey;
      
    }
  </style>



</head>

<body>
  <?php
  include('includes/header.php');
  ?>
  <br>
  <br>
  <section class="container new" >
    <div class="ticket" id="invoice">
      <div class="row">

        <div class="receipt-main col-lg-9 col-xl-9 col-xxl-9">
          <div class="row">
            <div class="receipt-header d-flex justify-content-between">
              <!-- <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="receipt-left">
                <img class="img-responsive" alt="iamgurdeeposahan" src="https://bootdey.com/img/Content/avatar/avatar6.png" style="width: 71px; border-radius: 43px;">
              </div>
            </div> -->

              <div class="receipt-right ">
                <a href="#" class="logo">Go<span>Trip</span></a>
              </div>
              <div class="ticket-title">
                <p>Congratulations your trip have been booked ! : </p>
                <i class="fa-solid fa-circle-check"></i> <span>Ticket Confirmed</span>
              </div>
              <div class="font-weight-bold">
                <p> Phone number : +91 12345XXXXX</p>
                <p>GoTrip@gmail.com </p>
                <p>Noida, UP <i class="fa fa-location-arrow"></i></p>
              </div>

            </div>
          </div>
          <hr>
          <h3 class="text-center">Booking Details</h3>


          <div class="row">
            <div class="receipt-header receipt-header-mid">
              <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                <div class="receipt-right">
                  <p><b> Full Name:</b> <?php echo $booking['Fname']; ?> <?php echo $booking['Lname']; ?></p>

                  <p><b>Mobile :</b> <?php echo $booking['Mobile']; ?></p>
                  <p><b>Email :</b> <?php echo $booking["RegEmail"]; ?></p>

                </div>
              </div>

            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered ">

              <tbody>
                <tr>
                  <th class="col-md-3" scope="row">Booking ID </th>
                  <td class="col-md-6"><?php echo $bid;  ?></td>
                </tr>
                <tr>
                  <th class="col-md-3" scope="row">Package Name</th>
                  <td class="col-md-6"><?php echo $booking['PackageName']; ?></td>
                </tr>
                <tr>
                  <th class="col-md-3" scope="row">Package Type</th>
                  <td class="col-md-6"> <?php echo $booking['PackageType']; ?></td>
                </tr>
                <tr>
                  <th class="col-md-3" scope="row">Package Location</th>
                  <td class="col-md-6"><?php echo $booking['PackageLocation']; ?></td>
                </tr>
                <tr>
                  <th class="col-md-3" scope="row">Package Price</th>
                  <td class="col-md-6">₹ <?php echo $booking['PackagePrice']; ?> /-</td>
                </tr>
                <tr>
                  <th class="col-md-3" scope="row">No of Travellers</th>
                  <td class="col-md-6"><?php echo $booking['Travellercount']; ?></td>
                </tr>
                <tr>
                  <th class="col-md-3" scope="row">No of Days</th>
                  <td class="col-md-6"><?php echo $booking['Dayscount']; ?></td>
                </tr>
                <tr>
                  <th class="col-md-3" scope="row">From Date</th>
                  <td class="col-md-6"><?php echo $booking['FromDate']; ?></td>
                </tr>
                <tr>
                  <th class="col-md-3" scope="row">To </th>
                  <td class="col-md-6"><?php echo $booking['ToDate']; ?></td>
                </tr>
                <tr>
                  <td class="text-right">
                    <h2><strong>Total Amount </strong></h2>
                  </td>
                  <td class="text-left text-danger">
                    <h2><strong>₹ <?php echo $booking['PackagePrice']; ?></strong></h2>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="receipt-header receipt-header-mid receipt-footer">
              <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                <p><b>Booking Date :</b> <?php echo $booking['BookingDate']; ?></p>
                <div class="receipt-right">

                  <h5 style="color: rgb(140, 140, 140);">Thanks for Travelling with Us.!</h5>
                </div>
              </div>
            </div>
          </div>


        </div>

      </div>

    </div>
    <button type="submit" class="float-right" id="download">Download PDF</button>

  </section>
  <?php
  include('includes/footer.php');
  ?>
  <script src="js/jquery-3.1.1.min.js"></script>

  <script src="js/script.js"></script>
  <script>
    window.onload = function() {
      document.getElementById("download").addEventListener("click", () => {
        const invoice = this.document.getElementById("invoice");
        html2pdf().from(invoice).set({
          margin: 1,
          filename: 'invoice.pdf',
          image: {
            type: 'png',
            quality: 0.98
          },
          html2canvas: {
            scale: 3,
            width: 620,
            height: 830
          },
          jsPDF: {
            unit: 'pt',
            format: 'a4',
            orientation: 'portrait'
          }
        }).save();
      });
    }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

  <script>
    AOS.init({
      duration: 800,
      offset: 150,
    });
  </script>
</body>

</html>