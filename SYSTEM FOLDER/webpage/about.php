<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro One Badminton Centre - ABOUT US</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/common.css">
    <?php require('inc/links.php'); ?>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    h3 {
        color: #2EC1AC;
    }

    p {
        font-size: 1.2rem;
        line-height: 1.5;
    }

    .container {
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .team-member {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between; /* Adjusted to evenly space content */
        text-align: center;
        margin: 10px;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: box-shadow 0.3s ease-in-out;
        height: 300px; /* Set a fixed height */
    }

    .team-member:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .team-member-image {
        width: 100%;
        max-width: 150px; /* Adjust the size as needed */
        border-radius: 50%;
    }

    .team-member-name {
        font-size: 1rem; /* Adjust the size as needed */
        margin-top: 10px;
    }
    .box {
        text-align: center;
        padding: 50px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-top: 4px solid #2EC1AC;
    }

    .team-roles{
        font-size: 0.8rem; /* Adjust the size as needed */
        margin-top: 10px;
    }

    .leader-role{
        font-size: 1rem; /* Adjust the size as needed */
        margin-top: 10px;
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

<!--Meet the team-->
<div class="container">
    <div class="row justify-content-between align-items-center">
        <<div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
            <h3 class="mb-3">Welcome to Pro One Badminton Centre</h3>
                <p>
                    At Pro One Badminton Centre, our mission is to make the world of badminton accessible to everyone. 
                    We offer a state-of-the-art training ground where players of all levels can improve their skills and have a blast on the court. 
                    Located in the heart of Wangsa Maju, we cannot wait to welcome you and share the joy of badminton!
                </p>
            <ul>
                <li>Make Badminton accessible to everyone.</li>
                <li>Provide a top-notch training badminton ground.</li>
                <li>Make badminton fun for all ages.</li>
            </ul>
        </div>

        <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
            <img src="images\about\ilhan.jpg" class="w-75" style="max-width: 100%; height: auto; display: block; margin: 0 auto; border: 1px solid #ccc; border-radius: 5px;">
            <h5 class="mt-2 leader-role text-center">ILHAN KAMIL</h5>
            <h5 class="mt-2 team-roles text-center">LEADER</h5>
        </div>
    </div>
</div>

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
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images\about\badminton.svg" width="70px">
                <h4 class="mt-3">QUALITY COURT</h4>
            </div>
        </div>
    </div>
</div>

<h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

<!--MANAGEMENT TEAM-->
<div class="container px-4">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper mb-5">
            <!-- ahmad ariff -->
            <div class="swiper-slide bg-white text-center overflow-hidden rounded team-member">
                <img src="images/about/ariff.jpg" class="team-member-image" alt="Ahmad Ariff Azahari">
                <h5 class="mt-2 team-member-name">AHMAD ARIFF AZAHARI BIN MOHD AZHAR</h5>
                <h5 class="mt-2 team-roles">DOCUMENT MAKER</h5>
            </div>
            
            <!-- abang raif -->
            <div class="swiper-slide bg-white text-center overflow-hidden rounded team-member">
                <img src="images/about/raif.jpg" class="team-member-image" alt="Abang Raif Zakwan">
                <h5 class="mt-2 team-member-name">ABANG RAIF ZAKWAN BIN ABANG RAZALI</h5>
                <h5 class="mt-2 team-roles">LEAD DOCUMENT MAKER</h5>
            </div>

            <!-- faiq -->
            <div class="swiper-slide bg-white text-center overflow-hidden rounded team-member">
                <img src="images/about/faiq.jpg" class="team-member-image" alt="Mohd Faiq Haziq Mohd Zamberi">
                <h5 class="mt-2 team-member-name">MOHD FAIQ HAZIQ BIN MOHD ZAMBERI</h5>
                <h5 class="mt-2 team-roles">DOCUMENT MAKER</h5>
            </div>

            <!-- david -->
            <div class="swiper-slide bg-white text-center overflow-hidden rounded team-member">
                <img src="images/about/david.jpg" class="team-member-image" alt="David Goh Tong Wey">
                <h5 class="mt-2 team-member-name">DAVID GOH TONG WEY</h5>
                <h5 class="mt-2 team-roles">BACK-END PROGRAMMER</h5>
            </div>

            <!-- shamil -->
            <div class="swiper-slide bg-white text-center overflow-hidden rounded team-member">
                <img src="images/about/shamil.jpg" class="team-member-image" alt="Muhammad Shamil Mohd Sabirin">
                <h5 class="mt-2 team-member-name">MUHAMMAD SHAMIL BIN MOHD SABIRIN</h5>
                <h5 class="mt-2 team-roles">FRONT-END PROGRAMMER</h5>
            </div>
        </div>
        <br>
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
