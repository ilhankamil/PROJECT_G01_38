<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro One Badminton Center - COURT</title>
    <link rel="stylesheet" href="css/common.css">
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source%20Sans%20Pro:wght@400;700&display=swap">
    <style>
        .feature-box {
            height: 100%;
            transition: transform 0.3s ease-in-out;
        }

        .feature-box:hover {
            transform: scale(1.03);
        }

        .feature-icon {
            width: 40px;
            margin-bottom: 10px;
        }

        .feature-title {
            font-size: 1.5rem;
            color: var(--teal);
        }

        .feature-description {
            font-size: 1rem;
            line-height: 1.5;
        }

        /* Centered Carousel */
        .carousel-container {
            display: flex;
            justify-content: center;
        }

        .swiper-slide img {
            width: 100%; /* Make the images responsive */
            max-width: 600px; /* Set the maximum width as needed */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>

<body class="bg-light">

<?php require('inc/header.php');?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Welcome to Our Badminton Oasis</h2> 
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        Step into a realm where passion meets play, and discover the extraordinary features that set our badminton center apart. 
        <br>At "Pro One Badminton Center," we don't just offer courts; we provide an immersive experience designed to elevate your game and make every moment unforgettable.
    </p>
</div>

<!--feaatures container-->
<div class="container">
    <div class="row">
        <!--wifi-->
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark feature-box">
                <div class="d-flex align-items-center mb-4">
                    <img src="images/features/wifi.svg" class="feature-icon" alt="Wifi Icon">
                    <h5 class="m-0 ms-3 feature-title">WI-FI</h5>
                </div>
                <p class="feature-description">
                    Our court features free Wi-Fi to ease the usage of QR Code and overall useful for everything use.
                </p>
            </div>
        </div>
        <!--court-->
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark feature-box">
                <div class="d-flex align-items-center mb-4">
                    <img src="images/features/court.svg" class="feature-icon" alt="Wifi Icon">
                    <h5 class="m-0 ms-3 feature-title">Court</h5>
                </div>
                <p class="feature-description">
                Our court offers a high quality of court and abundance amount of courts to ease users. More court, means more fun to be have!
                </p>
            </div>
        </div>
        <!--Affordability-->
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark feature-box">
                <div class="d-flex align-items-center mb-4">
                    <img src="images/features/currency-dollar.svg" class="feature-icon" alt="Wifi Icon">
                    <h5 class="m-0 ms-3 feature-title">Affordability</h5>
                </div>
                <p class="feature-description">
                Our court is affordable to rent to give opportunity to attract more enthusiat who are just starting or wanting to further improve their game.
                </p>
            </div>
        </div>
        <!--ammenities-->
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark feature-box">
                <div class="d-flex align-items-center mb-4">
                    <img src="images/features/toilet.svg" class="feature-icon" alt="Wifi Icon">
                    <h5 class="m-0 ms-3 feature-title">Ammenities</h5>
                </div>
                <p class="feature-description">
                At Pro One Badminton Pro Center, cleanliness is our number 1 priority. All of our ammenities are regularly cleaned and maintained to provide the best for our customers.
                </p>
            </div>
        </div>
        <!--food and drinks-->
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark feature-box">
                <div class="d-flex align-items-center mb-4">
                    <img src="images/features/cup-straw.svg" class="feature-icon" alt="Wifi Icon">
                    <h5 class="m-0 ms-3 feature-title">Food and Drinks</h5>
                </div>
                <p class="feature-description">
                Our court has a shop that provides food and drinks to energise our badminton goers to help them regain their focus and stamina.
                </p>
            </div>
        </div>
        <!--accessories shop-->
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark feature-box">
                <div class="d-flex align-items-center mb-4">
                    <img src="images/features/shop.svg" class="feature-icon" alt="Wifi Icon">
                    <h5 class="m-0 ms-3 feature-title">Accessories Shop</h5>
                </div>
                <p class="feature-description">
                Court is not the only feature provided, shops to supply all your badminton needs are also available here! Come to our shop to resupply or get a new shiny racket to boost up your game in the court!
                </p>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
    });
</script>
</body>
</html>
