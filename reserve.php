<?php
    require_once("./server/connection.php");
    $hotel_id = $_GET['hotel'];
    $customer_cp_id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book A Room</title>    
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="./"><button class="button bottom">Go Home</button></a>
    <div class="container container-fluid">
        <div class="jumbotron">
            <h4 class="center">Reserve a Room and Enjoy your Stay!</h4>
            <?php
                $hotel_name = "";
                $sql = "SELECT * FROM `tbl-hotel-info` WHERE `hotel_ID` = '${hotel_id}';";
                $result = $conn->query($sql);
                $hotel_name = $result->fetch_assoc()['hotel_NAME'];
            ?><br>
            <small class="right">Submit the required Information to book a room in <?php echo $hotel_name; ?></small>
        </div>
        <form method="post">
            <label>Your CNIC/Passport Number</label>
            <div class="input-group">
                <input type="text" class="form-control" readonly value='<?php echo $customer_cp_id?>'>
                &nbsp;&nbsp;
                <select class='form-control' name="room">
                    <option value="" selected disabled>Select a Room</option>
                </select>
            </div>
            <br>
            <label>Your Name</label>
            <div class="input-group">
                <input required type="text" class="form-control" placeholder="First Name" name='fname'>
                &nbsp;
                <input required type="text" class="form-control" placeholder="Last Name" name='lname'>
            </div>
            <br>            
            <label>Your Necassary Data</label>
            <div class="input-group">
                <input required type="email" class="form-control" placeholder="Contact Email" name='email'>
                &nbsp;
                <input required type="number" class="form-control" placeholder="Contact Number" name='contact'>
                &nbsp;
                <input required type="number" class="form-control" placeholder="Credit Card" name='ccard'>
            </div>
            <br>
            <small>All the fields are required</small>
            <input type="submit" value="Book" class='btn btn-outline-primary right'>
        </form>
    </div>
</body>
</html>