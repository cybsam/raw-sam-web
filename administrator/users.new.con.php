<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    $_SESSION['signin_require'] = "<script>alert('Sam Web->Admin Order: Sign in require. No sign in no entry. :)');</script>";
    header('location:signin.php?signin-require');
}
if ($_SESSION['user_status'] != 1) {
    header('location:index.php?auth-require');
}
require_once('database/dbCon.php');

if (isset($_GET['new-user'])) {
    $get_id = $_GET['new-user'];


    $sel_user = "SELECT * FROM users_admin WHERE admin_id='$get_id'";
    $sel_user_que = mysqli_query($db_con,$sel_user);
    $sel_user_assoc = mysqli_fetch_assoc($sel_user_que);
}


include 'header.php'; 


?>
<title>Blank - Sam Web</title>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="users.all.php">Users List</a></li>
                            <li class="breadcrumb-item "><a href="users.new.php">Users Request</a></li>
                            <li class="breadcrumb-item active">User Request View</a></li>
                        </ol>
                        <div class="container">
                            <div class="row my-2">
                                <div class="col-lg-8 order-lg-2">
                                    
                                    <div class="tab-content py-4">
                                        
                                        
                                        <div class="tab-pane active" id="edit">
                                            <form role="form" action="inc/user.confirm.php" method="post">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">User Name</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control " type="text" name="user_name" value="<?php echo ucfirst($sel_user_assoc['user_name']); ?>" readonly>
                                                        <input type="hidden" name="admin_id" value="<?= $sel_user_assoc['admin_id']; ?>">
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="text" value="<?php echo $sel_user_assoc['user_email']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="password" value="" placeholder="********" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="text" value="<?php echo ucfirst($sel_user_assoc['user_gender']); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">User Status/Type</label>
                                                    <div class="col-lg-9">
                                                        <select name="user_status" class="form-control">
                                                            <option value="">Select User Status/Type</option>
                                                            <option value="3">Member</option>
                                                            <option value="2">Moderator</option>
                                                            <option value="1">Admin</option>
                                                        </select>
                                                        <?php if (!empty($_SESSION['user_status_error'])): ?>
                                                            <span style="color:red;"><?= $_SESSION['user_status_error']; ?></span>
                                                        <?php endif; unset($_SESSION['user_status_error']);?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                
                                                    <label class="col-lg-3 col-form-label form-control-label">Register Time</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="url" value="<?= date('Y-m-d H:i:s A',strtotime($sel_user_assoc['insert_at'])); ?>" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                                    <div class="col-lg-9">
                                                        <button type="submit" class="btn btn-danger" name="reject">Reject</button>
                                                        <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
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