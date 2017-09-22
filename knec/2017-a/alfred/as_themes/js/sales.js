	$(document).ready(function()
	{
		$("#drugitem").Watermark("Type a drug name");
		$("#drugitem").live("keyup",function() 
		{
			if ( $("#drugitem").val() == "Type a drug name" ) var drugitem = "";
			else var drugitem = $("#drugitem").val();
			
			if(drugitem.length < 1) $(".drugitemreslt").hide();
			if(drugitem.length > 0 && drugitem.length <= 30) showdrugsitems();
		});
		
		$("#drug_quantity").live("keyup",function() 
		{
			var qty = $("#drug_quantity").val();
			var stock = $("#drug_stock").val();
			if (qty > stock) 
				document.getElementById("drug_quantity").value =  stock;
			
			document.getElementById("total_price").value =  $("#drug_quantity").val() * $("#drug_price").val();			
		});
	});


	function showdrugsitems(){	
		$.ajax({  
			url: 'as_ajax.php?action=getdrugs&&drugitem=' + $("#drugitem").val(),  
			beforeSend: function() 
			{
				$("#drugitemreslt").hide();
			},  
			success: function(response)
			{
				$("#drugitemreslt").show();
				$("#drugitemreslt").html(response);
			}	   
		});	
	}
	
	function selectDrugsItem(drugid, title){
		$.ajax({  
			url: 'as_ajax.php?action=getdetail&&drugid=' + drugid,  
			beforeSend: function() 
			{
				document.getElementById("drug_title").value = title;
			},  
			success: function(response)
			{
				var [unit, price, stock] = response.split( '||');
				$("#drug_containers").html('Number of ' + unit + 's:');
				if (price < 2) 
					document.getElementById("drug_quantity").value = price;
				else document.getElementById("drug_quantity").value = 2;
				document.getElementById("drugitem").value = '';
				document.getElementById("drug_price").value = price;
				document.getElementById("drug_stock").value = stock;
				document.getElementById("drug_drugid").value = drugid;
				document.getElementById("total_price").value = $("#drug_quantity").val() * price;
				$("#drugitemreslt").hide();				
			}	   
		});
	}
