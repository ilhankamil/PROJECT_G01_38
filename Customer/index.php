<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Pro One Badminton Center</title>
    <link rel="stylesheet" href="css/common.css">
    <?php require('inc/links.php'); ?>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* Style for the table container */
        .table-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #f7f7f7;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 15px;
            border: 1px solid #ddd;
        }

        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Style for table headers */
        th {
            background-color: #333;
            color: #fff;
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        /* Style for table cells */
        td {
            text-align: center;
            border: 1px solid #000;
            padding: 10px;
        }

        /* Add some spacing for better readability */
        .table-container h1 {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body class="bg-light">
        <!-- Include header.php -->
        <?php include "inc/header.php"; ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

            <!-- Court availability for customer to view -->
            <form method="post" id="dateForm">
                <label for="date">Select Date: </label>
                <input type="date" name="Cdate" id="Cdate" onchange="submitForm()">
            </form>

            <div id="courtAvailability">
                <!-- The court availability table will be displayed here -->
            </div>
            <!-- Court availability for customer to view ends here -->

            <?php
            include "dbconnect.php";
            $sql = "SELECT * FROM court_rates";
            $result = $conn->query($sql);

            $courtRates = array();

            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $courtRates[] = $row;
                }
            }

            ?>
                <br>


                <!-- Begin Page Content -->
 <div class="container-fluid">
        <div class="table-container">
            <h1 class="h3 mb-4 text-gray-800">Court Rates</h1>
            <!-- Display court rates in a table -->
            <table>
                <thead>
                    <tr>
                        <th>Time Slot</th>
                        <th>Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courtRates as $rate) { ?>
                        <tr>
                            <td><?php echo $rate['dayOfWeek']; ?></td>
                            <td><?php echo $rate['rate']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<br><br><br>

<div class="court-container">
    <!-- Court Diagram -->
    <div class="mb-3">
        <table id="courtDiagram">
        <tr>
            <?php
            include "dbconnect.php"; // Include your database connection

            // Fetch court data from the database
            $sql = "SELECT * FROM court";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $courtID = $row['courtID'];
                    $courtName = $row['courtName'];
                    echo '<td data-name="' . $courtID . '">';
                    echo '<input type="hidden" class="court-id" value="' . $courtID . '">';
                    echo '<input type="hidden" class="court-name" value="' . $courtName . '">';
                    echo $courtID; // You can customize how you want to display the court identifier
                    echo '</td>';
                }
            }
            ?>
        </tr>
    </table>
    </div>
</div>

     <!-- Pop-out container -->
<div id="popOutContainer" class="pop-out-container">
    <div class="row g-3 align-items-center mb-3 d-flex justify-content-center">
        <div class="col-auto">
            <label for="courtInput" class="col-form-label">Court Number</label>
        </div>
        <div class="col-auto">
            <input type="text" id="courtInput" class="form-control" name="courtInput" style="text-align:center;" readonly>
        </div>
        <form id="bookingForm"> <!-- Keep the close button inside the form -->
            <!-- Content for the pop-out container -->
            <h2>Choose Date and Time</h2>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            <br>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>
            <br>
            <label for="hours">Booking Hours:</label>
            <input type="number" id="hours" name="hours" min="1" required>
            <br><br>
            <button id="bookButton" class="btn btn-primary" type="submit">Book</button>
            <button id="closeButton" class="btn btn-secondary" type="button">Close</button>
            <!-- Hidden input fields to store courtID and courtName -->
            <input type="hidden" id="selectedCourtID" name="courtID">
            <input type hidden id="selectedCourtName" name="courtName">
            <br><br>
            <label for="availabilityTable">Booked Time</label>
            <table id="availabilityTable">
                <thead>
                    <tr>
                        <th>Court Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Availability data will be displayed here -->
                </tbody>
            </table>
        </form> <!-- Close the form here -->
    </div>
</div>

    <script>

function submitForm() {
    $.ajax({
        type: "POST",
        url: "viewCourtavailability.php",
        data: { date: $("#Cdate").val() },
        success: function (data) {
            $("#courtAvailability").html(data);
        }
    });
}

