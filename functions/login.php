<?php
/**
 * Created by PhpStorm.
 * User: daniel santillan
 * Date: 12/11/2018
 * Time: 3:16 PM
 */
    session_start();
    require_once 'database.php';

    if (!isset($_POST['login']))
    {
        header('Location: ../index.php');
        exit;
    }
    else
    {
        if (!$_SERVER['REQUEST_METHOD'] == 'POST')
        {
            header('Location: ../index.php?Invalid=Method');
            exit;
        }
        else
        {
            if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']))
            {
                $username = Validate($_POST['log1']);
                $password = Validate($_POST['log2']);
                if (empty($username))
                {
                    header('Location: ../index.php?Login=Username');
                    exit;
                }
                else
                {
                    if (empty($password))
                    {
                        header("Location: ../index.php?Login=Password");
                        exit;
                    }
                    else
                    {
                        $sql = 'select * from users where Username = ? or Email = ?';
                        $statement = $connection -> prepare($sql);
                        $statement -> bindParam('1', $username);
                        $statement -> bindParam('2', $username);
                        $statement -> execute();
                        if ($statement -> rowCount() < 1)
                        {
                            session_abort();
                            header('Location: ../index.php?No=User');
                            exit;
                        }
                        else
                        {
                            if ($row = $statement -> fetch(PDO::FETCH_NUM))
                            {
                                $verify = $row['5'];
                                $role = $row['1'];
                                if ($verify == $password)
                                {
                                    $_SESSION['id'] = $row['0'];
                                    $_SESSION['role'] = $row['1'];
                                    $_SESSION['username'] = $row['2'];
                                    $_SESSION['email'] = $row['3'];
                                    if ($role == 'Administrator')
                                    {
                                        $_SESSION['role'] = $role;
                                        header('Location: ../dashboard/dashboard.php?Access=Success');
                                        exit;
                                    }
                                    else
                                    {
                                        header('Location: ../index.php?Access=Success');
                                        exit;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    function Validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }