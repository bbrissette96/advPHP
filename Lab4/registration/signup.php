<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Main page</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="login.php">Home</a>
        </div>
    </div>
</nav>

<?php
include './autoload.php';

$reg = new Registration();
$util = new Util();
$valid = new Validator();

if($util->isPostRequest()){
    $postValues = $util->getPostValues();
    $email = filter_input(INPUT_POST,'email');
    $pass = filter_input(INPUT_POST, 'password');
    $confirmPass = filter_input(INPUT_POST, 'confirmPassword');
    $errors = [];

    if ($valid->isValidEmail($email)){
        $errors[] = "Email field is messed up.";
    }
    if (empty($pass)){
        $errors[] = "Password field is empty.";
    }
    if ($confirmPass != $pass){
        $errors[] = "Confirm Password field is wrong.";
    }

    if (count($errors) === 0) {
        if ($reg->signup($postValues["email"], $postValues["password"])) {
            $msgSuccess = "Record Successfully Added!";
        } else {
            $errors[] = "Record Could not be added.";
        }
    }

}

include './templates/errors.html.php';
include './templates/success.html.php';
include './templates/signup.html.php';
?>
</body>
</html>