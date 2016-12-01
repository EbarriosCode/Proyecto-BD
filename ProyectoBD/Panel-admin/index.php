<?php 
		session_start();
		
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
		}
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="0;url=pages/index.html">
<title>Admin</title>
<script language="javascript">
    window.location.href = "pages/index.php"
</script>
</head>
<body>
	<a href="pages/index.php">/pages/index.php</a>
</body>
</html>
