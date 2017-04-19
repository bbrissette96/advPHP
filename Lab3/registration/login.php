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
            <a class="navbar-brand" href="admin.php">Admin</a>
        </div>
    </div>
</nav>

<?php
session_start();
include './autoload.php';
$reg = new Registration();
$util = new Util();

if($util->isPostRequest()){

    $email = filter_input(INPUT_POST,'email');
    $password = filter_input(INPUT_POST, 'password');

    $user_id = $reg->login($email, $password);

    if($user_id > 0){
        $_SESSION['user_id'] = $user_id;
        $util->redirect('admin.php');
    };
}

include './templates/login.html.php';
?>
</body>
</html>