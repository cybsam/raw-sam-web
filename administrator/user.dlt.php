<?php
session_start();

require_once('database/dbCon.php');

if (isset($_GET['delete-user'])) {
    $user_id = $_GET['delete-user'];

    $soft_delete = "UPDATE users_admin SET user_dlt=1 WHERE admin_id='$user_id'";
    $soft_delete_que = mysqli_query($db_con,$soft_delete);

    $_SESSION['user_dlt'] = 'User Move in trash.';
    header('location:users.all.php');
}


?>