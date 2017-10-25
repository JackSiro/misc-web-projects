	$(document).ready(function()
	{
		document.getElementById("getItemTitle").focus();
		//$("#getItemTitle").Watermark("Type a item name");
		var table = document.getElementById("saleNow");
			
		$("#getItemTitle").live("keyup",function() 
		{
			var getItemTitle = $("#getItemTitle").val();
			if(getItemTitle.length < 1) $(".itemsearchreslt").hide();
			if(getItemTitle.length > 0 && getItemTitle.length <= 30) showsaleitems();			
		});
		
		$("#getItemTitle").keyup(function (e) {
			var getItemTitle = $("#getItemTitle").val();
			var total_price = parseInt($("#total_price").val());
			if (e.keyCode == 13) {	
				if (getItemTitle.length > 0) {
					var row = table.insertRow(0);
					row.insertCell(0).innerHTML = $("#item_image").val();
					row.insertCell(1).innerHTML = $("#item_stock").val();
					row.insertCell(2).innerHTML = 2;
					row.insertCell(3).innerHTML = $("#item_price").val() + '.00';
					
					var newprice = total_price + parseInt($("#item_price").val())
					document.getElementById("total_price").value = newprice;
					document.getElementById("getItemTitle").value = '';
					document.getElementById("total_pricenow").innerHTML = total_price + '.00';
					$("#itemsearchreslt").hide();
				}
			}
		});

		$("#item_quantity").live("keyup",function() 
		{
			//document.getElementById("total_price").value =  $("#item_quantity").val() * $("#item_price").val();			
		});
	});


	function showsaleitems(){	
		$.ajax({  
			url: 'as_ajax.php?action=getitems&&item_image=' + $("#getItemTitle").val(),  
			beforeSend: function() 
			{
				$("#itemsearchreslt").hide();
			},  
			success: function(response)
			{
				$("#itemsearchreslt").show();
				$("#itemsearchreslt").html(response);
			}	   
		});
	}
	
	function selectItemsItem(itemid, title){
		$.ajax({  
			url: 'as_ajax.php?action=getdetail&&itemid=' + itemid,  
			beforeSend: function() 
			{
				document.getElementById("getItemTitle").value = title;
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
