<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
   $t_id = $_POST['t_id'];
   $t_pic = $_POST['t_pic'];

        if($t_pic != ""){
		unlink("./picture/$t_pic");
		$sql = "DELETE FROM teacher WHERE t_id = '$t_id'";
		$sql1 = "UPDATE department SET t_id = 0 WHERE t_id = '$t_id'";
        }
		else{
			$sql = "DELETE FROM teacher WHERE t_id = '$t_id'";
			$sql1 = "UPDATE department SET t_id = 0 WHERE t_id = '$t_id'";
			}
		
   mysqli_query($conn,$sql)
      or die("Can't query sql");
	  
	mysqli_query($conn,$sql1)
      or die("Can't query sql");
	  
   mysqli_close($conn);
?>
	<script language="javascript">
	alert('ลบข้อมูลเรียบร้อย');
	window.location = 'showteacher.php';
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