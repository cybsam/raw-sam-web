<?php

$site_info = "SELECT * FROM site_information";
$site_info_que = mysqli_query($db_con,$site_info);
$info = mysqli_fetch_assoc($site_info_que);


date_default_timezone_set('Asia/Dhaka');

$cop_year = date('Y');


?>