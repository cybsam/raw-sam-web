<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    $_SESSION['signin_require'] = "<script>alert('Sam Web->Admin Order: Sign in require. No sign in no entry. :)');</script>";
    header('location:signin.php?signin-require');
}
require_once('database/dbCon.php');


if ($_SESSION['user_status'] != 1) {
    header('location:index.php?auth-require');
}
$get_pag = $_GET['page'];
if ($get_pag == "" || $get_pag == 1) {
    $target = 0;
}else {
    $target = ($get_pag * 10 ) - 10;
}


$sel_new = "SELECT * FROM users_admin WHERE user_status=0 AND user_dlt=0 AND user_reje=0 LIMIT $target, 10";
$sel_new_que = mysqli_query($db_con,$sel_new);




include 'header.php'; 


?>
<title>New Users - Sam Web</title>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="users.all.php">Users List</a></li>
                            <li class="breadcrumb-item active">Users Request</li>
                        </ol>
                        <!-- let's begain -->
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="card">
                                    <div class="card-head text-center">
                                        <?php if(!empty($_SESSION['user_update_com'])): ?>
                                            <strong style="color:red;"><?= $_SESSION['user_update_com']; ?></strong>
                                        <?php endif;  unset($_SESSION['user_update_com']);?>

                                        <?php if(!empty($_SESSION['user_reject'])): ?>
                                            <strong style="color:red;"><?= $_SESSION['user_reject']; ?></strong>
                                        <?php endif;  unset($_SESSION['user_reject']);?>

                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th>User Id</th>
                                                <th>User Name</th>
                                                <th>Register Time</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php foreach($sel_new_que as $new_usr): ?>
                                            <tr>
                                                <td><?php echo $new_usr['admin_id']; ?></td>
                                                <td><?php echo ucfirst($new_usr['user_name']); ?></td>
                                                <td><?= date('Y-m-d h:i:s A',strtotime($new_usr['insert_at'])); ?></td>
                                                <td><a href="users.new.con.php?new-user=<?= $new_usr['admin_id']; ?>&eml=<?= $new_usr['user_email']; ?>&pw">View</a></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                        <?php 
                                        $sel_pag = "SELECT * FROM users_admin WHERE user_status=0 AND user_dlt=0";
                                        $sel_pag_que = mysqli_query($db_con,$sel_pag);
                                        $sel_pag_count = mysqli_num_rows($sel_pag_que);

                                        $page = ceil($sel_pag_count / 10);


                                        
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