<?php
    require_once('./server/connection.php');
    $hotel_id = $_GET['hotel'];
    $sql = "SELECT * FROM `tbl-hotel-info` WHERE `hotel_ID` = '${hotel_id}'";
    $result = $conn->query($sql);
    $hotel = $result->fetch_assoc();
    $name = $hotel['hotel_NAME'];
    $city = $hotel['hotel_CITY'];
    $street = $hotel['hotel_STREET'];
    $building = $hotel['hotel_BUILDING'];
    $email = $hotel['hotel_EMAIL'];
    $contact = $hotel['hotel_CONTACT'];
    $website = $hotel['hotel_WEBSITE'];
    $n1R = $hotel['hotel_NSINGLEROOMS'];
    $n2R = $hotel['hotel_NDOUBLEROOMS'];
    $n3R = $hotel['hotel_NTRIPLEROOMS'];
    $n4R = $hotel['hotel_NFOURPROOMS'];
    $n1BR = $hotel['hotel_BOOKED_SINGLE'];
    $n2BR = $hotel['hotel_BOOKED_DOUBLE'];
    $n3BR = $hotel['hotel_BOOKED_TRIPLE'];
    $n4BR = $hotel['hotel_BOOKED_FOUR'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name . ", " . $city?></title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="./"><button class="button bottom">Go Home</button></a>
    <div class="container container-fluid">
        <div class="jumbotron">
            <h3 class="center">Welcome to <?php echo $name . ", " . $city ?></h3>
        </div>
        <section class='row'>
            <h2 class='center col col-3 text-primary'>Name</h2>
            <h4 class='center col col-3 text-primary'><?php echo $name?></h4>
            <h2 class='center col col-3 text-primary'>City</h2>
            <h4 class='center col col-3 text-primary'><?php echo $city?></h4>
        </section>
        <br>
        <section class="row center">
            <strong class="col col-1">Road/Street</strong>
            <p class="col col-2 text-info"><?php echo $street?></p>
            <strong class="col col-1">Building</strong>
            <p class="col col-2 text-info"><?php echo $building?></p>
            <p class="text-info col col-2">Send <a href="mailto:<?php echo $email?>" class="text-info"><strong>Email</strong></a></p>
            <strong class="col col-1">Contact</strong>
            <p class="col col-2 text-info"><?php echo $contact?></p>
            <a href="http://<?php echo $website?>">Their Site</a>
        </section>
        <p class="text-monospace text-lg-center">Total Rooms:<?php $total = $n1R + $n2R + $n3R + $n4R; $free =  $total - ($n1BR + $n2BR + $n3BR + $n4BR); echo "<font color='green'><strong>${free}</strong></font> free rooms out of ${total}";?></p>
        <section class="row">
            <span class="col col-2"><strong>Single Bed Room(s)</strong></span>
            <span class="col col-3"><?php $free = $n1R - $n1BR;echo "<font color='green'><strong>${free}</strong></font> free rooms out of " . $n1R; ?></span>
            <span class="col col-2"></span>
            <span class="col col-2"><strong>Double Bed Room(s)</strong></span>
            <span class="col col-3"><?php $free = $n2R - $n2BR;echo "<font color='green'><strong>${free}</strong></font> free rooms out of " . $n2R; ?></span>
        </section>
        <section class="row">
            <span class="col col-2"><strong>Triple Bed Room(s)</strong></span>
            <span class="col col-3"><?php $free = $n3R - $n3BR;echo "<font color='green'><strong>${free}</strong></font> free rooms out of " . $n3R; ?></span>
            <span class="col col-2"></span>
            <span class="col col-2"><strong>Four Bed Room(s)</strong></span>
            <span class="col col-3"><?php $free = $n4R - $n4BR;echo "<font color='green'><strong>${free}</strong></font> free rooms out of " . $n4R; ?></span>
        </section>
        <br>
        <form method="post">
            <div class="input-group">
                <label for="id">Enter Your ID <strong>WITHOUT</strong> dashes: </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="number" required class='form-control' name="id_num" require id="id">
                &nbsp;&nbsp;&nbsp;
                <input name='reserve' type="submit" value="Reserve A Room" class="button low-padding">
            </div>
        </form>
        <?php
            if(isset($_POST['reserve'])){
                $userid = $_POST['id_num'];
                echo $userid;
                header('location:./reserve.php?hotel='.$hotel_id."&id=".$userid);
            }
        ?>
    </div>
</body>
</html>