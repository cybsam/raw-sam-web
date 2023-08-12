<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    $_SESSION['signin_require'] = "<script>alert('Sam Web->Admin Order: Sign in require. No sign in no entry. :)');</script>";
    header('location:signin.php?signin-require');
}
require_once('database/dbCon.php');

$trash_sel = "SELECT * FROM users_admin WHERE user_dlt=1 OR user_dlt=2";
$trash_sel_que = mysqli_query($db_con,$trash_sel);


include 'header.php'; 


?>
<title>Trash Box - Sam Web</title>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="users.all.php">Users List</a></li>
                            <li class="breadcrumb-item active">Users Trash</li>
                        </ol>
                        <!-- let's begain -->
                        <div class="row">
                            <div class="col-xs-10 col-md-10">
                                <div class="card">
                                    <div class="card-head text-center">
                                        <?php if (!empty($_SESSION['user_undo'])): ?>
                                            <strong style="color:green;"><?= $_SESSION['user_undo']; ?></strong>
                                        <?php endif; unset($_SESSION['user_undo']); ?>
                                        <?php if (!empty($_SESSION['user_delete'])): ?>
                                            <strong style="color:red;"><?= $_SESSION['user_delete']; ?></strong>
                                        <?php endif; unset($_SESSION['user_delete']); ?>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th>User Id/View</th>
                                                <th>User Name</th>
                                                <th>User Status</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php foreach($trash_sel_que as $trash): ?>
                                            <tr>
                                                <td><a href="user.view.php?user-id=<?= $trash['admin_id']; ?>&eml=<?= $trash['user_email']; ?>&pw=<?= $trash['user_password']; ?>&pw"><?= $trash['admin_id']; ?></a>/ <a href="user.view.php?user-id=<?= $trash['admin_id']; ?>&eml=<?= $trash['user_email']; ?>&pw=<?= $trash['user_password']; ?>&pw"> View</a></td>
                                                <td><?= $trash['user_name']; ?></td>
                                                <td><?php if ($trash['user_dlt']==1 || $trash['user_dlt']==2) {
                                                    echo "<strong style='color:#fd7e14;'>Trash</strong>";
                                                }?></td>
                                                <td>
                                                <?php if ($_SESSION['user_status']==1) { ?>
                                                    <a href="user.un-del.php?user-undo=<?= $trash['admin_id']; ?>&eml=<?= $trash['user_email']; ?>&pw=<?= $trash['user_password']; ?>&pw"><i class="fa fa-undo-alt" style="color:primary;"></i></a> &nbsp;&nbsp;
                                                    <a href="user.un-del.php?user-del=<?= $trash['admin_id']; ?>&eml=<?= $trash['user_email']; ?>&pw=<?= $trash['user_password']; ?>&pw"><i class="fa fa-user-slash" style="color:red;"></i></a>
                                                <?php } else{
                                                    echo "<span style='color:red;'>Permission Reuire.</span>";
                                                }?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 col-md-2">
                                <h5>User Type</h5>
                                <ul>
                                    <li style="color:green;">Admin</li>
                                    <li style="color:#fd7e14;">Moderator</li>
                                    <li style="color:red;">Member</li>
                                </ul>
                            </div>
                        </div>
                        <!-- end content -->
                    </div>
                </main>






<?php include 'copy-right.php'; include 'footer.php'; ?>