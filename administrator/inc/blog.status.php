<?php
session_start();
require_once('../database/dbCon.php');

if (isset($_GET['blog-id'])) {
    $blog_id = $_GET['blog-id'];
    $sh_blog = "UPDATE site_blog SET post_status=1 WHERE blog_id='$blog_id'";
    $sh_blog_que = mysqli_query($db_con,$sh_blog);
    $_SESSION['blog_st'] = "<span style='color:red;'>Delete Complete</span>";
    header('location:../blog.page.php?blog-post-update=complete');
}

?>

