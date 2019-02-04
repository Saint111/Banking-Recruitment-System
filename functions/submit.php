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

        if (empty($job) or empty($surname) or empty($name) or empty($initial) or empty($address)
            or empty($number) or empty($email) or empty($gender) or empty($age) or empty($birth)
            or empty($height) or empty($weight) or empty($tertiary) or empty($secondary) or empty($primary))
        {
            header('Location: ../apply.php?Job='.$job.'&Error=Empty&'.
                "&Surname=$surname&Name=$name&Initial=$initial&Address=$address".
                "&Age=$age&Birth=$birth&Height=$height&Weight=$weight".
                "&Tertiary=$tertiary&Secondary=$secondary&Primary=$primary");
            exit;
        }
        else
        {
            $complete = "$surname, $name $initial.";
            $sql = 'insert into application(Job_Applied, Full_Name, Address, Mobile_Number, Email_Address, '.
                   'Gender, Age, Birth_Date, Height, Weight, Tertiary_Education, Secondary_Education, Primary_Education) '.
                   'values (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K, :L, :M)';
            $statement = $connection -> prepare($sql);
            $statement -> bindParam(':A', $job );
            $statement -> bindParam(':B', $complete );
            $statement -> bindParam(':C', $address );
            $statement -> bindParam(':D', $number );
            $statement -> bindParam(':E', $email );
            $statement -> bindParam(':F', $gender );
            $statement -> bindParam(':G', $age );
            $statement -> bindParam(':H', $birth );
            $statement -> bindParam(':I', $height );
            $statement -> bindParam(':J', $weight );
            $statement -> bindParam(':K', $tertiary );
            $statement -> bindParam(':L', $secondary );
            $statement -> bindParam(':M', $primary );
            $statement -> execute();
            header('Location: ../index.php?Apply=Success');
            exit;
        }
    }