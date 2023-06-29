<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
   $po_id = $_POST['po_id'];
   $po_name = $_POST['po_name'];
   
   	if ($po_name != "") {
		$sql = "SELECT po_name FROM position WHERE po_name = '$po_name'";
		$result = mysqli_query($conn,$sql);
		$total = mysqli_num_rows($result);
		
			if ($total == 0) {
			$sql = "UPDATE position SET po_name = '$po_name' WHERE po_id = '$po_id'";
			mysqli_query($conn,$sql)
				or die("Can't query sql");
			
			mysqli_close($conn);
			echo "<script language=\"javascript\">";
			echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
			echo "window.location = 'showposition.php';";
			echo "</script>";
			}
		else {
			echo "<script language=\"javascript\">";
			echo "alert('ชื่อตำแหน่งซ้ำ');";
			echo "window.history.back();";
			echo "</script>";
			}
		}
	else {
		echo "<script language=\"javascript\">";
		echo "alert('กรุณาป้อนตำแหน่ง');";
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