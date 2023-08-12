<?php
session_start();
require_once('database/dbCon.php');
include 'info/site-info.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sign Up - Sam Web</title>
        <link rel="icon" href="../images/logo/logo.png">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                        
                                    </div>
                                    <div class="card-body">
                                        <form action="inc/signup.com.php" method="post" enctype="multipart/form-data">

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">User Name</label>
                                                        <input class="form-control py-4" id="inputFirstName" name="user_name" value="<?php if (!empty($_GET['user_name'])) {
                                                            echo $_GET['user_name'];
                                                        } ?>" type="text" placeholder="Enter User Name" />
                                                        <?php if (!empty($_SESSION['user_name_error'])): ?>
                                                        <span style="color:red;"><?= $_SESSION['user_name_error']; ?></span>
                                                        <?php endif; unset($_SESSION['user_name_error']); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">User Email</label>
                                                        <input class="form-control py-4" id="inputLastName" name="user_email" value="<?php if (!empty($_GET['user_email'])) {
                                                            echo $_GET['user_email'];
                                                        } ?>" type="email" placeholder="Enter Email Address" />
                                                        <?php if (!empty($_SESSION['user_email_error'])): ?>
                                                        <span style="color:red;"><?= $_SESSION['user_email_error']; ?></span>
                                                        <?php endif; unset($_SESSION['user_email_error']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" id="inputPassword" type="password" name="user_password" placeholder="Enter password" />
                                                        <?php if (!empty($_SESSION['user_password_error'])): ?>
                                                        <span style="color:red;"><?= $_SESSION['user_password_error']; ?></span>
                                                        <?php endif; unset($_SESSION['user_password_error']); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" name="confirm_password" placeholder="Confirm password" />
                                                        <?php if (!empty($_SESSION['confirm_password_error'])): ?>
                                                        <span style="color:red;"><?= $_SESSION['confirm_password_error']; ?></span>
                                                        <?php endif; unset($_SESSION['confirm_password_error']); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Gender</label>
                                                        <select name="gender" id="" class="form-control">
                                                            <option value="">Select Gender</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                        <?php if (!empty($_SESSION['gender_error'])): ?>
                                                        <span style="color:red;"><?= $_SESSION['gender_error']; ?></span>
                                                        <?php endif; unset($_SESSION['gender_error']); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Picture</label>
                                                        <input class="form-control" id="inputLastName" type="file" name="user_picture" placeholder="Enter last name" />
                                                        <?php if (!empty($_SESSION['picture_error'])): ?>
                                                        <span style="color:red;"><?= $_SESSION['picture_error']; ?></span>
                                                        <?php endif; unset($_SESSION['picture_error']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if(!empty($_SESSION['new_user_add_complete'])): ?>
                                            <span style="color:green;"><?= $_SESSION['new_user_add_complete']; ?><a href="signin.php">-Sign In</a></span>
                                            <?php endif; unset($_SESSION['new_user_add_complete']); ?>
                                            <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block" name="submit">Sign Up</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="signin.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <?= $info['site_copyright']; ?> <script>document.write(new Date().getFullYear());</script></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
