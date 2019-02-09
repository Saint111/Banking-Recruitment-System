<?php
/**
 * Created by Charlotte.
 * Project: Banking Recruitment System
 * Date: 1/23/2019
 * Time: 11:25 PM
 */
    require_once 'database.php';

    if (!isset($_POST['submit']))
    {
        header('Location: ../apply.php');
        exit;
    }
    else
    {
        $job = $_POST['job'];
        $id = $_POST['id'];
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $initial = $_POST['initial'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $birth = $_POST['birth'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $tertiary = $_POST['tertiary'];
        $secondary = $_POST['secondary'];
        $primary = $_POST['primary'];
        $course = $_POST['course'];
        $pending = 'Pending';

        if (empty($job) or empty($id) or empty($surname) or empty($name) or empty($initial) or empty($address)
            or empty($number) or empty($email) or empty($gender) or empty($age) or empty($birth) or empty($height)
            or empty($weight) or empty($tertiary) or empty($secondary) or empty($primary) or empty($course))
        {
            header('Location: ../apply.php?Job='.$job.'&Error=Empty&'.
                "&Surname=$surname&Name=$name&Initial=$initial&Address=$address".
                "&Age=$age&Birth=$birth&Height=$height&Weight=$weight&Tertiary=$tertiary".
                "&Secondary=$secondary&Primary=$primary&Course=$course");
            exit;
        }
        else
        {
            $complete = ucfirst($surname).', '.ucfirst($name).' '.ucfirst($initial).'.';
            $sql = 'insert into application(Job_Applied, Post_ID, Full_Name, Address, Mobile_Number, Email_Address, Gender,'.
                   'Age, Birth_Date, Height, Weight, Tertiary_Education, Secondary_Education, Primary_Education, Course, Status) '.
                   'values (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K, :L, :M, :N, :O, :P)';
            $statement = $connection -> prepare($sql);
            $statement -> bindParam(':A', $job );
            $statement -> bindParam(':B', $id );
            $statement -> bindParam(':C', $complete );
            $statement -> bindParam(':D', $address );
            $statement -> bindParam(':E', $number );
            $statement -> bindParam(':F', $email );
            $statement -> bindParam(':G', $gender );
            $statement -> bindParam(':H', $age );
            $statement -> bindParam(':I', $birth );
            $statement -> bindParam(':J', $height );
            $statement -> bindParam(':K', $weight );
            $statement -> bindParam(':L', $tertiary );
            $statement -> bindParam(':M', $secondary );
            $statement -> bindParam(':N', $primary );
            $statement -> bindParam(':O', $course );
            $statement -> bindParam('P', $pending);
            $statement -> execute();
            header('Location: ../index.php?Apply=Success');
            exit;
        }
    }