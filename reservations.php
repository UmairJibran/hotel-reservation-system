<?php
    require_once('server/connection.php');
    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Reservations</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container container-fluid">
        <div class="jumbotron center">
            <h2>Your Reservations</h2>
        </div>
        <table class="table">
            <thead>
                <th>#</th>
                <th>Hotel Name</th>
                <th>Hotel City</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Cost</th>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT `customer_id` FROM `tbl-customer` WHERE `customer_identity_number` = '${id}'";
                    $result = $conn->query($sql);
                    $rows = $result->num_rows;
                    if($rows >= 1){
                        $userID = $result->fetch_assoc()['customer_id'];
                        $sql = "SELECT * FROM `tbl-reservations` WHERE `customer_id` = ${userID}";
                        $result = $conn->query($sql);
                        $rows = $result->num_rows;
                        if($rows>=1){
                            $counter = 0;
                            while($resData = $result->fetch_assoc()){
                                $counter += 1;
                                $start = $resData['start_data'];
                                $end = $resData['end_date'];
                                $cost = $resData['total_cost'];
                                $hotelID = $resData['hotel_id'];
                                $sql1 = "SELECT * FROM `tbl-hotel-info` WHERE `hotel_ID` = $hotelID";
                                $result1 = $conn->query($sql1);
                                $hotData = $result1->fetch_assoc();
                                $hotelName = $hotData['hotel_NAME'];
                                $hotelCity = $hotData['hotel_CITY'];
                                echo "<tr>
                                    <td>$counter</td>
                                    <td>$hotelName</td>
                                    <td>$hotelCity</td>
                                    <td>$start</td>
                                    <td>$end</td>
                                    <td>$cost</td>
                                </tr>";
                            }
                        }else{
                            echo "<tr align='center'>
                                <td colspan='6'>NO Reservations</td>
                            </tr>";
                        }
                    }else{
                        echo "<tr align='center'>
                            <td colspan='6'>User Not Found</td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>