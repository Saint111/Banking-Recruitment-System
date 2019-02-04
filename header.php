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
        <form action="search.php" class="form-inline" method="get">
            <div class="form-group">
                <div class="input-group">
                    <input type="search" name="search" placeholder="Search jobs by name or skills..."
                           class="form-control rounded-0">
                    <div class="input-group-prepend">
                        <button type="submit" name="search" class="btn btn-outline-light rounded-0">
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