<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
   $w_id = $_GET['w_id'];
   $sql = "SELECT * FROM work WHERE w_id = '$w_id'";
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
<table width="630" border="1" bordercolor="#FE9695" align="center" cellpadding="0" cellspacing="0">
<?php
 include"head.php";
 include"admin_menu.php";
 ?>
  <tr>
    <td align="center"><form id="form1" name="form1" method="post" action="editwork.php">
        <p>&nbsp;</p>
        <table width="430" border="1" cellspacing="0" cellpadding="3">
          <tr>
            <td colspan="2" align="center">เพิ่มผลงาน</td>
          </tr>
          <tr>
            <td width="135">ชื่อผลงาน</td>
            <td width="277">
            <input type="text" name="w_name" id="w_name" 
            value="<?php echo "$rs[w_name]";?>"/>
            <input name="w_id" type="hidden" id="w_id" 
            value="<?php echo "$rs[w_id]";?>"/></td>
          </tr>
          <tr>
            <td>ปีที่ได้รับ</td>
            <td>
            <input type="text" name="w_year" id="w_year"
            value="<?php echo "$rs[w_year]";?>"/>
            <input name="w_id" type="hidden" id="w_id" 
            value="<?php echo "$rs[w_id]";?>"/>
            </td>
          </tr>
          <tr>
            <td>หน่วยงานที่มอบ</td>
            <td>
            <input type="text" name="w_org" id="w_org" 
            value="<?php echo "$rs[w_org]";?>"/>
            <input name="w_id" type="hidden" id="w_id" 
            value="<?php echo "$rs[w_id]";?>"/>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="button" id="button" value="ตกลง" />
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