function validateBookingHours() {
  const dateInput = document.getElementById("date").value;
  const timeInput = document.getElementById("time").value;
  const hoursInput = parseInt(document.getElementById("hours").value);

  // Define the default opening and closing times based on the selected day
  const dayOfWeek = new Date(dateInput).getDay(); // 0 for Sunday, 1 for Monday, ..., 6 for Saturday

  let openingTime, closingTime;

  if (dayOfWeek === 0) {
    // Sunday
    openingTime = "09:00:00"; // Sunday opening time
    closingTime = "23:59:00"; // Sunday closing time
  } else if (dayOfWeek === 6) {
    // Saturday
    openingTime = "09:00:00"; // Saturday opening time
    closingTime = "23:59:00"; // Saturday closing time
  } else {
    openingTime = "10:00:00"; // Default opening time for Monday until Friday
    closingTime = "23:59:00"; // Default closing time
  }

  // Convert selected time input to a Date object
  const selectedDateTime = new Date(`${dateInput}T${timeInput}`);

  // Calculate the end time by adding hours
  const endTime = new Date(selectedDateTime.getTime() + hoursInput * 60 * 60 * 1000);

  // Convert opening and closing times to Date objects
  const openingDateTime = new Date(`${dateInput}T${openingTime}`);
  const closingDateTime = new Date(`${dateInput}T${closingTime}`);
  
  // Check if the closing time is on the next day
  if (closingDateTime < openingDateTime) {
    closingDateTime.setDate(closingDateTime.getDate() + 1);
  }
/*
  alert(`Selected Date: ${dayOfWeek}`);
  alert(`Selected Date & Time: ${selectedDateTime}`);
  alert(`Opening Time: ${openingDateTime}`);
  alert(`Closing Time: ${closingDateTime}`);
  alert(`End Time: ${endTime}`);  */

  if (selectedDateTime >= openingDateTime && endTime <= closingDateTime) {
    alert("Booking hours are valid.");
    return true;
  } else {
    alert("Booking hours exceed opening or closing time.");
    return false;
  }
}

function getIfSelectedTimeIsTaken(callback) {
    const dateInput = document.getElementById("date").value;
    const timeInput = document.getElementById("time").value;
    const hoursInput = parseInt(document.getElementById("hours").value);
    const selectedCourtID = document.getElementById("selectedCourtID").value;

    // Create an object to send data to the server
    const requestData = {
        dateInput: dateInput,
        timeInput: timeInput,
        hoursInput: hoursInput,
        courtID: selectedCourtID
    };

    $.ajax({
        type: 'POST',
        url: 'CheckIfSelectedTimeIsTaken.php',
        data: requestData,
        dataType: 'json',
        success: function (data) {
            if (data.isTaken) {
                // Selected time is taken, display an alert
                alert("Selected time is taken. Please choose another time.");
                // You can return a callback to handle the taken time case
                callback(true);
            } else {
                // Selected time is available; you can proceed with the booking
                // You can return a callback to handle the available time case
                callback(false);
            }
        },
        error: function () {
            alert('Failed to check selected time.');
        }
    });
}

function fetchCourtAvailability(courtID) {
    $.ajax({
        type: 'POST',
        url: 'getCourtAvailability.php',
        data: { courtID: courtID }, // Pass the courtID to the PHP script
        dataType: 'json',
        success: function (data) {
            // Clear the existing table rows
            $('#availabilityTable tbody').empty();

            // Iterate through the data and add rows to the table
            data.forEach(function (availability) {
                var newRow = $('<tr>');
                newRow.append('<td>' + availability.courtName + '</td>');
                newRow.append('<td>' + availability.date + '</td>');
                newRow.append('<td>' + availability.time + '</td>');
                newRow.append('<td>' + availability.end_time + '</td>');
                newRow.append('<td>' + availability.status + '</td>');
                $('#availabilityTable tbody').append(newRow);
            });
        },
        error: function () {
            alert('Failed to fetch court availability');
        }
    });
}


        document.addEventListener("DOMContentLoaded", function () {
    const courts = document.querySelectorAll("#courtDiagram td[data-name]");
    const courtInput = document.getElementById("courtInput");
    const popOutContainer = document.getElementById("popOutContainer");

    // Function to handle court selection
    function handleCourtSelection(court) {
        // Remove the "selected-court" class from all courts
        courts.forEach(function (c) {
            c.classList.remove("selected-court");
        });

        // Add the "selected-court" class to the clicked court
        court.classList.add("selected-court");

        // Update the courtInput value with the selected court number
        courtInput.value = court.getAttribute("data-name");

        // Set the selected courtID and courtName in hidden input fields
        const courtID = court.querySelector(".court-id").value;
        const courtName = court.querySelector(".court-name").value;
        document.getElementById("selectedCourtID").value = courtID;
        document.getElementById("selectedCourtName").value = courtName;

        // Display the pop-out container when a court is clicked
        popOutContainer.style.display = "block";

        
        // Fetch court availability when a court is selected
        fetchCourtAvailability(courtID);
    }

   // Add click event listener to court numbers
   courts.forEach(function (court) {
        court.addEventListener("click", function () {
            handleCourtSelection(this);
        });
    });

    // Close the pop-out container
    const closeButton = document.getElementById("closeButton");
    closeButton.addEventListener("click", function () {
        popOutContainer.style.display = "none";
    });
  

     // Add an event listener to the form
     const form = document.getElementById("bookingForm");
    form.addEventListener("submit", function (event) {
        alert("Form submit event triggered");
        event.preventDefault(); // Prevent the default form submission
        // Validate the booking hours
    if (!validateBookingHours()) {
        // Validation failed, do not proceed with form submission
        return;
    }

    
    getIfSelectedTimeIsTaken(function(isTaken) {
        if (isTaken) {
            // Selected time is taken, no need to proceed with the booking
        return;
            } else {
            // Selected time is available; you can proceed with the booking

            const selectedCourtID = document.getElementById("selectedCourtID").value;
            const selectedCourtName = document.getElementById("selectedCourtName").value;
            const date = document.getElementById("date").value;
            const userInputTime = document.getElementById("time").value + ":00"; // Add ":00" for seconds
            const hours = document.getElementById("hours").value;

            // Construct the URL for redirection
            const redirectURL = `booked_court.php?courtID=${selectedCourtID}&courtName=${selectedCourtName}&date=${date}&time=${userInputTime}&hours=${hours}`;

                // Redirect to the constructed URL
                window.location.href = redirectURL;
            }
        });
    });
});

    </script>

                </div>
                <!-- Container-fluid -->
            </div>
            <!-- End of Main Content -->
           
        </div>
        <!-- End of Content Wrapper -->

