<?php
/**
 * Created by Charlotte.
 * Project: Banking-Recruitment-System
 * Date: 2/14/2019
 * Time: 2:35 PM
 */

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
        if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']))
        {
            if (!isset($_POST['post']) && !isset($_POST['title']) && !isset($_POST['description']) &&
                !isset($_POST['qualifications']) && !isset($_POST['responsibilities']))
            {
                header('Location: dashboard.php');
                exit;
            }
            else
            {
                require_once '../functions/database.php';
                $id = $_POST['post'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $qualifications = $_POST['qualifications'];
                $responsibilities = $_POST['responsibilities'];

                $sql = 'update job_posting set Job_Title = :title, Description = :description,'.
                'Qualifications = :qualifications, Responsibilities = :responsibilities where Post_ID = :id';
                $statement = $connection -> prepare($sql);
                $statement -> bindParam(':title', $title);
                $statement -> bindParam(':description', $description);
                $statement -> bindParam(':qualifications', $qualifications);
                $statement -> bindParam(':responsibilities', $responsibilities);
                $statement -> bindParam(':id', $id);
                $statement -> execute();
                header('Location: dashboard.php');
                exit;
            }
        }
    }
}