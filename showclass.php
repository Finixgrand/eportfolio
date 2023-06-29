<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
	$sql = "SELECT * FROM classroom";
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
<table width="630" border="1" bordercolor="#FE9695" align="center" cellpadding="0" cellspacing="0">
<?php 
	include "head.php";
	include "admin_menu.php";
?>
  <tr>
    <td><p>&nbsp;</p>
      <table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td>รายงานข้อมูลชั้นเรียน</td>
        <td align="right">[ <a href="frm_addclass.php">เพิ่มข้อมูล</a> ]</td>
      </tr>
  </table>
    <table width="450" border="1" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td width="85">รหัสชั้นเรียน</td>
        <td width="126">ชื่อชั้นเรียน</td>
        <td width="125">&nbsp;</td>
        <td width="80">&nbsp;</td>
      </tr>
<?php
	while($rs = mysqli_fetch_array($result)) {
?>
      <tr>
        <td><?php echo "$rs[c_id]"; ?></td>
        <td><?php echo "$rs[c_name]"; ?></td>
        <td align="center"><?php echo "<a href=\"frm_editclass.php?c_id=$rs[c_id]\">";?>รายละเอียด<?php echo "</a>";?></td>
        <td align="center"><?php echo"<a href=\"frm_delclass.php?c_id=$rs[c_id]\">";?>ลบ<?php echo"</a>"; ?></td>
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