<div class="jumbotron jumbotron-fluid mt-5 mb-0">
    <div class="container">
        <h3 class="display-3">HR1: Recruitment System</h3>
        <p class="lead">Success is not final; failure is not fatal: It is the courage to continue that counts.</p>
    </div>
</div>
<nav class="navbar navbar-expand-xl navbar-dark bg-success fixed-top" role="navigation">
    <a href="index.php" class="navbar-brand mr-md-auto">
        <img src="images/Bank.png" alt="Bank Icon">Banking Recruitment
    </a>
    <button class="navbar-toggler ml-md-auto" data-toggle="collapse" data-target="#menus">
        <span class="navbar-toggler-icon"></span>
    </button>
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
        <form action="search.php" method="get" class="form-inline">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="search" placeholder="Search jobs by name or skills..."
                           class="form-control rounded-0">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-outline-secondary rounded-0">
                            <i class="fas fa-search"></i>
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
                    ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#login" role="button">
                                <i class="fas fa-user-circle"></i> Welcome, <strong class="d-inline"><?php echo $username ?></strong>
                            </a>
                        </li>
                    <?php

                    if (isset($_SESSION['role']))
                    {
                        $role = $_SESSION['role'];
                        if ($role == 'Administrator')
                        {
                            ?>
                                <li class="nav-item">
                                    <a href="./dashboard/dashboard.php" class="btn btn-outline-secondary rounded-0">
                                        <i class="fas fa-plus-circle"></i> Dashboard
                                    </a>
                                </li>
                            <?php
                        }
                        else
                        {
                            ?>
                                <li class="nav-item">
                                    <a href="notify.php" class="btn btn-outline-secondary rounded-0">
                                        <i class="fas fa-plus-circle"></i> Notification
                                    </a>
                                </li>
                            <?php
                        }
                    }
                    ?>
                        <li class="nav-item">
                            <form action="functions/logout.php" method="post" class="form-inline">
                                <button type="submit" name="logout" class="btn btn-outline-secondary rounded-0" role="button">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    <?php
                }
                else
                {
                    ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link btn btn-outline-secondary w-100" data-toggle="modal"
                                data-target="#login" role="button" style="border: 0;">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link btn btn-outline-secondary w-100" data-toggle="modal"
                                data-target="#register" role="button" style="border: 0;">
                                <i class="fas fa-edit"></i> Sign up
                            </a>
                        </li>
                    <?php
                }
            ?>
        </ul>
    </div>
</nav>