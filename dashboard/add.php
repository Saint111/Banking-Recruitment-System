<?php
/**
 * Created by Charlotte.
 * Project: Banking Recruitment System
 * Date: 1/15/2019
 * Time: 8:13 AM
 */

require_once '../functions/database.php';

if (!isset($_POST['submit']))
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
        $title = $_POST['title'];
        $author = $_POST['author'];
        $vacancy = $_POST['vacancy'];
        $description = $_POST['description'];
        $qualification = $_POST['qualification'];
        $responsibility = $_POST['responsibility'];

        if (empty($title) && empty($author) && empty($vacancy) && empty($description)
            && empty($qualification) && empty($responsibility))
        {
            header('Location: dashboard.php?Empty=Fields');
            exit;
        }
        else
        {
            $sql = 'insert into job_posting(Time_Posted, Job_Title, Author, Vacancy, Description, Qualifications, Responsibilities) '.
                'values (NOW(), ?, ?, ?, ?, ?, ?)';
            $statement = $connection -> prepare($sql);
            $statement -> bindParam('1', $title);
            $statement -> bindParam('2', $author);
            $statement -> bindParam('3', $vacancy);
            $statement -> bindParam('4', $description);
            $statement -> bindParam('5', $qualification);
            $statement -> bindParam('6', $responsibility);
            $statement -> execute();
            header('Location: dashboard.php?Posting=Success');
            exit;
        }
    }
}