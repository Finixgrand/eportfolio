<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
		
	$w_id = $_POST['w_id'];
	$t_id = $_POST['t_id'];

        $sql = "INSERT INTO work_detail (w_id,t_id) VALUES ('$w_id','$t_id')";

        mysqli_query($conn, $sql)
    	or die("0000") . mysqli_error($conn);
    mysqli_close($conn);

?>
		<script language="javascript">
		alert('บันทึกข้อมูลเรียบร้อยแล้ว');
		window.location = 'frm_mywork.php';
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