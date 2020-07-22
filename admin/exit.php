<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
error_reporting(0);
@setcookie('admin_token','',time()-3600*24*7);
echo '<script language="javascript"> alert("退出成功");window.location.href=\'login.php\';</script> ';	
?>