<?php
session_start();
require_once('../database/dbCon.php');

$user_id = $_SESSION['admin_id'];
$user_db = "SELECT * FROM users_admin WHERE admin_id='$user_id'";
$user_db_que = mysqli_query($db_con,$user_db);
$user_db_assoc = mysqli_fetch_assoc($user_db_que);
$user_name = $user_db_assoc['user_name'];

// category active :)
if (isset($_GET['active'])) {
    $active_id = $_GET['active'];
    $active_db = "UPDATE site_category SET cate_status = 0 WHERE cate_id='$active_id'";
    $active__db_que = mysqli_query($db_con,$active_db);
    header('location:../category.page.php?status=active');
}

//category disable :)

if (isset($_GET['deactive'])) {
    $deactive_id = $_GET['deactive'];
    $deactive_db = "UPDATE site_category SET cate_status = 1 WHERE cate_id='$deactive_id'";
    $deactive_db_que = mysqli_query($db_con,$deactive_db);
    header('location:../category.page.php?status=deactive');
}

//soft delete

if (isset($_GET['sof_delete'])) {
    $soft_id = $_GET['sof_delete'];
    // $user_name = $user_name;
    $soft_delete = "UPDATE site_category SET cate_status = 2, del_uer_nem='$user_name' WHERE cate_id = '$soft_id'";
    $soft_delete_que = mysqli_query($db_con,$soft_delete);
    $_SESSION['soft_del'] = 'category delete complete';
    header('location:../category.page.php?delete=success');
}

// category undo

if (isset($_GET['undo'])) {
    $undo_id = $_GET['undo'];
    $undo_db = "UPDATE site_category SET cate_status = 0 WHERE cate_id='$undo_id'";
    $undo_db_que = mysqli_query($db_con,$undo_db);
    $_SESSION['cate_data'] = "<strong style='color:green;'>category is now live, enjoy!</strong>";
    header('location:../category.trash.php?category-undo=success');
}

//category delete

if (isset($_GET['delete'])) {
    $per_del_id = $_GET['delete'];
    $per_del = "DELETE FROM site_category WHERE cate_id='$per_del_id'";
    $per_del_que = mysqli_query($db_con,$per_del);
    $_SESSION['cate_data'] = "<strong style='color:red;'>um, category delete successfully!</strong>";
    header('location:../category.trash.php?category-undo=success');
}


?>