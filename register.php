<?php
$title = "Registration page";
require('header.php');
?>

<main class="container">
    <h1>User Registration</h1>
    <div class="alert alert-info" id="message">Create your account</div>
    <form method="post" action="save-registration.php">
        <fieldset class="form-group">
            <label for="username" class="col-sm-2">Username:</label>
            <input name="username" id="username" required
                   type="email" placeholder="email@email.com"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="password" class="col-sm-2">Password:</label>
            <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
        </fieldset>
        <fieldset class="form-group">
            <label for="confirm" class="col-sm-2">Confirm Password:</label>
            <input type="password" name="confirm" id="confirm" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
        </fieldset>
        <div class="col-sm-offset-2">
            <input type="submit" value="Register" class="btn btn-success" />
            <a href="login.php" class="btn btn-primary">Already Registered?</a>
        </div>
    </form>
</main>

<!-- jQuery and Bootstrap 4 js -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
