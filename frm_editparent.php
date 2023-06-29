<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
   $pa_id = $_GET['pa_id'];
   $sql = "SELECT * FROM parent WHERE pa_id = '$pa_id'";
   $result = mysqli_query($conn,$sql)
      or die("Can't query sql");
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
 include"admin_menu.php";
 ?>
  <tr>
    <td align="center"><form action="editparent.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <p>&nbsp;</p>
      <table width="450" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td colspan="2" align="center">แก้ไขข้อมูลผู้ปกครอง</td>
          </tr>
        <tr>
          <td>เลขบัตรประจำตัวประชาชน</td>
          <td><?php echo "$rs[pa_id]"; ?>&nbsp;
            <input name="pa_id" type="hidden" id="pa_id" value="<?php echo "$rs[pa_id]"; ?>" /></td>
        </tr>
        <tr>
          <td>ชื่อ - สกุล</td>
          <td><input name="pa_name" type="text" id="pa_name" value="<?php echo "$rs[pa_name]"; ?>" /></td>
        </tr>
        <tr>
          <td>อาชีพ</td>
          <td><input name="pa_occupation" type="text" id="pa_occupation" value="<?php echo "$rs[pa_occupation]"; ?>" /></td>
        </tr>
        <tr>
          <td>เบอร์โทร</td>
          <td><input name="pa_tel" type="text" id="pa_tel" value="<?php echo "$rs[pa_tel]"; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="บันทึก" />
            <input type="reset" onclick=window.history.back() name="button2" id="button2" value="ยกเลิก" /></td>
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