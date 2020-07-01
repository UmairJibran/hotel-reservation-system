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
    <title>Update User</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="jumbotron center">
        <h3>Update User's Status</h3>
    </div>
    <div class="container container-fluid">
        <table class='table center'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM `tbl-customer`";
                    $result= $conn->query($sql);
                    $rows = $result->num_rows;
                    if($rows>=1){
                        $counter = 0;
                        while($data = $result->fetch_assoc()){
                            $counter+=1;
                            $name = $data['customer_first_name'] . ' ' . $data['customer_last_name'];
                            $status = $data['customer_type'];
                            echo "
                                <tr>
                                    <td>$counter</td>
                                    <td>$name</td>
                                    <td><form method='POST'>
                                        <select required class='form-control' name='select$counter'>
                                            <option disabled value='' selected>$status</option>
                                            <option value='normal'>Normal</option>
                                            <option value='premium'>Premium</option>
                                        </select>
                                    </form></td>
                                </tr>
                            ";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>