	$(document).ready(function()
	{
		$("#itemitem").Watermark("Type a shopitem name");
		$("#itemitem").live("keyup",function() 
		{
			if ( $("#itemitem").val() == "Type a shopitem name" ) var itemitem = "";
			else var itemitem = $("#itemitem").val();
			
			if(itemitem.length < 1) $(".itemitemreslt").hide();
			if(itemitem.length > 0 && itemitem.length <= 30) showitemsitems();
		});
		
		$("#item_quantity").live("keyup",function() 
		{
			var qty = $("#item_quantity").val();
			var stock = $("#item_stock").val();
			if (qty > stock) 
				document.getElementById("item_quantity").value =  stock;
			
			document.getElementById("total_price").value =  $("#item_quantity").val() * $("#item_price").val();			
		});
	});


	function showitemsitems(){	
		$.ajax({  
			url: 'as_ajax.php?action=getitems&&itemitem=' + $("#itemitem").val(),  
			beforeSend: function() 
			{
				$("#itemitemreslt").hide();
			},  
			success: function(response)
			{
				$("#itemitemreslt").show();
				$("#itemitemreslt").html(response);
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
				var [unit, price, stock] = response.split( '||');
				$("#item_containers").html('Number of ' + unit + 's:');
				if (price < 2) 
					document.getElementById("item_quantity").value = price;
				else document.getElementById("item_quantity").value = 2;
				document.getElementById("itemitem").value = '';
				document.getElementById("item_price").value = price;
				document.getElementById("item_stock").value = stock;
				document.getElementById("item_itemid").value = itemid;
				document.getElementById("total_price").value = $("#item_quantity").val() * price;
				$("#itemitemreslt").hide();				
			}	   
		});
	}
