	function startVoting()
	{
		$("#start_voting").hide();
		$("#Post_1").show();
	}
	
	function submitVote(ipost)
	{
		var form_data = "candidate=" + $("#candidate").val();
		var inew = ipost + 1;
		$.ajax({  
			type: "POST",
			url: 'as_ajax.php?action=submitvote',
			data: form_data,
			beforeSend: function() 
			{
				$("#Post_" + ipost).hide();
				$("#response_gif").show();
			},  
			success: function(response)
			{
				$("#response_gif").hide();
				$("#Post_" + inew).show();
			}
		}); 
	}
	