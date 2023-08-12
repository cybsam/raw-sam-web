<?php
session_start();
require_once('../database/dbCon.php');

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $confirm_password = $_POST['confirm_password'];
    $user_gender = $_POST['gender'];
    // echo $user_gender;
    
    
    
    if (empty($user_name)) {
        $_SESSION['user_name_error'] = "come on, you have a name, don't you?";
        header('location:../signup.php?user-name=error');
    }elseif (empty($user_email)) {
        $_SESSION['user_email_error'] = "no email, no register.";
        header('location:../signup.php?user-email=error');
    }elseif (!filter_var($user_email,FILTER_VALIDATE_EMAIL)) {
        $_SESSION['user_email_error'] = "oh please type valid email";
        header('location:../signup.php?user-email=error');
    }elseif (empty($user_password)) {
        $_SESSION['user_password_error'] = 'come on, password is very impotant.';
        header('location:../signup.php?user-password=error');
    }elseif (strlen($user_password) < 8) {
        $_SESSION['user_password_error'] = 'come on, security is very important 8 cherecter password required.';
        header('location:../signup.php?user-password=error');
    }elseif(empty($confirm_password)){
        $_SESSION['confirm_password_error'] = 'oh, confirm password require.';
        header('location:../signup.php?user-password=error');
    }elseif ($user_password != $confirm_password) {
        $_SESSION['confirm_password_error'] = 'oh, confirm password not match.';
        header('location:../signup.php?user-password=error');
    }elseif (empty($user_gender)) {
        $_SESSION['gender_error'] = 'This fild is must require.';
        header('location:../signup.php?user-gender=error');
    }else {
        
        $user_picture = $_FILES['user_picture'];
        if(empty($user_picture['name'])){
            $_SESSION['picture_error'] = 'umm, picture not select.';
            header('location:../signup.php?user-picture=error');
        }else{
        $after_explode = explode('.',$user_picture['name']);
        $pic_extension = end($after_explode);
        $allow_extension = array('jpg','png','jpeg','ico','gif');
        if (in_array($pic_extension,$allow_extension)) {
            if ($user_picture['size'] <= 200000) {
                $chk_user = "SELECT COUNT(*) AS user_dup FROM users_admin WHERE user_name='$user_name'";
                $chk_user_que = mysqli_query($db_con,$chk_user);
                $chk_user_assoc = mysqli_fetch_assoc($chk_user_que);

                if ($chk_user_assoc['user_dup']==1) {
                    $_SESSION['user_name_error'] = 'oh no User name alrady taken.';
                    header('location:../signup.php?user_name='.$user_name);
                }else {
                    $chk_email = "SELECT COUNT(*) AS email_dup FROM users_admin WHERE user_email='$user_email'";
                    $chk_email_que = mysqli_query($db_con,$chk_email);
                    $chk_email_assoc = mysqli_fetch_assoc($chk_email_que);
                    if ($chk_email_assoc['email_dup']==1) {
                        $_SESSION['user_email_error'] = 'Oh no Email adress already register, try another email.';
                        header('location:../signup.php?user_email='.$user_email);
                    }else {
                        date_default_timezone_set('Asia/Dhaka');
                        $datetime = date("Y-m-d H:i:s A");
                        $pass_hash = password_hash($user_password,PASSWORD_DEFAULT);
                        $ins_user = "INSERT INTO users_admin(user_name,user_email,user_password,user_gender,insert_at) VALUES('$user_name','$user_email','$pass_hash','$user_gender','$datetime')";
                        $ins_user_que = mysqli_query($db_con,$ins_user);

                        $last_id = mysqli_insert_id($db_con);
                        $file_name = $user_name.'.'.$pic_extension;
                        $new_location = '../uploads/admin-users/'.$file_name;
                        move_uploaded_file($user_picture['tmp_name'],$new_location);

                        $ins_pic = "UPDATE users_admin SET user_picture='$file_name' WHERE admin_id='$last_id'";
                        $ins_pic_que = mysqli_query($db_con,$ins_pic);

                        $_SESSION['new_user_add_complete'] = 'Sign up succesfully, & wait our confirmation. click ';
                        header('location:../signup.php?user-signup=complete');

                    }
                }
            }else {
                $_SESSION['picture_error'] = 'Picture size is too learge.';
                header('location:../signup.php?user-picture=error');
            }
        }else {
            $_SESSION['picture_error'] = 'Picture Extension Not Support';
            header('location:../signup.php?user-picture=error');
        }
    }
    }

//data back
    // if (!empty($_SESSION['error'])) {
    //     $_SESSION['register_form'] = $_POST;
    //     // print_r($_SESSION['register_form']);
    //     header('location:../signup.php');
    // }
    
}



?>