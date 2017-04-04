<?php
require_once ("db.php");

$name = mysqli_real_escape_string($conn, $_REQUEST["fullName"]);
$email = mysqli_real_escape_string($conn, $_REQUEST["email"]);
$address = mysqli_real_escape_string($conn, $_REQUEST["addressLine1"]);
$city = mysqli_real_escape_string($conn, $_REQUEST["city"]);
$state = mysqli_real_escape_string($conn, $_REQUEST["state"]);
$zip = mysqli_real_escape_string($conn, $_REQUEST["zip"]);
$birthday = mysqli_real_escape_string($conn, $_REQUEST["birthday"]);

$sql = "INSERT INTO address (fullname, email, addressline1, city, state, zip, birthday) VALUES ('$name', '$email', '$address', '$city', '$state', '$zip', '$birthday')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

?>