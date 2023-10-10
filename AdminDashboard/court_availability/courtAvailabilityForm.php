<!DOCTYPE html>
<html lang="en">
<head>
    <title>Court Avalability Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<br>
    <div class="mx-auto" style="width: 200px;">
        <h3>Add Court</h3>
    </div>


    <div class="container">
        <div class="row">
            <div class="col">
            <form action="courtProcess.php" method="POST">
        <label for="inputCourtId">Court ID</label>
        <input type="text" class="form-control" name="courtid" placeholder="Enter Court ID">

        <label for="input Court Name">Court Name</label>
        <input type="text" class="form-control" name="courtName" placeholder="Enter Court name">

        <label for="inputCourtStatus">Status</label>
            <select name="courtStatus" id="courtStatus" class="form-control">
                <option value="available">Available</option>
                <option value="booked">Booked</option>
            </select><br>

        <!--add more later-->
        <div class="mx-auto" style="width: 200px;">
            <button type="submit" class="btn btn-primary" name="addCourtButton">Submit</button>
        </div>
    </form>
</body>
</html>

