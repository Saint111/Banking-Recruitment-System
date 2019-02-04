<?php
/**
 * Created by Charlotte.
 * Project: Banking-Recruitment-System
 * Date: 2/4/2019
 * Time: 8:41 PM
 */

if (!isset($_POST['accept']))
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
            $information = $_POST['information'];

            if (empty($information))
            {
                header('Location: dashboard.php');
                exit;
            }
            else
            {
                if (!number_format($information))
                {
                    header('Location: dashboard.php');
                    exit;
                }
                else
                {
                    require_once '../functions/database.php';
                    $sql = 'select * from application where Application_ID = ?';
                    $statement = $connection -> prepare($sql);
                    $statement -> execute([$information]);
                    $fetch = $statement -> fetchAll(PDO::FETCH_NUM);
                    foreach ($fetch as $row)
                    {
                        $data = array(Sanitizer($row['1']), Sanitizer($row['2']), Sanitizer($row['4']),
                            Sanitizer($row['5']), Sanitizer($row['6']), Sanitizer($row['14']), Sanitizer($row['15']));

                        $sql = 'insert into management values (null, ?, ?, ?, ?, ?, ?, ?)';
                        $statement = $connection -> prepare($sql);
                        $statement -> execute($data);
                        header('Location: table.php?Accept=Success');
                        exit;
                    }
                }
            }
        }
    }
}

function Sanitizer($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
}