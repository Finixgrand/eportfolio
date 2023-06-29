<?php 
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
	$sql = "SELECT * FROM parent";
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
    <td><p>&nbsp;</p>
      <table width="550" border="0" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td>รายงานข้อมูลผู้ปกครอง</td>
          <td align="right">[ <a href="frm_addparent.php">เพิ่มผู้ปกครอง</a> ]</td>
        </tr>
      </table>
      <table width="550" border="1" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td width="108">รหัส</td>
          <td width="108">ชื่อผู้ปกครอง</td>
          <td width="82">อาชีพ</td>
          <td width="98">เบอร์โทรศัพท์</td>
          <td width="61">&nbsp;</td>
          <td width="43">&nbsp;</td>
        </tr>
<?php
	while($rs = mysqli_fetch_array($result)) {
?>
        <tr>
          <td><?php echo "$rs[pa_id]"; ?></td>
          <td><?php echo "$rs[pa_name]"; ?></td>
          <td><?php echo "$rs[pa_occupation]"; ?></td>
          <td><?php echo "$rs[pa_tel]"; ?></td>
          <td><?php echo "<a href=\"frm_editparent.php?pa_id=$rs[pa_id]\">";?>แก้ไข<?php echo"</a>";?></td>
          <td><?php echo"<a href=\"frm_delparent.php?pa_id=$rs[pa_id]\">";?>ลบ<?php echo"</a>"; ?></td>
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