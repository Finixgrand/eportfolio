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
	include "head.php";
	include "admin_menu.php";
?>
  <tr>
    <td><form id="form1" name="form1" method="post" action="adddept.php">
        <p>&nbsp;</p>
        <table width="430" border="1" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td colspan="2" align="center">เพิ่มกลุ่มสาระ</td>
          </tr>
          <tr>
            <td width="93">ชื่อกลุ่มสาระ</td>
            <td width="281"><input type="text" name="d_name" id="d_name" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="button" id="button" value="บันทึก" /> 
              <input type="reset" name="button2" id="button2" value="ยกเลิก" /></td>
          </tr>
        </table>
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