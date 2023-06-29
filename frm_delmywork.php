<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_teacher"])){
	include"connect.php";
	
	$t_username = $_SESSION["valid_uname"];
	$sql = "SELECT * FROM teacher, work, work_detail WHERE work_detail.t_id = teacher.t_id AND work_detail.w_id = work.w_id AND t_username = '$t_username'";
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
    <td><form action="delmywork.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <p>&nbsp;</p>
      <table width="450" border="1" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td colspan="2" align="center">ลบผลงานที่ได้รับ</td>
          </tr>
        <tr>
          <td width="155">ชื่อผลงาน</td>
          <td width="269">
            <?php echo "$rs[w_name]";?>
            <input name="w_id" type="hidden" id="w_id" value="<?php echo "$rs[w_id]"; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="บันทึก" />
            <input type="reset" onclick="window.history.back()" name="button3" id="button3" value="ยกเลิก" /></td>
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