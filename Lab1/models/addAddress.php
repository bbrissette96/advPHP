<?php

function addAddress($name, $email, $address, $city, $state, $zip, $birthday)
{
    $db = dbconnect();


    $stmt = $db->prepare("INSERT INTO address (fullname, email, addressline1, city, state, zip, birthday) VALUES (:fullname, :email, :address, :city, :state, :zip, :birthday)");
    $stmt->bindParam(':fullname', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':zip', $zip);
    $stmt->bindParam(':birthday', $birthday);

    if($stmt->execute() && $stmt->rowCount() > 0){
        return true;
    }

    return false;

}


?>