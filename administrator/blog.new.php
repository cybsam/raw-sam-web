<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    $_SESSION['signin_require'] = "<script>alert('Sam Web->Admin Order: Sign in require. No sign in no entry. :)');</script>";
    header('location:signin.php?signin-require');
}
require_once('database/dbCon.php');

date_default_timezone_set('Asia/Dhaka');
$current_date = date('Y-m-d H:i:s A');

//user
$user_id = $_SESSION['admin_id'];
$user_db = "SELECT * FROM users_admin WHERE admin_id='$user_id'";
$user_db_que = mysqli_query($db_con,$user_db);
$user_db_assoc = mysqli_fetch_assoc($user_db_que);

//category
$sel_cate = "SELECT * FROM site_category WHERE cate_status=0";
$sel_cate_que = mysqli_query($db_con,$sel_cate);

include 'header.php'; 

?>
<title>Blog New - Sam Web</title>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="blog.page.php">Blog</a></li>
                            <li class="breadcrumb-item">New Blog</li>
                        </ol>
                        <!-- let's begain -->
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-header text-danger">
                                        <h6>all fild require *</h6>
                                        
                                    </div>
                                    <div class="card-body">
                                        <form action="inc/blog.ins.com.php" method="post" enctype="multipart/form-data">
                                        <?php if(!empty($_SESSION['post_insert'])): ?>
                                            <?= $_SESSION['post_insert']; ?>
                                        <?php endif; unset($_SESSION['post_insert']); ?>
                                            <div class="form-group">
                                              <label for="">Post Name</label>
                                              <textarea name="post_name" cols="20" rows="2" class="form-control" placeholder="enter post name"></textarea>
                                              <?php if(!empty($_SESSION['post_name_err'])): ?>
                                              <span style="color:red;"><?= $_SESSION['post_name_err']; ?></span>
                                              <?php endif; unset($_SESSION['post_name_err']); ?>
                                            </div>
                                            <div class="form-group">
                                              <label for="">Short Text</label>
                                              <input type="text"
                                                class="form-control" name="short_text" id="" aria-describedby="helpId" placeholder="enter short text in your post">
                                                <?php if(!empty($_SESSION['short_text_err'])): ?>
                                              <span style="color:red;"><?= $_SESSION['short_text_err']; ?></span>
                                              <?php endif; unset($_SESSION['short_text_err']); ?>
                                            </div>
                                            <div class="form-group">
                                              <label for="">Post Keyword</label>
                                              <input type="text"
                                                class="form-control" name="post_keyword" placeholder="enter post keyword">
                                                <?php if(!empty($_SESSION['post_keyword_err'])): ?>
                                              <span style="color:red;"><?= $_SESSION['post_keyword_err']; ?></span>
                                              <?php endif; unset($_SESSION['post_keyword_err']); ?>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="">Category</label>
                                                        <select name="post_category" class="form-control">
                                                            <option value="">Select Category</option>
                                                            <?php foreach($sel_cate_que as $category): ?>
                                                            <option value="<?= $category['cate_id']; ?>"><?= $category['category_name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php if(!empty($_SESSION['post_category_err'])): ?>
                                                            <span style="color:red;"><?= $_SESSION['post_category_err']; ?></span>
                                                        <?php endif; unset($_SESSION['post_category_err']); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="">Picture</label>
                                                        <input type="file" name="post_picture" class="form-control">
                                                        <?php if(!empty($_SESSION['pic_err'])): ?>
                                                            <span style="color:red;"><?= $_SESSION['pic_err']; ?></span>
                                                        <?php endif; unset($_SESSION['pic_err']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Post Description</label>
                                                <textarea name="post_description" class="form-control" placeholder="enter post description" cols="30" rows="5"></textarea>
                                                <?php if(!empty($_SESSION['post_description_err'])): ?>
                                                    <span style="color:red;"><?= $_SESSION['post_description_err']; ?></span>
                                                <?php endif; unset($_SESSION['post_description_err']); ?>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="text-danger">Chose very carefully *</label>
                                                        <select name="content_desp" class="form-control bg-danger text-white">
                                                            <option value="1">Blog</option>
                                                            <option value="2">Article</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" >current date and time</label>
                                                        <input type="datetime" name="post_date" class="form-control" value="<?= $current_date; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                 <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label for="">Author user-name</label>
                                                            <input type="text" name="post_author" class="form-control" value="<?= $user_db_assoc['user_name']; ?>" readonly>
                                                            <?php if(!empty($_SESSION['user_err'])): ?>
                                                                <?= $_SESSION['user_err']; ?>
                                                            <?php endif; unset($_SESSION['user_err']); ?>
                                                        </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label for="">Author Email</label>
                                                            <input type="text" name="post_author_email" class="form-control" value="<?= $user_db_assoc['user_email']; ?>" readonly>
                                                            <?php if(!empty($_SESSION['email_err'])): ?>
                                                                <?= $_SESSION['email_err']; ?>
                                                            <?php endif; unset($_SESSION['email_err']); ?>
                                                        </div>
                                                 </div>
                                            </div>
                                            
                                            <hr>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info" name="submit">insert post</button>
                                                <button type="reset"class="btn btn-warning text-white">Reset</button>
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