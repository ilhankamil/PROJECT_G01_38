<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
                <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Pro One Badminton Center</a>
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" href="court.php">Court</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" href="#">Book</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" href="#">Contact us</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" href="#">About us</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                    </button>
                    <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Register
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="../signupfunction/register.php" method="post"> 
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                    <i class="bi bi-person-circle fs-3 me-2"></i>User Registration
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Note: Your details must match with your phone number (ask the grp back)
                            This will be required during the transaction and booking.
                        </span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control shadow-none" name="uname">
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control shadow-none" name="email">
                                    </div>
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control shadow-none" name="phonenumber">
                                    </div>
                                <!--    <div class="col-md-6 p-0">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control shadow-none">
                                    </div> 
                                    <div class="col-md-12 p-0 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control shadow-none" rows="1"></textarea>
                                    </div> -->
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control shadow-none" name="passwordR">
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control shadow-none" name="confirm_password">
                                    </div>
                                </div>
                            </div>
                        <div class="text-center my-1">
                        <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="../loginfunction/login.php" method="post"> <!-- Updated form element -->
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i>User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="text" class="form-control shadow-none" name="uname_or_email"> <!--  email input -->
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control shadow-none" name="password"> <!--  password input -->
                    </div>
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                            <a href="../forgotpass/forgot-password.php" class="text-secondary text-decoration-none">Forgot Password?</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
