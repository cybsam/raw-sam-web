<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    $_SESSION['signin_require'] = "<script>alert('Sam Web->Admin Order: Sign in require. No sign in no entry. :)');</script>";
    header('location:signin.php?signin-require');
}
if ($_SESSION['user_status'] != 1) {
    header('location:index.php?admin=false');
}
require_once('database/dbCon.php');
include 'header.php'; 

$sel_cate = "SELECT * FROM site_category WHERE cate_status=2 ORDER BY cate_id DESC";
$sel_cate_que = mysqli_query($db_con,$sel_cate);

?>
<title>Category Trash - Sam Web</title>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="category.page.php">Category</a></li>
                        <li class="breadcrumb-item active">Category Trash</li>
                        </ol>
                        <!-- let's begain -->
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Category Trash</h3>
                                        
                                    </div>
                                    <div class="card-body">

                                        <?php if (!empty($_SESSION['cate_data'])): ?>
                                        <?= $_SESSION['cate_data']; ?>
                                        <?php endif; unset($_SESSION['cate_data']); ?>

                                        <table class="table">
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Name</th>
                                                <th>Category Status</th>
                                                <th>Delete AT</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php foreach($sel_cate_que as $category): ?>
                                            <tr>
                                                <td><?= $category['cate_id']; ?></td>
                                                <td><?= $category['category_name']; ?></td>
                                                <td><?php if ($category['cate_status']==0) {
                                                    echo "<b style='color:#28a745;'>Active</b>";
                                                }elseif ($category['cate_status']==1) {
                                                    echo "<b style='color:#ffc107;'>Deactive</b>";
                                                }else {
                                                    echo "<b style='color:#dc3545;'>Trashed</b>";
                                                }?></td>
                                                <td><b style="color:red;"><?= ucfirst($category['del_uer_nem']); ?></b></td>
                                                <td>
                                                    <div class="btn-group" role="group" >
                                                        <a href="inc/category.status.php?undo=<?= $category['cate_id']; ?>" class="badge badge-info">Undo</a>
                                                        <a href="inc/category.status.php?delete=<?= $category['cate_id']; ?>"class="badge badge-danger">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end content -->
                    </div>
                </main>






<?php include 'copy-right.php'; include 'footer.php'; ?>