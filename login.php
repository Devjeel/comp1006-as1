<?php
$title = "Login page";
require('header.php');
?>

<main class="container">
    <h1>Log In</h1>
    <?php
    if (isset($_GET['invalid'])){
        echo '<div class="alert alert-danger">&#10008; Invalid Login</div>';
    }
    else {
        echo '<div class="alert alert-info">&#10004; Please enter your credentials</div>';
    }
    ?>
    <form method="post" action="validate.php">
        <fieldset class="form-group">
            <label for="username" class="col-sm-2">Username:</label>
            <input name="username" id="username" required
                   type="email" placeholder="email@email.com"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="password" class="col-sm-2">Password:</label>
            <input type="password" name="password" required />
        </fieldset>
        <fieldset class="col-sm-offset-2">
            <input type="submit" value="Login" class="btn btn-success" />
            <a class="btn btn-primary" href="register.php">Register Here</a>
        </fieldset>
    </form>
</main>

<!-- Latest jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>