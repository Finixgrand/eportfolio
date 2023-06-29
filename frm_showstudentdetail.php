<?php
include"connect.php";

	$std_id = $_GET['std_id'];
	$sql = "SELECT s.std_pic, s.std_name, s.std_tel, c.c_name FROM classroom c inner join student s on s.c_id = c.c_id inner join parent p on s.pa_id = p.pa_id WHERE s.std_id = '$std_id'";
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
 include"menu.php";
 ?>
  <tr>
    <td align="center">
      <p>&nbsp;</p>
      <table width="630" border="1" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td colspan="2" align="center">ข้อมูลนักเรียน</td>
        </tr>
        <tr>
          <td colspan="2" align="center"><?php 
		  if ("$rs[std_pic]" != ""){
			?>
		      <img src="<?php echo "./picture/$rs[std_pic]";?>" width="100" height="130" />
		      <?php
			  }
		  ?></td>
        </tr>
        <tr>
          <td width="217">ชื่อนักเรียน</td>
          <td width="387"><?php echo "$rs[std_name]"; ?></td>
        </tr>
        <tr>
          <td>เบอร์โทรศัพท์</td>
          <td><?php echo "$rs[std_tel]"; ?></td>
        </tr>
        <tr>
          <td>ชั้นเรียน</td>
          <td><?php echo "$rs[c_name]"; ?></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="reset" onclick="window.history.back()" name="button2" id="button2" value="กลับ" /></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </td>
  </tr>
<?php
	include "foot.php";
?> 
</table>
</body>
</html>