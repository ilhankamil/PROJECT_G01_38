<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Court Rate Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding-top: 50px;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            color: #333;
        }
        .form-group label {
            color: #555;
        }
        .form-control {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
        }
        .btn-success {
            background-color: #008000;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
        }
        .btn-success:hover {
            background-color: #006600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h3>Add Court Rate</h3>
            <form action="rateProcess.php" method="POST">
                <div class="form-group">
                    <label for="dayOfWeek">Day of Week:</label>
                    <input type="text" id="dayOfWeek" name="dayOfWeek" class="form-control">
                </div>
                
              
                <div class="form-group">
                    <label for="rate">Rate (RM):</label>
                    <input type="number" step="0.01" id="rate" name="rate" class="form-control">
                </div>

                <button type="submit" class="btn btn-success" name="addCourtRateButton">Add</button>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>






