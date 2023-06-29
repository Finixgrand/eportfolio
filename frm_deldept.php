<?php 
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
	$d_id = $_GET['d_id'];
	$sql = "SELECT * FROM department WHERE d_id = '$d_id'";
	$result = mysqli_query($conn,$sql)
		or die ("Can't query sql");
	$rs = mysqli_fetch_array($result);
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
    <td align="center"><form id="form1" name="form1" method="post" action="deldept.php">
      <p>&nbsp;</p>
      <table width="450" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td colspan="2" align="center">ลบกลุ่มสาระ</td>
          </tr>
        <tr>
          <td>ชื่อกลุ่มสาระ</td>
          <td><input name="d_name" type="text" id="d_name" value="<?php echo "$rs[d_name]"; ?>" readonly="readonly" />
          <input name="d_id" type="hidden" id="d_id" value="<?php echo "$rs[d_id]"; ?>"/></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="บันทึก" />
            <input type="reset" on"window.history.back()" name="button2" id="button2" value="ยกเลิก" /></td>
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