<?php
    session_start();
    require_once('../server/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="jumbotron center">
        <h3>Login</h3>
    </div>
    <div class="container container-fluid">
        <form method="post">
            <br>
            <input class='form-control' type="number" name="id">
            <br>
            <input class='form-control' type="password" name="pass">
            <br>
            <input name='login' class='btn btn-primary right' type="submit" value="Log In">
        </form>
    </div>
</body>
</html>

<?php
    if(isset($_POST['login'])){
        $id = $_POST['id'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM `tbl-admin` WHERE `admin_id` = '${id}' AND `admin_password` = '${pass}'";
        $result = $conn->query($sql);
        $rows = $result->num_rows;
        if($rows == 1){
            $_SESSION['id'] = $id;
            header('location:./dashboard.php');
        }
    }
?>