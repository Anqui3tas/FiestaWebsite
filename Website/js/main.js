$(function(){
	
	// catgal

	$('.catgal a').click(function(e){
		e.preventDefault();
		
		$('.catgal a').removeClass('active');
		$(this).addClass('active');

		catgal();
	});

	// lightbox

	$('.lightbox').lightbox();
});


function catgal() {
	var tabActive = $('.catgal a.active').data('tabActive');

	$('.galitem .gall').addClass('active');
	$(tabActive).removeClass('active');
}