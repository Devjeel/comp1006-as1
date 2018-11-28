<?php

$title = "eBuy Selling Form";
require('header.php');

//Authentication Check
require('auth.php');

//Initialized variables
$name = null;
$address = null;
$gender = null;
$phone = null;
$productName = null;
$productPrice = null;
$accountId = null;
$imageName = null;

if (!empty($_GET['accountId'])) {
    $accountId = $_GET['accountId'];

    // connect
    require('db.php');

    // set up and execute query
    $sql = "SELECT * FROM accounts WHERE accountId = :accountId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':accountId', $accountId, PDO::PARAM_INT);
    $cmd->execute();
    $ac = $cmd->fetch();

    // store each column value in a variable
    $name = $ac['name'];
    $address = $ac['address'];
    $genderG = $ac['gender'];
    $phone = $ac['phone'];
    $productName = $ac['productName'];
    $productPrice = $ac['productPrice'];
    $imageName = $ac['imageFile'];

    // disconnect
    $db = null;
}
?>
    <div class="container jumbotron">
        <h1>Online Product Selling Form - eBuy</h1>
        <br />
        <h3><i class="far fa-user"></i>Account Information</h3>
        <small>We never share your private info to 3rd party !!</small>
        <!-- Horizontal ruler -->
        <hr>

        <small> * required fields </small>
        <form method="POST" action="save-form.php" enctype="multipart/form-data">
            <fieldset>
                <label for="name" class="col-md-1">Name*: </label>
                <input type="text" id="name" name="name" required value="<?php echo $name; ?>">
            </fieldset>
            <fieldset>
                <label for="address" class="col-md-1">Address: </label>
                <textarea id="address" name="address"><?php echo $address; ?></textarea>
            </fieldset>

            <fieldset class="dropdown">
                <label for="gender" class="col-md-1">Gender: </label>
                <select name="gender" id="gender">
                    <?php
                    //connect to DB
                    require('db.php');

                    //set up query
                    $sql = "SELECT * FROM gender_list";

                    //execute and store in variable
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $gender = $cmd->fetchAll();

                    //loop and print data
                    foreach($gender as $g){
                        if($g['gender'] == $genderG){
                            echo'<option selected>'. $g['gender'] .'</option>';
                        }else{
                            echo'<option>'. $g['gender'] .'</option>';
                        }
                    }

                    ?>
                </select>
            </fieldset>

            <fieldset>
                <label for="phone" class="col-md-1">Phone*: </label>
                <!-- phone no. must be in 123-123-1234 pattern-->
                <input type="tel" id="phone" name="phone" required
                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890"
                       value="<?php echo $phone; ?>">
            </fieldset>


            <!--Product Info-->
            <br />
            <h3><i class="fas fa-shopping-cart"></i>Product Info</h3>
            <hr>
            <fieldset>
                <label for="product-name" class="col-md-1">Product Name*: </label>
                <input type="text" id="product-name" name="product-name" placeholder="Product Name" required value="<?php echo $productName; ?>">
            </fieldset>
            <fieldset>
                <label for="product-price" class="col-md-1">Product Price*: </label>
                <!-- price increment by 0.5 -->
                <input type="number" id="product-price" name="product-price" placeholder="Selling price" step="0.5" required value="<?php echo $productPrice; ?>">
            </fieldset>
            <fieldset>
                <label for="ImageFile" class="col-md-1">Image:</label>
                <input type="file" name="imageFile" id="imageFile">
            </fieldset>
            <div class="container">
                <?php
                    if (isset($imageName)){
                        echo "<img src=\"img/$imageName\" alt=\"Image file\">";
                    }
                ?>
            </div>
            <br />

            <input type="submit" value="Post as a Ad" class="btn btn-outline-success btn-md">
            <input type="hidden" name="accountId" id="accountId" value="<?php echo $accountId; ?>" />
        </form>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>