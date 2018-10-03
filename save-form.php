<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Form saved </title>
    <!--  Bootstrap4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

<?php
//introduce variable and store data from form
$name = $_POST['name'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$productName = $_POST['product-name'];
$productPrice = $_POST['product-price'];

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
    $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395854', 'gc200395854','LEIknIIHYI');

    // setup and execute INSERT command
    $sql = "INSERT INTO accounts (name, address, gender, phone, productName, productPrice) VALUES(:name, :address, :gender, :phone, :productName, :productPrice)";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 60);
    $cmd->bindParam(':address', $address, PDO::PARAM_STR, 120);
    $cmd->bindParam(':phone',$phone, PDO::PARAM_STR, 15);
    $cmd->bindParam('gender',$gender, PDO::PARAM_STR,20);
    $cmd->bindParam('productName',$productName, PDO::PARAM_STR,30);
    $cmd->bindParam('productPrice',$productPrice, PDO::PARAM_STR,10);
    $cmd->execute();

    //disconnect
    $db = null;

    echo "<h1>Details saved!!</h1>";

}
?>
    <a href="display-form.php">View all Posts</a>

</body>
</html>