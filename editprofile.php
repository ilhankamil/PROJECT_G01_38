<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>Pro One Badminton Center - EDIT PROFILE</title>
    <link rel="stylesheet" href="css/common.css">
    <?php require('inc/links.php'); ?>


    <?php require('inc/header.php');?>

    <section style="background-color: #eee;">
    <div class="container py-5">




        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                            <p class="mb-0">Username</p>
                        </div>
                        <div class="col-sm-9">
                            <!--should take from the database username-->
                            <p class="text-muted mb-0">Johnatan Smith</p>
                        </div>
                    </div>

                    <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <!--should take from the database email-->
                                <p class="text-muted mb-0">example@example.com</p>
                            </div>
                        </div>
                    <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <!--should take from the database phonenumber-->
                                <p class="text-muted mb-0">(097) 234-5678</p>
                            </div>
                        </div>
                    <hr>

                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Password</p>
                        </div>
                        <div class="col-sm-9">
                            <!--should take from the database password and starred-->
                            <p class="text-muted mb-0">(098) 765-4321</p>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="text-align: right;">
                            <button type="submit">Change Password</button>
                        </div>
            </div>
        </div>
        
    </div>
</section>
</head>