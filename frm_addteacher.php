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
<table width="630" border="1" bordercolor="#FE9695" align="center" cellpadding="0" cellspacing="0">
<?php
 include"head.php";
 include"admin_menu.php";
 ?>
  <tr>
    <td><form action="addteacher.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="400" border="1" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td colspan="2" align="center">เพิ่มข้อมูลอาจารย์</td>
          </tr>
        <tr>
          <td width="98">ชื่อ - สกุล</td>
          <td width="288"><input type="text" name="t_name" id="t_name" /></td>
        </tr>
        <tr>
          <td>ที่อยู่</td>
          <td><textarea name="t_address" id="t_address" cols="45" rows="5"></textarea></td>
        </tr>
        <tr>
          <td>เบอร์โทร</td>
          <td><input type="text" name="t_tel" id="t_tel" /></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><input type="text" name="t_username" id="t_username" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="text" name="t_password" id="t_password" /></td>
        </tr>
        <tr>
          <td>รูป</td>
          <td><input type="file" name="photo" id="photo" /></td>
        </tr>
        <tr>
          <td>ตำแหน่ง</td>
          <td><select name="po_id" id="po_id">
<?php 
	$sql1 = "SELECT * FROM position";
	$result1 = mysqli_query($conn,$sql1);
	while($rs1 = mysqli_fetch_array($result1)){
		echo"<option value=$rs1[po_id]>$rs1[po_name]</option>";
		}
?>
          </select></td>
        </tr>
        <tr>
          <td>กลุ่มสาระ</td>
          <td><select name="d_id" id="d_id">
<?php 
	$sql1 = "SELECT * FROM department";
	$result1 = mysqli_query($conn,$sql1);
	while($rs1 = mysqli_fetch_array($result1)){
		echo"<option value=$rs1[d_id]>$rs1[d_name]</option>";
		}
?>
          </select></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="บันทึก" />
            <input type="reset" name="button2" id="button2" value="ยกเลิก" /></td>
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