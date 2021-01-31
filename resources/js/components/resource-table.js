$(window).on('load', function() {

	$(".table-resource .row-clickable").click(function(e) {
	  window.location = $(e.target).data('href');
	});

});
