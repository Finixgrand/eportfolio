<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
	$sql = "SELECT * FROM department";
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
<table width="630" border="1" bordercolor="#FE9695" align="center" cellpadding="0" cellspacing="0">
  <?php 
	include "head.php";
	include "admin_menu.php";
?>
  <tr>
    <td><p>&nbsp;</p>
      <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="359">รายงานข้อมูลกลุ่มสาระ</td>
          <td width="235" align="right">          [<a href="frm_adddept.php">เพิ่มกลุ่มสาระ</a>]</td>
        </tr>
      </table>
      <table width="600" border="1" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td width="90" align="left">รหัสกลุ่มสาระ</td>
          <td width="150" align="left">ชื่อกลุ่มสาระ</td>
          <td width="158">หัวหน้ากลุ่มสาระ</td>
          <td width="80">&nbsp;</td>
          <td width="80">&nbsp;</td>
        </tr>
<?php
	while($rs = mysqli_fetch_array($result)) {
?>
        <tr>
          <td><?php echo "$rs[d_id]"; ?></td>
          <td><?php echo "$rs[d_name]"; ?></td>
          <td align="center">
		  <?php
		  if ("$rs[t_id]" == 0) {
			echo "<a href=\"frm_adddeptdetail.php?d_id=$rs[d_id]\">";
		  	echo "จัดการหัวหน้ากลุ่มสาระ";
			echo "</a>";
		  }
		  else {
			$sql1 = "SELECT * FROM teacher WHERE t_id = '$rs[t_id]'";
			$result1 = mysqli_query($conn,$sql1)
				or die("Can't query sql");
			$rs1 = mysqli_fetch_array($result1);
			echo "<a href=\"frm_adddeptdetail.php?d_id=$rs[d_id]\">";
			echo "$rs1[t_name]";
			echo"</a>";
		  }
		?>
        </td>
          <td align="center"><?php echo"<a href=\"frm_editdept.php?d_id=$rs[d_id]\">";?>แก้ไข<?php echo"</a>"; ?></td>
          <td align="center"><?php echo"<a href=\"frm_deldept.php?d_id=$rs[d_id]\">";?>ลบ<?php echo"</a>"; ?></td>
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