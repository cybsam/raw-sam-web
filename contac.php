<?php
require_once('administrator/database/dbCon.php');

if (isset($_POST['submit'])) {
	$name = $_POST['your_name'];
	$email = $_POST['your_email'];
	$subject = $_POST['your_subject'];
	$message = $_POST['your_message'];

	if (empty($name)) {
		$_SESSION['nem_err'] = "you don't have any name?";
		header('location:contact.php?#contact');
	}elseif(empty($email)){
		$_SESSION['eml_err'] = "no email no message";
		header('location:contact.php?#contact');
	}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['eml_err'] = "Validate email require";
		header('location:contact.php?#contact');
	}elseif (empty($subject)) {
		$_SESSION['sub_err'] = "oops subject require";
		header('location:contact.php?#contact');
	}elseif (empty($message)) {
		$_SESSION['msg_err'] = "oh no, where is your opinion";
		header('location:contact.php?#contact');
	}else{
		date_default_timezone_set('Asia/Dhaka');
		$ins_time = date('Y-m-d H:i:s A');
		$ins_msg = "INSERT INTO message_contact(usr_name,usr_email,msg_subject,msg_desp,insert_at) VALUES('$name','$email','$subject','$message','$ins_time')";
		$ins_msg_que = mysqli_query($db_con,$ins_msg);

		$_SESSION['ins_com'] = "Message Sent succesfully";
		header('location:contact.php?#contact');
	}
}

?>