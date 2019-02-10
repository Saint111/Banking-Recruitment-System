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
                                            if (isset($_GET['Job']) && isset($_GET['ID']))
                                            {
                                                $job = $_GET['Job'];
                                                $id = $_GET['ID'];
                                                ?>
                                                    <input type="hidden" name="job" value="<?php echo $job?>">
                                                    <input type="hidden" name="id" value="<?php echo $id?>">
                                                <?php
                                            }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="surname">Surname:</label>
                                                    <input type="text" name="surname" id="surname" placeholder="Please enter your surname..."
                                                        class="form-control border-success" onkeyup="javascript:Capitalize(this.id, this.value);"
                                                        maxlength="18" value="<?php if (isset($_GET['Surname'])){ echo $_GET['Surname'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="surname">Name:</label>
                                                    <input type="text" name="name" id="name" placeholder="Please enter your name..."
                                                        class="form-control border-success" onkeyup="javascript:Capitalize(this.id, this.value);"
                                                        maxlength="18" value="<?php if (isset($_GET['Name'])){ echo $_GET['Name'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="initial">Middle Initial:</label>
                                                    <input type="text" name="initial" id="initial" placeholder="Please enter your middle initial..."
                                                        class="form-control border-success" onkeyup="Initial(this);" pattern="[A-Za-z]{1}"
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
                                                    <input type="number" name="number" id="number" placeholder="Please enter your number..." min="1000000000" max="99999999999"
                                                        onKeyUp="if(this.value>99999999999){this.value='99999999999';}else if(this.value<0){this.value='0';}"
                                                        maxlength="11" class="form-control border-success" value="<?php if (isset($_GET['mobile'])){ echo $_GET['mobile'];}?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="email">Email Address:</label>
                                                    <input type="email" name="email" id="email" placeholder="Please enter your email..."
                                                        class="form-control border-success" value="<?php if (isset($_GET['mail'])){ echo $_GET['mail'];}?>">
                                                </div>
                                            </div>
                                        </div>
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
                                                    <input type="number" name="age" id="age" maxlength="2" min="18" max="99"
                                                        class="form-control-sm border-success w-100" placeholder="Age must be 18 or above."
                                                        value="<?php if (isset($_GET['Age'])){ echo $_GET['Age'];} ?>"
                                                        onKeyUp="if(this.value>99){this.value='99';}else if(this.value<0){this.value='0';}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="birth">Birth Date:</label>
                                                    <input type="date" name="birth" id="birth" placeholder="Birth Date..."
                                                        class="form-control-sm border-success w-100"
                                                        value="<?php if (isset($_GET['Birth'])){ echo $_GET['Birth'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="height">Height:</label>
                                                    <input type="text" name="height" id="height" placeholder="Height..."
                                                        class="form-control-sm border-success w-100"
                                                        value="<?php if (isset($_GET['Height'])){ echo $_GET['Height'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="weight">Weight:</label>
                                                    <input type="text" name="weight" id="weight" placeholder="Weight..."
                                                        class="form-control-sm border-success w-100"
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
                        <div class="card-footer h-25">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            //This function will capitalize one string character.
            function Capitalize(Input, Value)
            {
                if (Value && Value.length >= 1)
                {
                    var firstChar = Value.charAt(0);
                    var remainingStr = Value.slice(1);
                    Value = firstChar.toUpperCase() + remainingStr;
                }
                document.getElementById(Input).value = Value;
            }
            //This function will type first letter to capital and only 1 character.
            function Initial(input)
            {
                input.value = input.value.replace(/\W|\d/g, '').substr(0, 1).toUpperCase();
            }
        </script>
        <?php
            require_once 'script.php';
        ?>
    </body>
</html>
