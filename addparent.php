<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
	$pa_id = $_POST['pa_id'];
	$pa_name = $_POST['pa_name'];	
	$pa_occupation = $_POST['pa_occupation'];
	$pa_tel = $_POST['pa_tel'];
	
	if ($pa_id != "" && $pa_name != "" && $pa_occupation != "" && $pa_tel != "" ) {
		$sql = "SELECT pa_id FROM parent WHERE pa_id = '$pa_id'";
		$result = mysqli_query($conn,$sql);
		$total = mysqli_num_rows($result);
		
		if ($total == 0) {
			$sql = "INSERT INTO parent (pa_id, pa_name, pa_occupation, pa_tel) VALUES ('$pa_id', '$pa_name', '$pa_occupation', '$pa_tel')";
			mysqli_query($conn,$sql)
	 			or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error($conn);
			mysqli_close($conn);
			echo "<script language=\"javascript\">";
			echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
			echo "window.location = 'showparent.php';";
			echo "</script>";
			}
		else {
			echo "<script language=\"javascript\">";
			echo "alert('เลขบัตรประชาชนซ้ำ');";
			echo "window.history.back();";
			echo "</script>";
			}
		}
	else {
		echo "<script language=\"javascript\">";
		echo "alert('กรุณาป้อนข้อมูลให้ครบ');";
		echo "window.history.back();";
		echo "</script>";
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
<?php
}
else{
	echo"<script> alert('Please Login'); window.location='frm_login.php';</script>";
	exit();
	}
?>