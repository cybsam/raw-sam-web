<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    $_SESSION['signin_require'] = "<script>alert('Sam Web->Admin Order: Sign in require. No sign in no entry. :)');</script>";
    header('location:signin.php?signin-require');
}
require_once('database/dbCon.php');
include 'header.php'; 


?>
<title>Blog Trash - Sam Web</title>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="blog.page.php">Blog</a></li>
                            <li class="breadcrumb-item active">Blog Trash</li>
                        </ol>
                        <!-- let's begain -->
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Sam</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th>Post Name</th>
                                                <th>Post Author</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end content -->
                    </div>
                </main>






<?php include 'copy-right.php'; include 'footer.php'; ?>