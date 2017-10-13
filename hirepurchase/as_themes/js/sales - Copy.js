	$(document).ready(function()
	{
		document.getElementById("item_title").focus();
		//$("#item_title").Watermark("Type a item name");
		$("#item_title").live("keyup",function() 
		{
			var item_title = $("#item_title").val();
			if(item_title.length < 1) $(".itemsearchreslt").hide();
			if(item_title.length > 0 && item_title.length <= 30) showsaleitems();			
		});
		
		$("#item_quantity").live("keyup",function() 
		{
			//document.getElementById("total_price").value =  $("#item_quantity").val() * $("#item_price").val();			
		});
	});


	function showsaleitems(){	
		$.ajax({  
			url: 'as_ajax.php?action=getitems&&item_title=' + $("#item_title").val(),  
			beforeSend: function() 
			{
				$("#itemsearchreslt").hide();
			},  
			success: function(response)
			{
				$("#itemsearchreslt").show();
				//$("#itemsearchreslt").html(response);
				$("#itemsearchreslt").innerHTML = response;
				//document.getElementById('anrede').innerHTML = response;
			}	   
		});
	}
	
	function selectItemsItem(itemid, title){
		$.ajax({  
			url: 'as_ajax.php?action=getdetail&&itemid=' + itemid,  
			beforeSend: function() 
			{
				document.getElementById("item_title").value = title;
			},  
			success: function(response)
			{
				var [unit, price] = response.split( '||');
				$("#item_containers").html('Number of ' + unit + 's:');
				document.getElementById("item_quantity").value = 2;
				document.getElementById("item_price").value = price;
				document.getElementById("total_price").value = $("#item_quantity").val() * price;
				$("#itemsearchreslt").hide();				
			}	   
		});
	}
