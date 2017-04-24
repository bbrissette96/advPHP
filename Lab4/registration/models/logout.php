<?php
/**
 * Created by PhpStorm.
 * User: 001365152
 * Date: 4/17/2017
 * Time: 7:04 PM
 */

session_start();
unset($_SESSION);
session_destroy();
header('location: ../login.php');