(function($){
    $.fn.jExpand = function(){
        var element = this;

        $(element).find("tr:odd").addClass("odd");
        $(element).find("tr:not(.odd)").hide();
        $(element).find("tr:first-child").show();

        $(element).find("tr.odd").click(function() {
            $(this).next("tr").toggle();
        });
        
    }    

    $('#tableList').jExpand();

    $("#search").keyup(function(){
        if($("#search").val().length>3){
        $.ajax({
            type: "post",
            url: "http://localhost/Acatism/listaTemeStud",
            cache: false,               
            data:'search='+$("#search").val(),
            success: function(response){
                $('#finalResult').html("");
                var obj = JSON.parse(response);
                if(obj.length>0){
                    try{
                        var items=[];   
                        $.each(obj, function(i,val){                                            
                            items.push($('<li/>').text(val.titlu));
                        }); 
                        $('#finalResult').append.apply($('#finalResult'), items);
                    }catch(e) {     
                        alert('Exception while request..');
                    }       
                }else{
                    $('#finalResult').html($('<li/>').text("No Data Found"));       
                }       
                
            },
            error: function(){                      
                alert('Error while request..');
            }
        });
        }
        return false;
      });


})(jQuery); 