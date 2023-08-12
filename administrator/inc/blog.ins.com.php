<?php
session_start();
require_once('../database/dbCon.php');
$user_id = $_SESSION['admin_id'];
$user_db = "SELECT * FROM users_admin WHERE admin_id='$user_id'";
$user_db_que = mysqli_query($db_con,$user_db);
$user_db_assoc = mysqli_fetch_assoc($user_db_que);
$current_user = $user_db_assoc['user_name'];
$current_user_email = $user_db_assoc['user_email'];

$blog=1;
$article=2;

if (isset($_POST['submit'])) {
    $post_name = $_POST['post_name'];
    $short_text = $_POST['short_text'];
    $post_keyword = $_POST['post_keyword'];
    $post_category = $_POST['post_category'];
    $post_desp = $_POST['post_description'];

    $post_option = $_POST['content_desp'];
    //author
    $user_name = $_POST['post_author'];
    $user_email = $_POST['post_author_email'];
    //picture
    // $post_picture = $_FILES['post_picture'];
    
    if (empty($post_name)) {
        $_SESSION['post_name_err'] = 'umm, what is your post title!.';
        header('location:../blog.new.php?post-name=require');
    }elseif(empty($short_text)){
        $_SESSION['short_text_err'] = 'Short Text Require.';
        header('location:../blog.new.php?post-short=require');
    }elseif (empty($post_keyword)) {
        $_SESSION['post_keyword_err'] = 'oh, post keyword must be require..';
        header('location:../blog.new.php?post-keyword=require');
    }elseif (empty($post_category)) {
        $_SESSION['post_category_err'] = 'what is your post category';
        header('location:../blog.new.php?post-category=require');
    }elseif (empty($post_desp)) {
        $_SESSION['post_description_err'] = 'lol, this fild is must require, otherwise where is your content.';
        header('location:../blog.new.php?post-description=require');
    }elseif ($user_name != $current_user) {
        $_SESSION['user_err'] = "<script>alert('lol, you change your user name 1 more time then your device will hacke. this is our fast and last warning');</script>";
        header('location:../blog.new.php?post-user=require');
    }elseif ($user_email != $current_user_email) {
        $_SESSION['email_err'] = "<script>alert('lol, you change your email address 1 more time then your device will hacke. this is our fast and last warning');</script>";
        header('location:../blog.new.php?post-email=require');
    }
    else {
        $category_db = "SELECT * FROM site_category WHERE cate_id='$post_category'";
        $category_db_que = mysqli_query($db_con,$category_db);
        $category_db_assoc = mysqli_fetch_assoc($category_db_que);
        $category_name = $category_db_assoc['category_name'];
        
        date_default_timezone_set('Asia/Dhaka');
        $current_date = date('Y-m-d H:i:s A');
        $date_archive = date('Y-M');


        if ($post_option == $blog) {
            
            $picture = $_FILES['post_picture'];
            if (!empty($picture['name'])) {
                $after_explode = explode('.',$picture['name']);
                $extension = end($after_explode);
                $allow_extension = array('jpg','jpeg','png','gif','ico');
                if (in_array($extension,$allow_extension)) {
                    if ($picture['size'] <= 200000) {
                        $blog_ins = "INSERT INTO site_blog(post_name,post_short_text,post_keyword,post_category_name,post_category_id,post_description,post_author,post_author_id,post_archives,post_insert) VALUES('$post_name','$short_text','$post_keyword','$category_name','$post_category','$post_desp','$current_user','$user_id','$date_archive','$current_date')";
                        $blog_ins_que = mysqli_query($db_con,$blog_ins);

                        $last_id = mysqli_insert_id($db_con);
                        $pic_name = $last_id.'-blog.'.$extension;
                        $location = "../../images/blog/".$pic_name;
                        move_uploaded_file($picture['tmp_name'],$location);

                        $pic_db = "UPDATE site_blog SET post_picture='$pic_name',post_identity=1 WHERE blog_id='$last_id'";
                        $pic_db_que = mysqli_query($db_con,$pic_db);
                        $_SESSION['post_insert'] = "<script>alert('post insert succesfully have fun :)');</script>";
                        header('location:../blog.new.php?insert=success');
                    }else {
                        $_SESSION['pic_err'] = 'oh This file too learge.';
                        header('location:../blog.new.php?post-picture=require');
                    }
                }else {
                    $_SESSION['pic_err'] = 'oh This file not support.';
                    header('location:../blog.new.php?post-picture=require');
                }
            }else {
                $_SESSION['pic_err'] = 'oh picture file is must important';
                header('location:../blog.new.php?post-picture=require');
            }
            

        }elseif($post_option == $article){
            $picture1 = $_FILES['post_picture'];
            if (!empty($picture1['name'])) {
                $after_explode1 = explode('.',$picture1['name']);
                $extension1 = end($after_explode1);
                $allow_extension1 = array('jpg','jpeg','png','gif','ico');
                if (in_array($extension1,$allow_extension1)) {
                    if ($picture1['size'] <= 200000) {
                        $blog_ins1 = "INSERT INTO site_blog(post_name,post_short_text,post_keyword,post_category_name,post_category_id,post_description,post_author,post_author_id,post_archives,post_insert) VALUES('$post_name','$short_text','$post_keyword','$category_name','$post_category','$post_desp','$current_user','$user_id','$date_archive','$current_date')";
                        $blog_ins_que1 = mysqli_query($db_con,$blog_ins1);

                        $last_id1 = mysqli_insert_id($db_con);
                        $pic_name1 = $last_id1.'-article.'.$extension1;
                        $location1 = "../../images/blog/".$pic_name1;
                        move_uploaded_file($picture1['tmp_name'],$location1);

                        $pic_db1 = "UPDATE site_blog SET post_picture='$pic_name1',post_identity=2 WHERE blog_id='$last_id1'";
                        $pic_db_que1 = mysqli_query($db_con,$pic_db1);
                        $_SESSION['post_insert'] = "<script>alert('post insert succesfully have fun :)');</script>";
                        header('location:../blog.new.php?insert=success');
                    }else {
                        $_SESSION['pic_err'] = 'oh This file too learge.';
                        header('location:../blog.new.php?post-picture=require');
                    }
                }else {
                    $_SESSION['pic_err'] = 'oh This file not support.';
                    header('location:../blog.new.php?post-picture=require');
                }
            }else {
                $_SESSION['pic_err'] = 'oh picture file is must important';
                header('location:../blog.new.php?post-picture=require');
            }
        }else {
            $_SESSION['post_insert'] = "<script>alert('something went wrong!');</script>";
            header('location:../blog.new.php?not');
        }
    }
}


?>