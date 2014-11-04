$(document).ready(function(e) {
	
   var collectData=function(){
		$.ajax({
		url:'ajax/ajax_response.php',
		type:'post',
		data:{method:'collect'},
		success: function(data){
			$('.chat_box').html(data);
			//alert(data);
			}
		
		});
		
		}//End of collectData function
		
	collectData;	
  setInterval(collectData,1000);
  
function insertData(chatBody){
	$.trim(chatBody);
	
		$.ajax({
		url:'ajax/ajax_response.php',
		type:'post',
		data:{method:'insert',chatMsg:chatBody},
		success: function(data){
			//when textarea's messge sucessfully inserted to database then we have to call collectdata immediately
			//should not wait interval time.
			//then we make the text area blank for next chat message
			collectData;
			$('#message').val('');
			}
		
		});
	
	}

$('#message').on('keydown',function(e){
  var chat=$(this).val();
  //Thats means when a someone hit enter key then we sent textarea's value to insert and 
  
  if(e.keyCode===13){
	 //alert(chat)
	   insertData(chat);
	    e.preventDefault();	  
	  }

	})	//end o keydown funcion

   var whoIsOnline=function(){
		$.ajax({
		url:'ajax/ajax_response.php',
		type:'post',
		data:{method:'onlineGuy'},
		success: function(data){
			$('#whoisonline ul').html(data);
			//alert(data);
			}		
			});
				
		}//End of whoIsonline function
		setInterval(whoIsOnline,1000);

});