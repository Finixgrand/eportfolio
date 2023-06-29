<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";

	$c_id = $_GET['c_id'];
	$sql = "SELECT * FROM classroom WHERE c_id = '$c_id'";
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
    <td><form id="form1" name="form1" method="post" action="editclass.php">
      <p>&nbsp;</p>
      <table width="450" border="1" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td colspan="2" align="center">กำหนดรายละเอียดชั้นเรียน</td>
          </tr>
        <tr>
          <td width="205">ชั้นเรียน</td>
          <td width="219"><input name="c_name" type="text" id="c_name" value="<?php echo "$rs[c_name]"; ?>" readonly="readonly" />
            <input name="c_id" type="hidden" id="c_id" value="<?php echo "$rs[c_id]"; ?>" /></td>
        </tr>
        <tr>
          <td>ครูประจำชั้น</td>
          <td><select name="t_id" id="t_id">
          <?php 
		  $sql1 = "SELECT * FROM teacher";
		  $result1 = mysqli_query($conn,$sql1);
		  while($rs1 = mysqli_fetch_array($result1)){
			  echo "<option value=\"$rs1[t_id]\"";
			  
			  if("$rs[t_id]" == "$rs1[t_id]") {echo 'selected';}
			  echo ">$rs1[t_name]";
			  echo "</option>\n";
			  }
		  ?>
          </select></td>
        </tr>
        <tr>
          <td>หัวหน้าชั้นเรียน</td>
          <td><select name="std_id" id="std_id">
          <?php 
		  $sql2 = "SELECT * FROM student WHERE c_id = '$c_id'";
		  $result2 = mysqli_query($conn,$sql2);
		  while($rs2 = mysqli_fetch_array($result2)){
			  echo "<option value=\"$rs2[std_id]\"";
			  
			  if("$rs[std_id]" == "$rs2[std_id]") {echo 'selected';}
			  echo ">$rs2[std_name]";
			  echo "</option>\n";
			  }
		  ?>
          </select></td>
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
 include"foot.php";
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