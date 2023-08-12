<?php
session_start();
require_once('../database/dbCon.php');

if (isset($_POST['submit'])) {
    $admin_id = $_POST['admin_id'];
    $user_name = $_POST['user_name'];
    $user_status = $_POST['user_status'];
    date_default_timezone_set('Asia/Dhaka');
    $date = date('Y-m-d H:i:s A');

    if (empty($user_status)) {
        $_SESSION['user_status_error'] = 'Please Select User type';
        header('location:../users.new.con.php?new-user='.$admin_id);
    }else {
        $update_user = "UPDATE users_admin SET user_status='$user_status',update_at='$date' WHERE admin_id='$admin_id'";
        $update_user_que = mysqli_query($db_con,$update_user);

        $_SESSION['user_update_com'] = "New User <span style='color:green;'>".$user_name ."</span> add succesfully";
        header('location:../users.new.php?accept_user='.$user_name);

        //mail function going hear
        
    }
}

if (isset($_POST['reject'])) {
    $user_id = $_POST['admin_id'];
    $usr_nam = $_POST['user_name'];

    $reject_user = "UPDATE users_admin SET user_reje = 1, user_dlt=3 WHERE admin_id='$user_id'";
    $reject_user_que = mysqli_query($db_con,$reject_user);
    $_SESSION['user_reject'] = "Requested user <span style='color:black;'>".$usr_nam."</span> Reject Successfully.";
    header('location:../users.new.php?reject_user='.$usr_nam);
}

?>