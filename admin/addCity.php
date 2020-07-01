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
    <title>Add City</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="jumbotron center">
        <h3>Add a City</h3>
    </div>
    <br>
    <div class="container container-fluid">
        <form method="POST">
            <div class="input-group">
                <input type="text" name="name" placeholder='City Name' class='form-control' required>
                &emsp;
                <input name='add' type="submit" value="Add City" class='btn btn-outline-warning'>
            </div>
        </form>
    </div>
</body>
</html>

<?php
    if(isset($_POST['add'])){
        $name = $_POST['name'];
        $sql = "INSERT INTO `tbl-cities` (`city_ID`, `city_NAME`) VALUES (NULL, '${name}')";
        if($conn->query($sql) === true) header('location:./dashboard.php');
    }
?>