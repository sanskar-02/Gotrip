<?php
// Assuming you have a database connection established
include("./admin/includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Prepare and bind SQL statement
        $sql = "INSERT INTO subscription (email) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);

        // Execute the statement
        if ($stmt->execute()) {
            echo 'Data inserted successfully';
        } else {
            // Handle execution error
            echo 'Error: ' . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // Handle invalid email
        echo "Invalid email address";
    }
} else {
    echo 'Invalid request';
}
?>
<footer class="footer mt-4">
    <div class="box-container">
        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <a href="#" data-aos-delay="150" class="logo">Go<span>Trip</span></a>
            <p>Explore the World with GoTrip Where Every Journey is an Adventure!</p>
            <div class="share">
                <a href="https://www.facebook.com/" target="_block" class="fab fa-facebook-f icn"></a>
                <a href="https://twitter.com/i/flow/login" target="_block" class="fab fa-twitter icn"></a>
                <a href="https://www.instagram.com/" target="_block" class="fab fa-instagram icn"></a>
                <a href="https://in.linkedin.com/" target="_block" class="fab fa-linkedin icn"></a>
            </div>
        </div>
        <div class="box" data-aos="fade-up" data-aos-delay="300">
            <h3>Quick links</h3>
            <a href="index.php" class="links"> <i class="fas fa-arrow-right"></i>Home</a>
            <a href="about.php" class="links"> <i class="fas fa-arrow-right"></i>About us</a>
            <a href="service.php" class="links"> <i class="fas fa-arrow-right"></i>Services</a>
            <a href="destination.php" class="links"> <i class="fas fa-arrow-right"></i>Destination</a>
            <a href="gallery.php" class="links"> <i class="fas fa-arrow-right"></i>Gallery</a>
            <a href="contact.php" class="links"> <i class="fas fa-arrow-right"></i>Contact</a>

        </div>
        <div class="box" data-aos="fade-up" data-aos-delay="450">
            <h3>contact info</h3>
            <p><i class="fas fa-map"></i>Noida, India</p>
            <p><i class="fas fa-phone"></i>+91 XXXXXXXXXX</p>
            <p><i class="fa-solid fa-envelope"></i>gotrip@gmail.com</p>
            <!-- <p><i class="fas fa-clock"></i>Noida, India</p> -->
        </div>
        <div class="box" data-aos="fade-up" data-aos-delay="600">
            <h3>News letter</h3>
            <P>subscribe our newsletter for latest update</P>
            <form action="" id="subscriptionForm">
                <input type="email" placeholder="enter your mail...." name="email" class="email">
                <input type="submit" value="subscribe" class="btn">
            </form>
        </div>


    </div>
    <div class="credit">&copy; copyright GoTrip, all right reserved</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        $('#subscriptionForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            
            var formData = $(this).serialize(); // Serialize form data
            
            // AJAX request to submit data
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    // Handle success
                    console.log('Data submitted successfully');
                    $('#subscriptionForm')[0].reset(); // Reset form
                    // You can update UI here if needed
                    alert("Thank you for subscribing!");
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error('Error:', error);
                    // You can display an error message here if needed
                    alert("Error occurred while subscribing. Please try again later.");
                }
            });
        });
    }); -->
</script>
<style>
    ::placeholder {
        color: #999;
        font-size: 16px;
    }
</style>