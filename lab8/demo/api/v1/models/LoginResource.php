<?php

/**
 * Created by PhpStorm.
 * User: 001365152
 * Date: 5/15/2017
 * Time: 6:34 PM
 */
class LoginResource extends DBSpring
{
    public function login($serverData) {
        /* note you should validate before adding to the data base */
        $stmt = $this->getDb()->prepare("SELECT * FROM users WHERE email = :email");
        $binds = array(
            ":email" => $serverData['email']
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($serverData['password'], $results['password'])){
                return true;
            }
        }
        return false;
    }
}