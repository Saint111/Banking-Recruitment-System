<?php
/**
 * Created by Charlotte.
 * Project: Banking-Recruitment-System
 * Date: 2/9/2019
 * Time: 11:30 AM
 */

if (!isset($_GET['ID']))
{
    header('Location: table.php');
    exit;
}
else
{
    $id = Sanitizer($_GET['ID']);

    if (empty($id))
    {
        header('Location: table.php');
        exit;
    }
    else
    {
        if (!is_numeric($id))
        {
            header('Location: table.php');
            exit;
        }
        else
        {
            require_once '../functions/database.php';
            $sql = 'select * from application where Application_ID = :ID';
            $statement = $connection -> prepare($sql);
            $statement -> execute([':ID' => $id]);
            if ($statement -> rowCount() > 0 )
            {
                while ($row = $statement -> fetch(PDO::FETCH_NUM))
                {
                    $sql = 'update application set Status = :status where Application_ID = :id';
                    $statement = $connection -> prepare($sql);
                    $statement -> execute(array(':status' => 'Denied', 'id' => $row[0]));
                    header('Location: table.php?Denied=Success&Name='.$row['2']);
                    exit;
                }
            }
            else
            {
                header('Location: table.php');
                exit;
            }
        }
    }
}

function Sanitizer($data)
{
    $data = trim($data);
    $data = trim($data, '"');
    $data = trim($data, "'");
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
}