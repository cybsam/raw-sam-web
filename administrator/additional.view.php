<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    $_SESSION['signin_require'] = "<script>alert('Sam Web->Admin Order: Sign in require. No sign in no entry. :)');</script>";
    header('location:signin.php?signin-require');
}
require_once('database/dbCon.php');
include 'header.php'; 

$site_info = "SELECT * FROM site_information";
$site_info_que = mysqli_query($db_con,$site_info);
$site_info_assoc = mysqli_fetch_assoc($site_info_que);

?>
<title>Additional Info - Sam Web</title>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Site Information</li>
                        </ol>
                        <!-- let's begain -->
                        <div class="row">
                            <div class="con-xs-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="inc/additional.in.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Current Title</label>   
                                                            <input type="text" name="" id=""class="form-control" value="<?= $site_info_assoc['site_title']; ?>"  readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">New Title</label>   
                                                        <input type="text" name="new_title" class="form-control" id="" value="<?php if (!empty($_GET['title'])) {
                                                            echo $_GET['title'];
                                                        } ?>" placeholder="new site title" >
                                                        <?php if(!empty($_SESSION['title'])): ?>
                                                        <span style="color:red;" ><?= $_SESSION['title']; ?></span>
                                                        <?php endif; unset($_SESSION['title']); ?>    
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Current Footer</label>
                                                            <input type="text" name="" id="" class="form-control" value="<?= $site_info_assoc['site_copyright']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">New Footer</label>   
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">&copy;</div>
                                                                </div>
                                                                <input type="text" name="new_footer" class="form-control" placeholder="copyright info" value="<?php if (!empty($_GET['footer'])) {
                                                                    echo $_GET['footer'];
                                                                } ?>" >  
                                                            </div>
                                                            <?php if(!empty($_SESSION['footer'])): ?>
                                                            <span style="color:red;" ><?= $_SESSION['footer']; ?></span>
                                                            <?php endif; unset($_SESSION['footer']); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Current Footer Link</label>
                                                            <input type="text" name="" id="" class="form-control" value="<?= $site_info_assoc['site_copyright_link']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">New Footer Link</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">https://</div>
                                                                </div>
                                                                <input type="text" name="new_footer_link" class="form-control" placeholder="site name" value="<?php if (!empty($_GET['footer_link'])) {
                                                                    echo $_GET['footer_link'];
                                                                } ?>" >
                                                            </div>
                                                            <?php if(!empty($_SESSION['f_link'])): ?>
                                                            <span style="color:red;" ><?= $_SESSION['f_link']; ?></span>
                                                            <?php endif; unset($_SESSION['f_link']); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Curent Site Icon</label><br>
                                                            <img src="../images/logo/<?= $site_info_assoc['site_icon']; ?>" alt="Nothing to show" width="150px" height="150px">
                                                            <a href="../images/logo/<?= $site_info_assoc['site_icon']; ?>" class="btn btn-info" download><i class="fa fa-download"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">New Site Icon</label>
                                                            <input type="file" name="new_icon" class="form-control" id="">
                                                            <?php if(!empty($_SESSION['icon'])): ?>
                                                            <span style="color:red;" ><?= $_SESSION['icon']; ?></span>
                                                            <?php endif; unset($_SESSION['icon']); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <button type="reset" class="btn btn-info btn-block">Cancel</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <button type="submit" name="submit" class="btn btn-warning btn-block text-white">Change</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end content -->
                    </div>
                </main>






<?php include 'copy-right.php'; include 'footer.php'; ?>