<?php
	session_start();
	unset($_SESSION['valid_uname']);
	unset($_SESSION['valid_pwd']);
	unset($_SESSION['valid_teacher']);
	unset($_SESSION['valid_admin']);
	session_destroy();
?>
<script language="javascript">
	window.location = "index.php";
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>