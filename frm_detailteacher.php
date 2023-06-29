<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";

	$t_id = $_GET['t_id'];
	$sql = "SELECT * FROM teacher WHERE t_id = '$t_id'";
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
    <td><p>&nbsp;</p>
      <table width="450" border="1" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td colspan="2" align="center">ข้อมูลอาจารย์</td>
        </tr>
        <tr>
          <td colspan="2" align="center"><?php 
		  if ("$rs[t_pic]" != ""){
			?>
            <img src="<?php echo "./picture/$rs[t_pic]";?>" width="100" height="130" />
            <?php
			  }
		  ?></td>
        </tr>
        <tr>
          <td width="216">ชื่อ - สกุล</td>
          <td width="216"><?php echo "$rs[t_name]"; ?></td>
        </tr>
        <tr>
          <td>ที่อยู่</td>
          <td><?php echo "$rs[t_address]"; ?></td>
        </tr>
        <tr>
          <td>เบอร์โทร</td>
          <td><?php echo "$rs[t_tel]"; ?></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><?php echo "$rs[t_username]"; ?></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><?php echo "$rs[t_password]"; ?></td>
        </tr>
        <tr>
          <td>ตำแหน่ง</td>
          <td>
<?php
	$sql1 = "SELECT * FROM position";
	$result1 = mysqli_query($conn,$sql1);
	while($rs1 = mysqli_fetch_array($result1)){
			  if("$rs[po_id]" == "$rs1[po_id]")
			  echo "$rs1[po_name]";
			  }
?>
		  </td>
        </tr>
        <tr>
          <td>กลุ่มสาระ</td>
          <td>
<?php
	$sql2 = "SELECT * FROM department";
	$result2 = mysqli_query($conn,$sql2);
	while($rs2 = mysqli_fetch_array($result2)){
			  if("$rs[d_id]" == "$rs2[d_id]")
			  echo "$rs2[d_name]";
			  }
?>
		  </td>
        </tr>
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