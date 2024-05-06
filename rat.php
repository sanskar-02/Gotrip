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

if(isset($_POST['submitmain'])){
    if(($_POST['rating'] == "") || ($_POST['comment'] == "")){
        echo " <small>Please fill out all fields.</small>";
    }else{
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];

        // Insert review into the database
        $sql = "INSERT INTO `reviews` (`rating`, `comment`) VALUES ('$rating', '$comment')";
        $dbh->exec($sql);
    }
}
?>


<style>
    #Reviews {

        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        text-align: center;
        /* width: 400px; */
    }

    h1 {
        font-size: 24px;
        margin: 0;
    }

    .rating {
        font-size: 20px;
        margin: 10px 0;
    }

    .stars {
        font-size: 30px;
        margin: 10px 0;
    }

    .star {
        cursor: pointer;
        margin: 0 5px;
    }

    .one {
        color: goldenrod;
    }

    .two {
        color: goldenrod;
    }

    .three {
        color: goldenrod;
    }

    .four {
        color: goldenrod;
    }

    .five {
        color: goldenrod;
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

    .review p {
        margin: 0;
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
</style>

<div id="Reviews" class="tabcontent">

    <form method="post" id="reviewform" onsubmit='return copyContent()'>
        <h1>Give your review</h1>
        <div class="rating">
            <span id="ratings">0</span>/5
        </div>
        <div class="stars"  id="stars">
            <span class="star" data-value="1">★</span>
            <span class="star" data-value="2">★</span>
            <span class="star" data-value="3">★</span>
            <span class="star" data-value="4">★</span>
            <span class="star" data-value="5">★</span>
        </div>
        <input type="hidden" name="rating" id="ratingValue" />
        <p>Share your review:</p>
        <!-- <input type="hidden" name="package_id" value="<?php echo $pid; ?>"> -->

        <textarea id="review" name="comment" placeholder="Write your review here" required></textarea><br>
        <button class="btn5" type="submit" name="submitmain" id="submitmain">Submit</button>


    </form>
    <!-- <div id="thankyouMessage">
        <h1>Success</h1>
        <i class="fa-regular fa-circle-check"></i>
        <p>Your review has been submitted successfully! Thank you for your feedback.</p>
    </div> -->
</div>






<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        let submitmain = document.querySelector("#submitmain");
        let thankyouMessage = document.querySelector("#thankyouMessage");
        let reviewForm = document.querySelector("#reviewform");

        thankyouMessage.style.display = "none";

        submitmain.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent form submission (if you're not using AJAX)

            thankyouMessage.style.display = "block";
            reviewForm.style.display = "none";


            // Reset the form
            if (reviewForm) {
                reviewForm.reset();
            }

        });
    });
</script> -->
<script>
    const stars = document.querySelectorAll(".star");
const rating = document.getElementById("ratings");
const reviewText = document.getElementById("review");
const submitBtn = document.getElementById("submitmain");
const reviewsContainer = document.getElementById("reviews");
 
stars.forEach((star) => {
    star.addEventListener("click", () => {
        const value = parseInt(star.getAttribute("data-value"));
        rating.innerText = value;
 
        // Remove all existing classes from stars
        stars.forEach((s) => s.classList.remove("one", 
                                                "two", 
                                                "three", 
                                                "four", 
                                                "five"));
 
        // Add the appropriate class to 
        // each star based on the selected star's value
        stars.forEach((s, index) => {
            if (index < value) {
                s.classList.add(getStarColorClass(value));
            }
        });
 
        // Remove "selected" class from all stars
        stars.forEach((s) => s.classList.remove("selected"));
        // Add "selected" class to the clicked star
        star.classList.add("selected");
    });
});
 
submitBtn.addEventListener("click", () => {
    const review = reviewText.value;
    const userRating = parseInt(rating.innerText);
 
    if (!userRating || !review) {
        alert(
"Please select a rating and provide a review before submitting."
             );
        return;
    }
 
    if (userRating > 0) {
        const reviewElement = document.createElement("div");
        reviewElement.classList.add("review");
        reviewElement.innerHTML = 
`<p><strong>Rating: ${userRating}/5</strong></p><p>${review}</p>`;
        reviewsContainer.appendChild(reviewElement);
 
        // Reset styles after submitting
        reviewText.value = "";
        rating.innerText = "0";
        stars.forEach((s) => s.classList.remove("one", 
                                                "two", 
                                                "three", 
                                                "four", 
                                                "five", 
                                                "selected"));
    }
});
 
function getStarColorClass(value) {
    switch (value) {
        case 1:
            return "one";
        case 2:
            return "two";
        case 3:
            return "three";
        case 4:
            return "four";
        case 5:
            return "five";
        default:
            return "";
    }
}
</script>
<script>
    function copyContent () {
    document.getElementById("ratingValue").value =  
        document.getElementById("ratings").innerHTML;
    return true;
}
</script>
<script src="js/jquery-3.1.1.min.js"></script>

<script src="js/script.js"></script>