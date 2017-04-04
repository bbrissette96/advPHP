<?php
session_start();
require_once("models/dbconnect.php");
require_once ("models/getAddress.php");
?>
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Main page</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">View Page</a>
            <a class="navbar-brand" href="add.php">Add Page</a>
        </div>
    </div>
</nav>

<?php

$address = getAllAddress();
include 'Templates/view-address.html.php';

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
