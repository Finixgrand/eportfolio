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
<table width="630" border="1" bordercolor="#FE9695" align="center" cellpadding="0" cellspacing="0">
<?php
 include"head.php";
 include"admin_menu.php";
 ?>
  <tr>
    <td align="center" bordercolor="#F1A241"><form id="form1" name="form1" method="post" action="delclass.php">
      <p>&nbsp;</p>
      <table width="434" height="120" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2" align="center">ลบชั้นเรียน</td>
        </tr>
        <tr>
          <td width="125" align="center">ชื่อชั้นเรียน</td>
          <td width="303">
          <input type="text" name="c_name" id="c_name" 
          value="<?php echo "$rs[c_name]";?>" readonly="readonly"/>
          <input name="c_id" type="hidden" id="c_id" 
          value="<?php echo "$rs[c_id]";?>"/>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="Submit" id="button" value="บันทึก" />
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