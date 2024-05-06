<?php
session_start();
error_reporting(0);
include('./admin/includes/config.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['bkid'])) {
		$bid = intval($_GET['bkid']);
		$email = $_SESSION['login'];
		$sql = "SELECT FromDate FROM tblbooking WHERE UserEmail=:email and BookingId=:bid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':bid', $bid, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount() > 0) {
			foreach ($results as $result) {
				$fdate = $result->FromDate;

				$a = explode("/", $fdate);
				$val = array_reverse($a);
				$mydate = implode("/", $val);
				$cdate = date('Y/m/d');
				$date1 = date_create("$cdate");
				$date2 = date_create("$fdate");
				$diff = date_diff($date1, $date2);
				echo $df = $diff->format("%a");
				if ($df > 1) {
					$status = 2;
					$cancelby = 'u';
					$sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE UserEmail=:email and BookingId=:bid";
					$query = $dbh->prepare($sql);
					$query->bindParam(':status', $status, PDO::PARAM_STR);
					$query->bindParam(':cancelby', $cancelby, PDO::PARAM_STR);
					$query->bindParam(':email', $email, PDO::PARAM_STR);
					$query->bindParam(':bid', $bid, PDO::PARAM_STR);
					$query->execute();

					$msg = "Booking Cancelled successfully";
				} else {
					$error = "You can't cancel booking before 24 hours";
				}
			}
		}
	}

?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

		<link rel="stylesheet" href="css/basictable.css">
		<link rel="stylesheet" href="css/table-style.css">




		<link rel="stylesheet" href="css/bootstrap.min.css">


		<link type="text/css" rel="stylesheet" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



		<title>GoTrip</title>



		<style>
			th {
				font-size: 1.4rem !important;
			}

			td {
				font-size: 1.3rem !important;
			}

			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>
	</head>

	<body>
		<!-- top-header -->
		<div class="top-header">
			<?php include('includes/header.php'); ?>
			<div class="container-fluid py-5 mb-5 hero-header">
				<div class="container py-5">
					<div class="row justify-content-center py-5">
						<div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
							<h1 class="display-3 text-white animated slideInDown" data-aos="zoom-in" data-aos-delay="200">
								Trips</h1>
						</div>
					</div>
				</div>
			</div>
			<!--- /banner-1 ---->
			<!--- privacy ---->
			<div class="privacy">
				<div class="container ">
					<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">My Tour History</h3>
					<!-- <form name="chngpwd" method="post" onSubmit="return valid();"> -->
						<?php if ($error) { ?>
							<div class="errorWrap"><strong>ERROR</strong>:
								<?php echo htmlentities($error); ?>
							</div>
						<?php } else if ($msg) { ?>
							<div class="succWrap"><strong>SUCCESS</strong>:
								<?php echo htmlentities($msg); ?>
							</div>
						<?php } ?>
						<?php

									$uemail = $_SESSION['login'];;
									$sql = "SELECT tblbooking.BookingId as bookid,tblbooking.PackageId as pkgid,tbltourpackages.PackageName as packagename,tblbooking.Travellercount as travelcnt,tblbooking.FromDate as fromdate,tblbooking.ToDate as todate,tblbooking.status as status,tblbooking.BookingDate as bookdate ,tblbooking.CancelledBy as cancelby from tblbooking join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where UserEmail=:uemail";
									$query = $dbh->prepare($sql);
									$query->bindParam(':uemail', $uemail, PDO::PARAM_STR);
									$query->execute();
									$results = $query->fetchAll(PDO::FETCH_OBJ);
									if ($query->rowCount() > 0) {
										?>

						

							<div class="table-responsive " style="overflow-x: scroll;">
								<table border="1" width="100%">
									<tr align="center">
										<th>#</th>
										<th>Booking Id</th>
										<th>Package Name</th>
										<th>No of Travellers</th>
										<th>From</th>
										<th>To</th>
										<th>Status</th>
										<th>Booking Date</th>
										<th>Action</th>
										<th> Tickets </th>
									</tr>
								<?php
								  $cnt  = 1;
								foreach ($results as $result) {	?>

									
											<tr align="center">
												<td>
													<?php echo htmlentities($cnt); ?>
												</td>
												<td>#BK
													<?php echo htmlentities($result->bookid); ?>
												</td>
												<td><a href="package-details.php?pkgid=<?php echo htmlentities($result->pkgid); ?>">
														<?php echo htmlentities($result->packagename); ?>
													</a></td>
												<td>
													<?php echo htmlentities($result->travelcnt); ?>
												</td>
												<td>
													<?php echo htmlentities($result->fromdate); ?>
												</td>
												<td>
													<?php echo htmlentities($result->todate); ?>
												</td>

												<td>
													<?php if ($result->status == 0) {
														echo "Pending";
													}
													if ($result->status == 1) {
														echo "Confirmed";
													}
													if ($result->status == 2 and  $result->cancelby == 'u') {
														echo "Canceled by you  " . $result->upddate;
													}
													if ($result->status == 2 and $result->cancelby == 'a') {
														echo "Canceled by admin " . $result->upddate;
													}
													?>
												</td>
												<td>
													<?php echo htmlentities($result->bookdate); ?>
												</td>
												<?php if ($result->status == 2) {
												?>
													<td>Cancelled</td>
												<?php } else { ?>
													<td><a href="tour-history.php?bkid=<?php echo htmlentities($result->bookid); ?>" onclick="return confirm('Do you really want to cancel booking')">Cancel</a></td>
												<?php } ?>
												<td><a href="ticket.php?bkid=<?php echo htmlentities($result->bookid); ?>">View</a></td>
											</tr>
									<?php $cnt = $cnt +1;
										}
									 ?>
								</table>
							</div>
							<?php } else { ?>
            <div class="text-center fs-5" >No trips are booked.</div>
        <?php } ?>
					

					</form>


				</div>
				<?php include('includes/footer.php'); ?>
			</div>

			<?php } ?>

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
