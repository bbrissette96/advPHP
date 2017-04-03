<?php
session_start();
require_once ("db.php");
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
                <a class="navbar-brand" href="#">Main Page</a>
            </div>
        </div>
    </nav>

   <form id="addressForm" method="post" action="addAddress.php">
       Full Name: <input type="text" name="fullName">
       E-mail: <input type="email" name="email">
       Address: <input type="text" name="addressLine1">
       City: <input type="text" name="city">
       State: <input type="text" name="state">
       Zip: <input type="text" name="zip">
       Birthday: <input type="datetime" name="birthday">
       Submit: <input type="submit" name="submit">
   </form>


    <?php
    $sql = "SELECT * FROM address";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "id: " . $row["address_id"] . ", Name: " . $row["fullname"]  . ", Email: " . $row["email"] . ", Address: " . $row["addressline1"] . "<br>";
        }
    }
    else{
        echo "0 results";
    }
    ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    </body>
</html>
