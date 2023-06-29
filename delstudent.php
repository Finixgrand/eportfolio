<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
   
   $std_id = $_POST['std_id'];
   $std_pic = $_POST['std_pic'];
   
        if($std_pic != ""){
		unlink("./picture/$std_pic");
		$sql = "DELETE FROM student WHERE std_id = '$std_id'";
        }
		else{
			$sql = "DELETE FROM student WHERE std_id = '$std_id'";
			}
		
   mysqli_query($conn,$sql)
      or die("Can't query sql");  
   mysqli_close($conn);
?>
	<script language="javascript">
	alert('ลบข้อมูลเรียบร้อย');
	window.location = 'showstudent.php';
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