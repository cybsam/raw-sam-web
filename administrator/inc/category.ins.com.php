<?php
session_start();

require_once('../database/dbCon.php');


if (isset($_POST['submit'])) {
    $cate_name = $_POST['cate_name'];
    $usr_nem = $_POST['user_name'];
    
    $user_id = $_SESSION['admin_id'];
    $db_admin = "SELECT * FROM users_admin WHERE admin_id='$user_id'";
    $db_admin_que = mysqli_query($db_con,$db_admin);
    $db_admin_assoc = mysqli_fetch_assoc($db_admin_que);
    $user_name = $db_admin_assoc['user_name'];

    date_default_timezone_set('Asia/Dhaka');
    $ins_date = date('Y-m-d H:i:s A');

    
    

    if (empty($cate_name)) {
        $_SESSION['nem_err'] = 'oh category name require.';
        header('location:../category.new.php?cate_err='.$cate_name);
    }elseif($user_name != $usr_nem){
        $_SESSION['usr_nem'] = "<script>alert('i just got your User name and Email, so wait');</script>";
        header('location:../category.new.php?auth-error');
    }else {
        $chk_category = "SELECT COUNT(*) AS cate_dup FROM site_category WHERE category_name='$cate_name'";
        $chk_category_que = mysqli_query($db_con,$chk_category);
        $chk_category_assoc = mysqli_fetch_assoc($chk_category_que);

        if ($chk_category_assoc['cate_dup']==1) {
            $_SESSION['nem_err'] = 'oh category name already taken.';
            header('location:../category.new.php?cate_err='.$cate_name);
        }else {
            $ins = "INSERT INTO site_category(category_name,ins_usr_nem,ins_usr_id,insert_time)VALUES('$cate_name','$usr_nem','$user_id','$ins_date')";
            $ins_que = mysqli_query($db_con,$ins);

            $_SESSION['insert_com'] = "Category Insert Complete";
            header('location:../category.new.php?ins-com');
        }
    }
}



?>