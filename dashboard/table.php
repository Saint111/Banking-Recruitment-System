<?php
    session_start();
    if (isset($_SESSION['role']) != 'Administrator')
    {
        header('Location: ../index.php');
        exit;
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/dashboard.css">
        <link rel="stylesheet" href="../css/superhero.bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
              integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <title>Recruitment Dashboard</title>
    </head>
    <body>
        <?php
            require_once 'post.php';
        ?>
        <div class="wrapper">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>RECRUITMENT SYSTEM</h3>
                </div>
                <ul class="list-unstyled components">
                    <p>Available Notifications</p>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Notify</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="#">Notification Post</a>
                            </li>
                            <li>
                                <a href="#">Notification Post</a>
                            </li>
                            <li>
                                <a href="#">Notification Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#post" class="text-dark">
                            Add Job Posting
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php" class="text-dark">
                            View Job Posting
                        </a>
                    </li>
                    <li>
                        <a href="table.php" class="text-dark">
                            Job Applicant Table
                        </a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
                            Settings
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="#">New Notify</a>
                            </li>
                            <li>
                                <a href="#">New Notify</a>
                            </li>
                            <li>
                                <a href="#">New Notify</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Contact Us</a>
                    </li>
                </ul>
                <ul class="list-unstyled CTAs">
                    <li>
                        <a href="#" class="download">Download Information</a>
                    </li>
                    <li>
                        <a href="#" class="article">Article</a>
                    </li>
                </ul>
            </nav>
            <div class="content" style="overflow: auto;">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button type="button" id="sidebarCollapse" class="btn btn-secondary">
                        <i class="fa fa-align-justify"></i> <span>Toggle Sidebar</span>
                    </button>
                    <!--<a class="navbar-brand" href="#">Navbar</a> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                                <form action="../functions/logout.php" method="post" class="form-inline">
                                    <button class="btn btn-outline-dark" name="logout">Logout</button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Welcome <?php if (isset($_SESSION['username'])) echo $_SESSION['username'];?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card my-3">
                                <div class="card-header text-light bg-success">
                                    <div class="card-title text-white"><h1>Job Applicant Table</h1></div>
                                </div>
                                <table class="table table-hover table-responsive">
                                    <thead class="table-active">
                                    <tr class="text-center">
                                        <th>Information</th>
                                        <th>Status</th>
                                        <th>Job Applied</th>
                                        <th>Name of Applicant</th>
                                        <th>Gender</th>
                                        <th>Mobile Number</th>
                                        <th>Email Address</th>
                                        <th>Date Applied</th>
                                        <th>Course</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        require_once '../functions/database.php';
                                        $sql = 'select Application_ID, Job_Applied, Full_Name, Gender, Mobile_Number, Email_Address, Date_Applied, Course, Status from application order by Date_Applied desc';
                                        $statement = $connection -> query($sql);
                                        if ($statement -> rowCount() > 0):
                                            $fetch = $statement -> fetchAll(PDO::FETCH_OBJ);
                                            foreach ($fetch as $row):
                                    ?>
                                        <tr class="text-center">
                                            <td>
                                                <form action="view.php" method="post">
                                                    <input type="hidden" name="information" value="<?php echo htmlentities($row -> Application_ID) ?>">
                                                    <button type="submit" name="view" class="btn btn-outline-warning " data-dismiss="modal">
                                                        <i class="fas fa-eye"></i> View Information
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <?php
                                                    switch (htmlentities($row -> Status)):
                                                        case 'Pending':
                                                            ?>
                                                                <button type="submit" name="accept" class="btn btn-light w-100" disabled>
                                                                    <i class="fas fa-exclamation-circle"></i> Pending
                                                                </button>
                                                            <?php
                                                            break;
                                                        case 'Accepted':
                                                            ?>
                                                                <button type="submit" name="accept" class="btn btn-success w-100" disabled>
                                                                    <i class="far fa-thumbs-up"></i> Accepted
                                                                </button>
                                                            <?php
                                                            break;
                                                        case 'Denied':
                                                            ?>
                                                                <button type="submit" name="accept" class="btn btn-danger w-100" disabled>
                                                                    <i class="far fa-thumbs-down"></i> Denied
                                                                </button>
                                                            <?php
                                                            break;
                                                        default:
                                                            ?>
                                                                <button type="submit" name="accept" class="btn btn-dark w-100" disabled>
                                                                    No status
                                                                </button>
                                                            <?php
                                                            break;
                                                    endswitch;
                                                ?>
                                            </td>
                                            <td>
                                                <input type="text" name="job" class="btn btn-outline-success p-1 m-0 text-white"
                                                    value="<?php echo htmlentities($row -> Job_Applied) ?>" readonly>
                                            </td>
                                            <td>
                                                <input type="text" name="name" class="btn btn-outline-success p-1 text-white"
                                                    value="<?php echo htmlentities($row -> Full_Name) ?>" readonly>
                                            </td>
                                            <td>
                                                <input type="text" name="gender" class="btn btn-outline-success p-1 text-white"
                                                    value="<?php echo htmlentities($row -> Gender) ?>" readonly>
                                            </td>
                                            <td>
                                                <input type="text" name="number" class="btn btn-outline-success p-1 text-white"
                                                    value="<?php echo htmlentities($row -> Mobile_Number) ?>" readonly>
                                            </td>
                                            <td>
                                                <input type="text" name="email" class="btn btn-outline-success p-1 text-white"
                                                    value="<?php echo htmlentities($row -> Email_Address) ?>" readonly>
                                            </td>
                                            <td>
                                                <input type="text" name="date" class="btn btn-outline-success p-1 text-white"
                                                    value="<?php echo htmlentities($row -> Date_Applied) ?>" readonly>
                                            </td>
                                            <td>
                                                <input type="text" name="course" class=" btn btn-outline-success p-1 text-white text-wrap"
                                                    value="<?php echo htmlentities($row -> Course) ?>" readonly>
                                            </td>
                                        </tr>
                                    <?php
                                            endforeach;
                                        endif;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line"></div>
            </div>
        </div>
        <?php
        /**
         * @desc This modal is for posting success.
         */
        ?>
        <div class="row">
            <div id="added" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header alert alert-info my-0">
                            <h1>Posting Success</h1>
                            <button class="close" data-dismiss="modal" data-target="access">&times;</button>
                        </div>
                        <div class="modal-body alert alert-success my-0">
                            <h5 class="message">New job post has been added by <?php echo $_SESSION['username']?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        /**
         * @desc This modal is for edit success.
         */
        ?>
        <?php
            $sql = 'select * from job_posting order by Time_Posted desc';
            $statement = $connection -> query($sql);
            if ($statement -> rowCount())
            {
                while ($row = $statement -> fetch(PDO::FETCH_NUM))
                {
                    ?>
                    <div class="row">
                        <div id="edit" class="modal fade">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <h5>Current Title. <span class="badge badge-warning lead"><?php echo $row['1']?></span></h5>
                                        <button class="close" data-dismiss="modal" data-target="edit">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="form-group">
                                                <label for="title">Title:</label>
                                                <input type="text" name="title" id="title" class="form-control"
                                                       placeholder="Enter new title here."/>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $row['0']?>">
                                        </form>
                                    </div>
                                    <div class="modal-footer bg-success">
                                        <button class="btn btn-warning m-auto">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
        <?php
        /**
         * @desc This modal is for login success.
         */
        ?>
        <div class="row">
            <div id="welcome" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header alert alert-info my-0">
                            <h1>Login Success</h1>
                            <button class="close" data-dismiss="modal" data-target="access">&times;</button>
                        </div>
                        <div class="modal-body alert alert-success my-0">
                            <h5 class="message">Welcome <?php echo $_SESSION['username']?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        /**
         * @desc This is for the accept success.
         */
        ?>
        <div id="accept" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h1 class="modal-title">Application Accepted</h1>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php
                            if (isset($_GET['Name'])):
                                $name = $_GET['Name'];
                                ?>
                                    <h3>
                                        The application of <?php echo $name?> has been successfully submitted.
                                    </h3>
                                <?php
                            endif;
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="m-auto btn btn-warning">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        /**
         * @desc This is for the denied success.
         */
        ?>
        <div id="denied" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title">Application Denied</h1>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php
                        if (isset($_GET['Name'])):
                            $name = $_GET['Name'];
                            ?>
                            <h3>
                                The application of <?php echo $name?> has been denied.
                            </h3>
                        <?php
                        endif;
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="m-auto btn btn-warning">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        /**
         * @desc This modal is for view information.
         */
        ?>
        <div id="view" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <?php
                        if (isset($_GET['Data'])):
                            $data = $_GET['Data'];
                            $sql = 'select * from application where Application_ID = :id';
                            $statement = $connection -> prepare($sql);
                            $statement -> execute(array(':id' => $data));
                            $fetch = $statement -> fetchAll(PDO::FETCH_NUM);
                                foreach ($fetch as $row):
                    ?>
                        <div class="modal-header bg-success">
                            <h1 class="modal-title">Applicant Information</h1>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" style="height: 390px; overflow-y: auto;">
                            <div class="container">
                                <div class="row m-auto">
                                    <div class="col-sm-12">
                                        <label for="name" class="m-auto">Applicant Name:</label>
                                        <input id="name" type="text" class="btn btn-outline-success form-control"
                                            value="<?php echo htmlentities($row['4']) ?>" readonly>
                                        <label for="gender" class="m-auto">Gender:</label>
                                        <input id="gender" type="text" class="btn btn-outline-success form-control"
                                            value="<?php echo htmlentities($row['8']) ?>" readonly>
                                        <label for="age" class="m-auto">Age:</label>
                                        <input id="age" type="text" class="btn btn-outline-success form-control"
                                            value="<?php echo htmlentities($row['9']) ?>" readonly>
                                        <label for="birth" class="m-auto">Birth Date:</label>
                                        <input id="birth" type="text" class="btn btn-outline-success form-control"
                                            value="<?php echo htmlentities($row['10']) ?>" readonly>
                                        <label for="email" class="m-auto">Email Address:</label>
                                        <input id="email" type="text" class="btn btn-outline-success form-control"
                                            value="<?php echo htmlentities($row['7']) ?>" readonly>
                                    </div>
                                </div>
                                <div class="row m-auto">
                                    <div class="col-sm-12">
                                        <label for="name" class="m-auto">Address:</label>
                                        <input id="name" type="text" class="form-control btn btn-outline-success"
                                            value="<?php echo htmlentities($row['5']) ?>" readonly>
                                    </div>
                                </div>
                                <div class="row m-auto">
                                    <div class="col-sm-12">
                                        <label for="tertiary" class="m-auto">Tertiary Education:</label>
                                        <input id="tertiary" type="text" class="form-control btn btn-outline-success"
                                            value="<?php echo htmlentities($row['13']) ?>" readonly>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="course" class="m-auto">Course:</label>
                                        <input id="course" type="text" class="form-control btn btn-outline-success"
                                            value="<?php echo htmlentities($row['17']) ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger form-control" data-dismiss="modal"
                                onclick="location.href=('deny.php?<?php echo 'ID='.htmlentities($row[0]);?>')">
                                Deny Application
                            </button>
                            <button name="submit" class="btn btn-success form-control" data-dismiss="modal"
                                onclick="location.href=('accept.php?<?php echo 'ID='.htmlentities($row[0]).'&Post='.htmlentities($row[1]);?>')">
                                Accept Application
                            </button>
                        </div>
                    <?php
                            endforeach;
                        endif;
                    ?>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function()
            {
                $('#sidebarCollapse').on('click',function()
                {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
        <?php
            if (isset($_GET['Posting']) == 'Success')
            {
                echo "<script>$('#added').modal('show')</script>";
            }
            if (isset($_GET['Access']) == 'Success')
            {
                echo "<script>$('#welcome').modal('show')</script>";
            }
            if (isset($_GET['Accept']) == 'Success')
            {
                echo "<script>$('#accept').modal('show')</script>";
            }
            if (isset($_GET['Denied']) == 'Success')
            {
                echo "<script>$('#denied').modal('show')</script>";
            }
            if (isset($_GET['View']) == 'Information')
            {
                echo "<script>$('#view').modal('show')</script>";
            }
        ?>
    </body>
</html>