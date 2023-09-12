<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro One Badminton Center - ABOUT US</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/common.css">
    <?php require('inc/links.php'); ?>
    <style>
        .box {
            border-top-color: #2EC1AC !important;
        }
    </style>

</head>

<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">ABOUT US</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        <?php
        // Include your PHP database connection code here
        require('../webpage/inc/db_conn.php'); // Adjust the file path as needed

        // Retrieve the dynamic content
        $query = "SELECT content FROM about_us_content WHERE id = 1"; // Assuming the content has ID 1
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Display the dynamic content
        if ($row) {
            echo $row['content'];
        } else {
            echo "Content not found.";
        }
        ?>
    </p>
</div>

<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
            <h3 class="mb-3">Meet the Team</h3>
            <p>
                Hi! Welcome to Pro One Badminton Center. My name is Ilhan Kamil bin Shahrin. Our objective are:<br>
                1. Make Badminton accessible to everyone.<br>
                2. Provide a training badminton ground.<br>
                3. Make badminton fun.
                We have many branches, and this branch is located at Wangsa Maju.<br>
                Hope to see you in the court and having fun with badminton!
            </p>
        </div>
        <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
            <img src="images\about\ilhan.jpg" class="w-100">
        </div>
    </div>
</div>

<!--comeback to dis and add images n features-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images\about\court.svg" width="70px">
                <h4 class="mt-3">MANY BRANCHES</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images\about\journal.svg" width="70px">
                <h4 class="mt-3">MANY FEATURES</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images\about\people-fill.svg" width="70px">
                <h4 class="mt-3">100+ CUSTOMERS</h4>
            </div>
        </div>
    </div>
</div>

<h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

<!--MANAGEMENT TEAM-->
<div class="container px-4">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper mb-5">
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="images/about/ariff.jpg" class="w-100">
                <h5 class="mt-2">AHMAD ARIFF AZAHARI BIN MOHD AZHAR</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="images/about/raif.jpg" class="w-100">
                <h5 class="mt-2">ABANG RAIF ZAKWAN BIN ABANG RAZALI</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="images/about/david.jpg" class="w-100">
                <h5 class="mt-2">DAVID GOH TONG WEY</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="images/about/faiq.jpg" class="w-100">
                <h5 class="mt-2">MOHD FAIQ HAZIQ BIN MOHD ZAMRI</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="images/about/faiq.jpg" class="w-100">
                <h5 class="mt-2">MOHD FAIQ HAZIQ BIN MOHD ZAMBERI</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="images/about/shamil.jpg" class="w-100">
                <h5 class="mt-2">MUHAMMAD SHAMIL BIN MOHD SABIRIN</h5>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<?php require('inc/footer.php') ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 40,
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1,
            },
            760: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });
</script>
</body>
</html>
