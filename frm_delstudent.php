<?php 
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
	$std_id = $_GET['std_id'];
	$sql = "SELECT * FROM student WHERE std_id = '$std_id'";
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
<table width="630" border="1" align="center" cellpadding="0" cellspacing="0">
<?php 
	include "head.php";
	include "admin_menu.php";
?>
  <tr>
    <td><form id="form1" name="form1" method="post" action="delstudent.php">
      <p>&nbsp;</p>
      <table width="450" border="1" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td colspan="2" align="center">ลบข้อมูลนักเรียน</td>
          </tr>
        <tr>
          <td>ชื่อ - สกุล</td>
          <td><?php echo "$rs[std_name]";?><input name="std_id" type="hidden" id="std_id" value="<?php echo "$rs[std_id]";?>" />
            <input name="std_pic" type="hidden" id="std_pic" value="<?php echo "$rs[std_pic]"; ?>" /></td>
        </tr>
        <tr>
          <td>ที่อยู่</td>
          <td><?php echo "$rs[std_address]";?></td>
        </tr>
        <tr>
          <td>เบอร์โทร</td>
          <td><?php echo "$rs[std_tel]";?></td>
        </tr>
        <tr>
          <td>รูป</td>
          <td>
<?php 
		  if ("$rs[std_pic]" != ""){
			?>
            <img src="<?php echo "./picture/$rs[std_pic]";?>" width="100" height="130">
            <?php
			  }
?>
          </td>
        </tr>
        <tr>
          <td>ผู้ปกครอง</td>
          <td>
<?php
	$sql1 = "SELECT * FROM parent";
	$result1 = mysqli_query($conn,$sql1);
	while($rs1 = mysqli_fetch_array($result1)){
			  if("$rs[pa_id]" == "$rs1[pa_id]")
			  echo "$rs1[pa_name]";
			  }
?>
          </td>
        </tr>
        <tr>
          <td>ชั้นเรียน</td>
          <td>
<?php
	$sql2 = "SELECT * FROM classroom";
	$result2 = mysqli_query($conn,$sql2);
	while($rs2 = mysqli_fetch_array($result2)){
			  if("$rs[c_id]" == "$rs2[c_id]")
			  echo "$rs2[c_name]";
			  }
?>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="บันทึก" />
            <input type="reset" onclick="window.history.back()" name="button2" id="button2" value="ยกเลิก" /></td>
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