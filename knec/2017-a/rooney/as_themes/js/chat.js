
function showcomplaintAreax(){	
	$("#complaintBegin").hide();
	$("#complainttingArea").show();
}

function showcomplaintArea(){	
	$.ajax({  
		url: 'as_ajax.php?action=startcomplaint&&fullname=' + $("#fullname").val() + '&&username=' + $("#nickname").val() + '&&email=' + $("#email").val(),  
		beforeSend: function() 
		{
			$("#begincomplaint").html('<h4> Starting the complaint ...</h4>');
		},  
		success: function(response)
		{
			$("#complainttingArea").show();
			$("#complaintBegin").hide();
			$("#complaints_complaint").append(response);
		}	   
	});	
}

function sendcomplaintcomplaint(){
	$.ajax({  
		url: 'as_ajax.php?action=newcomplaint&&complaint=' + $("#complaint_tosend").val() + '&&client=' + $("#clientid").val(),  
		beforeSend: function() 
		{
			//$("#begincomplaint").html('<h4> Starting the complaint ...</h4>');
		},  
		success: function(response)
		{
			$("#complaints_complaint").append('<table class="complaints_view"><tr><td class="complaint_username" valign="top">Me: </td>' + 
		'<td class="complaint_complaint">' + $("#complaint_tosend").val() + '</td></tr></table>');
			$("#complaint_tosend").val() == '';
		}	   
	});	
}