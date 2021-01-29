$(window).on('load', function() {

	$(".resource-table .row-clickable").click(function(e) {
		console.log("TEsting");
	  window.location = $(e.target).data('href');
	});

});
