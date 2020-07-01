<?php require_once('./server/connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container container-fluid">
        <div class="jumbotron">
            <h1 class="center">Hotel Management System</h1>
            <small class='right'>Admin? <a href="./admin/login.php">Login</a></small>
        </div>
        <form method="POST">
            <div class="form-group">
                <label for="city" class='sr-only'>Select a City</label>
                <select name="city" id="city" class="form-control form-control-lg" required>
                    <option selected disabled value="">Select a City</option>
                    <?php
                        $sql = "SELECT `city_NAME` FROM `tbl-cities`;";
                        $result = $conn->query($sql);
                        $rows = $result->num_rows;
                        if($rows >= 1)
                            while($data = $result->fetch_assoc()){
                                $cityName = $data['city_NAME'];
                                echo "<option value='${cityName}'>${cityName}</option>";
                            }
                    ?>
                </select>
            </div>
            <input type="submit" value="Show Hotels" name="show" class="btn btn-primary">
        </form>
        <br><br>
        <form method='POST'>
            <label>Enter your CNIC/Passport to view your Reservations</label>
            <input type="number" class='form-control' name="cnic" required><br>
            <input type="submit" name='checkres' value="View" class='btn btn-outline-danger right'>
        </form>
        <?php
            if(isset($_POST['checkres'])){header("location:./reservations.php?id=".$_POST['cnic']);}
        ?>
    </div>
</body>
</html>

<?php
    if(isset($_POST['show'])) header("location:hotels.php?city=".$_POST['city']);
?>