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
	include "menu.php";
?>
  <tr>
    <td align="center"><form id="form1" name="form1" method="post" action="login.php">
      <p>&nbsp;</p>
      <table width="450" border="1" cellspacing="0" cellpadding="3">
        <tr>
          <td colspan="2" align="center">เข้าระบบ</td>
          </tr>
        <tr>
          <td width="312">ชื่อล๊อกอิน</td>
          <td width="312"><input type="text" name="login" id="login" /></td>
        </tr>
        <tr>
          <td>รหัสผ่าน</td>
          <td><input type="text" name="passwd" id="passwd" /></td>
        </tr>
        <tr>
          <td>สถานะ</td>
          <td><p>
            <input name="user_status" type="radio" id="radio" value="1" checked="checked" />
          ครูอาจารย์</p>
            <p>
              <input name="user_status" type="radio" id="radio2" value="0" />
            ผู้ดูแลระบบ</p></td>
        </tr>
      </table>
      <p>
        <input type="submit" name="button" id="button" value="เข้าสู่ระบบ" />
        <input type="reset" name="button2" id="button2" value="ยกเลิก" />
      </p>
      <p>&nbsp;</p>
    </form></td>
  </tr>
<?php
	include "foot.php";
?>
</table>
</body>
</html>