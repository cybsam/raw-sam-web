<?php
session_start();

require_once('database/dbCon.php');


//active users
//undo
if (isset($_GET['user-undo'])) {
    $undo_id = $_GET['user-undo'];

    $user_undo = "UPDATE users_admin SET user_dlt=0 WHERE admin_id='$undo_id'";
    $user_undo_que = mysqli_query($db_con,$user_undo);

    $_SESSION['user_undo'] = 'User Undo Complete, Check.';
    header('location:users.trash.php');
}
//permanent delete
if (isset($_GET['user-del'])) {
    $dlt_id = $_GET['user-del'];

    $img_del = "SELECT * FROM users_admin WHERE admin_id='$dlt_id'";
    $img_del_que = mysqli_query($db_con,$img_del);
    $img_del_assoc = mysqli_fetch_assoc($img_del_que);
    $del_from = "uploads/admin-users/".$img_del_assoc['user_picture'];
    unlink($del_from);

    $delete_user = "DELETE FROM users_admin WHERE admin_id='$dlt_id'";
    $delete_user_que = mysqli_query($db_con,$delete_user);

    $_SESSION['user_delete'] = 'User Delete Complete';
    header('location:users.trash.php');
}



//it's reject page start

//new register users
//undo reject user
if (isset($_GET['reje-undo'])) {
    $reg_und_id = $_GET['reje-undo'];
    $reg_und = "UPDATE users_admin SET user_reje=0,user_dlt=0 WHERE admin_id='$reg_und_id'";
    $reg_und_que = mysqli_query($db_con,$reg_und);

    $_SESSION['update_user'] = "<span style='color:green;'>Rejected user is now freedom. check request user page. </span>";
    header('location:users.reject.php?user-undo='.$reg_und_id);
}
//delete

if (isset($_GET['reje-per'])) {
    $rej_del_id = $_GET['reje-per'];
    $re_del = "DELETE FROM users_admin WHERE admin_id='$rej_del_id'";
    $re_del_que = mysqli_query($db_con,$re_del);
    $_SESSION['update_user'] = "<span style='color:red;'>Rejected user is permantly Remove.</span>";
    header('location:users.reject.php?user-remove='.$rej_del_id);
}




?>