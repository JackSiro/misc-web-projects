/********************************************************************************
* This script is brought to you by Vasplus Programming Blog.
* Website: www.vasplus.info
* Email: info@vasplus.info
*********************************************************************************/


//This function is only called when you click on a user and its only for displaying Users Information and thats all.
function clickable(user_id, user_name, user_fullname)
{
	$("#vpv_search_box").val('');
	$(".vpb_search_results").hide();
	alert('The Information of the user you have just clicked are show below\n\nUser ID: '+user_id+'\nUsername: '+user_name+'\nFullname: '+user_fullname+'\n\nThank You!');
}





//If the search button is not clicked then automatically search for Search Term as the user types in a word
$(document).ready(function()
{
	$("#vpv_search_box").Watermark("Search for people or pages");
	$("#vpv_search_box").live("keyup",function() 
	{
		if ( $("#vpv_search_box").val() == "Search for people or pages" )
		{
			var vpv_search_box = "";
		}
		else
		{
			var vpv_search_box = $("#vpv_search_box").val();
		}
		var response_brought = $("#response_brought");
		var dataString = "vpv_search_box=" + vpv_search_box;
		
		if(vpv_search_box.length > 30)
		{
			$("#vpv_search_box").val('');
			$(".vpb_search_results").show();
			$("#response_brought").html('<li class=" more" ><a href="javascript:void(0);"><span class="text">Search term must not be greater than 30 characters.</span><span class="category">Please search for others words instead...</span></a></li>');
		}
		else if(vpv_search_box.length < 1)
		{
			$("#response_brought").html("");
			$(".vpb_search_results").hide();
		}
		else if(vpv_search_box.length > 0 && vpv_search_box.length <= 30)
		{
			vpb_auto_search_people_and_pages(); //Search function is called after validation process
		}
	});
});




		
//If search button is clicked then call this function directly
function vpb_auto_search_people_and_pages()
{
	if ( $("#vpv_search_box").val() == "Search for people or pages" )
	{
		var vpv_search_box = "";
	}
	else
	{
		var vpv_search_box = $("#vpv_search_box").val();
	}
	var response_brought = $("#response_brought");
	var dataString = "vpv_search_box=" + vpv_search_box;
	
	if(vpv_search_box.length > 30)
	{
		$("#vpv_search_box").val('');
		$(".vpb_search_results").show();
		$("#response_brought").html('<li class=" more" ><a href="javascript:void(0);"><span class="text">Search term must not be greater than 30 characters.</span><span class="category">Please search for others words instead...</span></a></li>');
	}
	else if(vpv_search_box.length < 1)
	{
		$("#response_brought").html("");
		$(".vpb_search_results").hide();
	}
	else if(vpv_search_box.length > 0 && vpv_search_box.length <= 30)
	{	
		$.ajax({  
			type: "POST",  
			url: "vpb_auto_suggest.php",  
			data: dataString,
			beforeSend: function() 
			{
				$(".vpb_search_results").show();
				$("#response_brought").html('<li class=" more" ><a href="javascript:void(0);"><span class="text">Searching <img src="images/loading.gif" align="absmiddle" alt="Searching '+vpv_search_box+'..."></span></a></li>');
			},  
			success: function(response)
			{
				$(".vpb_search_results").show();
				$("#response_brought").html(response);
			}
		   
		}); 
	}
	else
	{
		$(".vpb_search_results").show();
		$("#response_brought").html('<li class=" more" ><a href="javascript:void(0);"><span class="text">Search term must not be less than 1 or greater than 30 characters.</span><span class="category">Please search for others words instead...</span></a></li>');
	}
	return false;
}