<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
	$sql = "SELECT student.std_id, student.std_name, classroom.c_name FROM student, classroom WHERE student.c_id = classroom.c_id";
	$result = mysqli_query($conn,$sql)
		or die("3. ไม่สามารถประมวลผลต่อได้").mysqli_error($conn);
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
	include "head.php";
	include "admin_menu.php";
?>
  <tr>
    <td align="center"><p>&nbsp;</p>
      <table width="450" border="0" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td>รายงานข้อมูลนักเรียน</td>
        <td align="right">[ <a href="frm_addstudent.php">เพิ่มข้อมูลนักเรียน</a> | <a href="showparent.php">จัดการข้อมูลผู้ปกครอง</a> ]</td>
      </tr>
    </table>
      <table width="450" border="1" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td width="95">รหัสนักเรียน</td>
          <td width="100">ชื่อนักเรียน</td>
          <td width="95">ชั้นเรียน</td>
          <td width="59">&nbsp;</td>
          <td width="59">&nbsp;</td>
        </tr>
<?php
	while($rs = mysqli_fetch_array($result)) {
?>
        <tr>
          <td><?php echo "$rs[std_id]"; ?></td>
          <td><?php echo "<a href=\"frm_detailstudent.php?std_id=$rs[std_id]\">";?><?php echo "$rs[std_name]"; ?><?php echo"</a>"; ?></td>
          <td><?php echo "$rs[c_name]"; ?></td>
          <td><?php echo"<a href=\"frm_editstudent.php?std_id=$rs[std_id]\">";?>แก้ไข<?php echo"</a>"; ?></td>
          <td><?php echo"<a href=\"frm_delstudent.php?std_id=$rs[std_id]\">";?>ลบ<?php echo"</a>"; ?></td>
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