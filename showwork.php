<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
	$sql = "SELECT * FROM work";
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
    <p>&nbsp;</p>
    <table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>รายงานข้อมูลผลงาน</td>
        <td align="right">[ <a href="frm_addwork.php">เพิ่มผลงาน</a> ]</td>
      </tr>
    </table>
    <table width="450" border="1" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td width="100">ชื่อผลงาน</td>
        <td width="64">ปีที่ได้รับ</td>
        <td width="112">หน่วยงานที่มอบ</td>
        <td width="70">&nbsp;</td>
        <td width="42">&nbsp;</td>
      </tr>
<?php
	while($rs = mysqli_fetch_array($result)) {
?>
      <tr>
        <td><?php echo "$rs[w_name]"; ?></td>
        <td><?php echo "$rs[w_year]"; ?></td>
        <td><?php echo "$rs[w_org]"; ?></td>
        <td align="center"><?php echo"<a href=\"frm_editwork.php?w_id=$rs[w_id]\">";?>แก้ไข<?php echo"</a>"; ?></td>
        <td align="center"><?php echo"<a href=\"frm_delwork.php?w_id=$rs[w_id]\">";?>ลบ<?php echo"</a>"; ?></td>
      </tr>
<?php
	}
	mysqli_close($conn);
?>
    </table>
    <p>&nbsp;</p>
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