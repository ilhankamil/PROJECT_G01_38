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
            padding: 8px 18px;
        }
        .btn-success:hover {
            background-color: #006600;
        }
        .btn-secondary{
            background-color: #808080;
            border: none;
            border-radius: 4px;
            padding: 8px 18px;
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
                    <select id="courtid" name="courtid" class="form-control">
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                    <option value="C4">C4</option>
                    <option value="C5">C5</option>
                    <option value="C6">C6</option>
                    <option value="C7">C7</option>
                    <option value="C8">C8</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputCourtName">Court Name</label>
                    <input type="text" class="form-control" name="courtName" placeholder="Enter Court name">
                </div>

                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
                </div>

                <div class="form-group">
                    <label for="inputDate">Date</label>
                    <input type="date" class="form-control" name="date" placeholder="Enter Date">
                </div>

                <div class="form-group">
                    <label for="inputTime">Time</label>
                    <input type="time" class="form-control" name="start_time" placeholder="Enter Time">
                </div>

                <div class="form-group">
                    <label for="inputEndTime">End Time</label>
                    <input type="time" class= "form-control" name="end_time" placeholder="Enter End Time">
                </div>

                <div class="form-group">
                    <label for="inputCourtStatus">Status</label>
                    <select name="status" id="courtStatus" class="form-control">
                        <option value="booked">Booked</option>
                        <option value="using">Using</option>
                        <option value="passed">passed</option>
                    </select><br>
                </div>

                <button type="submit" class="btn btn-success" name="addCourtButton">Add</button>
                
                <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
            </form>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
