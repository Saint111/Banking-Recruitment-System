<?php
/**
 * Created by PhpStorm.
 * User: Charlotte
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
        <header>
            <?php
                require_once 'header.php';
            ?>
        </header>
        <?php
            require_once 'modal.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card my-3">
                        <div class="card-header text-white bg-success">
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
                                        <li class="list-group-item">
                                            <a href="#" class="btn btn-warning form-control text-truncate text-left">
                                                <?php echo $row['1']?>
                                            </a>
                                        </li>
                                    </ul>
                                <?php
                                }
                            endif;
                        ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card my-3">
                        <div class="card-header bg-success">
                            <h1 class="card-title">
                                Search Job Results
                                <a href="index.php" class="btn btn-outline-secondary m-auto" style="border-radius: 30px;">
                                    Show all post.
                                </a>
                            </h1>
                        </div>
                        <div class="card-body">
                            <?php
                                if (isset($_GET['search'])):
                                    $search = $_GET['search'].'%';
                                    $sql = "select * from job_posting where Job_Title like ?".
                                        "order by Time_Posted desc";
                                    $statement = $connection -> prepare($sql);
                                    $statement -> execute(array($search));
                                    $fetch = $statement -> fetchAll(PDO::FETCH_OBJ);
                                    if ($statement -> rowCount() > 0)
                                    {
                                        foreach ($fetch as $row):
                                            ?>
                                                <div class="card border-success mb-3 w-100 d-block">
                                                    <div class="card-header">
                                                        <h2>
                                                            <?php echo $row -> Job_Title?>
                                                            <button id="vacant" class="btn btn-outline-warning" style="border-radius: 30px;">
                                                                Vacancy:
                                                                <span class="badge badge-success badge-pill">
                                                                    <?php echo $row -> Vacancy?>
                                                                </span>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div class="card-body text-success">
                                                        <p class="card-text"><?php echo $row -> Description ?></p>
                                                        <hr>
                                                        <p class="card-text"><?php echo $row -> Qualifications ?></p>
                                                        <hr>
                                                        <p class="card-text"><?php echo $row -> Responsibilities ?></p>
                                                        <?php
                                                        if (isset($_SESSION['username']))
                                                        {
                                                            $location = 'apply.php?Job='.$row -> Job_Title;
                                                            ?>
                                                            <button type="submit" class="btn btn-warning form-control"
                                                                    onclick="location.href=('<?php echo $location ?>')">Apply Now
                                                            </button>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <button class="btn btn-warning form-control" data-toggle="modal"
                                                                    data-target="#apply">Apply Now</button>
                                                            <?php
                                                        }
                                                        ?>
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
                                    }
                                    else
                                    {
                                        ?>
                                            <div class="alert alert-warning">
                                                <h1 class="alert-heading">Sorry no results were found.</h1>
                                            </div>
                                        <?php
                                    }
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
            require_once 'script.php';
        ?>
    </body>
</html>
