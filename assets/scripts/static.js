window.onload=initAll

var indice=0;

function initAll()
{
	schimba("#profesori");
	schimba("#teme");
	schimba("#proiect");
	schimba("#profil");
	$("#linie").hide();
	$("#slideMeniu").hide();
	$("#subSlideMeniu").hide();

	$(document).mouseup(function (e)
{
    var container = $("#username");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        		$("#linie").hide();
				$("#slideMeniu").hide();
				$("#subSlideMeniu").hide();
				if (indice%2==1) indice++;
    }
});

	$("#username").click(function()
		{
			if(indice%2==0)
			{
				$("#linie").show();
				$("#slideMeniu").slideDown(1000);
				$("#subSlideMeniu").show();
			}
			else
			{
				$("#linie").hide();
				$("#slideMeniu").hide();
				$("#subSlideMeniu").hide();
			}
			indice++;
		});

	$("#username").mouseover(function()
		{
			$(".user").css("color", "white");
		});
	$("#username").mouseout(function()
		{
			$(".user").css("color", "rgb(153, 217, 234)");
		});
}

function schimba(ceva)
{
	$(ceva).mouseover(function()
		{
			$(this).css("margin-left", "2px");
			//$(this).css("color", "red");
		});
	$(ceva).mouseout(function()
		{
			$(this).css("margin-left", "-2px");
			$(this).css("transition-delay", "0.1s");
			//$(this).css("color", "black");
		
		});
	$(ceva).click(function()
		{

		});
}
