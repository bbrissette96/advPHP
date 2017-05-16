<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Main page</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="login.php">Home</a>
            <a class="navbar-brand" href="upload.php">Upload</a>
            <a class="navbar-brand" href="viewUploads.php">View Uploads</a>
        </div>
    </div>
</nav>
<?php
$filePath = filter_input(INPUT_GET, 'file');


$file = new SplFileObject($filePath, "r");
$contents = $file->fread($file->getSize());
$fileTime = date("l F j, Y, g:i a", $file->getMTime());
$fileSize = $file->getSize() . " bytes";
$fileExt = $file->getExtension();

$file = NULL;

if(filter_input(INPUT_POST, 'delete') != NULL){
    unlink(filter_input(INPUT_POST, 'id'));
    die("File Deleted!");
}

?>

<p>File Size: <?php echo $fileSize; ?></p>
<p>File Time: <?php echo $fileTime; ?></p>
<p>File Download: <a href="<?php echo $filePath; ?>">Download</a></p>
<form action="#" method="post">
    <input type="hidden" name="id" value="<?php echo $filePath; ?>">
    <input type="submit" class="btn btn-primary" name="delete" value="Delete">
    <?php ?>
</form>
<?php switch ($fileExt):
    case 'jpg': ?>
    <?php case 'png': ?>
    <?php case 'jpeg': ?>
        <img src="<?php echo $filePath; ?>">
        <?php break; ?>
    <?php case 'txt': ?>
        <textarea><?php echo $contents; ?></textarea>
        <?php break; ?>

    <?php case 'html': ?>
    <?php case 'pdf': ?>
        <iframe src="<?php echo $filePath; ?>"></iframe>
        <?php break; ?>
    <?php endswitch; ?>


</body>
</html>