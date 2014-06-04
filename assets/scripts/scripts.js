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
			case "student": $("#inAnul").show(1000);
							$("#anStudent").show(1000);
							$("#grupa").show(1000);
							$("#signUpGrupa").show(1000);
							$("#nrMatricol").show(1000);
							$("#signUpCod").show(1000);
							$("#anMasterand").hide();
							$("#nrMatricol").text("Nr. matricol ");
							break;
			case "masterand": $("#inAnul").show(1000);
							$("#anMasterand").show(1000);
							$("#grupa").show(1000);
							$("#signUpGrupa").show(1000);
							$("#nrMatricol").show(1000);
							$("#signUpCod").show(1000);
							$("#anStudent").hide();
							$("#nrMatricol").text("Nr. matricol ");
							break;
			case "profesor": $("#nrMatricol").text("Cod personal ");
							$("#inAnul").hide();
							$("#anStudent").hide();
							$("#anMasterand").hide();
							$("#grupa").hide();
							$("#signUpGrupa").hide();
							$("#signUpCod").show(1000);
							break;
		}
	});
}

