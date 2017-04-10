<?php

class util
{
    function isPostRequest()
    {
        return (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST');
    }
}
?>