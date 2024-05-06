<?php
session_start();
error_reporting(0);
include('./admin/includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit6']))
	{
$name=$_POST['name'];
$mobileno=$_POST['mobileno'];
$password=$_POST['password'];
$email=$_SESSION['login'];

$sql="update tblusers set FullName=:name,MobileNumber=:mobileno,Password=:password where EmailId=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);

$query->execute();
$msg="Profile Updated Successfully";
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>GoTrip</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gotrip" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/basictable.css">
	<link rel="stylesheet" href="css/table-style.css">

<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

  <style>
	.btn5 {
    /* margin-top: 1rem; */
    display: inline-block;
    padding: 0.8rem 2rem;
    font-size: 1.1rem;
    color: rgb(194, 72, 72);
    border: 0.2rem solid rgb(194, 72, 72);
    border-radius: 5rem;
    cursor: pointer;
    background: none;}
	.btn5:hover {
  background: rgb(194, 72, 72);
  color: #f8f9fc;
}
	p{
		font-size: 1.5rem;
	}
	.form-control{
		font-size: 2rem;
	}

		.errorWrap {
			font-size: 1.7rem;
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
	font-size: 1.7rem;
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>
<body>
<?php include('includes/header.php');?>	
<div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white animated slideInDown" data-aos="zoom-in" data-aos-delay="200">My Profile!!</h1>
                </div>
            </div>
        </div>
 </div>
<!--- privacy ---->
<div class="privacy">
	<div class="container">
		<form name="chngpwd" style="display:flex; flex-direction:column; align-items: center; " method="post">
		 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

	<p style="width: 450px;">
		
			<b>Name</b>  <input type="text" name="name" style="font-size:2rem;" placeholder="<?php echo htmlentities($result->FullName);?>" class="form-control" id="name" required="">
	</p> 

<p style="width: 450px;">
<b>Mobile Number</b>
<input type="text" class="form-control" name="mobileno" style="font-size:2rem;" maxlength="10" placeholder="<?php echo htmlentities($result->MobileNumber);?>" id="mobileno"  required="">
</p>

<p style="width: 450px;">
<b>Email Id</b>
	<input type="email" class="form-control" name="email" style="font-size:2rem;" placeholder="<?php echo htmlentities($result->EmailId);?>" id="email" readonly>
			</p>
<p style="width: 450px;">
<b>password</b>
<input type="password" class="form-control" name="password" style="font-size:2rem;"  value="<?php echo htmlentities($result->Password);?>" id="password"  required="">
</p>
<!-- <p style="width: 450px;">
<b>Last Updation Date : </b>
<?php echo htmlentities($result->UpdationDate);?>
</p>

<p style="width: 450px;">	
<b>Reg Date :</b>
<?php echo htmlentities($result->RegDate);?>
			</p> -->
<?php }} ?>

			<p style="width: 450px;">
<button type="submit" name="submit6" class=" btn5">Update</button>
			</p>
			</form>

		
	</div>
</div>
<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
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