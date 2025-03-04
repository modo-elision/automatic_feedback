<?php
if(session_status()==PHP_SESSION_NONE) {
	session_start();
}
error_reporting(E_ERROR);
if(!empty($_GET)){
	if($_GET['a_j']){
		$job_id=$_GET['a_j'];
		require_once 'control/main_control.php';
		$control=new Index();

		if(!empty($_SESSION)){
			if($_SESSION["User_id"]!=NULL){
				$control->apply_job($job_id);
				echo "1";
			}
			else
			{
				//$control->redirect("sign-in.php");
				echo "2";
			}
		}
		else{
			echo "0";
		}	
	}
	if($_GET['res_email']){
		$res_email=$_GET['res_email'];
		require_once 'control/main_control.php';
		$control=new Index();
		if(!empty($_SESSION)){
			if($_SESSION['type']=='admin'){
				$control->send_email_responce();
			}
		}
	}
}
if(!empty($_SESSION))
if($_SESSION['User_id']!=NULL)
{
$allowed_file_types = ["application/pdf"];
$allowed_size_mb = 4; 

// validate upload error
switch($_FILES['file']['error']) {
	// no error
	case UPLOAD_ERR_OK:
		break;

	// no file
	case UPLOAD_ERR_NO_FILE:
		exit('Error : No file send as attachment');

	// php.ini file size exceeded 
	case UPLOAD_ERR_INI_SIZE:
		exit('Error : File size exceeded as set in php.ini');

	// other upload error
	default:
        exit('Error : File upload failed');
}

// validate file type from file data
$finfo = finfo_open();
$file_type = finfo_buffer($finfo, file_get_contents($_FILES['file']['tmp_name']), FILEINFO_MIME_TYPE);
if(!in_array($file_type, $allowed_file_types))
	exit('Error : Incorrect file type');

// validate file size
$file_size = $_FILES['file']['size'];
if($file_size > $allowed_size_mb*1024*1024)
	exit('Error : Exceeded size');

// safe unique name from file data
$file_unique_name = sha1_file($_FILES['file']['tmp_name']);
$file_extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
$file_name = $file_unique_name . '.' . $file_extension;

$destination = 'uploads/' . $file_name;

// save file to destination
if(move_uploaded_file($_FILES['file']['tmp_name'], $destination) === TRUE){
	echo 'File uploaded successfully';
	require_once 'control/main_control.php';
	$control=new Index();
	$control->upload_cv_data($destination);
}
else{
	echo 'Error: Uploaded file failed to be saved';
}


}
?>