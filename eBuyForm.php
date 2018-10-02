<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>eBuy Selling Form</title>
</head>
<body>

    <h1>Online Selling Form - eBuy</h1>

    <a href="display-form.php">View all Posted Ads</a>
    <br />
    <h3>Account Information</h3>
    <hr>

    <form method="POST" action="save-form.php">
        <fieldset>
            <label for="name">Name: </label>
            <input type="text" id="name" name="name">
        </fieldset>
        <fieldset>
            <label for="address">Address: </label>
            <textarea id="address" name="address"></textarea>
        </fieldset>

        <fieldset>
            <label for="gender" class="col-md-1">Gender: </label>
            <select name="gender" id="gender">
            <?php
            //connect
            $db = new PDO('mysql:host=localhost;dbname=as1', 'root','jeelhp2015.');

            //set up query
            $sql = "SELECT * FROM gender_list";

            //execute and store in variable
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $gender = $cmd->fetchAll();

            foreach($gender as $g){
                echo'<option>'. $g['gender'] .'</option>';
            }

            ?>
            </select>
        </fieldset>

        <fieldset>
            <label for="phone">Phone: </label>
            <input type="tel" id="phone" name="phone" required
                   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890">
        </fieldset>

        <input type="submit">
    </form>
</body>
</html>