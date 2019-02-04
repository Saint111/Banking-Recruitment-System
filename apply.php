<?php
/**
 * Created by Charlotte.
 * Project: Banking Recruitment System
 * Date: 1/23/2019
 * Time: 1:58 PM
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
                                        <li class="list-group-item"><a href="#" class="btn btn-warning"><?php echo $row['1']?></a></li>
                                    </ul>
                                    <?php
                                }
                            endif;
                        ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card h-100 my-3">
                        <div class="card-header bg-success text-white">
                            <h1 class="card-title">Information Form:</h1>
                        </div>
                        <div class="card-body">
                            <div class="card border-success">
                                <div class="card-header">
                                    <?php
                                        if (isset($_GET['Error']) == 'Empty')
                                        {
                                            ?>
                                                <h3>
                                                    Forgot to complete all information
                                                    <span class="badge badge-danger">Empty Fields</span>.
                                                </h3>
                                            <?php
                                        }
                                        else
                                        {
                                            ?><h3>Please fill up the necessary information.</h3><?php
                                        }
                                    ?>
                                </div>
                                <form action="functions/submit.php" method="post" id="application">
                                    <div class="card-body">
                                        <?php
                                            if (isset($_GET['Job']))
                                            {
                                                $job = $_GET['Job'];
                                                ?><input type="hidden" name="job" value="<?php echo $job?>"><?php
                                            }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="surname">Surname:</label>
                                                    <input type="text" name="surname" id="surname" placeholder="Please enter your surname..."
                                                        class="form-control border-success"
                                                        value="<?php if (isset($_GET['Surname'])){ echo $_GET['Surname'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="surname">Name:</label>
                                                    <input type="text" name="name" id="name" placeholder="Please enter your name..."
                                                        class="form-control border-success"
                                                        value="<?php if (isset($_GET['Name'])){ echo $_GET['Name'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="initial">Middle Initial:</label>
                                                    <input type="text" name="initial" id="initial" placeholder="Please enter your middle initial..."
                                                        class="form-control border-success"
                                                           value="<?php if (isset($_GET['Initial'])){ echo $_GET['Initial'];} ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="address">Address:</label>
                                                    <textarea name="address" id="address" cols="30" rows="5"
                                                        class="form-control border-success"><?php if (isset($_GET['Address'])){ echo $_GET['Address'];} ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="number">Mobile Number:</label>
                                                    <input type="text" name="number" id="number" placeholder="Please enter your number..."
                                                        maxlength="9" class="form-control border-success">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="email">Email Address:</label>
                                                    <input type="text" name="email" id="email" placeholder="Please enter your email..."
                                                           class="form-control border-success">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            /**
                                             *@desc Unfinished radio button.
                                             */
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-header border-success">
                                                    <h5>Personal Information:</h5>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="radio" name="gender" id="male" value="Male" class="form-check-input">
                                                    <label for="male" class="form-check-label">Male:</label>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="radio" name="gender" id="female" value="Female" class="form-check-input">
                                                    <label for="female" class="form-check-label">Female:</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="age">Your Age:</label>
                                                    <input type="text" name="age" id="age" placeholder="Age..."
                                                        class="form-control-sm border-success"
                                                        value="<?php if (isset($_GET['Age'])){ echo $_GET['Age'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="birth">Birth Date:</label>
                                                    <input type="text" name="birth" id="birth" placeholder="Birth Date..."
                                                        class="form-control-sm border-success"
                                                        value="<?php if (isset($_GET['Birth'])){ echo $_GET['Birth'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="height">Height:</label>
                                                    <input type="text" name="height" id="height" placeholder="Height..."
                                                        class="form-control-sm border-success"
                                                        value="<?php if (isset($_GET['Height'])){ echo $_GET['Height'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="weight">Weight:</label>
                                                    <input type="text" name="weight" id="weight" placeholder="Weight..."
                                                        class="form-control-sm border-success"
                                                        value="<?php if (isset($_GET['Weight'])){ echo $_GET['Weight'];} ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-header border-success mb-3">
                                                    <h5>Educational Background:</h5>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="tertiary">Tertiary Education:</label>
                                                            <input type="text" name="tertiary" id="tertiary" placeholder="Please enter your tertiary education..."
                                                                class="form-control border-success"
                                                                value="<?php if (isset($_GET['Tertiary'])){ echo $_GET['Tertiary'];} ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="secondary">Secondary Education:</label>
                                                            <input type="text" name="secondary" id="secondary" placeholder="Please enter your secondary education..."
                                                                class="form-control border-success"
                                                                value="<?php if (isset($_GET['Secondary'])){ echo $_GET['Secondary'];} ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="primary">Primary Education:</label>
                                                            <input type="text" name="primary" id="primary" placeholder="Please enter your primary education..."
                                                                class="form-control border-success"
                                                                value="<?php if (isset($_GET['Primary'])){ echo $_GET['Primary'];} ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-header border-success mb-3">
                                                    <h5 class="d-inline">Course Finished:</h5>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="course" id="course" placeholder="Please enter your course..."
                                                        class="form-control border-success" value="<?php if (isset($_GET['Course'])){ echo $_GET['Course'];}?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-warning form-control mx-auto"
                                            data-toggle="modal" data-target="#terms">Submit Application
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning">Some button.</button>
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
