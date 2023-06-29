<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
	$d_id = $_GET['d_id'];
	$sql1 = "SELECT * FROM department WHERE d_id = '$d_id'";
	$result1 = mysqli_query ($conn,$sql1);
	$rs1 = mysqli_fetch_array($result1); 
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
      <form id="form1" name="form1" method="post" action="adddeptdetail.php">
        <table width="450" border="1" align="center" cellpadding="3" cellspacing="0">
          <tr>
            <td colspan="2" align="center">จัดการหัวหน้ากลุ่มสาระ</td>
          </tr>
          <tr>
            <td width="192">กลุ่มสาระ</td>
            <td width="240"><?php echo "$rs1[d_name]"; ?>
            <input name="d_id" type="hidden" id="d_id" value="<?php echo "$rs1[d_id]"; ?>" /></td>
          </tr>
          <tr>
            <td>หัวหน้ากลุ่มสาระ</td>
            <td><select name="t_id" id="t_id">
<?php
	$sql2 = "SELECT * FROM teacher WHERE d_id = '$d_id'";
	$result2 = mysqli_query($conn,$sql2);
	while($rs2=mysqli_fetch_array($result2)){
		echo"<option value=\"$rs2[t_id]\"";
		
		if("$rs1[t_id]" == "$rs2[t_id]") {echo'selected';}
		echo ">$rs2[t_name]</option>";
		}
?>
            </select></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Submit" />
            <input type="reset" name="button2" id="button2" value="Reset" /></td>
          </tr>
        </table>
      </form>
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