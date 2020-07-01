<?php    
    session_start();
    require_once('../server/connection.php');
    if(!isset($_SESSION['id'])) header('location:./login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hotel</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="jumbotron center">
        <h3>Add a Hotel</h3>
    </div>
    <br>
    <div class="container container-fluid">
        <form method="POST">
            <div class="input-group">
                <input type="text" name="name" placeholder='Hotel Name' class='form-control' required>
                &emsp;
                <input type="text" name="street" placeholder="Street/Road Name" required class='form-control'>
                &emsp;
                <select name="city" class='form-control'>
                    <option value="" disabled selected>Select a City</option>
                    <?php
                        $result = $conn->query("SELECT * FROM `tbl-cities`");
                        $rows = $result->num_rows;
                        while($cityData = $result->fetch_assoc()){
                            $city_name = $cityData['city_NAME'];
                            echo "<option value='${city_name}'>${city_name}</option>";
                        }
                    ?>
                </select>
            </div>
            <br>
            <div class="input-group">
                <input type="text" name="building" placeholder='Building Name' class='form-control' required>
                &emsp;
                <input type="email" name="email" placeholder='Hotel Email' class='form-control' required>
                &emsp;
                <input type="text" name="number" placeholder='Hotel Contact' class='form-control' required>
                &emsp;
                <input type="url" name="website" placeholder='Hotel Website' class='form-control' required>
            </div>
            <br>
            <div class="input-group">
                <input type="number" name="single_bedrooms" placeholder='Number of Single Bedrooms' class='form-control' required>
                &emsp;
                <input type="number" name="double_bedrooms" placeholder='Number of Double Bedrooms' class='form-control' required>
                &emsp;
                <input type="number" name="triple_bedrooms" placeholder='Number of Triple Bedrooms' class='form-control' required>
                &emsp;
                <input type="number" name="four_bedrooms" placeholder='Number of Four Bedrooms' class='form-control' required>
            </div><br>
            <input type="submit" value="Add" name='add' class="btn btn-outline-info right">
        </form>
    </div>
</body>
</html>

<?php
    if(isset($_POST['add'])){
        $name=$_POST['name'];
        $street=$_POST['street'];
        $city=$_POST['city'];
        $building=$_POST['building'];
        $email=$_POST['email'];
        $contact=$_POST['number'];
        $website=$_POST['website'];
        $single_bedrooms=$_POST['single_bedrooms'];
        $double_bedrooms=$_POST['double_bedrooms'];
        $triple_bedrooms=$_POST['triple_bedrooms'];
        $four_bedrooms=$_POST['four_bedrooms'];
        $sql = "INSERT INTO `tbl-hotel-info` (`hotel_ID`, `hotel_NAME`, `hotel_CITY`, `hotel_STREET`, `hotel_BUILDING`, `hotel_EMAIL`, `hotel_CONTACT`, `hotel_WEBSITE`, `hotel_NSINGLEROOMS`, `hotel_NDOUBLEROOMS`, `hotel_NTRIPLEROOMS`, `hotel_NFOURPROOMS`) VALUES (NULL, '$name', '$city', '$street', '$building', '$email', '$contact', '$website', '$single_bedrooms', '$double_bedrooms', '$triple_bedrooms', '$four_bedrooms');";
        if($conn->query($sql) === true) header("location:./dashboard.php");
        else echo"ulamba";
    }
?>