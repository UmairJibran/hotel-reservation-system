<?php
    require_once("./server/connection.php");
    $hotel_id = $_GET['hotel'];
    $customer_cp_id = $_GET['id'];
    $first_name = '';
    $last_name = '';
    $email = '';
    $contact = '';
    $credit = '';
    $customer_id = 0;
    $exists = false;
    $sql = "SELECT * FROM `tbl-customer` WHERE `customer_identity_number` = '${customer_cp_id}'";
    $result = $conn->query($sql);
    $rows = $result->num_rows;
    if($rows == 1){
        $exists = true;
        while($userData = $result->fetch_assoc()){
            $customer_id = $userData['customer_id'];
            $first_name = $userData['customer_first_name'];
            $last_name = $userData['customer_last_name'];
            $email = $userData['customer_email'];
            $contact = $userData['customer_contact'];
            $credit = $userData['customer_card'];
        }
    }
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
                &emsp;
                <select class='form-control' required name="room">
                    <option value="" selected disabled>Select a Room</option>
                    <option value="s">Single Bed</option>
                    <option value="m">Double Bed</option>
                    <option value="l">Triple Bed</option>
                    <option value="xl">Four Bed</option>
                </select>
            </div>
            <br>
            <div class="input-group">
                    <label for="start">Start Date</label>
                    &emsp;
                    <input required type="date" name="start" id="start" class="form-control">
                    &emsp;
                    <label for="end">End Date</label>
                    &emsp;
                    <input required type="date" name="end" id="end" class="form-control">
                </div>
            <br>
            <label>Your Name</label>
            <div class="input-group">
                <input required type="text" class="form-control" value='<?php echo $first_name?>' placeholder="First Name" name='fname'>
                &emsp;
                <input required type="text" class="form-control" value='<?php echo $last_name?>' placeholder="Last Name" name='lname'>
            </div>
            <br>            
            <label>Your Necassary Data</label>
            <div class="input-group">
                <input required type="email" class="form-control" value='<?php echo $email?>' placeholder="Contact Email" name='email'>
                &emsp;
                <input required type="number" class="form-control" value='<?php echo $contact?>' placeholder="Contact Number" name='contact'>
                &emsp;
                <input required type="number" class="form-control" value='<?php echo $credit?>' placeholder="Credit Card" name='ccard'>
            </div>
            <br>
            <small>All the fields are required</small>
            <input type="submit" name='book' value="Book" class='btn btn-outline-primary right'>
        </form>
    </div>
</body>
</html>

<?php
    $roomType;
    $start;
    $end; 
    $cost;
    if(isset($_POST['book'])){
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $credit = $_POST['ccard'];
        if($exists){
            $sql = "UPDATE `tbl-customer` SET `customer_first_name` = '${first_name}',`customer_last_name` = '${last_name}',`customer_email` = '${email}',`customer_contact` = '${contact}',`customer_card`='${customer_card}' WHERE `tbl-customer`.`customer_id` = ${customer_id};";
            if($conn->query($sql)===true){addReservation();}
        }
        else{
            echo 'ss';
            $sql = "INSERT INTO `tbl-customer` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_identity_number`, `customer_contact`, `customer_type`, `customer_email`, `customer_card`) VALUES (NULL, '${first_name}', '${last_name}', '${customer_cp_id}', '${contact}', \'Normal\', '${email}', '${credit}')";
            if($conn->query($sql)===true) {$customer_id = $conn->insert_id;addReservation();}
        }
    }
    function  addReservation(){
        $sql = "INSERT INTO `tbl-reservations` (`res_id`, `hotel_id`, `customer_id`, `room_type`, `start_data`, `end_date`, `total_cost`)
        VALUES (NULL, '${hotel_id}', '${customer_id}', '${roomType}', '${start}', '${end}', '${cost}')";
        header('location:./');
    }
?>

