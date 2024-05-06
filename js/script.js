let navbar = document.querySelector('.header .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    navbar.classList.remove('active')
}


var TxtType = function (el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function () {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) {
        delta /= 2;
    }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function () {
        that.tick();
    }, delta);
};


window.onload = function () {
    var elements = document.getElementsByClassName('typewrite');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
};


// --------------download function ---------------------

window.onload = function(){
    document.getElementById("download").addEventListener("click", () => {
      const invoice = document.getElementById("invoice");
      
      var opt = {
        filename: 'invoice.pdf',
        // orientation: 'p',
        // unit: 'mm',
        // format: 'a4',
        // putOnlyUsedFonts:true
        // image: { type: 'jpeg', quality: 0.98 },
        // html2canvas: { scale: 2 },
        // jsPDF: { unit: 'mm', format: [595.28, 841.89], orientation: 'portrait' }
      };
  
      html2pdf().from(invoice).set(opt).save();
    });
  }
  
// ----------------validation ----------------------

function validateNumber(e){
    const pattern = /^[0-9]$/;
    return pattern.test(e.key)
}

let currentIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function showSlide(index) {
  if (index < 0) {
    currentIndex = totalSlides - 1;
  } else if (index >= totalSlides) {
    currentIndex = 0;
  } else {
    currentIndex = index;
  }

  const transformValue = -currentIndex * 103  + '%';
  document.querySelector('.slider').style.transform = 'translateX(' + transformValue + ')';
}

function prevSlide() {
  showSlide(currentIndex - 1);
}

function nextSlide() {
  showSlide(currentIndex + 1);
}

// Auto slide every 3 seconds
setInterval(nextSlide, 10000);


// package details tab section
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  
  // Set the first tab to be active when the page loads
  document.getElementsByClassName("tablinks")[0].click();


// Review section---------------
 
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
 
//     if (!userRating || !review) {
//         alert(
// "Please select a rating and provide a review before submitting."
//              );
//         return;
//     }
 
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
function copyContent() {
    document.getElementById("ratingValue").value =
        document.getElementById("ratings").innerHTML;
    return true;}
//  review sent message


// ---------------------download ticket


// window.onload = function () {
//     document.getElementById("download")
//         .addEventListener("click", () => {
//             alert("hii")
//             // const ticket = this.document.getElementById("ticket");
//             // console.log(ticket);
//             // console.log(window);
//             // var opt = {
//             //     margin: 1,
//             //     filename: 'myfile.pdf',
//             //     image: { type: 'jpeg', quality: 0.98 },
//             //     html2canvas: { scale: 2 },
//             //     jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
//             // };
//             // html2pdf().from(ticket).set(opt).save();
//         })
// }