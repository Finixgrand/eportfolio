<?php 
	session_start();
	if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_teacher"])){
		include"connect.php";
		
		$valid_uname = $_SESSION["valid_uname"];
		$sql = "SELECT * FROM teacher WHERE t_username = '$valid_uname'";
		$result = mysqli_query($conn, $sql);
		$rs = mysqli_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="630" border="1" align="center" cellpadding="0" cellspacing="0">
<?php
 include"head.php";
 include"teacher_menu.php";
 ?>
  <tr>
    <td align="center"><p>&nbsp;</p>
      <p>ผลงานครูอาจารย์</p>
      <p>&nbsp;</p>
      <table width="450" border="0" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td>อาจารย์<?php echo"$rs[t_name]"; ?></td>
          <td align="right">[ <?php echo "<a href=\"frm_addmywork.php?t_username=$rs[t_username]\">" ?>เพิ่มข้อมูล<?php echo "</a>" ?> ]</td>
        </tr>
      </table>
      <table width="450" border="1" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td>ชื่อผลงาน</td>
          <td>ปีที่รับ</td>
          <td>หน่วยงานที่มอบ</td>
          <td>&nbsp;</td>
        </tr>
<?php
	$sql2 = "SELECT * FROM work_detail WHERE t_id = '$rs[t_id]'";
	$result2 = mysqli_query($conn,$sql2);
	while($rs2 = mysqli_fetch_array($result2)){
		$sql3 = "SELECT * FROM work WHERE w_id = '$rs2[w_id]'";
		$result3 = mysqli_query($conn,$sql3);
		$rs3 = mysqli_fetch_array($result3);
?>
        <tr>
          <td><?php echo"$rs3[w_name]"; ?></td>
          <td><?php echo"$rs3[w_year]"; ?></td>
          <td><?php echo"$rs3[w_org]"; ?></td>
          <td><?php echo"<a href=\"frm_delmywork.php?w_id=$rs2[w_id]\">";?>ลบ<?php echo"</a>"; ?></td>
        </tr>
<?php
	}
	mysqli_close($conn);
?>
      </table>
<p>&nbsp;</p></td>
  </tr>
 <?php
	include "foot.php";
?>
</table>
</body>
</html>
<?php
}
else{
	echo"<script> alert('Please Login'); window.location='frm_login.php';</script>";
	exit();
	}
?>