//MENU NAVIGATION//
;(function(){

			// Menu settings
			$('#menuToggle, .menu-close').on('click', function(){
				$('#menuToggle').toggleClass('active');
				$('body').toggleClass('body-push-toleft');
				$('#theMenu').toggleClass('menu-open');
			});


})(jQuery)

//PAGE LOADER//
$(document).ready(function(){
    setTimeout(function(){
        $('body').addClass('loaded');

    }, 3000);
});
