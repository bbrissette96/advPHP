<?php
/**
 * Created by PhpStorm.
 * User: 001365152
 * Date: 4/3/2017
 * Time: 7:24 PM
 */

interface IMessage {

   public function addMessage($key, $msg);
   public function removeMessage($key);
   public function getAllMessages();
}