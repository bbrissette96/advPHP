<?php
session_start();
require_once("models/dbconnect.php");
require_once("models/getAddress.php");
require_once("models/Validator.php");
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
require_once("models/addAddress.php");

$name = filter_input(INPUT_POST, "fullName");
$email = filter_input(INPUT_POST, "email");
$address = filter_input(INPUT_POST, "addressLine1");
$city = filter_input(INPUT_POST, "city");
$state = filter_input(INPUT_POST, "state");
$zip = filter_input(INPUT_POST, "zip");
$birthday = filter_input(INPUT_POST, "birthday");
$errors = [];

if (empty($name)) {
    $errors[] = "Name field is empty.";
}

if (!isValidEmail($email)) {
    $errors[] = "Email field is messed up.";
}

if (empty($address)) {
    $errors[] = "Address field is empty.";
}

if (empty($city)) {
    $errors[] = "City field is empty.";
}

if (empty($state) && count($state) > 2 ) {
    $errors[] = "State field is empty or too long.";
}

if(!isValidZIP($zip)){
    $errors[] = "Zip field is wrong.";
}

if (!isValidDate($birthday)) {
    $errors[] = "Birthday field is screwed up.";
}


if (count($errors) === 0) {
    if (addAddress($name, $email, $address, $city, $state, $zip, $birthday)) {
        $msgSuccess = "Record Successfully Added!";
    } else {
        $errors[] = "Record Could not be added.";
    }
}


?>

<?php
include('Templates/success.html.php');
include('Templates/errors.html.php');
?>

<form id="addressForm" method="post" action="#">
    <div class="form-group">
        Full Name: <input type="text" name="fullName">
    </div>
    <div class="form-group">
        E-mail: <input type="email" name="email">
    </div>
    <div class="form-group">
        Address: <input type="text" name="addressLine1">
    </div>
    <div class="form-group">
        City: <input type="text" name="city">
    </div>
    <div class="form-group">
        State: <input type="text" name="state">
    </div>
    <div class="form-group">
        Zip: <input type="text" name="zip">
    </div>
    <div class="form-group">
        Birthday: <input type="date" name="birthday">
    </div>
    <div class="form-group">
        Submit: <input type="submit" name="submit">
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>

