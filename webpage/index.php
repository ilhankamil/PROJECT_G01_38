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
                <img src="images/carousel/pic1.png" width=1920px, height=480px />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/pic2.png" width=1920px, height=480px />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/pic3.png" width=1920px, height=480px />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/pic4.png" width=1920px, height=480px />
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/pic5.png" width=1920px, height=480px />
            </div>
            </div>
        </div>
    </div>

    <!--court availability-->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4">
                <h5 class="mb-4">Check Court Availability</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Date</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Time Slot</label>
                            <select class="form-control shadow-none">
                                <option selected>Click this for time slot</option>
                                <option value="#">Insert Time</option>
                                <option value="#">Insert Time</option>
                                <option value="#">Insert Time</option>
                                <option value="#">Insert Time</option>
                            </select>    
                        </div>
                        <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Quantity of Courts</label>
                            <select class="form-control shadow-none">
                                <option selected>Click for quantity of slot</option>
                                <option value="#">1</option>
                                <option value="#">2</option>
                                <option value="#">3</option>
                            </select>  
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit">Submit</button>
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
            <div class="col-lg-4 col-md-6 my-3s"> <!-- Card Showcase -->
                <div class="card border-0 shadow" style="max-width: 360px; margin: auto">
                    <img src="images/features/#"  class="card-img-top"> <!-- Card Picture -->
                        <div class="card-body">
                            <h5>Service name</h5> <!-- Parking, Food and Accesories Shop, Court Quaility, Equipment Rental (add more if there is any) -->
                            <h6 class="mb-4">Service pricing or promote it</h6>
                            <div class="features mb-4">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap">
                                Insert wat the service give
                                </span>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap">
                                Insert wat the service give
                                </span>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap">
                                Insert wat the service give
                                </span>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap">
                                Insert wat the service give
                                </span>
                            </div>
                                <div class="d-flex justify-content-evenly mb-1"></div>
                                    <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                        </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3s"> <!-- Card Showcase -->
                <div class="card border-0 shadow" style="max-width: 360px; margin: auto">
                    <img src="images/features/#"  class="card-img-top"> <!-- Card Picture -->
                        <div class="card-body">
                            <h5>Service name</h5> <!-- Parking, Food and Accesories Shop, Court Quaility, Equipment Rental (add more if there is any) -->
                            <h6 class="mb-4">Service pricing or promote it</h6>
                            <div class="features mb-4">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap">
                                Insert wat the service give
                                </span>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap">
                                Insert wat the service give
                                </span>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap">
                                Insert wat the service give
                                </span>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap">
                                Insert wat the service give
                                </span>
                            </div>
                                <div class="d-flex justify-content-evenly mb-1"></div>
                                    <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                        </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3s"> <!-- Card Showcase -->
                <div class="card border-0 shadow" style="max-width: 360px; margin: auto">
                    <img src="images/features/#"  class="card-img-top"> <!-- Card Picture -->
                        <div class="card-body">
                            <h5>Service name</h5> <!-- Parking, Food and Accesories Shop, Court Quaility, Equipment Rental (add more if there is any) -->
                            <h6 class="mb-4">Service pricing or promote it</h6>
                            <div class="features mb-4">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap">
                                Insert wat the service give
                                </span>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap">
                                Insert wat the service give
                                </span>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap">
                                Insert wat the service give
                                </span>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap">
                                Insert wat the service give
                                </span>
                            </div>
                                <div class="d-flex justify-content-evenly mb-1"></div>
                                    <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                        </div>
                </div>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Browse Courts >>></a>
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
                <div class="col-lg-4 col-md-4">
                    <div class="bg-white p-4 rounded mb-4">
                        <h5>Call Us</h5>
                        <a href="tel: +60340238668" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+60340238668
                        </a>
                    </div>
                    
                    <div class="col-lg-4 col-md-4">
                    <div class="bg-white p-4 rounded mb-4">
                        <h5>Follow Us</h5>
                        <a href="#" class="d-inline-block mb-3">
                            <span class="badge bg-light text-dark fs-6 p2">
                                <i class="bi bi-facebook-fill"></i>Facebook
                            </span>
                        </a>
                    </div>
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