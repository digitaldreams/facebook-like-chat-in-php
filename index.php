<?php
error_reporting ('E_ALL_E^NOTICE');
session_start();
require_once 'class/dbconnect.php';
require_once 'class/database.php';
require_once 'class/login.php';

$database=new database($db);
if(isset($_POST['action'])){
	$login->check_login($_POST['username'],$_POST['password']);
	
	}
	
$login->isLogin();

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>

</title>
<link href="cs/chat_style.css" rel="stylesheet" type="text/css">
</head>



<body>
<!-- By  default only today's conversation will shown up.
	 But visitor can choose to show last seven days
 or  even last months conversation-->
<div class="chat_box">
 
</div>
<div id="write_msg">
<textarea id="message" placeholder="Write Your Messge TO your Frientds"></textarea>
</div>
<a href="index.php?logout=11">Logout</a>
<div id="whoisonline">
<h3>Online now</h3>
<ul>

</ul>
</div>
<script type="text/javascript" src="js/jquery_1.9.0.js"></script>
<!--<script type="text/javascript" src="js/chat_handle.js"></script>-->
<script type="text/javascript" src="js/jquery_method.js"></script>
</body>
</html>
<?php
if($_GET['logout'])
{
	$login->logout();
	}
?>