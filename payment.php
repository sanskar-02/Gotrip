<?php
session_start();
include("./admin/includes/config.php");

if (isset($_POST['submit2'])) {
    $pid = ($_GET['id']);
    $useremail = $_SESSION['login'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Email = $_POST['email'];
    $Mobile = $_POST['mobile'];
    $Travellercount = $_POST['travellercount'];
    $Dayscount = $_POST['dayscount'];
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $status = 0;

    // Fetch package price from the database
    $sql = "SELECT PackagePrice FROM tbltourpackages WHERE PackageId = :pid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pid', $pid, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $packageprice = $result['PackagePrice'];

    // Calculate total amount based on package price, traveller count, and day count
    $totalAmount = $packageprice * $Travellercount * $Dayscount;

    $sql = "INSERT INTO tblbooking(PackageId,UserEmail,Fname,Lname,RegEmail,Mobile,Travellercount,Dayscount,FromDate,ToDate,status) VALUES(:pid,:useremail,:fname,:lname,:email,:mobile,:travellercount,:dayscount,:fromdate,:todate,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pid', $pid, PDO::PARAM_STR);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->bindParam(':fname', $Fname, PDO::PARAM_STR);
    $query->bindParam(':lname', $Lname, PDO::PARAM_STR);
    $query->bindParam(':email', $Email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $Mobile, PDO::PARAM_STR);
    $query->bindParam(':travellercount', $Travellercount, PDO::PARAM_STR);
    $query->bindParam(':dayscount', $Dayscount, PDO::PARAM_STR);
    $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
    $query->bindParam(':todate', $todate, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if ($lastInsertId) {
        $msg = "<div class='alert alert-success'>";
        // Redirect to payment page with booking details
        // header("Location: payment.php?booking_id=" . $lastInsertId);
    } else {
        $error = "Something went wrong. Please try again";
    }
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<form>
    <input type="hidden" name="totalAmount" id="totalAmount" value="<?php echo htmlentities($totalAmount); ?>" />
    <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()" />
</form>

<script>
    function pay_now() {
        var totalAmount = jQuery('#totalAmount').val();
       

        jQuery.ajax({
            type: 'post',
            url: 'payment_process.php',
            data: "amt=" + totalAmount,
            success: function (result) {
                var options = {
                    "key": "rzp_test_L59AkrXLMEkkdc",
                    "amount": totalAmount * 100,
                    "currency": "INR",
                    "name": "GoTrip",
                    "description": "Test Transaction",
                    "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                    "handler": function (response) {
                        jQuery.ajax({
                            type: 'post',
                            url: 'payment_process.php',
                            data: "payment_id=" + response.razorpay_payment_id,
                            success: function (result) {
                                window.location.href = "tour-history.php";
                            }
                        });
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });
    }
</script>
<!-- ( // var bookingId = <?php echo $lastInsertId; ?>;) -->