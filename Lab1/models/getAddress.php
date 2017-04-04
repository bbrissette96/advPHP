<?php

function getAllAddress() {

    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address");

    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

?>