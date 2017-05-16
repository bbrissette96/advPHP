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

$counter = 1;
$folder = './uploads';
if ( !is_dir($folder) ) {
    die('Folder <strong>' . $folder . '</strong> does not exist' );
}
$directory = new DirectoryIterator($folder);

if(filter_input(INPUT_POST, 'delete') != NULL){
    unlink("./uploads/". filter_input(INPUT_POST, 'id'));
}

?>

<?php foreach ($directory as $fileInfo) : ?>
    <?php if ( $fileInfo->isFile() ) : ?>
        <h2><?php echo $counter . ": " . $fileInfo->getFilename(); $counter++ ?></h2>
        <a href="viewData.php?file=<?php echo $fileInfo->getPathname();?>">View More Details</a><br/>
        <form action="#" method="post">
            <input type="hidden" name="id" value="<?php echo $fileInfo->getFilename(); ?>">
            <input type="submit" class="btn btn-primary" name="delete" value="Delete">
            <?php ?>
        </form>
    <?php endif; ?>
<?php endforeach; ?>


</body>
</html>