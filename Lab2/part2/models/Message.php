<?php

/**
 * Created by PhpStorm.
 * User: 001365152
 * Date: 4/3/2017
 * Time: 7:27 PM
 */
class Message implements IMessage
{

    protected $messages = [];

    public function addMessage($key, $msg)
    {
        $this->messages[$key] = $msg;
    }

    public function getAllMessages()
    {
        return $this->messages;
    }

    public function removeMessage($key)
    {
        unset ($this->messages[$key]);
    }

}