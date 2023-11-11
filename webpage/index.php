<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>Pro One Badminton Center</title>
    <link rel="stylesheet" href="css/common.css">
    <?php require('inc/links.php'); ?>
    <style>
        .availability-form{
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px){
            .availability-form{
            margin-top: 25px;
            padding: 0 35px;
        }
        }

    </style>
</head>

<body class="bg-light">

<?php require('inc/header.php');?>
     
    <!--carousel-->
    <div class="container-fluid px-lg-4 mt-4">
            <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="images/carousel/index8.png"width=1500px, height=480px />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/index3.png" width=1500px, height=480px/>
                </div>

                <div class="swiper-slide">
                    <img src="images/carousel/index4.png" width=1500px, height=480px />
                </div>

                <div class="swiper-slide">
                    <img src="images/carousel/index5.png"width=1500px, height=480px />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/index10.png"width=1500px, height=480px />
                </div>

                <div class="swiper-slide">
                    <img src="images/carousel/index7.png"width=1500px, height=480px />
                </div>

                <div class="swiper-slide">
                    <img src="images/carousel/index1.png" width=1500px, height=480px />
                </div>
            </div>
        </div>
    </div>

<!--court availability-->
<div class="container availability-form my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 bg-white shadow p-4">
            <h3 class="text-center mb-4">Check Court Availability</h3>
            <form>
                <div class="row align-items-end">
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Date</label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Time Slot</label>
                        <select class="form-select shadow-none">
                            <option selected>Choose a time slot</option>
                            <option value="#">Insert Time</option>
                            <option value="#">Insert Time</option>
                            <option value="#">Insert Time</option>
                            <option value="#">Insert Time</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Quantity of Courts</label>
                        <select class="form-select shadow-none">
                            <option selected>Select the quantity of courts</option>
                            <option value="#">1</option>
                            <option value="#">2</option>
                            <option value="#">3</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <button type="submit" class="btn btn-dark w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



    <!-- Our Court -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Court</h2>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 360px; margin: auto; height: 100%;">
                <img src="images/indexpics/pic1.jpg" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Quality Court</h5>
                    <p class="card-text">Enjoy our high-quality courts suitable for players of all levels.</p>
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <ul style="list-style-type: disc; padding-left: 20px;">
                            <li>Strong Net</li>
                            <li>Abundance of Courts</li>
                            <li>Suitable for Adults and Kids</li>
                            <li>Suitable place to play badminton</li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-sm btn-dark shadow-none">More Details</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 my-3">
            <div class ="card border-0 shadow" style="max-width: 360px; margin: auto; height: 100%;">
                <img src="images/indexpics/pic2.jpeg" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Badminton Accessories Shop</h5>
                    <p class="card-text">Visit our shop for quality badminton-related items.</p>
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <ul style="list-style-type: disc; padding-left: 20px;">
                            <li>Quality Badminton Rackets</li>
                            <li>Shuttlecock Replenishment</li>
                            <li>Badminton Bags and Holsters</li>
                            <li>Friendly Staff</li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-sm btn-dark shadow-none">More Details</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 360px; margin: auto; height: 100%;">
                <img src="images/indexpics/pic3.jpg" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Food and Drinks</h5>
                    <p class="card-text">Visit our convenience store for a variety of drinks and snacks.</p>
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <ul style="list-style-type: disc; padding-left: 20px;">
                            <li>Provides Drinks and Snack Bars</li>
                            <li>Isotonic Water to Energize</li>
                            <li>Snack Bar to Replenish Energy</li>
                            <li>Quality Products for Body Needs</li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-sm btn-dark shadow-none">More Details</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Browse Courts >></a>
        </div>
    </div>
</div>



    <!-- Reach us (comeback to dis)-->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded ">
            <iframe class ="w-100 rounded" height="320" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.5948084101874!2d101.72302371016693!3d3.2006287528213715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc3819a49240e1%3A0x720900ed97055f5e!2sPro%20One%20Badminton%20Centre!5e0!3m2!1sen!2smy!4v1693743845925!5m2!1sen!2smy" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="bg-white p-4 rounded">
                    <h5>Contact Us</h5>
                    <a href="tel: +60340238668" class="d-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill me-2"></i>+60340238668
                    </a>
                    <a href="tel: +60340238668" class="d-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill me-2"></i>+60340238668
                    </a>
                </div>
                <div class="bg-white p-4 rounded mt-3">
                    <h5>Follow Us</h5>
                    <a href="https://m.facebook.com/profile.php?id=207639219785814" class="d-block mb-3 text-decoration-none text-dark">
                        <i class="bi bi-facebook me-2"></i>Facebook
                    </a>
                    <a href="https://www.instagram.com/explore/locations/276414247/pro-one-badminton-court-wangsa-maju/" class="d-block text-decoration-none text-dark">
                        <i class="bi bi-instagram me-2"></i>Instagram
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php require('inc/footer.php') ?>

<br><br><br>
<br><br><br>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
      },
    );
  </script>
</body>
</html>