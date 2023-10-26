<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>Pro One Badminton Center - CONTACT US</title>
    <link rel="stylesheet" href="css/common.css">
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

<?php require('inc/header.php');?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2> 
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        <?php
            // Include your PHP database connection code here
            require('../webpage/inc/db_conn.php'); // Adjust the file path as needed

            // Retrieve the dynamic content for "Contact Us"
            $query = "SELECT content FROM contact_us_content WHERE id = 1"; // Assuming the content has ID 1
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
        <div class="row">
            <div class="col-lg-6 cl-md-6 mb-5 px-4">

                <div class="bg-white rounded shadow p-4">
                    <iframe class ="w-100 rounded mb-4" height="320" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.5948084101874!2d101.72302371016693!3d3.2006287528213715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc3819a49240e1%3A0x720900ed97055f5e!2sPro%20One%20Badminton%20Centre!5e0!3m2!1sen!2smy!4v1693743845925!5m2!1sen!2smy" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <h5>Address</h5>
                    <a href="https://goo.gl/maps/XKjervmcs1idtdtx7" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                    <i class="bi bi-geo-alt-fill"></i>
                    Lot 6302, Jalan 2/27A, Off Jalan Usahawan, Bandar Baru Wangsa Maju
                    </a>

                    <h5 class="mt-4">Call Us</h5>
                        <a href="tel: +60340238668" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+60340238668
                        </a><br>
                        <a href="tel: +60340238668" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+60340238668
                        </a>

                        <h5 class="mt-4">Email</h5>
                        <a href="mailto: insertEmailhere" class="d-inline-block text-decoration-none text-dark fs-5 me-2">
                        <i class="bi bi-envelope-at-fill"></i>    
                        insertEmailhere@gmail.com
                        </a>

                        <h5 class="mt-4">Follow Us</h5>
                        <a href="https://m.facebook.com/profile.php?id=207639219785814" class="d-inline-block text-decoration-none text-dark fs-5">
                            <i class="bi bi-facebook me-1"></i>
                        </a>
                        <a href="https://www.instagram.com/explore/locations/276414247/pro-one-badminton-court-wangsa-maju/" class="d-inline-block text-decoration-none text-dark fs-5 ">
                            <i class="bi bi-instagram me-1"></i>
                        </a>
                </div>
            </div>


            <div class="col-lg-6 cl-md-6 mb-6 px-4">
                <div class="bg-white rounded shadow p-4">
                        <h5>Inquiries :</h5>
                        <form action="https://formsubmit.co/ilhankmil@gmail.com" method="POST">
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input type="email" name="email" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea name = "message" class="form-control shadow-none" rows="5" style="resize:none;" required></textarea>
                        </div>
                        <button type="submit" class="btn text-black mt-3">SEND</button>
                        <!--fix the custom bg, button looked ugly af-->
                    </form>
                </div>
            </div>

        </div>
    </div>


    <div class="container">
        <div class="row"> 
            <div class="bg-white rounded shadow p-4 text-center">
                    <h5>Business Hours</h5>
                <p>Monday - Friday: 10:00 AM - 12:30 AM</p>
                <p>Saturday - Sunday: 9:00 AM - 12:00 AM</p>
                    <h6>Note:</h6>
                    <p>Tuesday & Friday: 10:00 AM - 1:30 AM</p>
                    <p>Monday, Wednesday & Thursday: 10:00 AM - 12:30 AM</p>
                </div>
            </div>
        </div>
    </div>

<?php require('inc/footer.php') ?>
</body>
</html>