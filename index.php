<?php 
	include "connect.php";
	
	if(isset($_POST['txt_search'])){
		$txt_search = $_POST['txt_search'];
		}
		else{
			$txt_search = "";
			}
			if($txt_search != ""){
				$sql = "SELECT teacher.t_id, teacher.t_name, department.d_name FROM teacher, department WHERE teacher.t_name LIKE '%".$txt_search."%' AND teacher.d_id = department.d_id";
				}
				else{
	$sql = "SELECT teacher.t_id, teacher.t_name, department.d_name FROM teacher, department WHERE teacher.d_id = department.d_id";
				}
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
<table width="630" border="1" align="center" cellpadding="0" cellspacing="0">
<?php 
	include "head.php";
	include "menu.php";
?>
  <tr>
    <td align="center"><p>&nbsp;</p>
      <form action="index.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="450" border="0" align="center" cellpadding="3" cellspacing="0">
          <tr>
            <td width="95">ชื่ออาจารย์            </td>
            <td width="271"><input name="txt_search" type="text" id="txt_search" value="<?php echo "$txt_search"; ?>" /></td>
            <td width="66"><input type="submit" name="button" id="button" value="ค้นหา" /></td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>
      <table width="450" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td>รายงานข้อมูลครู</td>
      </tr>
  </table>
      <table width="450" border="1" cellspacing="0" cellpadding="2">
        <tr>
          <td width="156">ชื่อ</td>
          <td width="156">กลุ่มสาระ</td>
          <td width="118">&nbsp;</td>
        </tr>
<?php
	while($rs = mysqli_fetch_array($result)) {
?>
        <tr>
          <td><?php echo "$rs[t_name]"; ?></td>
          <td><?php echo "$rs[d_name]"; ?></td>
          <td><?php echo"<a href=\"frm_showdetail.php?t_id=$rs[t_id]\">";?>รายละเอียด<?php echo"</a>"; ?></td>
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