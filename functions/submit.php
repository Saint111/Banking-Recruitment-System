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
        session_start();
        $job = $_POST['job'];
        $id = $_POST['id'];
        $user = $_SESSION['id'];
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $initial = $_POST['initial'];
        $address = trim($_POST['address']);
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
                "&Surname=$surname&Name=$name&Initial=$initial&Address=$address&mobile=$number".
                "&mail=$email&Age=$age&Birth=$birth&Height=$height&Weight=$weight&Tertiary=$tertiary".
                "&Secondary=$secondary&Primary=$primary&Course=$course");
            exit;
        }
        else
        {
            $complete = ucfirst($surname).', '.ucfirst($name).' '.ucfirst($initial).'.';
            $height = $_POST['height'].' Inches';
            $weight = $_POST['weight'].' Pounds';
            $sql = 'insert into application(Job_Applied, Post_ID, User_ID, Full_Name, Address, Mobile_Number, Email_Address, Gender,'.
                   'Age, Birth_Date, Height, Weight, Tertiary_Education, Secondary_Education, Primary_Education, Course, Status) '.
                   'values (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K , :L, :M, :N, :O, :P, :Q)';
            $statement = $connection -> prepare($sql);
            $statement -> bindParam(':A', $job );
            $statement -> bindParam(':B', $id );
            $statement -> bindParam(':C', $user );
            $statement -> bindParam(':D', $complete );
            $statement -> bindParam(':E', $address );
            $statement -> bindParam(':F', $number );
            $statement -> bindParam(':G', $email );
            $statement -> bindParam(':H', $gender );
            $statement -> bindParam(':I', $age );
            $statement -> bindParam(':J', $birth );
            $statement -> bindParam(':K', $height );
            $statement -> bindParam(':L', $weight );
            $statement -> bindParam(':M', $tertiary );
            $statement -> bindParam(':N', $secondary );
            $statement -> bindParam(':O', $primary );
            $statement -> bindParam(':P', $course );
            $statement -> bindParam(':Q', $pending);
            $statement -> execute();
            header('Location: ../index.php?Apply=Success');
            exit;
        }
    }