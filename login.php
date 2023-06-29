<?php
ob_start();
include"connect.php";
	
$login = $_POST['login'];
$passwd = $_POST['passwd'];
$user_status = $_POST['user_status'];
	
if(!empty($login) && !empty ($passwd)){
	if($user_status == '1'){
		$sql = "SELECT * FROM teacher WHERE (t_username = '$login' and t_password = '$passwd')";
		$result = mysqli_query($conn, $sql);
		$total = mysqli_num_rows($result);
		
		if($total > 0){
			session_start();
			$_SESSION["valid_uname"] = $login;
			$_SESSION["valid_pwd"] = $passwd;
			$_SESSION["valid_teacher"] = $user_status;
			mysqli_close($conn);
			echo "<script> alert('Welcome User'); window.location='frm_editme.php';</script>";
			exit();
			}
		else {
			echo "<script> alert('Not found this User'); window.history.go(-1);</script>";
			exit();
			}
		}
	else{
		//ส่วนของ Admin
		if ($login == "Admin" && $passwd == "Admin"){
			session_start();
			$_SESSION["valid_uname"] = $login;
			$_SESSION["valid_pwd"] = $passwd;
			$_SESSION["valid_admin"] = $user_status;
			mysqli_close($conn);
			echo "<script> alert('Welcome Admin'); window.location='showdept.php';</script>";
			exit();
			}
		else{
			echo "<script> alert('Not found this Admin'); window.history.go(-1);</script>";
			exit();
			}
		}
	}
else{
	echo"<script> alert('ขออภัย...!! กรุณากรอกข้อมูลใหม่ให้ครบ'); window.history.go(-1);</script>";
	exit();
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>