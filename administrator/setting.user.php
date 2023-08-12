<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    $_SESSION['signin_require'] = "<script>alert('Sam Web->Admin Order: Sign in require. No sign in no entry. :)');</script>";
    header('location:signin.php?signin-require');
}

$user_id = $_SESSION['admin_id'];
require_once('database/dbCon.php');

?>
<?php include 'header.php'; ?>
<title>User Setting - Sam Web</title>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="users.all.php">Users List</a></li>
                            <li class="breadcrumb-item active">User Setting</li>
                        </ol>
                        

                        <?php
                            $sel_user = "SELECT * FROM users_admin WHERE admin_id = '$user_id'";
                            $sel_user_que = mysqli_query($db_con,$sel_user);
                            $sel_user_assoc = mysqli_fetch_assoc($sel_user_que);

                        ?>

                        <div class="container">
                            <div class="row my-2">
                                <div class="col-lg-8 order-lg-2">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content py-4">
                                        <div class="tab-pane active" id="profile">
                                            <h5 class="mb-3">User Profile</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 style="color:#6c757d;">User Name:- <span style="color:red;"><?php echo ucfirst($sel_user_assoc['user_name']);  ?></span></h6>
                                                    <p style="color:#6c757d;">
                                                        User Email:- <span style="color:green;"><a href="mailto:<?php echo $sel_user_assoc['user_email'];  ?>"><?php echo $sel_user_assoc['user_email'];  ?></a></span>
                                                    </p>
                                                    <p style="color:#6c757d;">User Type: <?php if ($sel_user_assoc['user_status']==1) {
                                                        echo "<strong style='color:green;'>Admin</strong>";
                                                    }elseif ($sel_user_assoc['user_status']==2) {
                                                        echo "<strong style='color:green;'>Modarator</strong>";
                                                    }else {
                                                        echo "<strong style='color:green;'>Member</strong>";
                                                    } ?></p>
                                                    <p style="color:#6c757d;">
                                                        User Gender:- <span style="color:#fd7e14;"><?php echo ucfirst($sel_user_assoc['user_gender']);  ?></span>
                                                    </p>
                                                    <p style="color:#6c757d;">Registraton Time: <span style="color:#6610f2;"><?php echo date('y-m-d h:i:s a',strtotime($sel_user_assoc['insert_at']));  ?></span></p>
                                                    <p style="color:#6c757d;">Last Update: <span style="color:#6f42c1;"><?php echo date('y-m-d h:i:s a', strtotime($sel_user_assoc['update_at']));  ?></span></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6>Recent badges</h6>
                                                    <a href="#" class="badge badge-dark badge-pill">html5</a>
                                                    <a href="#" class="badge badge-dark badge-pill">react</a>
                                                    <a href="#" class="badge badge-dark badge-pill">codeply</a>
                                                    <a href="#" class="badge badge-dark badge-pill">angularjs</a>
                                                    <a href="#" class="badge badge-dark badge-pill">css3</a>
                                                    <a href="#" class="badge badge-dark badge-pill">jquery</a>
                                                    <a href="#" class="badge badge-dark badge-pill">bootstrap</a>
                                                    <a href="#" class="badge badge-dark badge-pill">responsive-design</a>
                                                    <hr>
                                                    <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
                                                    <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                                                    <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                                                </div>
                                                <div class="col-md-12">
                                                    <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                                                    <table class="table table-sm table-hover table-striped">
                                                        <tbody>                                    
                                                            <tr>
                                                                <td>
                                                                    <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Kensington</strong> deleted MyBoard3 in <strong>`Discussions`</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Skell</strong> deleted his post Look at Why this is.. in <strong>`Discussions`</strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--/row-->
                                        </div>
                                        
                                        <div class="tab-pane" id="edit">
                                            <form role="form" action="" method="post">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">User Name</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control " type="text" name="user_name" value="<?php echo ucfirst($sel_user_assoc['user_name']); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="text" value="<?php echo $sel_user_assoc['user_email']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="email" value="email@gmail.com">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Company</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="text" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Website</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="url" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="text" value="" placeholder="Street">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" type="text" value="" placeholder="City">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input class="form-control" type="text" value="" placeholder="State">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
                                                    <div class="col-lg-9">
                                                        <select id="user_time_zone" class="form-control" size="0">
                                                            <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                                            <option value="Alaska">(GMT-09:00) Alaska</option>
                                                            <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                                            <option value="Arizona">(GMT-07:00) Arizona</option>
                                                            <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                                            <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                                            <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                                            <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="text" value="janeuser">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="password" value="11111122333">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="password" value="11111122333">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                                    <div class="col-lg-9">
                                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                                        <input type="button" class="btn btn-primary" value="Save Changes">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 order-lg-1 text-center">
                                    <img src="uploads/admin-users/<?php echo $sel_user_assoc['user_picture'];  ?>" class="mx-auto img-fluid img-circle d-block " alt="avatar">
                                    <h6 class="mt-2">Upload a different photo</h6>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input">
                                        <span class="custom-file-control">Choose file</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </main>






<?php include 'copy-right.php'; include 'footer.php'; ?>