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
        </div>
    </div>
</nav>
<?php
// http://php.net/manual/en/class.directoryiterator.php
//DIRECTORY_SEPARATOR


$folder = './uploads';
if ( !is_dir($folder) ) {
    die('Folder <strong>' . $folder . '</strong> does not exist' );
}
$directory = new DirectoryIterator($folder);

if(isset($_POST['delete'])){
    unlink("./uploads/". $_POST['id']);
}

?>

<?php foreach ($directory as $fileInfo) : ?>
    <?php if ( $fileInfo->isFile() ) : ?>
        <h2><?php echo $fileInfo->getFilename(); ?></h2>
        <p>uploaded on <?php echo date("l F j, Y, g:i a", $fileInfo->getMTime()); ?></p>
        <p>This file is <?php echo $fileInfo->getSize(); ?> byte's</p>
        <a href="<?php echo $fileInfo->getPathname();?>">View here</a><br/>
        <form action="#" method="post">
            <input type="hidden" name="id" value="<?php echo $fileInfo->getFilename(); ?>">
            <input type="submit" class="btn btn-primary" name="delete" value="Delete">
        </form>
        <?php
        if($fileInfo->getExtension() === 'jpg' ||$fileInfo->getExtension() ===  'gif' ||$fileInfo->getExtension() ===  'png'){
            ?><img src="<?php echo $fileInfo->getPathname(); ?>" /><?php
        }
        ?>
        <?php
        if($fileInfo->getExtension() === 'pdf' ||$fileInfo->getExtension() ===  'html' ||$fileInfo->getExtension() ===  'txt'){
            ?><iframe src="<?php echo $fileInfo->getPathname(); ?>"></iframe>><?php
        }
        ?>

    <?php endif; ?>
<?php endforeach; ?>


</body>
</html>