<?php 
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
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
 include"admin_menu.php";
 ?>
  <tr>
    <td><form action="addstudent.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <p>&nbsp;</p>
      <table width="450" border="1" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td colspan="2" align="center">เพิ่มข้อมูลนักเรียน</td>
          </tr>
        <tr>
          <td>ชื่อ - สกุล</td>
          <td><input type="text" name="std_name" id="std_name" /></td>
        </tr>
        <tr>
          <td>ที่อยู่</td>
          <td><textarea name="std_address" id="std_address" cols="45" rows="5"></textarea></td>
        </tr>
        <tr>
          <td>เบอร์โทร</td>
          <td><input type="text" name="std_tel" id="std_tel" /></td>
        </tr>
        <tr>
          <td>รูป</td>
          <td><input type="file" name="photo" id="photo" /></td>
        </tr>
        <tr>
          <td>ผู้ปกครอง</td>
          <td><select name="pa_id" id="pa_id">
<?php 
	$sql1 = "SELECT * FROM parent";
	$result1 = mysqli_query($conn,$sql1);
	while($rs1 = mysqli_fetch_array($result1)){
		echo"<option value=$rs1[pa_id]>$rs1[pa_name]</option>";
		}
?>
          </select></td>
        </tr>
        <tr>
          <td>ชั้นเรียน</td>
          <td><select name="c_id" id="c_id">
<?php 
	$sql1 = "SELECT * FROM classroom";
	$result1 = mysqli_query($conn,$sql1);
	while($rs1 = mysqli_fetch_array($result1)){
		echo"<option value=$rs1[c_id]>$rs1[c_name]</option>";
		}
?>
          </select></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="บันทึก" />
            <input type="button" onclick="window.history.back()" name="button2" id="button2" value="ยกเลิก" /></td>
          </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </form></td>
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