 "use strict";

(function(){
	
	var count;
	var nodes;
	var root_node;
	var width;
	var height;
	var root_radius;
	var root_to_node;
	var node_radius;

	function initialize (params, DOM) {
		var count = params.count;
		var nodes = params.members;
		var root_node = params.user;
		var width = $('#');

		var template = Handlebars.compile(DOM.html());
		var html = template(data);
		$('#tags-container').html(html);
	}

	function Request(url, DOM){
		$.ajax({
			type : "post",
			url : url,
			dataType : "json"
		}).done(function(data){
			initialize(data, DOM);
		}).fail(function(data){
			console.log("Could not retrieve the tags");
		});
	}

	$('#family').click(function(){
		var url = '/family';
		var DOM = $("#family-tree");
		Request(url, DOM);
	}

}());

<script type="text/x-handlebars" id="family-tree">
    <div class="family-tree">
        @{{#each_upto this 5}}

        @{{/each_upto}}
    </div>
</script>
