<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>

</head>

<body>
<div class="container-fluid">
 	<header class="row-fluid offset2">
    	<h1 align="justify"> Login</h1>
    </header>
     
     <div class="row-fluid">
     	<aside class="span2">
        </aside>
        <section class="span9">
            <form action="index.php" method="post" name="login">
            <p>Username :<input type="text" name="username"></p>
            <p>password :<input type="password" name="password"></p>
            <p style="margin-left:95px">
            <input type="reset" name="reset" value="Reset" class="btn btn-large">
            <input type="submit" name="action" value="Login" class="btn btn-large"></p>
            </form>
            <hr>
            <h3>Sign Up</h3>
            <form action="login.php" method="post">
            <p>username:<input type="text" name="username" required></p>
             <p>Password:<input type="password" name="password" required></p>
             <p><input type="submit" name="action" value="signup"></p>
             </form>
         </section>
    </div>
 </div>
</body>
</html>
<?php
require_once 'class/dbconnect.php';
if(isset($_POST['action']))
{
	extract($_POST);
	$signup=$db->query("INSERT INTO `user`(`username`, `password`) VALUES ('$username','$password')");
	if($signup->rowCount()==1)echo "You have Successfully sign up now you can login";
	
}
?>