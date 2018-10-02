<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Form saved </title>
</head>
<body>

<?php
//introduce variable and store data from form
$name = $_POST['name'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];

//Validate each input (using boolean)
$OK = true;

if(empty($name)) {
    echo "Name is Required. <br />";
    $OK = false;
}
if(empty($address)) {
    echo "Address is Required <br />";
    $OK = false;
}
if(empty($phone)) {
    echo "Phone is Required <br />";
    $OK = false;
}

if(OK == true){
    //connect
    $db = new PDO('mysql:host=localhost;dbname=as1', 'root','jeelhp2015.');

    // setup and execute INSERT command
    $sql = "INSERT INTO accounts (name, address, gender, phone) VALUES(:name, :address, :gender, :phone)";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 60);
    $cmd->bindParam(':address', $address, PDO::PARAM_STR, 120);
    $cmd->bindParam(':phone',$phone, PDO::PARAM_STR, 15);
    $cmd->bindParam('gender',$gender, PDO::PARAM_STR,20);
    $cmd->execute();

    //disconnect
    $db = null;

    echo "<h1>Details saved!!</h1>";

}
?>
    <a href="display-form.php">View all Posts</a>

</body>
</html>