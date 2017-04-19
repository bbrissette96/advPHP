<?php

class AddressCRUD extends DB {



    function getAllAddresses() {
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM address");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $results;
    }

    function addAddress($name, $email, $address, $city, $state, $zip, $birthday)
    {
        $db = $this->getDb();

        $stmt = $db->prepare("INSERT INTO address (fullname, email, addressline1, city, state, zip, birthday) VALUES (:fullname, :email, :address, :city, :state, :zip, :birthday)");
        $stmt->bindParam(':fullname', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':zip', $zip);
        $stmt->bindParam(':birthday', $birthday);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            return true;
        }

        return false;

    }

}
