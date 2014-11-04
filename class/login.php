<?php
session_start();
 require_once 'dbconnect.php';
 class login{
	 public $db;
	 
	 function __construct(PDO $db){
		 $this->db=$db;
	 }
         /**
          * Control the admin panel Login 
          * 
          * @param type $username User name of admin panel
          * @param type $password Password of admin panel
          * 
          * This will check whether or not this username and password are valid or not .If valid it will give user
          * access to all of the facility of admin panel
          */
	 function check_login($username,$password){
		 $check=$this->db->prepare("SELECT * FROM user WHERE username=:user and password=:pass");
		 $check->bindParam(":user",$username,PDO::PARAM_STR);
		  $check->bindParam(":pass",$password,PDO::PARAM_STR);
		  $check->execute();
		  if($check->rowCount()==1)
		  {
			  
			  $admin=$check->fetch(PDO::FETCH_ASSOC);
			  $_SESSION['username']=$admin['username'];
			  $_SESSION['user']=$admin['user_id']; 
			  $this->db->query("UPDATE `user` SET `online_status`='1' WHERE user_id=$admin[user_id]");  
		  }
		 
		 }
	/**
         * Make sure only authorized user access admin panel
         * 
         * This will check that a user is logged in as admin.if not then he is no longer to stay protected page 
         * and redirect to login page
         */	 
	 function isLogin()
	 {
		 if(empty($_SESSION['username']) || empty($_SESSION['user']))
		 {
			 header("Location:login.php");
		 }
	 }
	 /**
	 *For safely logout 
	 *
	 */
	 function logout(){	
	 			 $this->db->query("UPDATE `user` SET `online_status`='0' WHERE user_id='$_SESSION[user]'"); 	
				 session_destroy();
				 header("Location:login.php");		 
		 }
	 
	 
	 
	 }
	 $login=new login($db);
?>