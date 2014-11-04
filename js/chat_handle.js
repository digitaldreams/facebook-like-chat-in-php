// JavaScript Document
var chat={};
chat.collectMessage=function(){
	$.ajax({
		url:'ajax/ajax_response.php',
		type:'post',
		data:{method:'collect'},
		success: function(data){
			$('.chat_box').html(data);
			//alert(data);
			}
		
		});
	
	}//End of the chat.collectmessage 
	
chat.insertMessage=function(message){
	if($.trim(message).length!=0){
		
			$.ajax({
			url:'ajax/ajax_response.php',
			type:'post',
			data:{method:'insert',message:message},
			success: function(data){
				chat.collectMessage();
				chat.entry.val('');
				
				}
			
				});
		}
	
	
	
	}//End of the insertMessage 	
	
	
	
	
chat.entry=$('#message');
chat.entry.bind('keydown', function(e){
	//console.log(e.keyCode);
	if(e.keyCode===13)
	{
		
		chat.insertMessage($(this).val());
		//e.preventDefault();
		}
	})//End of the Bind event handler
	
	
	

chat.interval=setInterval(chat.collectMessage,2000);