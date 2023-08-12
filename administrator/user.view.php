<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    $_SESSION['signin_require'] = "<script>alert('Sam Web->Admin Order: Sign in require. No sign in no entry. :)');</script>";
    header('location:signin.php?signin-require');
}
require_once('database/dbCon.php');
if (isset($_GET['user-id'])) {
    $user_id = $_GET['user-id'];

    $select_user = "SELECT * FROM users_admin WHERE admin_id='$user_id'";
    $select_user_que = mysqli_query($db_con,$select_user);
    $select_user_assoc = mysqli_fetch_assoc($select_user_que);

}

include 'header.php'; 


?>
<title>User View - Sam Web</title>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item "><a href="users.all.php">Users List</a></li>
                            <li class="breadcrumb-item active">User View</li>
                        </ol>
                        <!-- let's begain -->
                        <div class="container">
                            <div class="row my-2">
                                <div class="col-lg-8 order-lg-2">
                                    
                                    <div class="tab-content py-4">
                                        <div class="tab-pane active" id="profile">
                                            <h5 class="mb-3">User Profile</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 style="color:#6c757d;">User Name:- <span style="color:red;"><?php echo ucfirst($select_user_assoc['user_name']);  ?></span></h6>
                                                    <p style="color:#6c757d;">
                                                        User Email:- <span style="color:green;"><a href="mailto:<?php echo $select_user_assoc['user_email'];  ?>"><?php echo ucfirst($select_user_assoc['user_email']);  ?></a></span>
                                                    </p>
                                                    
                                                    <p style="color:#6c757d;">
                                                        User Gender:- <span style="color:#fd7e14;"><?php echo ucfirst($select_user_assoc['user_gender']);  ?></span>
                                                    </p>
                                                    <p style="color:#6c757d;">Registraton Time: <span style="color:#6610f2;"><?php echo date('Y-m-d H:i:s A',strtotime($select_user_assoc['insert_at']));  ?></span></p>
                                                    <p style="color:#6c757d;">Last Update: <span style="color:#6f42c1;"><?php echo date('Y-m-d H:i:s A',strtotime($select_user_assoc['update_at']));  ?></span></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6>User Status</h6>
                                                    
                                                    <span class="badge badge-<?= $select_user_assoc['user_status']==1 ? 'success':'warning'; ?>"><i class="fa fa-user"></i> <?php if ($select_user_assoc['user_status']==1) {
                                                        echo "Admin";
                                                    }elseif($select_user_assoc['user_status']==2){
                                                        echo "Moderator";
                                                    }else {
                                                        echo "Unactive";
                                                    } ?> </span>
                                                    <span class="badge badge-<?= $select_user_assoc['user_dlt']==0 ? 'info':'danger'; ?>"><i class="fa fa-cog"></i> <?php if ($select_user_assoc['user_dlt']==0) {
                                                            echo "Active";
                                                        }else{
                                                            echo "Deactive";
                                                        } ?></span>
                                                    <?php if ($select_user_assoc['user_reje']==0) { ?>
                                                        <span class="badge badge-success"><i class="fa fa-user-tie"></i> Accepted</span>
                                                   <?php  }else { ?>
                                                    <span class="badge badge-danger" ><i class="fa fa-user-slash"></i> Rejected</span>
                                                   <?php } ?>
                                                    
                                                    
                                                </div>
                                                
                                            </div>
                                            <!--/row-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 order-lg-1 text-center">
                                    <h4>Profile Picture</h4>
                                    <img src="uploads/admin-users/<?php echo $select_user_assoc['user_picture'];  ?>" class="mx-auto img-fluid img-circle d-block " alt="avatar">
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end content -->
                    </div>
                </main>






<?php include 'copy-right.php'; include 'footer.php'; ?>