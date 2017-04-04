<<<<<<< HEAD
<?php


function isValidEmail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
        return true;
    }
    return false;
}

function isValidZIP($zip){
    $zipRegex = '/^[0-9]{5}$/';

    if( !preg_match($zipRegex, $zip) ){
        return false;
    }
    return true;
}

function isValidDate ($date){
    return (bool)strtotime($date);
}

=======
<?php


function isValidEmail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
        return true;
    }
    return false;
}

function isValidZIP($zip){
    $zipRegex = '/^[0-9]{5}$/';

    if( !preg_match($zipRegex, $zip) ){
        return false;
    }
    return true;
}

function isValidDate ($date){
    return (bool)strtotime($date);
}

>>>>>>> origin/master
?>
