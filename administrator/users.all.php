<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    $_SESSION['signin_require'] = "<script>alert('Sam Web->Admin Order: Sign in require. No sign in no entry. :)');</script>";
    header('location:signin.php?signin-require');
}
require_once('database/dbCon.php');
include 'header.php';

$get_page = $_GET['page'];
    if ($get_page == "" || $get_page == 1) {
        $terget_page = 0;
    }else {
        $terget_page = ($get_page * 10) - 10;
    }
$sel_db_users = "SELECT * FROM users_admin WHERE user_status=1 OR user_status=2 AND user_dlt=0 ORDER BY admin_id desc LIMIT $terget_page, 10";
$sel_db_users_que = mysqli_query($db_con,$sel_db_users);



?>
<title>All Users - Sam Web</title>
<?php include 'navbar.php'; ?>


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Users List</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="card">
                                    <div class="card-head text-center">
                                        <?php if (!empty($_SESSION['user_dlt'])): ?>
                                            <strong style="color:red;"><?= $_SESSION['user_dlt']; ?></strong>
                                        <?php endif; unset($_SESSION['user_dlt']); ?>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th>User</th>
                                                <th>User Id</th>
                                                <th>User Name</th>
                                                
                                                <th>User Status</th>
                                                <th>Register Date</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php foreach ($sel_db_users_que as $users): ?>
                                            <tr>
                                                <td><a href="user.view.php?user-id=<?php echo $users['admin_id']; ?>&pw=<?= $users['user_password'] ?>&pw"><i class="fa fa-user-check" style="font-size:25px; color:#2196F3;"></a></i></td>
                                                <td><?= $users['admin_id']; ?></td>
                                                
                                                <td><?= $users['user_name']; ?></td>
                                                <td>
                                                    <?php if ($users['user_status']==1) {
                                                        echo "<span style='color:green;'>Admin</span>";
                                                    }else {
                                                        echo "<span style='color:#fd7e14;'>Moderator<span>";
                                                    } ?>
                                                </td>
                                                <td><?= date('Y-m-d',strtotime($users['insert_at'])); ?></td>
                                                <td>
                                                <a href="edit.users.php?user_id=<?= $users['admin_id']; ?>&pw=<?= $users['user_password'] ?>&pw" ><i class="fa fa-user-edit"></i></a>&nbsp;&nbsp;
                                                <?php if ($_SESSION['user_status']==1) { ?>
                                                    <a href="user.dlt.php?delete-user=<?php echo $users['admin_id']; ?>&pw=<?= $users['user_password'] ?>&pw"><i class="fa fa-trash" style="color:red;"></i></a>
                                                <?php } ?>    
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>

                                            <!-- start pagination -->
                                            <?php
                                                $pag_db = "SELECT * FROM users_admin WHERE user_status=1 OR user_status=2";
                                                $pag_db_que = mysqli_query($db_con,$pag_db);
                                                $pag_db_count = mysqli_num_rows($pag_db_que);
                                                // $page = $pag_db_count / 5;
                                                $page = ceil($pag_db_count / 10);
                                                // echo $page;
                                            ?>
                                        </table>
                                        <nav aria-label="...">
                                            <ul class="pagination">
                                                <li class="page-item <?= $get_page <= 1 ? 'disabled':' '; ?>">
                                                <a class="page-link" href="?page=<?php echo $get_page -1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                                </li>
                                                <?php for($s_page = 1 ; $s_page <= $page; $s_page ++): ?>
                                                <li class="page-item <?= $s_page == $get_page ?'active':' '; ?>"><a class="page-link" href="?page=<?php echo $s_page; ?>"><?php echo $s_page; ?></a></li>
                                                <?php endfor; ?>
                                                <li class="page-item <?= $get_page == $page ? 'disabled':' '; ?>">
                                                <a class="page-link" href="?page=<?= $get_page + 1; ?>">Next</a>
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