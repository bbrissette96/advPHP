<?php
/**
 * Created by PhpStorm.
 * User: 001365152
 * Date: 4/3/2017
 * Time: 6:43 PM
 */
interface ICrud{

    public function update();
    public function delete();
    public function create();
    public function readSingle();
    public function readAll();

}