<?php
	include"connect.php";
	if(isset($_POST['txt_search'])){
		$txt_search = $_POST['txt_search'];
		}
		else{
			$txt_search = "";
			}
			if($txt_search != ""){
				$sql = "SELECT student.std_id, student.std_name, classroom.c_name FROM student, classroom WHERE student.c_id = '$txt_search' AND student.c_id = classroom.c_id";
				}
				else{
					$sql = "SELECT student.std_id, student.std_name, classroom.c_name FROM student, classroom WHERE student.c_id = classroom.c_id";
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
    <td><p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="student.php">
        <table width="450" border="0" align="center" cellpadding="3" cellspacing="0">
          <tr>
            <td>ห้องเรียน</td>
            <td><select name="txt_search" size="1" id="txt_search">
              <option value="">ทั้งหมด</option>
              <?php 
	$sql2 = "SELECT * FROM classroom";
	$result2 = mysqli_query($conn,$sql2);
	while($rs2 = mysqli_fetch_array($result2)){
		echo"<option value=\"$rs2[c_id]\"";
		
		if("$txt_search" == "$rs2[c_id]") {echo 'selected';}
		echo ">$rs2[c_name]";
		echo "</option>\n";
		}
?>
            </select></td>
            <td><input type="submit" name="button" id="button" value="ค้นหา" /></td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>
      <table width="450" border="0" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td>รายชื่อนักเรียน</td>
        </tr>
      </table>
      <table width="450" border="1" align="center" cellpadding="3" cellspacing="0">
        <tr>
          <td width="156">ชื่อนักเรียน</td>
          <td width="151">ชั้นเรียน</td>
          <td width="117">&nbsp;</td>
        </tr>
<?php
	while($rs = mysqli_fetch_array($result)) {
?>
        <tr>
          <td><?php echo "$rs[std_name]"; ?></td>
          <td><?php echo "$rs[c_name]";?></td>
          <td><?php echo"<a href=\"frm_showstudentdetail.php?std_id=$rs[std_id]\">";?>รายละเอียด<?php echo"</a>"; ?></td>
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