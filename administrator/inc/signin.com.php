<?php
session_start();
require_once('../database/dbCon.php');

if (isset($_POST['signin'])) {
    $user_info = $_POST['user_info'];
    $user_password = $_POST['user_password'];

    if (empty($user_info)) {
        $_SESSION['user_info_error'] = "oh, you haven't user name or email. ";
        header('location:../signin.php?user-info=error');
    }elseif (empty($user_password)) {
        $_SESSION['user_password_error'] = 'oh shit, password fild is very important';
        header('location:../signin.php?user-password=error');
    }else {
        $chk_user_name = "SELECT COUNT(*) AS name_check,admin_id,user_name,user_status,user_dlt FROM users_admin WHERE user_name='$user_info'";
        $chk_user_name_que = mysqli_query($db_con,$chk_user_name);
        $chk_user_name_assoc = mysqli_fetch_assoc($chk_user_name_que);


        $chk_user_email = "SELECT COUNT(*) AS email_check,admin_id,user_email,user_status,user_dlt FROM users_admin WHERE user_email='$user_info'";
        $chk_user_email_que = mysqli_query($db_con,$chk_user_email);
        $chk_user_email_assoc = mysqli_fetch_assoc($chk_user_email_que);

        if ($chk_user_name_assoc['name_check']==1) {
            $sel_user_name = "SELECT * FROM users_admin WHERE user_name='$user_info'";
            $sel_user_name_que = mysqli_query($db_con,$sel_user_name);
            $sel_user_name_assoc = mysqli_fetch_assoc($sel_user_name_que);
            if ($chk_user_name_assoc['user_status']==0) {
                $_SESSION['user_info_error'] = "your account not active, wait sometime. or contact <a href='mailto:users@sam-web.tk'>Administrator</a>.";
                header('location:../signin.php?user-info=error');
            }else{
                if ($chk_user_name_assoc['user_dlt']==0) {
                    if (password_verify($user_password,$sel_user_name_assoc['user_password'])) {
                        $_SESSION['admin_auth'] = 'wellcome boss.';
                        $_SESSION['admin_id'] = $sel_user_name_assoc['admin_id'];
                        $_SESSION['user_info'] = $sel_user_name_assoc['user_name'];
                        $_SESSION['user_status'] = $sel_user_name_assoc['user_status'];
                        header('location:../index.php?user-name=login');
                    }else {
                        $_SESSION['user_password_error'] = 'lol, password not match, try to correct password';
                        header('location:../signin.php?user_pass='.$user_info);
                    }
                }else {
                    $_SESSION['user_info_error'] = "your account is currently <strong>Disable</strong>, contact <a href='mailto:users@sam-web.tk'>Administrator</a>.";
                    header('location:../signin.php?user-info=error');
                }
                

            }
            
        }elseif ($chk_user_email_assoc['email_check']==1) {
            $sel_user_email = "SELECT * FROM users_admin WHERE user_email='$user_info'";
            $sel_user_email_que = mysqli_query($db_con,$sel_user_email);
            $sel_user_email_assoc = mysqli_fetch_assoc($sel_user_email_que);
            if ($chk_user_email_assoc['user_status']==0) {
                $_SESSION['user_info_error'] = "your account not active, wait sometimes. or contact <a href='mailto:users@sam-web.tk'>Administrator</a> .";
                header('location:../signin.php?user-info=error');
            }else {
                if ($chk_user_email_assoc['user_dlt']==0) {
                    if (password_verify($user_password,$sel_user_email_assoc['user_password'])) {
                        $_SESSION['admin_auth'] = 'wellcome boss.';
                        $_SESSION['admin_id'] = $sel_user_email_assoc['admin_id'];
                        $_SESSION['user_info'] = $sel_user_email_assoc['user_email'];
                        $_SESSION['user_status'] = $sel_user_email_assoc['user_status'];
                        header('location:../index.php?user-email=login');
                    }else {
                        $_SESSION['user_password_error'] = 'lol, password not match, try to correct password';
                        header('location:../signin.php?user-password=error');
                    }
                }else {
                    $_SESSION['user_info_error'] = "your account is currently <strong>Disable</strong>, contact <a href='mailto:users@sam-web.tk'>Administrator</a>.";
                    header('location:../signin.php?user-info=error');
                }
                
            }
            
        }else {
            $_SESSION['user_info_error'] = "oops, user-name / email not match in our system. try again or return back and <a href='signup.php'>Signup</a>";
            header('location:../signin.php?user-info=error');
        }
    }
}


?>