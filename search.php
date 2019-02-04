<?php
/**
 * Created by PhpStorm.
 * User: daniel santillan
 * Date: 12/10/2018
 * Time: 4:22 AM
 */
    session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <?php
        require_once 'functions/database.php';
        require_once 'head.php';
    ?>
    <body>
        <div class="jumbotron jumbotron-fluid mb-0">
            <div class="container">
                <h3 class="display-3">HR1: Recruitment System</h3>
                <hr/>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quod!</p>
            </div>
        </div>
        <nav class="navbar navbar-expand-xl navbar-dark bg-success" role="navigation">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menus">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="index.php" class="navbar-brand">
                <img src="images/Bank.png" alt="Bank Icon">Banking Recruitment
            </a>
            <div class="collapse navbar-collapse" id="menus">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">
                            Home <span class="sr-only">Current</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="news">News</a>
                        <div class="dropdown-menu" aria-labelledby="news">
                            <h1 class="dropdown-header">Header</h1>
                            <a href="#" class="dropdown-item">Something link...</a>
                            <div class="dropdown-divider"></div>
                            <h1 class="dropdown-header">Header</h1>
                            <a href="#" class="dropdown-item">Something link...</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="contact">Contact us</a>
                        <div class="dropdown-menu" aria-labelledby="contact">
                            <h1 class="dropdown-header">Header</h1>
                            <a href="#" class="dropdown-item">Something link...</a>
                            <div class="dropdown-divider"></div>
                            <h1 class="dropdown-header">Header</h1>
                            <a href="#" class="dropdown-item">Something link...</a>
                        </div>
                    </li>
                </ul>
                <form action="search.php" class="form-inline">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="search" name="search" placeholder="Search jobs by name or skills..."
                                   class="form-control rounded-0">
                            <div class="input-group-prepend">
                                <button type="submit" name="search" class="btn btn-outline-light rounded-0">
                                    <i class="fas fa-search"></i>Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (isset($_SESSION['username']) && isset($_SESSION['email']))
                    {
                        $username = $_SESSION['username'];
                        $email = $_SESSION['email'];

                        echo '<li class="nav-item">
                                        <a href="#" class="nav-link" data-toggle="modal" data-target="#login" role="button">
                                        <i class="fas fa-user-circle"></i> Welcome, <strong class="d-inline">'.$username.'</strong>
                                        </a>
                                      </li>';

                        if (isset($_SESSION['role']))
                        {
                            $role = $_SESSION['role'];
                            echo '<li class="nav-item">
                                            <a href="./dashboard/dashboard.php" class="btn btn-outline-light rounded-0">
                                                <i class="fas fa-plus-circle"></i> Dashboard
                                            </a>
                                          </li>';
                        }
                        else
                        {
                            echo '<li class="nav-item">
                                            <a href="#" class="btn btn-outline-light rounded-0">
                                                <i class="fas fa-plus-circle"></i> User Profile
                                            </a>
                                          </li>';
                        }

                        echo '<li class="nav-item">
                                        <form action="functions/logout.php" method="post" class="form-inline">
                                            <button type="submit" name="logout" class="btn btn-outline-light rounded-0" role="button">
                                                <i class="fas fa-sign-out-alt"></i> Logout
                                            </button>
                                        </form>
                                      </li>';
                    }
                    else
                    {
                        echo '<li class="nav-item">
                                        <a href="#" class="nav-link" data-toggle="modal" data-target="#login" role="button">
                                            <i class="fas fa-sign-in-alt"></i> Login
                                        </a>
                                      </li>';
                        echo '<li class="nav-item">
                                        <a href="#" class="nav-link" data-toggle="modal" data-target="#register" role="button">
                                            <i class="fas fa-edit"></i> Sign up
                                        </a>
                                      </li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <?php
            require_once 'modal.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card my-3">
                        <div class="card-header text-light bg-success">
                            <h1 class="card-title">Jobs Lists</h1>
                        </div>
                        <?php
                        $sql = 'select * from job_posting order by Time_Posted desc';
                        $statement = $connection -> query($sql);
                        if ($statement -> rowCount() > 0):
                            while ($row = $statement -> fetch(PDO::FETCH_NUM))
                            {
                                ?>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="#" class="btn btn-warning"><?php echo $row['1']?></a></li>
                                </ul>
                                <?php
                            }
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card my-3">
                        <div class="card-header text-light bg-success">
                            <card class="title"><h1>Job Postings</h1></card>
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item active"><a href="#" class="nav-link">Menus</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Menus</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Menus</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php
                                            if (isset($_GET['search'])):
                                                $search = $_GET['search'];
                                                $sql = "select * from job_posting where Job_Title like '%?'".
                                                       "order by Time_Posted desc";
                                                $statement = $connection -> prepare($sql);
                                                $statement -> bindParam('1', $search);
                                                $statement -> execute();
                                                $fetch = $statement -> fetchAll(PDO::FETCH_OBJ);
                                                foreach ($fetch as $row):
                                        ?>
                                            <div class="card border-success mb-3 w-100 d-block">
                                                <div class="card-header">
                                                    <h2><?php echo $row -> Job_Title?></h2>
                                                </div>
                                                <div class="card-body text-success">
                                                    <p class="card-text"><?php echo $row -> Description ?></p>
                                                    <hr>
                                                    <p class="card-text"><?php echo $row -> Qualifications ?></p>
                                                    <hr>
                                                    <p class="card-text"><?php echo $row -> Responsibilities ?></p>
                                                    <button class="btn btn-warning form-control">Apply Now</button>
                                                </div>
                                                <div class="card-footer">
                                                    <blockquote>
                                                        <small>Author: <?php echo $row -> Author?></small>
                                                        <footer><small>Date Posted: <?php echo $row -> Time_Posted?></small></footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        <?php
                                                endforeach;
                                            endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
            if (isset($_GET['Username']) or isset($_GET['Email']) or isset($_GET['Number']) or isset($_GET['Password']))
            {
                echo "<script>$('#check').modal('show')</script>";
            }
            if (isset($_GET['Register']) == 'Success')
            {
                echo "<script>$('#success').modal('show')</script>";
            }
            if (isset($_GET['Login']) == 'Username')
            {
                echo "<script>$('#login').modal('show')</script>";
            }
            if (isset($_GET['Login']) == 'Password')
            {
                echo "<script>$('#login').modal('show')</script>";
            }
            if (isset($_GET['Access']) == 'Success')
            {
                echo "<script>$('#welcome').modal('show')</script>";
            }
            if (isset($_GET['Logout']) == 'Success')
            {
                echo "<script>$('#logout').modal('show')</script>";
            }
        ?>
    </body>
</html>
