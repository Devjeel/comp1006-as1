<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!--  Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="default.php">eBuy Services</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="display-form.php">View All Ads</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="eBuyForm.php">Post Ad</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php
            // access the current session
            session_start();
            if (empty($_SESSION['userId'])) {
                echo '<li class="nav-item active"><a class="nav-link" href="#"><i class="fas fa-user-plus"></i> Register  </a></li>
                        <li><a class="nav-link active" href="#"><i class="fas fa-sign-in-alt"></i> Login</a></li>';
            }
            else {
                echo '<li class="nav-item active"><a class="nav-link" href="#"><i class="fas fa-user"></i> ' . $_SESSION['username'] . '  </a></li>
                        <li><a class="nav-link active" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>