</div>

  <!-- Logout Modal-->
  <?php include "inc/logoutmodal.php"; ?>
   

    <!-- Bootstrap core JavaScript-->
    <!-- Core plugin JavaScript-->
    <!-- Custom scripts for all pages-->
    <?php include "inc/assets.php"; ?>
    

</body>




<style>
    
/* Style for the court container */
.court-container {
    position:static;
    text-align: center;
    margin: 0 auto;
   
    
}

/* Style for the court diagram table */
.court-container table {
    width: 1000px; /* Set the width to create a square */
    margin: 0 auto; /* Center the container horizontally */
    background-color: #f7f7f7; /* Background color for the shadow */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); /* Add a shadow effect */
    padding: 5px; /* Add padding for content */
    overflow-y: auto; /* Add vertical scroll if content overflows */
    border: 1px solid #000; /* Add a border around the container */
}

/* Style for table headers */
.court-container table th {
    background-color: #333; /* Header background color */
    color: #fff; /* Header text color */
    border: 1px solid #000; /* Add a border around header cells */
    padding: 8px; /* Add padding to header cells */
}




        /* Style for court numbers */
        #courtDiagram td[data-name] {
            padding: 0.3rem;
            width: 50px;
            height: 45px;
            text-align: center;
            line-height: 30px;
            background-color: #efefef;
            border-radius: 5px;
            margin: 0.3rem;
            cursor: pointer;
            border: 3px solid transparent;
            display: inline-block;
        }

        /* Style for selected courts */
        #courtDiagram td[data-name].selected-court {
            background-color: #007bff; /* Blue background for selected courts */
            color: #fff; /* White text for selected courts */
        }

       /* Style for the pop-out container */
.pop-out-container {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    padding: 15px;
    border-radius: 5px;
    z-index: 1000;
    text-align: center;
    width: 600px; /* Fixed width */
    height: 500px; /* Fixed height */
    overflow-y: auto; /* Add vertical scroll if content overflows vertically */
    overflow-x: hidden; /* Hide horizontal scrollbar if not needed */
}

/* Style the container heading */
.pop-out-container h2 {
  font-size: 20px;
  margin-bottom: 10px;
}

/* Style the labels and input fields */
.pop-out-container label {
  display: block;
  font-weight: bold;
  margin-top: 10px;
}

.pop-out-container input[type="date"],
.pop-out-container input[type="time"] {
  width: 100%;
  padding: 8px;
  margin: 6px 0;
  border: 1px solid #ccc;
  border-radius: 5px;
}

/* Style the buttons */
.pop-out-container button {
  padding: 10px 20px;
  margin: 10px 5px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  font-weight: bold;
}

/* Style the primary button */
.pop-out-container .btn-primary {
  background-color: #007bff;
  color: #fff;
}

/* Style the secondary button */
.pop-out-container .btn-secondary {
  background-color: #ccc;
  color: #333;
}

/* Add hover effects to the buttons */
.pop-out-container button:hover {
  opacity: 0.8;
}

    </style>

</html>

