$(document).ready(function () 
{

	$(".popup").hide();
	$(".raspuns").click(function(){
		$(this).parent().siblings(".popup").slideDown(1000);
		$(this).hide();
	});

	$('.final').click(function()
		{
			$.ajax({
				type: 'post',
				url: 'http://localhost/Acatism/tasksProf/index',
				cache: false,
				data: {'id': $(this).attr("value"), isAjax: 1,
						'idTema': $(this).attr("name"),
						'et1':$(this).parent().siblings(".inPopup").children("form").children(".box").find(".desc").eq(0).val(),
						'data1': $(this).parent().siblings(".inPopup").children("form").children(".box").find(".data").eq(0).val(),
						'et2': $(this).parent().siblings(".inPopup").children("form").children(".box").find(".desc").eq(1).val(),
						'data2':  $(this).parent().siblings(".inPopup").children("form").children(".box").find(".data").eq(1).val(),
						'et3': $(this).parent().siblings(".inPopup").children("form").children(".box").find(".desc").eq(2).val(),
						'data3':  $(this).parent().siblings(".inPopup").children("form").children(".box").find(".data").eq(2).val(),
						'et4': $(this).parent().siblings(".inPopup").children("form").children(".box").find(".desc").eq(3).val(),
						'data4':  $(this).parent().siblings(".inPopup").children("form").children(".box").find(".data").eq(3).val(),
						'et5':$(this).parent().siblings(".inPopup").children("form").children(".box").find(".desc").eq(4).val(),
						'data5':  $(this).parent().siblings(".inPopup").children("form").children(".box").find(".data").eq(4).val(),
						'et6': $(this).parent().siblings(".inPopup").children("form").children(".box").find(".desc").eq(5).val(),
						'data6':  $(this).parent().siblings(".inPopup").children("form").children(".box").find(".data").eq(5).val()
					 	},
				success: function(response){
					alert (response);
					location.reload();
				},
				error: function(){
					alert("Eroare la adaugare");
				}
				});
		return false;
		});

	
	$(".raspuns1").click(function(){
		$.ajax({
			type: 'post',
			url:'http://localhost/Acatism/tasksProf/respingeAplicant',
			cache: false,
			data: {
				'id': $(this).attr("value"), isAjax: 1
			},
			success: function(response){
					alert (response);
					location.reload();

			},
			error: function(){
				alert("Eroare la respingere");

			}		
		});
		return false;
	});
});