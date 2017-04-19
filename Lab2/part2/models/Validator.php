<?php
class Validator
{
    function isValidEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            return false;
        }
        return true;
    }

    function isValidZIP($zip)
    {
        $zipRegex = '/^[0-9]{5}$/';

        if (!preg_match($zipRegex, $zip)) {
            return false;
        }
        return true;
    }

    function isValidDate($date)
    {
        if ((bool)strtotime($date) === true){
            return false;
        }else{
            return true;
        }

    }
}
?>
