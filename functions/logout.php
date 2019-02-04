<?php
/**
 * Created by PhpStorm.
 * User: daniel santillan
 * Date: 12/11/2018
 * Time: 5:27 PM
 */

    if (isset($_POST['logout']))
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: ../index.php?Logout=Success');
        exit;
    }
    else
    {
        header('Location: ../index.php?Error');
        exit;
    }