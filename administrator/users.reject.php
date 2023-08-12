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

$get_pag = $_GET['page'];
if ($get_pag == "" || $get_pag == 1) {
    $target = 0;
}else {
    $target = ($get_pag * 10) - 10;
}

$sel_reject = "SELECT * FROM users_admin WHERE user_reje !=0 OR user_dlt=3 LIMIT $target,10";
$sel_reject_que = mysqli_query($db_con,$sel_reject);



include 'header.php'; 
?>
<title>Users Reject - Sam Web</title>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="users.all.php">Users List</a></li>
                            <li class="breadcrumb-item"><a href="users.new.php">Request Users</a></li>
                            <li class="breadcrumb-item active">Rejected Users</li>
                        </ol>
                        <!-- let's begain -->
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="card">
                                    <div class="card-head text-center">
                                    <?php if (!empty($_SESSION['update_user'])): ?>
                                        <div><?= $_SESSION['update_user']; ?></div>
                                    <?php endif; unset($_SESSION['update_user']);  ?>
                                        
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th>ID / View</th>
                                                <th>User Name</th>
                                                <th>User Email</th>
                                                <th>Register Date</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php foreach($sel_reject_que as $reject): ?>
                                            <tr>
                                                <td><a href="user.view.php?user-id=<?= $reject['admin_id']; ?>&eml=<?= $reject['user_email']; ?>&pw-<?= $reject['user_password']; ?>&pw"><?= $reject['admin_id']; ?>/ View</a></td>
                                                <td><?= $reject['user_name']; ?></td>
                                                <td><?= $reject['user_email']; ?></td>
                                                <td><?= date('Y-m-d',strtotime($reject['insert_at'])); ?></td>
                                                <td><a href="user.un-del.php?reje-undo=<?= $reject['admin_id']; ?>&eml=<?= $reject['user_email']; ?>&pw-<?= $reject['user_password']; ?>&pw"><i class="fa fa-undo-alt" style="color:primary;"></i></a>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <a href="user.un-del.php?reje-per=<?= $reject['admin_id']; ?>&eml=<?= $reject['user_email']; ?>&pw-<?= $reject['user_password']; ?>&pw"><i class="fa fa-user-slash" style="color:red;"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                        <?php
                                            $sel_rej_db = "SELECT * FROM users_admin WHERE user_reje !=0 OR user_dlt=3";
                                            $sel_rej_db_que = mysqli_query($db_con,$sel_rej_db);
                                            $page_count = mysqli_num_rows($sel_rej_db_que);
                                            $page = ceil($page_count / 10);
                                        ?>
                                        <nav aria-label="...">
                                            <ul class="pagination">
                                                <li class="page-item <?= $get_pag <= 1 ? 'disabled':''; ?>">
                                                <a class="page-link" href="?page=<?= $get_pag - 1; ?>" tabindex="-1">Previous</a>
                                                </li>
                                                <?php for($sh_page = 1; $sh_page <= $page; $sh_page++): ?>
                                                <li class="page-item <?= $get_pag == $sh_page ? 'active':''; ?>"><a class="page-link" href="?page=<?= $sh_page; ?>"><?php echo $sh_page; ?></a></li>
                                                <?php endfor; ?>
                                                <li class="page-item <?= $get_pag == $page ? 'disabled':''; ?>">
                                                <a class="page-link" href="?page=<?= $get_pag + 1; ?>">Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end content -->
                    </div>
                </main>






<?php include 'copy-right.php'; include 'footer.php'; ?>