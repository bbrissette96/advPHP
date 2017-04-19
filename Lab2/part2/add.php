<?php
session_start();
require_once './autoload.php';
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

$name = filter_input(INPUT_POST, "fullName");
$email = filter_input(INPUT_POST, "email");
$address = filter_input(INPUT_POST, "addressLine1");
$city = filter_input(INPUT_POST, "city");
$state = filter_input(INPUT_POST, "state");
$zip = filter_input(INPUT_POST, "zip");
$birthday = filter_input(INPUT_POST, "birthday");
$errors = [];

$addressCrud = new AddressCRUD();
$validation = new Validator();
$util = new Util();


if ($util->isPostRequest() === true) {
    if (empty($name)) {
        $errors[] = "Name field is empty.";
    }

    if ($validation->isValidEmail($email)) {
        $errors[] = "Email field is messed up.";
    }

    if (empty($address)) {
        $errors[] = "Address field is empty.";
    }

    if (empty($city)) {
        $errors[] = "City field is empty.";
    }

    if (empty($state) && count($state) > 2) {
        $errors[] = "State field is empty or too long.";
    }

    if ($validation->isValidZIP($zip) === false) {
        $errors[] = "Zip field is wrong.";
    }

    if ($validation->isValidDate($birthday)) {
        $errors[] = "Birthday field is screwed up.";
    }


    if (count($errors) === 0) {
        if ($addressCrud->addAddress($name, $email, $address, $city, $state, $zip, $birthday)) {
            $msgSuccess = "Record Successfully Added!";
        } else {
            $errors[] = "Record Could not be added.";
        }
    }
}

?>

<?php
include('Templates/success.html.php');
include('Templates/errors.html.php');
?>

<div class="card col-xs-4">
    <div class="card-block">
        <form id="addressForm" method="post" action="#">
            <h3 class="card-title">Add Your Address</h3>
            <div class="form-group">
                <label class="control-label">Full Name:</label>
                <input type="text" name="fullName" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Email:</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Address</label>
                <input type="text" name="addressLine1" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">City:</label>
                <input type="text" name="city" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">State:</label>
                <input type="text" name="state" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Zip:</label>
                <input type="text" name="zip" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Birthday:</label>
                <input type="date" name="birthday" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>

