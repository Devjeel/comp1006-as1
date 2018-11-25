<?php
$title = "eBuy Posts";
require('header.php');
?>
    <br />
    <h1> All Ads for our customers </h1>
    <br />

    <form class="form-inline">
        <label>Search Here : </label>
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <br />

    <?php
    //connect to DB
    require('db.php');

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