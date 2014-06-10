$(document).ready(function () {

    $('#jstree').jstree({
      "core" : {
        "animation" : 0,
        "check_callback" : true,
        "themes" : { "stripes" : true }
      },
      "types" : {
        "#" : {
          "max_children" : 1, 
          "max_depth" : 4, 
          "valid_children" : ["root"]
        },
        "root" : {
          "icon" : "/static/3.0.1/assets/images/tree_icon.png",
          "valid_children" : ["default"]
        },
        "default" : {
          "valid_children" : ["default","file"]
        },
        "file" : {
          "icon" : "glyphicon glyphicon-file",
          "valid_children" : []
        }
      },
      "plugins" : [
        "contextmenu", "dnd", "search",
        "state", "types", "wholerow"
      ]
    	});

	$('#jstree').on("changed.jstree", function (e, data) {

        var i, j, r = [];
        var str = "";

	    for(i = 0, j = data.selected.length; i < j; i++) {

	    	str = data.instance.get_node(data.selected[i]).text; 

	    	r.push(str);
	    }
	    $('#event_result').html('Selected: ' + r.join(', '));

		var parents = $(this).jstree("get_path", $.trim($(this).jstree('get_selected')));
		var path = $.map(parents, function(val, index){
			var str = val;
			return $.trim(str);
		}).join('/');

        $.ajax({
            type: 'post',
            url: 'http://localhost/Acatism/continutFisAjax',
            cache: false,
            data : { 'path' : path, isAjax : 1 },
            success: function(response){
                alert(response);
            },
            error: function() {
                 alert('Error while request...');
            }

        });

	    $('#event_result2').html('Path: ' + path);
    }); 


    /*$('button').on('click', function () {

		$('#jstree').jstree(true).select_node('child_node_1');
		$('#jstree').jstree('select_node', 'child_node_1');
		$.jstree.reference('#jstree').select_node('child_node_1');

    });*/

});