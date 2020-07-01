<?php
    require_once("server/connection.php");
    $city = $_GET['city'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels in <?php echo $city;?></title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="./"><button class="go-home">Go Home</button></a>
    <div class="container container-fluid">
        <div class="jumbotron">
            <h2 class="center">Best Hotesl in <?php echo $city;?></h2>
        </div>
        <?php
            $sql = "SELECT * FROM `tbl-hotel-info` WHERE `hotel_CITY` = '${city}'";
            $result = $conn->query($sql);
            $rows = $result->num_rows;
            if($rows >= 1){
                ?>
                <table class="table table-hover">
                    <thead class='center'>
                        <th>#</th>
                        <th>Name</th>
                        <th>Street/Road</th>
                        <th>Building</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Total Rooms</th>
                        <th>Details</th>
                    </thead>
                    <tbody>
                <?php
                $counter = 0;
                while($data = $result->fetch_assoc()){
                    $counter += 1;
                    $rooms = 0;
                    $id=$data['hotel_ID'];
                    $name = $data['hotel_NAME'];
                    $street = $data['hotel_STREET'];
                    $building = $data['hotel_BUILDING'];
                    $email = $data['hotel_EMAIL'];
                    $website = $data['hotel_WEBSITE'];
                    $n1R = $data['hotel_NSINGLEROOMS'];
                    $n2R = $data['hotel_NDOUBLEROOMS'];
                    $n3R = $data['hotel_NTRIPLEROOMS'];
                    $n4R = $data['hotel_NFOURPROOMS'];
                    $rooms = $n1R + $n2R + $n3R + $n4R;
                    echo "<a href='index.php'>
                            <td align='center'>${counter}</td>
                            <td align='center'>${name}</td>
                            <td align='center'>${street}</td>
                            <td align='center'>${building}</td>
                            <td align='center'>${email}</td>
                            <td align='center'>${website}</td>
                            <td align='center'>${rooms}</td>
                            <td align='center'><a href='./hotel-detail.php?hotel=${id}'>Visit</a></td>
                        </a>
                    ";
                }
                ?>
                    </tbody>
                </table>
                <?php
            }
        ?>
    </div>
    
</body>
</html>