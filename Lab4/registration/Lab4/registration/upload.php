<!DOCTYPE html>
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
            <a class="navbar-brand" href="viewUploads.php">View Uploads</a>
        </div>
    </div>
</nav>

<form enctype="multipart/form-data" action="upload.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
    <!-- Name of input element determines name in $_FILES array -->
    <div class="form-group">
        <label class="control-label">Send this file:</label>
        <input class="form-control" name="upfile" type="file"/><br/>
        <input class="btn btn-primary" type="submit" value="Send File"/>
    </div>
</form>
<?php
include './autoload.php';

$filehandler = new Filehandler();

try {
    $fileName = $filehandler->upLoad('upfile');
} catch (RuntimeException $e) {
    $error = $e->getMessage();
}
?>

<?php if (isset($fileName)) : ?>
    <h2><?php echo $fileName; ?> is uploaded successfully.</h2>
<?php else: ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>

</body>
</html>