$(document).ready(function () {
    $.fn.jExpand = function(){
        var element = this;

        $(element).find('tr:odd').addClass('odd');
        $(element).find('tr:not(.odd)').hide();
        $(element).find('tr:first-child').show();

        $(element).find('tr.odd').click(function() {
            $(this).next('tr').toggle();
        });
        
    }    

    $('#tableList').jExpand();

    $('#search').keyup(function(){
        if($(this).val().length>3){
        $.ajax({
            type: 'post',
            url: 'http://localhost/Acatism/listaTemeStud',
            cache: false,     
            data:'search='+$(this).val(),
            success: function(response){
                $('#finalResult').html('');

                console.log(response );

                var obj = $.parseJSON(response);

                if(obj.length>0){
                    try{
                        var items=[];   
                        $.each(obj, function(i,val){   
                            console.log(val);                                         
                            items.push($('<li/>').text(val.titlu));
                        }); 
                        $('#finalResult').append.apply($('#finalResult'), items);
                    }catch(e) {     
                        alert('Exception while request..');
                    }       
                }else{
                    $('#finalResult').html($('<li/>').text('No Data Found'));       
                }       
                
            },
            error: function(){                      
                alert('Error while request..');
            }
        });
        }
        return false;
      });


});