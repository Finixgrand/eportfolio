<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_teacher"])){
	include"connect.php";
	
	$t_username = $_SESSION["valid_uname"];
	$sql = "SELECT * FROM teacher WHERE t_username = '$t_username'";
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
 include"teacher_menu.php";
 ?>
  <tr>
    <td><form action="editme.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <p>&nbsp;</p>
      
      <table width="450" border="1" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td colspan="2" align="center">แก้ไขข้อมูลอาจารย์</td>
        </tr>
        <tr>
          <td width="144">Username</td>
          <td width="280"><?php echo "$rs[t_username]"; ?>
            <input name="t_id" type="hidden" id="t_id" value="<?php echo "$rs[t_id]"; ?>" />
            <input name="t_pic" type="hidden" id="t_pic" value="<?php echo "$rs[t_pic]"; ?>" />
            <input name="t_username" type="hidden" id="t_username" value="<?php echo "$rs[t_username]"; ?>" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input name="t_password" type="text" id="t_password" value="<?php echo "$rs[t_password]"; ?>" /></td>
        </tr>
        <tr>
          <td>ชื่อ - สกุล</td>
          <td><input name="t_name" type="text" id="t_name" value="<?php echo "$rs[t_name]"; ?>" /></td>
        </tr>
        <tr>
          <td>ที่อยู่</td>
          <td><textarea name="t_address" id="t_address" cols="45" rows="5"><?php echo "$rs[t_address]"; ?></textarea></td>
        </tr>
        <tr>
          <td>เบอร์โทร</td>
          <td><input name="t_tel" type="text" id="t_tel" value="<?php echo "$rs[t_tel]"; ?>" /></td>
        </tr>
        <tr>
          <td>รูป</td>
          <td><?php 
		  if ("$rs[t_pic]" != ""){
			?>
            <img src="<?php echo "./picture/$rs[t_pic]";?>" width="100" height="130" />
            <?php
			  }
		  ?>
            <input type="file" name="photo" id="photo" /></td>
        </tr>
        <tr>
          <td>ตำแหน่ง</td>
          <td><select name="po_id" id="po_id">
            <?php 
		  $sql1 = "SELECT * FROM position";
		  $result1 = mysqli_query($conn,$sql1);
		  while($rs1 = mysqli_fetch_array($result1)){
			  echo "<option value=\"$rs1[po_id]\"";
			  
			  if("$rs[po_id]" == "$rs1[po_id]") {echo 'selected';}
			  echo ">$rs1[po_name]";
			  echo "</option>\n";
			  }
		  ?>
          </select></td>
        </tr>
        <tr>
          <td>กลุ่มสาระ</td>
          <td><select name="d_id" id="d_id">
            <?php 
	$sql2 = "SELECT * FROM department";
	$result2 = mysqli_query($conn,$sql2);
	while($rs2 = mysqli_fetch_array($result2)){
		echo"<option value=\"$rs2[d_id]\"";
		
		if("$rs[d_id]" == "$rs2[d_id]") {echo 'selected';}
		echo ">$rs2[d_name]";
		echo "</option>\n";
		}
?>
          </select></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="บันทึก" />
            <input type="reset" onclick="window.history.back()" name="button2" id="button2" value="ยกเลิก" /></td>
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