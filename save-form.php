<?php
try {
    $title = "Form saved";
    require('header.php');

    //Authentication Check
    require('auth.php');

    //introduce variable and store data from form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $productName = $_POST['product-name'];
    $productPrice = $_POST['product-price'];
    $accountId = $_POST['accountId'];
    $imageName = null;

    //Validate each input (using boolean)
    $OK = true;

    //validation from server side
    if (empty($name)) {
        echo "Name is required. <br />";
        $OK = false;
    }
    if (empty($address)) {
        echo "Address is required <br />";
        $OK = false;
    }
    if (empty($phone)) {
        echo "Phone is required <br />";
        $OK = false;
    }
    if (empty($productName)) {
        echo "Product name is required <br />";
        $OK = false;
    }
    if (empty($productPrice)) {
        echo "Product price is required <br />";
        $OK = false;
    }

    //Check image file type
    if(isset($_FILES['imageFile'])){
        $imageFile = $_FILES['imageFile'];

        if($imageFile['size'] > 0){
            //Generate Unique name
            $imageName = session_id() . "_" . $imageFile['name'];

            //check image file
            $imageType = null;
            $finfo = finfo_open(FILEINFO_MIME_TYPE);

            $imageType = finfo_file($finfo, $imageFile['tmp_name']);

            // allow only jpeg & png
            if (($imageType != "image/jpeg") && ($imageType != "image/jpg") && ($imageType != "image/png")) {
                echo 'Please upload a valid JPG or PNG image file<br />';
                $ok = false;
            }
            else {
                // save the file
                move_uploaded_file($imageFile['tmp_name'], "img/{$imageName}");
            }
        }

    }

    if ($OK == true) {
        //connect to DB
        require('db.php');

        // set up and execute an INSERT or UPDATE command
        if (empty($accountId)) {
            $sql = "INSERT INTO accounts (name, address, gender, phone, productName, productPrice, imageName) VALUES(:name, :address, :gender, :phone, :productName, :productPrice, :imageName)";
        } else {
            $sql = "UPDATE accounts SET name = :name, address = :address, gender = :gender, phone = :phone, productName = :productName, productPrice = :productPrice, imageName = :imageName WHERE accountId = :accountId";
        }

        $cmd = $db->prepare($sql);
        $cmd->bindParam(':name', $name, PDO::PARAM_STR, 60);
        $cmd->bindParam(':address', $address, PDO::PARAM_STR, 120);
        $cmd->bindParam(':phone', $phone, PDO::PARAM_STR, 13);
        $cmd->bindParam(':gender', $gender, PDO::PARAM_STR, 20);
        $cmd->bindParam(':productName', $productName, PDO::PARAM_STR, 30);
        $cmd->bindParam(':productPrice', $productPrice, PDO::PARAM_STR, 10);
        $cmd->bindParam(':imageName',$imageName,PDO::PARAM_STR,100);
        if (!empty($accountId)) {
            $cmd->bindParam(':accountId', $accountId, PDO::PARAM_INT);
        }
        $cmd->execute();

        //disconnect
        $db = null;

        echo "<h1>Details saved!!</h1>";

    }
}
catch(Exception $e){

    //mail send
    mail('jeelhp02@gmail.com','eBuy Error email', $e);

    //redirect to error page
    header('location:error.php');
}
?>
    <a href="display-form.php" class="btn btn-info btn-lg">View all Posts</a>

</body>
</html>