<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin Profile</title>
    <!-- Add your usual stylesheets and scripts here -->
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>

        <!-- Profile Editing Form -->
        <form action="save_profile_changes.php" method="post">
            <div class="form-group">
                <label for="adminName">Name:</label>
                <input type="text" id="adminName" name="adminName" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="adminEmail">Email:</label>
                <input type="email" id="adminEmail" name="adminEmail" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="adminPicture">Profile Picture:</label>
                <input type="file" id="adminPicture" name="adminPicture" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
