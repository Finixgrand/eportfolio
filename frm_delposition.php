<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_admin"])){
	include"connect.php";
	
   $po_id = $_GET['po_id'];
   $sql = "SELECT * FROM position WHERE po_id = '$po_id'";
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
<table width="630" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#F49217">
<?php
 include"head.php";
 include"admin_menu.php";
 ?>
  <tr>
    <td><form id="form1" name="form1" method="post" action="delposition.php">
      <p>&nbsp;</p>
      <table width="450" height="119" border="1" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td colspan="2" align="center">ลบตำแหน่ง</td>
          </tr>
        <tr>
          <td width="142">ชื่อตำแหน่ง</td>
          <td width="282">
          <input name="po_name" type="text" id="po_name" 
            value="<?php echo "$rs[po_name]";?>" readonly="readonly" />
            <input name="po_id" type="hidden" id="po_id" 
            value="<?php echo "$rs[po_id]";?>"/>
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