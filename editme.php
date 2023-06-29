<?php 
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_teacher"])){
	include"connect.php";
	
	$t_id = $_POST['t_id'];
	$t_name = $_POST['t_name'];
	$t_address = $_POST['t_address'];
	$t_tel = $_POST['t_tel'];
	$t_username = $_POST['t_username'];
	$t_password = $_POST['t_password'];
	$t_pic = $_POST['t_pic'];
	$d_id = $_POST['d_id'];
	$po_id = $_POST['po_id'];
	
	$fileupload = $_FILES['photo']['tmp_name'];
	$fileupload_name = $_FILES['photo']['name'];
	
	if($fileupload != "") {
		if($t_pic != ""){
			unlink("./picture/$t_pic");
			}
		copy($fileupload,"./picture/".$fileupload_name);
		$sql = "UPDATE teacher SET t_name = '$t_name', t_address = '$t_address', t_tel = '$t_tel', t_password = '$t_password', d_id = '$d_id', po_id = '$po_id', t_pic = '$fileupload_name' WHERE t_id = '$t_id'";
		}
	else{
		$sql = "UPDATE teacher SET t_name = '$t_name', t_address = '$t_address', t_tel = '$t_tel', t_password = '$t_password', d_id = '$d_id', po_id = '$po_id' WHERE t_id = '$t_id'";
			}
			mysqli_query($conn,$sql)
				or die ("Can't query sql");
				
			mysqli_close($conn);
?>
			<script language="javascript">
			alert('แก้ไขข้อมูลเรียบร้อย');
            window.location = 'frm_editme.php';
            </script>

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