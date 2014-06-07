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
        if($(this).val().length>1){

        $.ajax({
            type: 'post',
            url: 'http://localhost/Acatism/listaProfsAjax',
            cache: false,     
            data: { 'search' : $(this).val(), isAjax: 1 },
            success: function(response){
                $('#tableList').html('');

                var obj = $.parseJSON(response);

                if(obj.length > 0){

                    try{

                        var items=[];   

                        items.push('<tr><th>Nume Prenume</th><th></th></tr>');

                        $.each(obj, function(i,val){   

                            items.push('<tr class="odd"><td>' + val.numeProf + '</td>' + '<td><div class="arrow"/></td></tr><tr><td colspan="3"><h4>Lista temelor aferente acestui profesor</h4>');
                            items.push('<ul>');
                            $.each(val.teme, function(i, homewrk){
                                items.push('<li>' + homewrk.titlu + '</li><ul>');
                                if (homewrk.tipTema == 0) {
                                    items.push('<li>Tema de licenta</li>');
                                } else{
                                    items.push('<li>Tema de masterat</li>');
                                };
                                if (homewrk.disp == 0) {
                                    items.push('<li>Tema disponibila</li>');
                                } else{
                                    items.push('<li>Tema indisponibila</li>');
                                };
                            });

                            items.push('</ul></td></tr>');

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
        }
        return false;
      });

});