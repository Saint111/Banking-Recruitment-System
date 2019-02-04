<?php
/**
 * Created by PhpStorm.
 * User: daniel santillan
 * Date: 12/11/2018
 * Time: 2:27 AM
 */
    require_once 'database.php';

    if (!isset($_POST['register']))
    {
        header('Location: ../index.php');
        exit;
    }
    else
    {
        if (!$_SERVER['REQUEST_METHOD'] == 'POST')
        {
            header('Location: ../index.php?Wrong=Method');
            exit;
        }
        else
        {
            if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']))
            {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $number = $_POST['number'];
                $password = $_POST['password'];
                if (empty($username))
                {
                    header("Location: ../index.php?Username=Empty&Email=$email&Number=$number&Password=$password");
                    exit;
                }
                else
                {
                    if (!preg_match('/^[a-zA-Z0-9]*$/', $username))
                    {
                        header("Location: ../index.php?Username=Invalid&Email=$email&Number=$number&Password=$password");
                        exit;
                    }
                    else
                    {
                        if (strlen($username) > 18)
                        {
                            header("Location: ../index.php?Username=Long&Email=$email&Number=$number&Password=$password");
                            exit;
                        }
                        else
                        {
                            if (empty($email))
                            {
                                header("Location: ../index.php?Username=$username&Email=Empty&Number=$number&Password=$password");
                                exit;
                            }
                            else
                            {
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                                {
                                    header("Location: ../index.php?Username=$username&Email=Invalid&Number=$number&Password=$password");
                                    exit;
                                }
                                else
                                {
                                    if (strlen($email > 50))
                                    {
                                        header("Location: ../index.php?Username=$username&Email=Long&Number=$number&Password=$password");
                                        exit;
                                    }
                                    else
                                    {
                                        if (empty($number))
                                        {
                                            header("Location: ../index.php?Username=$username&Email=$email&Number=Empty&Password=$password");
                                            exit;
                                        }
                                        else
                                        {
                                            if (!preg_match('/^[0-9]*$/', $number))
                                            {
                                                header("Location: ../index.php?Username=$username&Email=$email&Number=Invalid&Password=$password");
                                                exit;
                                            }
                                            else
                                            {
                                                if (strlen($number) > 11)
                                                {
                                                    header("Location: ../index.php?Username=$username&Email=$email&Number=Long&Password=$password");
                                                    exit;
                                                }
                                                else
                                                {
                                                    if (empty($password))
                                                    {
                                                        header("Location: ../index.php?Username=$username&Email=$email&Number=$number&Password=Empty");
                                                        exit;
                                                    }
                                                    else
                                                    {
                                                        if (!preg_match('/^[a-zA-Z0-9]*$/', $password))
                                                        {
                                                            header("Location: ../index.php?Username=$username&Email=$email&Number=$number&Password=Invalid");
                                                            exit;
                                                        }
                                                        else
                                                        {
                                                            if (strlen($password) > 18)
                                                            {
                                                                header("Location: ../index.php?Username=$username&Email=$email&Number=$number&Password=Long");
                                                                exit;
                                                            }
                                                            else
                                                            {
                                                                if (Validate($password))
                                                                {
                                                                    $sql = 'insert into users(Role, Username, Email, Contact_Number, Password) VALUES '.
                                                                    '(?, ?, ?, ?, ?)';
                                                                    $statement = $connection -> prepare($sql);
                                                                    $statement -> bindValue('1', 'User');
                                                                    $statement -> bindParam('2', $username);
                                                                    $statement -> bindParam('3', $email);
                                                                    $statement -> bindParam('4', $number);
                                                                    $statement -> bindParam('5', $password);
                                                                    $statement -> execute();
                                                                    header('Location: ../index.php?Register=Success');
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
        $data = htmlspecialchars($data);
        return $data;
    }