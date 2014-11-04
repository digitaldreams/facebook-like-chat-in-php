<?php
require_once 'dbconnect.php';
class database{
	public $db,$result;
	protected $rows;
	function __construct(PDO $db){
	  $this->db=$db;	
		}
	protected function query($sql){
		$this->result=$this->db->query($sql);
		
		}
	protected function rows(){
		for($x=1;$x<=$this->result->rowCount();$x++){
			$this->rows[]=$this->result->fetch(PDO::FETCH_ASSOC);			
			}
			return $this->rows;
		
		}
		
		
	public function fetchMessage(){
		$this->query("SELECT * FROM messages as M JOIN user as U ON M.user_id=U.user_id ORDER BY M.chattime DESC");
		return $this->rows();
		}
		
	
	public function insertMessage($user_id,$message){
		$time=time();
		$insertMessage=$this->db->prepare("INSERT INTO messages 
		         (`user_id`,`mes_body`,`chattime`)
		         VALUES(:user_id,:message,:chatime)");
	  $insertMessage->bindParam(":user_id",$user_id,PDO::PARAM_INT);
	   $insertMessage->bindParam(":message",$message,PDO::PARAM_STR);
	     $insertMessage->bindParam(":chatime",$time,PDO::PARAM_INT);
	   // $insertMessage->bindParam(":timestamp","UNIX_TIMESTAMP",PDO::PARAM_INT);
				$insertMessage->execute(); 
		}
	public function whoIsOnline(){
		$onlineGuy=$this->db->query("SELECT * FROM user WHERE online_status='1'");
		while($onlineMan=$onlineGuy->fetch(PDO::FETCH_ASSOC)){
			echo "<li><a href=\"#\">$onlineMan[username]</a></li>";
			}
		}
	
	
	}//End of the database class
	
?>