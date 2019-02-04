<?php
/**
 * Created by PhpStorm.
 * User: daniel santillan
 * Date: 12/11/2018
 * Time: 2:32 AM
 */

    $dsn = 'mysql:host=localhost;dbname=recruitment;charset=utf8;';
    $username = 'root';
    $password = null;
    try
    {
        $connection = new PDO($dsn, $username, $password);
        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $error)
    {
        echo 'Error occurred. '. $error -> getMessage();
    }