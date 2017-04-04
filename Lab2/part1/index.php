<?php

include './autoload.php';

$msg = new Message();

$msg->addMessage('test', 'This is a test1');
$msg->addMessage('test2', 'This is a test2');

var_dump($msg->getAllMessages());

$errMsg = new ErrorMessage();

$errMsg->addMessage('testErr', 'this is an error test');
$errMsg->addMessage('testErr2', 'this is an error test 2');

var_dump($errMsg->getAllMessages());


$msg->removeMessage('test');

var_dump($msg->getAllMessages());

?>