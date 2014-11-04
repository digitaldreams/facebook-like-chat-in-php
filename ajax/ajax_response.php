<?php
session_start();
require_once '../class/dbconnect.php';
require_once '../class/database.php';
require_once '../class/datetime.php';
$mydate=new mytime();
$database=new database($db);
//if method variable are sent to this page then we do all of our database action otherwise no need to do waste time.
if(isset($_POST['method'])===true && !empty($_POST['method']))
{
	
	//We sent method variable two times one time its value is fetch and another is insert
	$method=trim($_POST['method']);
	//WHen we want to grab inforamtion from database every two second then this 
	//conditonal code will run
		if($method=='collect')
		{
			
			$ChatMes=$database->fetchMessage();
			foreach($ChatMes as $userMess){
				?>
            <div class="message">
                <div class="header <?php 
			if($userMess['user_id']==$_SESSION['user'])
			{ echo " logedInMember";}
			else{ echo "otherMember"; }?>"><a href="profile.php?user_id=<?php echo $userMess['user_id'] ?>"><?php echo  $userMess['username'] ?></a> <span> <?php  $mydate->timesAgo($userMess['chattime']); ?></span></div>
                <p><?php  echo $userMess['mes_body'] ?></p>
               
                </div>
                <?php
				
				}
	
			
		}//End of checking whether or not method varible equal to collect
		
	else if($method==='insert' && !empty($_POST['chatMsg']))
	{  
	     
	$chatMessage=$_POST['chatMsg'];
$database->insertMessage($_SESSION['user'],$chatMessage);
		}
	else if($method==='onlineGuy')
		{
			$database->whoIsOnline();
		}
	}//End of Checking whether or not method varible has value

?>