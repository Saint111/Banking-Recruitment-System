<?php
/**
 * Created by Charlotte.
 * Project: Banking-Recruitment-System
 * Date: 2/4/2019
 * Time: 11:32 PM
 */

if (!isset($_POST['information']))
{
    header('Location: dashboard.php');
    exit;
}
else
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        header('Location: dashboard.php');
        exit;
    }
    else
    {
        if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']))
        {
            if (empty($_POST['information']))
            {
                header('Location: dashboard.php');
                exit;
            }
            else
            {
                $information = $_POST['information'];

                if (filter_var($information, FILTER_SANITIZE_NUMBER_INT))
                {
                    header('Location: table.php?View=Information&Data='.$information);
                    exit;
                }
            }
        }
    }
}