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
                    <a class="nav-link me-2" href="contact.php">Contact us</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" href="about.php">About us</a>
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
                             <!-- Error messages will be displayed here -->
                             <div id="error-messages" class="text-danger"></div>
                            <!-- Success message container -->
                             <div id="success-message" class="text-success"></div>

                              <!-- Loading indicator -->
                            <div id="loading-indicator" style="display: none;">
                            <!-- You can use any loading animation or message you prefer -->
                            <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                            </div>
                            <p>Please wait, registering...</p>
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
            <form action="../loginfunction/login.php" method="post" id="login_form"> <!-- Updated form element -->
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i>User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Username or Email address</label>
                        <input type="text" class="form-control shadow-none" name="uname_or_email"> <!--  email input -->
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control shadow-none" id="password" name="password">
                                <span class="input-group-text">
                                    <i class="bi bi-eye" id="togglePassword"></i>
                                </span>
                        </div>
                    </div>

                   <!-- Error messages will be displayed here -->
                   <div id="error-messagesLogin" class="text-danger"></div>

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


<!-- Handling registerModal -->
<script>
    function displayMessage(message, isError) {
        const errorContainer = document.getElementById("error-messages");
        const successContainer = document.getElementById("success-message");

        if (isError) {
            // Clear success message and display error message
            successContainer.innerHTML = "";
            errorContainer.innerHTML = message;
            errorContainer.classList.add("text-danger");
            successContainer.classList.remove("text-success");
        } else {
            // Clear error message and display success message
            errorContainer.innerHTML = "";
            successContainer.innerHTML = message;
            successContainer.classList.add("text-success");
            errorContainer.classList.remove("text-danger");
        }
    }
    
    function resetMessageContainers() {
        const errorContainer = document.getElementById("error-messages");
        const successContainer = document.getElementById("success-message");
        errorContainer.innerHTML = "";
        successContainer.innerHTML = "";
    }

    function toggleLoadingIndicator(show) {
        const loadingIndicator = document.getElementById("loading-indicator");
        if (show) {
            loadingIndicator.style.display = "block";
        } else {
            loadingIndicator.style.display = "none";
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("#registerModal form");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            // Show the loading indicator when the form is submitted
            toggleLoadingIndicator(true);

            // Clear existing messages
            resetMessageContainers();

            // Serialize form data
            const formData = new FormData(form);

            // Send a POST request to your PHP script
            fetch("../signupfunction/register.php", {
                method: "POST",
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    // Hide the loading indicator when the response is received
                    toggleLoadingIndicator(false);

                    if (data.error) {
                        displayMessage(data.error, true);
                    } else if (data.success) {
                        // Registration was successful
                        displayMessage(data.success, false); // Display the success message
                        // Redirect to index.php after a delay
                        setTimeout(function () {
                            window.location.href = "../webpage/index.php";
                        }, 3000); // 3000 milliseconds (3 seconds) delay
                    }
                })
                .catch((error) => {
                    // Hide the loading indicator in case of an error
                    toggleLoadingIndicator(false);
                    console.error("Error:", error);
                });
        });
    });
</script>

<!-- Handling loginModal -->
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    $("#login_form").on("submit", function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Serialize the form data
        var formData = $(this).serialize();

        // Send an AJAX request to your PHP script
        $.ajax({
            type: "POST",
            url: "../loginfunction/login.php",
            data: formData,
            dataType: "json", // Expect JSON response
            success: function (response) {
                if (response.error) {
                    // Display the error message in the error-messagesLogin div
                    $("#error-messagesLogin").html(response.error);
                } else if (response.redirect) {
                    // Redirect the user to the specified URL on successful login
                    window.location.href = response.redirect;
                }
            },
            error: function () {
                // Handle AJAX errors, if any
                $("#error-messagesLogin").html("An error occurred during login.");
            }
        });
    });
});
</script>

<script>
$(document).ready(function () {
    $("#togglePassword").on("click", function () {
        const passwordField = $("#password");

        // Toggle the input field type between password and text
        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
        } else {
            passwordField.attr("type", "password");
        }
    });
});
</script>

<style>
    .text-success {
        color: green;
    }

    #togglePassword {
    cursor: pointer;
}

/* Style for the input field to remove borders */
.input-group input[type="password"] {
    border-right: none;
}
</style>