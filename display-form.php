<?php
$title = "eBuy Posts";
require('header.php');
?>
    <br />
    <h1> All Ads for our customers </h1>
    <br />

    <form class="form-inline">
        <label>Search Here : </label>
        <input class="form-control mr-sm-2" type="search" name="searchName" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <br />

    <?php
    try {
        //connect to DB
        require('db.php');

        //set up query
        $sql = "SELECT * FROM accounts";

        if (isset($_GET['searchName'])) {
            $searchName = $_GET['searchName'];
            $sql .= " WHERE productName LIKE " . $searchName;
        }

        //execute and store the table
        $cmd = $db->prepare($sql);

//        if(isset($searchName))
//            echo "<h3>You searched: $searchName";
//        else
            $cmd->execute();

        $accInfo = $cmd->fetchAll();

        //start the table
        echo '<table class="table table-bordered table-striped text-center sortable"><thead><th>Name</th><th>Address</th><th>Phone</th><th>Gender</th>
        <th>product image</th><th>Product Name</th><th>Product Price</th>';

        // Check Auth
        if (isset($_SESSION['userId'])) {
            echo '<th>Actions</th>';
        }
        echo '</thead><tbody>';

        //loop and print the data
        foreach ($accInfo as $ac) {
            echo '<tr><td>' . $ac['name'] . '</td><td>' . $ac['address'] . '</td><td>' . $ac['phone'] . '</td><td>' . $ac['gender'] . '</td><td>';
                if(isset($imageName)){
                    echo "<img src=\"img/{$ac['imageName']}\"";
                } else { echo "No Image";} echo'</td><td>' .
                $ac['productName'] . '</td><td>' . $ac['productPrice'] . '</td>';

            if (isset($_SESSION['userId'])) {
                echo "<td><a class=\"btn btn-sm btn-info\" href=\"eBuyForm.php?accountId={$ac['accountId']}\">Edit</a>
                            <a href=\"delete.php?accountId={$ac['accountId']}\"
                            class=\"btn btn-sm btn-danger confirmation\">Delete</a></td>";
            }

            echo '</tr>';
        }

        //close the table
        echo '</tbody></table>';

        //disconnect
        $db = null;
    }
    catch(Exception $e){

        //mail send
        mail('jeelhp02@gmail.com','eBuy Error email', $e);

        //redirect to error page
        header('location:error.php');
    }
    ?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>