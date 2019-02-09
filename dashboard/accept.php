<?php
/**
 * Created by Charlotte.
 * Project: Banking-Recruitment-System
 * Date: 2/9/2019
 * Time: 11:28 AM
 */

if (!isset($_GET['ID']) && !isset($_GET['Post']))
{
    header('Location: table.php');
    exit;
}
else
{
    $id = Sanitizer($_GET['ID']);
    $post = Sanitizer($_GET['Post']);

    if (empty($id) && empty($post))
    {
        header('Location: table.php');
        exit;
    }
    else
    {
        require_once '../functions/database.php';
        if (is_numeric($post))
        {
            $sql = 'update job_posting set Vacancy = Vacancy - 1 where Post_ID = :post and Vacancy > 0';
            $statement = $connection -> prepare($sql);
            $statement -> execute(array(':post' => $post));
        }

        if (!is_numeric($id))
        {
            header('Location: table.php');
            exit;
        }
        else
        {
            $sql = 'select * from application where Application_ID = :ID';
            $statement = $connection -> prepare($sql);
            $statement -> execute([':ID' => $id]);
            if ($statement -> rowCount() > 0 )
            {
                while ($row = $statement -> fetch(PDO::FETCH_NUM))
                {
                    $sql = 'insert into management values (null, :job, :name, :number, :email, :gender, :date, :course)';
                    $statement = $connection -> prepare($sql);
                    $statement -> bindParam(':job', $row[1]);
                    $statement -> bindParam(':name', $row[2]);
                    $statement -> bindParam(':number', $row[4]);
                    $statement -> bindParam(':email', $row[5]);
                    $statement -> bindParam(':gender', $row[6]);
                    $statement -> bindParam(':date', $row[14]);
                    $statement -> bindParam(':course', $row[15]);
                    $statement -> execute();

                    $sql = 'update application set Status = :status where Application_ID = :id';
                    $statement = $connection -> prepare($sql);
                    $statement -> execute(array(':status' => 'Accepted', 'id' => $row[0]));
                    header('Location: table.php?Accept=Success&Name='.$row['2']);
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