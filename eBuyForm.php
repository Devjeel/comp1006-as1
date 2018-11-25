<?php
$title = "eBuy Selling Form";
require('header.php');
?>
    <br />
    <h1>Online Product Selling Form - eBuy</h1>
    <br />
    <h3><i class="far fa-user"></i>Account Information</h3>
    <!-- Horizontal ruler -->
    <hr>


    <form method="POST" action="save-form.php" >
        <fieldset>
            <label for="name" class="col-md-1">Name: </label>
            <input type="text" id="name" name="name">
        </fieldset>
        <fieldset>
            <label for="address" class="col-md-1">Address: </label>
            <textarea id="address" name="address"></textarea>
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
                echo'<option>'. $g['gender'] .'</option>';
            }

            ?>
            </select>
        </fieldset>

        <fieldset>
            <label for="phone" class="col-md-1">Phone: </label>
            <!-- phone no. must be in 123-123-1234 pattern-->
            <input type="tel" id="phone" name="phone" required
                   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890">
        </fieldset>


        <!--Product Info-->
        <br />
        <h3><i class="fas fa-shopping-cart"></i>Product Info</h3>
        <hr>
        <fieldset>
            <label for="product-name" class="col-md-1">Product Name: </label>
            <input type="text" id="product-name" name="product-name" placeholder="Product Name" required>
        </fieldset>
        <fieldset>
            <label for="product-price" class="col-md-1">Product Price: </label>
            <!-- price increment by 0.5 -->
            <input type="number" id="product-price" name="product-price" placeholder="Selling price" step="0.5">
        </fieldset>

        <br />

        <input type="submit" value="Post as a Ad" class="btn btn-outline-success btn-md">
    </form>
</body>
</html>