<?php
$title = "Form saved";
require('header.php');

//introduce variable and store data from form
$name = $_POST['name'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$productName = $_POST['product-name'];
$productPrice = $_POST['product-price'];
$accountId = $_GET['accountId'];

//Validate each input (using boolean)
$OK = true;

//validation from server side
if(empty($name)) {
    echo "Name is required. <br />";
    $OK = false;
}
if(empty($address)) {
    echo "Address is required <br />";
    $OK = false;
}
if(empty($phone)) {
    echo "Phone is required <br />";
    $OK = false;
}
if(empty($productName)) {
    echo "Product name is required <br />";
    $OK = false;
}
if(empty($productPrice)) {
    echo "Product price is required <br />";
    $OK = false;
}

if(OK == true){
    //connect to DB
    require('db.php');

    // set up and execute an INSERT or UPDATE command
    if (empty($accountId)) {
        $sql = "INSERT INTO accounts (name, address, gender, phone, productName, productPrice) VALUES(:name, :address, :gender, :phone, :productName, :productPrice)";
    }
    else {
        $sql = "UPDATE accounts SET name = :name, address = :address, gender = :gender, phone = :phone, productName = :productName, productPrice = :productPrice WHERE accountId = :accountId";
    }

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 60);
    $cmd->bindParam(':address', $address, PDO::PARAM_STR, 120);
    $cmd->bindParam(':phone',$phone, PDO::PARAM_STR, 15);
    $cmd->bindParam(':gender',$gender, PDO::PARAM_STR,20);
    $cmd->bindParam(':productName',$productName, PDO::PARAM_STR,30);
    $cmd->bindParam(':productPrice',$productPrice, PDO::PARAM_STR,10);
    $cmd->execute();

    //disconnect
    $db = null;

    echo "<h1>Details saved!!</h1>";

}
?>
    <a href="display-form.php" class="btn btn-info btn-lg">View all Posts</a>

</body>
</html>