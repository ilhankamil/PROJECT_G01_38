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
<br>
    <div class="container">
        <div class="form-container">
            <h3>Add Court</h3>
            <form action="courtProcess.php" method="POST">
                <div class="form-group">
                    <label for="inputCourtId">Court ID</label>
                    <input type="text" id="courtid" name="courtid" placeholder="Enter Court ID" class="form-control">
                </div>

                <div class="form-group">
                    <label for="input Court Name">Court Name</label>
                    <input type="text" class="form-control" name="courtName" placeholder="Enter Court name">
                </div>

                <div class="form-group">
                    <label for="inputCourtStatus">Status</label>
                    <select name="courtStatus" id="courtStatus" class="form-control">
                        <option value="available">Available</option>
                        <option value="booked">Booked</option>
                    </select><br>
                </div>


                <button type="submit" class="btn btn-success" name="addCourtButton">Add</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>

