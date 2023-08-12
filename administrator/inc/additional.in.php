<?php
session_start();
require_once('../database/dbCon.php');
if (isset($_POST['submit'])) {
    $new_title = $_POST['new_title'];
    $new_footer = $_POST['new_footer'];
    $link = 'https://';
    $new_footer_link = $_POST['new_footer_link'];
    

    if (empty($new_title)) {
        $_SESSION['title'] = 'title fild require.';
        header('location:../additional.view.php?title='.$new_title);
    }elseif (empty($new_footer)) {
        $_SESSION['footer'] = 'footer fild require.';
        header('location:../additional.view.php?title='.$new_title);
    }elseif (empty($new_footer_link)) {
        $_SESSION['f_link'] = 'footer link fild require.';
        header('location:../additional.view.php?footer='.$new_footer.'&title='.$new_title);
    }else {
        $icon = $_FILES['new_icon'];
        if (empty($icon['name'])) {
            $_SESSION['icon'] = 'ummm, where is your icon.';
            header('location:../additional.view.php?title='.$new_title.'&footer='.$new_footer.'&footer_link='.$new_footer_link);
        }else {
            $new_link = $link.$new_footer_link;
            $explode = explode('.',$icon['name']);
            $extension = end($explode);
            $allow_extension = array('jpg','ico','png','jpeg');
            if (in_array($extension,$allow_extension)) {
                if ($icon['size'] <= 200000) {
                    $sel_db = "SELECT * FROM site_information";
                    $sel_db_que = mysqli_query($db_con,$sel_db);
                    $sel_db_assoc = mysqli_fetch_assoc($sel_db_que);
                    $del_from = "../../images/logo/".$sel_db_assoc['site_icon'];
                    unlink($del_from);

                    $update_db = "UPDATE site_information SET site_title='$new_title',site_copyright='$new_footer',site_copyright_link='$new_link' WHERE info_id=1";
                    $update_db_que = mysqli_query($db_con,$update_db);

                    $new_name = 'logo.'.$extension;
                    $location = "../../images/logo/".$new_name;

                    move_uploaded_file($icon['tmp_name'],$location);

                    $update_icon = "UPDATE site_information SET site_icon='$new_name' WHERE info_id=1";
                    $update_icon_que = mysqli_query($db_con,$update_icon);

                    $_SESSION['update_con'] = 'ye hoo, update complete';
                    header('location:../additional.view.php');
                    
                }else {
                    $_SESSION['icon'] = 'picture size is too learge';
                    header('location:../additional.view.php?title='.$new_title.'&footer='.$new_footer.'&footer_link='.$new_footer_link);
                }
            }else{
                $_SESSION['icon'] = 'this file is not support in our system';
                header('location:../additional.view.php?title='.$new_title.'&footer='.$new_footer.'&footer_link='.$new_footer_link);
            }
        }
        
    }
 
}




?>