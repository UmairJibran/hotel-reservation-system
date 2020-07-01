<?php
    require_once('./server/connection.php');
    $hotel_id = $_GET['hotel'];
    $sql = "SELECT `hotel_NAME`,`hotel_CITY` FROM `tbl-hotel-info` WHERE `hotel_ID` = '${hotel_id}'";
    $result = $conn->query($sql);
    $hotel = $result->fetch_assoc();
    $hotel_name = $hotel['hotel_NAME'];
    $hotel_city = $hotel['hotel_CITY'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $hotel_name . ", " . $hotel_city?></title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="./"><button class="go-home">Go Home</button></a>
    <div class="container container-fluid">
        <div class="jumbotron">
            <h3 class="center">Welcome to <?php echo $hotel_name . ", " . $hotel_city ?></h3>
        </div>

    </div>
</body>
</html>