<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    $_SESSION['signin_require'] = "<script>alert('Sam Web->Admin Order: Sign in require. No sign in no entry. :)');</script>";
    header('location:signin.php?signin-require');
}
require_once('database/dbCon.php');

$get_page = $_GET['page'];

if ($get_page == "" || $get_page == 1) {
    $target_page = 0;
}else {
    $target_page = ($get_page * 10) - 10;
}

$cate_sele = "SELECT * FROM site_category WHERE cate_status=0 OR cate_status=1 ORDER BY cate_id DESC LIMIT $target_page,10";
$cate_sele_que = mysqli_query($db_con,$cate_sele);



include 'header.php'; 


?>
<title>Category - Sam Web</title>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Category List</li>
                        </ol>
                        <!-- let's begain -->
                        <div class="row">
                            <div class="col-xs-9 col-md-9">
                                <div class="card bg-light">
                                    <div class="card-header bg-light ">
                                        <h3>Category List</h3>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <?php if (!empty($_SESSION['soft_del'])): ?>
                                                <strong style="color:red;"><?= $_SESSION['soft_del']; ?></strong>
                                            <?php endif; unset($_SESSION['soft_del']); ?>
                                        </div>
                                        <table class="table">
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Name</th>
                                                <th>Added By</th>
                                                <th>Status</th>
                                                <th>Insert Time</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php foreach($cate_sele_que as $cate): ?>
                                                <tr>
                                                    <td><?= $cate['cate_id']; ?></td>
                                                    <td><?= $cate['category_name']; ?></td>
                                                    <td><?= $cate['ins_usr_nem']; ?></td>
                                                    <td>
                                                        <button type="submit" class="badge <?= $cate['cate_status']== 0 ? 'badge-info':'badge-warning'; ?>">
                                                            <?php if ($cate['cate_status'] == 0) { ?>
                                                                <a href="inc/category.status.php?deactive=<?= $cate['cate_id']; ?> " class="text-white">Active</a>
                                                            <?php }else { ?>
                                                                <a href="inc/category.status.php?active=<?= $cate['cate_id']; ?> " class="text-white">Dective</a>
                                                            <?php }?>
                                                        </button></td>
                                                    <td><?= date('M-d',strtotime($cate['insert_time'])); ?></td>
                                                    <td><?php if ($_SESSION['user_status'] == 1) {?>
                                                        <a href="inc/category.status.php?sof_delete=<?= $cate['cate_id']; ?>" class="badge badge-danger">Delete</a>
                                                    <?php } ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                        
                                    </div>
                                </div>
                                <?php
                                $sel_db = "SELECT * FROM site_category WHERE cate_status=0";
                                $sel_db_que = mysqli_query($db_con,$sel_db);
                                $rows = mysqli_num_rows($sel_db_que);
                                $page = ceil($rows / 10);
                                
                                ?>
                                <nav aria-label="...">
                                    <ul class="pagination">
                                        <li class="page-item <?= $get_page <= 1 ? 'disabled':' '; ?>">
                                        <a class="page-link" href="?page=<?= $get_page - 1; ?>" tabindex="-1">Previous</a>
                                        </li>
                                        <?php for ($show_page=1; $show_page <= $page; $show_page++): ?>
                                        <li class="page-item <?= $show_page == $get_page ? 'active':' '; ?>">
                                        <a class="page-link" href="?page=<?= $show_page; ?>"><?= $show_page; ?></a>
                                        </li>
                                        <?php endfor; ?>
                                        <li class="page-item <?= $get_page == $page ? 'disabled':' '; ?>">
                                        <a class="page-link" href="?page=<?= $get_page + 1; ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-xs-3 col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Addational Info</h3>
                                    </div>
                                    <div class="card-body">
                                    <?php if ($_SESSION['user_status'] == 1) { ?>
                                        <a href="category.new.php" class="btn btn-info">Insert Category</a>
                                    <?php } ?>
                                    <ul>
                                        <li style="color:green;" >Active</li>
                                        <li style="color:warning;" >De-active</li>
                                        <li style="color:red;" >Trash</li>
                                    </ul>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!-- end content -->
                    </div>
                </main>






<?php include 'copy-right.php'; include 'footer.php'; ?>