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
$admin_id = $_SESSION['admin_id'];
$db_admin = "SELECT * FROM users_admin WHERE admin_id='$admin_id'";
$db_admin_que = mysqli_query($db_con,$db_admin);
$db_admin_assoc = mysqli_fetch_assoc($db_admin_que);
date_default_timezone_set('Asia/Dhaka');
$ins_date = date('Y-m-d H:i:s A');


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
                            <li class="breadcrumb-item"><a href="category.page.php">Category List</a></li>
                            <li class="breadcrumb-item active">Insert Category</li>
                        </ol>
                        <div class="container">
                            <div class="row my-2">
                                <div class="col-lg-8 order-lg-2">
                                    
                                    <div class="tab-content py-4">
                                        
                                        
                                        <div class="tab-pane active" id="edit">
                                            <form role="form" action="inc/category.ins.com.php" method="post">
                                            <?php if (!empty($_SESSION['insert_com'])): ?>
                                            <span style="color:green;"><?= $_SESSION['insert_com']; ?></span>
                                            <?php endif; unset($_SESSION['insert_com']); ?>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Category Name</label>
                                                    <div class="col-lg-9">
                                                        
                                                        <input class="form-control " type="text" name="cate_name" value="<?php if (!empty($_GET['cate_err'])) {
                                                            echo $_GET['cate_err'];
                                                        } ?>" >
                                                        
                                                        <?php if (!empty($_SESSION['nem_err'])): ?>
                                                        <span style="color:red;"><?=$_SESSION['nem_err']; ?></span>
                                                        <?php endif; unset($_SESSION['nem_err']); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">User Name</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="text" name="user_name" value="<?= $db_admin_assoc['user_name']; ?>" readonly>
                                                        <input type="hidden" name="user_id" value="<?= $db_admin_assoc['admin_id']; ?>">
                                                        <?php if (!empty($_SESSION['usr_nem'])): ?>
                                                        <?= $_SESSION['usr_nem']; ?>
                                                        <?php endif; unset($_SESSION['usr_nem']); ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">Time</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="text" value="<?= $ins_date; ?>" name="ins_date" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                                    <div class="col-lg-9">
                                                        <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
                                                        <button type="reset" class="btn btn-warning">Clear</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 order-lg-1 text-center">
                                    <span>Your Profile Picture</span>
                                <img src="uploads/admin-users/<?php echo $db_admin_assoc['user_picture'];  ?>" class="mx-auto img-fluid img-circle d-block " alt="avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                </main>






<?php include 'copy-right.php'; include 'footer.php'; ?>