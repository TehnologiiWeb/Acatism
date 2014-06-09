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

    $('.applyBtn').click(function(){

        $.ajax({
            type: 'post',
            url: 'http://localhost/Acatism/listaTemeStud/aplica',
            cache: false,
            data : { 'idTema' : $(this).attr('value') },
            success: function(response){
                alert(response);
            },
            error: function() {
                 alert('Error while request..');
            }

        });

        return false;
    });

    $('#search').keyup(function(){

        $.ajax({
            type: 'post',
            url: 'http://localhost/Acatism/listaTemeAjax',
            cache: false,     
            data: { 'search' : $(this).val(), isAjax: 1 },
            success: function(response){
                $('#tableList').html('');

                var obj = $.parseJSON(response);

                if(obj.length > 0){

                    try{

                        var items=[];   

                        items.push('<tr><th>Titlul lucrarii</th><th>Profesor indrumator</th><th></th></tr>');

                        $.each(obj, function(i,val){   

                            items.push('<tr class="odd"><td>' + val.titlu + '</td>' + '<td>' + val.nume + '</td><td><div class="arrow"/></td></tr><tr><td colspan="3"><h4>Descriere proiect</h4><p>'+ val.description +  '</p><button class="applyBtn" type="button" value="'+ val.id +'">Aplica!</button></td></tr>');

                            console.log(items);

                        }); 
                        $('#tableList').replaceWith('<table id="tableList"></table>');
                        $('#tableList').append(items);
                        $('#tableList').jExpand();

                    }catch(e) {

                        alert('Exception while request..');

                    }       
                }else{
                    $('#tableList').html($('<table id="tableList"></table>').text('No Data Found'));       
                }       
                
            },
            error: function(){                      
                alert('Error while request..');
            }
        });
        return false;
      });


});