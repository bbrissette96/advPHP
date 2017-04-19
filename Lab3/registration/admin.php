<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Main page</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="signup.php">Sign Up</a>
            <a class="navbar-brand" href="login.php">Login</a>
        </div>
    </div>
</nav>

<?php
include './templates/access-required.html.php';
include './autoload.php';

$reg = new Registration();

$user = $reg->getEmail($_SESSION['user_id']);

if ( $user != '' ) {
    echo '<p>you are logged in as ' . $user . ' with user_id of: ' .$_SESSION['user_id'] . '</p>';
}

?>
<br/>
<a href="models/logout.php" class="btn btn-primary">Log Out</a>




</body>