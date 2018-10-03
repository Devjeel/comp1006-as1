<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> eBuy Posts</title>
<!--  Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

    <a href="eBuyForm.php">Sell New product</a>

    <h1> All Ads for our customers </h1>

    <?php
    //connect to DB
    $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395854', 'gc200395854','LEIknIIHYI');

    //set up query
    $sql = "SELECT * FROM accounts";

    //execute and store the table
    $cmd = $db->prepare($sql);
    $cmd->execute();
    $accInfo = $cmd->fetchAll();

    //start the table
    echo '<table class="table table-bordered table-striped text-center"><thead><th>Name</th><th>Address</th><th>Phone</th><th>Gender</th>
<th>Product Name</th><th>Product Price</th></thead><tbody>';

    //loop and print the data
    foreach($accInfo as $ac){
        echo'<tr><td>'. $ac['name'] .'</td><td>' . $ac['address']. '</td><td>' . $ac['phone'] . '</td><td>' . $ac['gender'] . '</td><td>' .
            $ac['productName'] . '</td><td>' . $ac['productPrice'] . '</td></tr>';
    }

    //close the table
    echo '</tbody></table>';

    //disconnect
    $db = null;
    ?>


</body>
</html>