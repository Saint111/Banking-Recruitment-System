<div class="container">
    <?php
        /**
     * @desc This popup the login modal for accessing this website.
     */
    ?>
    <div class="row">
        <div id="login" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header alert alert-info my-0">
                        <h1 class="modal-title">Login Form:</h1>
                        <button class="close" data-dismiss="modal" data-target="#login">&times;</button>
                    </div>
                    <div class="modal-body alert alert-success my-0">
                        <form action="functions/login.php" method="post" id="access">
                            <div class="form-group">
                                <?php
                                if (isset($_GET['Login']) == 'Username')
                                {
                                    echo '<label for="username">Username:</label>
                                                  <input type="text" name="log1" placeholder="Please enter username or email address..."
                                                    class="form-control border-danger" id="username">
                                                    <span class="text-danger">Forget to enter username.</span>';
                                }
                                else
                                {
                                    echo '<label for="username">Username:</label>
                                                  <input type="text" name="log1" placeholder="Please enter username or email address..."
                                                    class="form-control border-success" id="username">';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                if (isset($_GET['Login']) == 'Password')
                                {
                                    echo '<label for="password">Password:</label>
                                                      <input type="password" name="log2" placeholder="Please enter password..."
                                                        class="form-control border-danger" id="password">
                                                        <span class="text-danger">Forget to enter password.</span>';
                                }
                                else
                                {
                                    echo '<label for="password">Password:</label>
                                                      <input type="password" name="log2" placeholder="Please enter password..."
                                                        class="form-control border-success" id="password">';
                                }
                                ?>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                <label for="remember" class="form-check-label">Remember me.</label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer alert alert-info my-0">
                        <p class="my-auto">No account?</p>
                        <button class="btn btn-info" role="button" data-dismiss="modal" data-toggle="modal"
                                data-target="#register">
                            <i class="fas fa-edit"></i> Sign up here
                        </button>
                        <button type="submit" class="btn btn-success ml-auto btn-arrow-right" name="login" form="access">
                            <i class="fas fa-edit"></i> <span>Login </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        /**
     * @desc This popup the register modal for creating new account.
     */
    ?>
    <div class="row">
        <div id="register" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success my-0">
                        <h1 class="modal-title">Registration Form:</h1>
                        <button class="close" data-dismiss="modal" data-target="#register">&times;</button>
                    </div>
                    <div class="modal-body my-0">
                        <form action="functions/register.php" method="post" id="submit">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <?php
                                if (isset($_GET['Username']))
                                {
                                    $username = $_GET['Username'];
                                    switch ($username)
                                    {
                                        case 'Empty':
                                            echo '<input type="text" name="username" placeholder="Please enter username..."
                                                                class="form-control text-success border-danger"';
                                            break;
                                        case 'Invalid':
                                            echo '<input type="text" name="username" placeholder="Please enter username..."
                                                                class="form-control text-success border-danger"';
                                            break;
                                        case 'Long':
                                            echo '<input type="text" name="username" placeholder="Please enter username..."
                                                                class="form-control text-success border-danger"';
                                            break;
                                        default:
                                            echo '<input type="text" name="username" placeholder="Please enter username..."
                                                                class="form-control text-success border-success" value="'.$username.'">';
                                            break;
                                    }
                                }
                                else
                                {
                                    echo '<input type="text" name="username" placeholder="Please enter username..."
                                                        class="form-control text-success border-success">';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <?php
                                if (isset($_GET['Email']))
                                {
                                    $email = $_GET['Email'];
                                    switch ($email)
                                    {
                                        case 'Empty':
                                            echo '<input type="text" name="email" placeholder="Please enter email address..."
                                                                class="form-control text-success border-danger"';
                                            break;
                                        case 'Invalid':
                                            echo '<input type="text" name="email" placeholder="Please enter email address..."
                                                                class="form-control text-success border-danger"';
                                            break;
                                        case 'Long':
                                            echo '<input type="text" name="email" placeholder="Please enter email address..."
                                                                class="form-control text-success border-danger"';
                                            break;
                                        default:
                                            echo '<input type="text" name="email" placeholder="Please enter email address..."
                                                                class="form-control text-success border-success" value="'.$email.'">';
                                            break;
                                    }
                                }
                                else
                                {
                                    echo '<input type="text" name="email" placeholder="Please enter email address..."
                                                        class="form-control text-success border-success">';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="number">Contact Number:</label>
                                <?php
                                if (isset($_GET['Number']))
                                {
                                    $number = $_GET['Number'];
                                    switch ($number)
                                    {
                                        case 'Empty':
                                            echo '<input type="number" name="number" placeholder="Please enter contact number..."
                                                                    maxlength="11" class="form-control text-success border-danger"';
                                            break;
                                        case 'Invalid':
                                            echo '<input type="number" name="number" placeholder="Please enter contact number..."
                                                                    maxlength="11" class="form-control text-success border-danger"';
                                            break;
                                        case 'Long':
                                            echo '<input type="number" name="number" placeholder="Please enter contact number..."
                                                                    maxlength="11" class="form-control text-success border-danger"';
                                            break;
                                        default:
                                            echo '<input type="number" name="number" placeholder="Please enter contact number..."
                                                                    maxlength="11" class="form-control text-success border-success" value="'.$number.'">';
                                            break;
                                    }
                                }
                                else
                                {
                                    echo '<input type="text" name="number" placeholder="Please enter contact number..."
                                                            maxlength="11" class="form-control text-success border-success">';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <?php
                                if (isset($_GET['Password']))
                                {
                                    $password = $_GET['Password'];
                                    switch ($password)
                                    {
                                        case 'Empty':
                                            echo '<input type="password" name="password" placeholder="Please enter password..."
                                                                        class="form-control text-success border-danger"';
                                            break;
                                        case 'Invalid':
                                            echo '<input type="password" name="password" placeholder="Please enter password..."
                                                                        class="form-control text-success border-danger"';
                                            break;
                                        case 'Long':
                                            echo '<input type="password" name="password" placeholder="Please enter password..."
                                                                        class="form-control text-success border-danger"';
                                            break;
                                        default:
                                            echo '<input type="password" name="password" placeholder="Please enter password..."
                                                                        class="form-control text-success border-success" value="'.$password.'">';
                                            break;
                                    }
                                }
                                else
                                {
                                    echo '<input type="password" name="password" placeholder="Please enter password..."
                                                                class="form-control text-success border-success">';
                                }
                                ?>
                            </div>
                        </form>
                        <button type="submit" name="register" form="submit" class="btn btn-success btn-arrow-right">
                            <i class="fas fa-edit"></i> <span>Register </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        /**
     * @desc This popup the check modal for checking input fields.
     */
    ?>
    <div class="row">
        <div id="check" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header alert alert-danger my-0">
                        <h1 class="modal-title">Please Check</h1>
                        <button class="close" data-dismiss="modal" data-target="#check">&times;</button>
                    </div>
                    <div class="modal-body alert alert-warning my-0">
                        <h3>Please fill up all fields to register successfully.</h3>
                        <ul class="list-group">
                            <?php
                            if (isset($_GET['Username']))
                            {
                                $username = $_GET['Username'];
                                if ($username == 'Empty')
                                {
                                    echo '<li class="list-group-item">Username 
                                                    <span class="badge badge-danger badge-pill">Empty!</span>
                                                  </li>';
                                }
                                elseif ($username == 'Invalid')
                                {
                                    echo '<li class="list-group-item">Username 
                                                    <span class="badge badge-danger badge-pill">Invalid Character!</span>
                                                  </li>';
                                }
                                elseif ($username == 'Long')
                                {
                                    echo '<li class="list-group-item">Username 
                                                    <span class="badge badge-danger badge-pill">Too long!</span>
                                                  </li>';
                                }
                            }
                            else
                            {
                                echo '<li class="list-group-item">Username 
                                                <span class="badge badge-success badge-pill">OK</span>
                                              </li>';
                            }
                            if (isset($_GET['Email']))
                            {
                                $email = $_GET['Email'];
                                if ($email == 'Empty')
                                {
                                    echo '<li class="list-group-item">Email 
                                                    <span class="badge badge-danger badge-pill">Empty!</span>
                                                  </li>';
                                }
                                elseif ($email == 'Invalid')
                                {
                                    echo '<li class="list-group-item">Email 
                                                    <span class="badge badge-danger badge-pill">Invalid Email!</span>
                                                  </li>';
                                }
                                elseif ($email == 'Long')
                                {
                                    echo '<li class="list-group-item">Email 
                                                    <span class="badge badge-danger badge-pill">Too long!</span>
                                                  </li>';
                                }
                            }
                            else
                            {
                                echo '<li class="list-group-item">Email 
                                                <span class="badge badge-success badge-pill">OK</span>
                                              </li>';
                            }
                            if (isset($_GET['Number']))
                            {
                                $number = $_GET['Number'];
                                if ($number == 'Empty')
                                {
                                    echo '<li class="list-group-item">Number 
                                                        <span class="badge badge-danger badge-pill">Empty!</span>
                                                      </li>';
                                }
                                elseif ($number == 'Invalid')
                                {
                                    echo '<li class="list-group-item">Number 
                                                        <span class="badge badge-danger badge-pill">Invalid Number!</span>
                                                      </li>';
                                }
                                elseif ($number == 'Long')
                                {
                                    echo '<li class="list-group-item">Number
                                                        <span class="badge badge-danger badge-pill">Too long!</span>
                                                      </li>';
                                }
                            }
                            else
                            {
                                echo '<li class="list-group-item">Number 
                                                <span class="badge badge-success badge-pill">OK</span>
                                              </li>';
                            }
                            if (isset($_GET['Password']))
                            {
                                $password = $_GET['Password'];
                                if ($password == 'Empty')
                                {
                                    echo '<li class="list-group-item">Password 
                                                            <span class="badge badge-danger badge-pill">Empty!</span>
                                                          </li>';
                                }
                                elseif ($password == 'Invalid')
                                {
                                    echo '<li class="list-group-item">Password 
                                                            <span class="badge badge-danger badge-pill">Invalid Password!</span>
                                                          </li>';
                                }
                                elseif ($password == 'Long')
                                {
                                    echo '<li class="list-group-item">Password
                                                            <span class="badge badge-danger badge-pill">Too long!</span>
                                                          </li>';
                                }
                            }
                            else
                            {
                                echo '<li class="list-group-item">Password 
                                                <span class="badge badge-success badge-pill">OK</span>
                                              </li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="modal-body alert alert-secondary my-0">
                        <button class="btn btn-danger mx-auto" data-dismiss="modal" data-toggle="modal"
                                data-target="#register">
                            <i class="far fa-check-circle"></i> Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        /**
     * @desc This popup the success modal for creating account.
     */
    ?>
    <div class="row">
        <div id="success" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header alert alert-info my-0">
                        <h1>Registration Success</h1>
                        <button class="close" data-dismiss="modal" data-target="#success">&times;</button>
                    </div>
                    <div class="modal-body alert alert-success my-0">
                        <h3>You can now proceed to login.</h3>
                    </div>
                    <div class="modal-footer alert alert-info my-0">
                        <button class="btn btn-success btn-arrow-right" data-dismiss="modal" data-toggle="modal" data-target="#login">
                            <span>Proceed </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="welcome" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header alert alert-info my-0">
                        <h1>Login Success</h1>
                        <button class="close" data-dismiss="modal" data-target="#welcome">&times;</button>
                    </div>
                    <div class="modal-body alert alert-success my-0">
                        <h5 class="message">Welcome <?php echo $_SESSION['username']?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="logout" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header alert alert-info my-0">
                        <h1 class="modal-title">Logout Success</h1>
                        <button class="close" data-dismiss="modal" data-target="#logout">&times;</button>
                    </div>
                    <div class="modal-body alert alert-success my-0">
                        <h5 class="message">You have been successfully logout.</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="apply" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h1 class="modal-title">Application Denied</h1>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Please register first before you can apply.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#register"
                        class="btn btn-info m-auto">Register now.</button>
                </div>
            </div>
        </div>
    </div>
    <div id="finish" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Congratulations!</h2>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-success">
                    <p class="text-justify text-white">
                        You have successfully applied the job application.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
        /**
         * @desc This is form terms and agreements.
         */
    ?>
    <div id="terms" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Terms and Conditions</h2>
                </div>
                <div class="modal-body">
                    <p class="text-justify">
                        The information gathered from this form will be use as
                        reference for recruitment application and no other purposes.
                        If you agree to submit this information please click submit
                        otherwise you may cancel the submission.
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger m-auto" data-dismiss="modal">Cancel Submission</button>
                    <button type="submit" name="submit" class="btn btn-success m-auto" form="application">
                        Submit Information
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>