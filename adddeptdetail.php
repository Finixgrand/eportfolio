<?php 
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
	$d_id = $_POST['d_id'];
	$t_id = $_POST['t_id'];
	
	$sql = "UPDATE department SET t_id = '$t_id' WHERE d_id = '$d_id'";
	mysqli_query($conn,$sql)
		or die("Can't query sql");
		
	mysqli_close($conn);
	echo"<script language=\"javascript\">";
	echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	echo"window.location = 'showdept.php';";
	echo"</script>";
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
<?php
}
else{
	echo"<script> alert('Please Login'); window.location='frm_login.php';</script>";
	exit();
	}
?>