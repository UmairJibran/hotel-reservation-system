<?php    
    session_start();
    if(!isset($_SESSION['id'])) header('location:./login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="jumbotron center">
        <h3>Select an Option to Perform</h3>
    </div>
    <div class="container container-fluid">
        <ul>
            <br><li><a href="./addHotel.php" class="list-group-item list-group-item-action">Add A Hotel</a></li>
            <br><li><a href="./updateHotel.php" class="list-group-item list-group-item-action">Update a Hotel</a></li>
            <br><li><a href="./addCity.php" class="list-group-item list-group-item-action">Add a City</a></li>
            <br><li><a href="./updateUser.php" class="list-group-item list-group-item-action">Update an existing User</a></li>
        </ul>
    </div>
</body>
</html>