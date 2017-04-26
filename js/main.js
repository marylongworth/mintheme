jQuery(document).ready(function($) {
 
	// initialize Isotope after all images have loaded
	var $container = $('#portfolio-items').imagesLoaded( function() {
		$container.isotope({
	        itemSelector: '.grid-item',
	        layoutMode: 'masonry',
	        sortBy : 'asc'
	    });
	});
	 
	// filter items on button click
	$('#filters').on( 'click', 'button', function() {
	  var filterValue = $(this).attr('data-filter');
	  $container.isotope({ filter: filterValue });
	});   
 
});

