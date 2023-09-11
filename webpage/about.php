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
            <h3 class="mb-3">lorem ipsum dolor sit</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consequatur
                deserunt saepe harum culpa, tenetur doloribus quidem ab quo hic alias non quos quod
                tempore qui repellat facilis sint magnam?
            </p>
        </div>
        <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
            <img src="images\about\Klee.png" class="w-100">
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
                <img src="images\about\court.svg" width="70px">
                <h4 class="mt-3">MANY FEATURES</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images\about\court.svg" width="70px">
                <h4 class="mt-3">MANY BRANCHES</h4>
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
                <img src="#" class="w-100">
                <h5 class="mt-2">Random Name</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="#" class="w-100">
                <h5 class="mt-2">Random Name</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="#" class="w-100">
                <h5 class="mt-2">Random Name</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="#" class="w-100">
                <h5 class="mt-2">Random Name</h5>
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
