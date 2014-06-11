$(document).ready(function () 
{
	$(".final").click(function(){
		$.ajax({
				type: 'post',
				url: 'http://localhost/Acatism/tasksProf/realizareEtapa',
				cache: false,
				data: {'idTema': $(this).attr("value"), isAjax: 1,
						'nrEtapa': $(this).attr("name")
					 	},
				success: function(response)
				{
					//alert(response);
					location.reload();
				},
				error: function(){alert("Eroare la adaugare");}
				});
		return false;
	});

	$(".editare").click(function(){
		$.ajax({
				type: 'post',
				url: 'http://localhost/Acatism/tasksProf/editareEtape',
				cache: false,
				data: {'id': $(this).attr("value"), isAjax: 1,
						'et1': $(this).parent().siblings().children(".iDesc").eq(0).val(),
						'data1': $(this).parent().siblings().children(".iData").eq(0).val(),
						'et2': $(this).parent().siblings().children(".iDesc").eq(1).val(),
						'data2': $(this).parent().siblings().children(".iData").eq(1).val(),
						'et3': $(this).parent().siblings().children(".iDesc").eq(2).val(),
						'data3': $(this).parent().siblings().children(".iData").eq(2).val(),
						'et4': $(this).parent().siblings().children(".iDesc").eq(3).val(),
						'data4': $(this).parent().siblings().children(".iData").eq(3).val(),
						'et5': $(this).parent().siblings().children(".iDesc").eq(4).val(),
						'data5':$(this).parent().siblings().children(".iData").eq(4).val(),
						'et6': $(this).parent().siblings().children(".iDesc").eq(5).val(),
						'data6':$(this).parent().siblings().children(".iData").eq(5).val(),
					 	},
				success: function(response)
				{alert(response);
				location.reload();},
				error: function()
				{alert("Eroare la adaugare");}
				});
		return false;		
	});
	$(".editare1").click(function(){
		$.ajax({
				type: 'post',
				url: 'http://localhost/Acatism/tasksProf/stergeStudent',
				cache: false,
				data: {'idTema': $(this).attr("value"), isAjax: 1,
						'id':  $(this).attr("name")
					 	},
				success: function(response)
				{alert(response);
				location.reload();},
				error: function(){alert("Eroare la adaugare");}
				});
		return false;		
	});
});