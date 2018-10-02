<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> eBuy Posts</title>
</head>
<body>

    <a href="eBuyForm.php">Sell New product</a>

    <h1> All Ads for our customers </h1>

    <?php
    //connect
    $db = new PDO('mysql:host=localhost;dbname=as1', 'root','jeelhp2015.');

    //set up query
    $sql = "SELECT * FROM accounts";

    //execute and store the table
    $cmd = $db->prepare($sql);
    $cmd->execute();
    $accInfo = $cmd->fetchAll();

    //start the table
    echo '<table><thead><th>Name</th><th>Address</th><th>Phone</th><th>Gender</th></thead><tbody>';

    //loop the data & show each restaurants
    foreach($accInfo as $ac){
        echo'<tr><td>'. $ac['name'] .'</td><td>' . $ac['address']. '</td><td>' . $ac['phone'] . '</td><td>' . $ac['gender'] . '</td></tr>';
    }

    //close the table
    echo '</tbody></table>';

    //disconnect
    $db = null;
    ?>


</body>
</html>