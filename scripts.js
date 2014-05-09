window.onload=initAll;

function initAll()
{
	$("#inAnul").hide();
	$("#anStudent").hide();
	$("#anMasterand").hide();
	$("#grupa").hide();
	$("#signUpGrupa").hide();
	$("#nrMatricol").hide();
	$("#signUpCod").hide();

	$("#tipUser").change(function(){
		switch($("#tipUser option:selected").text())
		{
			case "student": $("#inAnul").show();
							$("#anStudent").show();
							$("#grupa").show();
							$("#signUpGrupa").show();
							$("#nrMatricol").show();
							$("#signUpCod").show();
							$("#anMasterand").hide();
							$("#nrMatricol").text("Nr. matricol ");
							break;
			case "masterand": $("#inAnul").show();
							$("#anMasterand").show();
							$("#grupa").show();
							$("#signUpGrupa").show();
							$("#nrMatricol").show();
							$("#signUpCod").show();
							$("#anStudent").hide();
							$("#nrMatricol").text("Nr. matricol ");
							break;
			case "profesor": $("#nrMatricol").text("Cod personal ");
							$("#inAnul").hide();
							$("#anStudent").hide();
							$("#anMasterand").hide();
							$("#grupa").hide();
							$("#signUpGrupa").hide();
							$("#signUpCod").show();
							break;
		}
	});
}

