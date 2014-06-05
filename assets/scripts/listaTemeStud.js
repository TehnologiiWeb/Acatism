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


    $('#searchInput').keyup(function(){
        var searchInput = $(this).val();
        var dataString = 'keyword' + searchInput;

        if (searchInput.length > 3){
            // $.ajax({
            //     type: "GET",
            //     url
            // })
        }
        
    })


})(jQuery); 