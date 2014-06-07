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

                        str = '<tr><th>Nume Prenume</th><th></th></tr>';

                        $.each(obj, function(i,val){   

                            // items.push();
                            str += '<tr class="odd"><td>' + val.numeProf + '</td>' + '<td><div class="arrow"/></td></tr><tr><td colspan="3"><h4>Lista temelor aferente acestui profesor</h4><ul>';
                            if ($.isArray(val.teme)) {

                                $.each(val.teme, function(i, homewrk){
                                    str += '<li>' + homewrk.titlu + '</li><ul>';
                                    if (homewrk.tipTema == 0) {
                                        str += '<li>Tema de licenta</li>';
                                    } else{
                                        str += '<li>Tema de masterat</li>';
                                    };
                                    if (homewrk.disp == 0) {
                                        str += '<li>Tema disponibila</li></ul>';
                                    } else{
                                        str += '<li>Tema indisponibila</li></ul>';
                                    };

                                });

                                
                            }
                            else
                            {
                                str += 'Acest profesor nu are nicio tema asociata!';
                            }
                            
                            str += '</ul></td></tr>';

                            items.push(str);

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
                alert('Error while request...');
            }
        });
        }
        return false;
      });

});