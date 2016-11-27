jQuery(function($){

	$('<div class="popup" data-popup="popup-1" style="display: block;">   <div class="popup-inner">        <h2>Maintenance</h2>        <p>Nous vous informons que votre site préféré sera en maintenance dans quelques heures pour une durée indéterminée.</p>        <p><a data-popup-close="popup-1" href="#">Close</a></p>        <a class="popup-close" data-popup-close="popup-1" href="#">x</a>    </div></div>').insertAfter($('body'));

});

jQuery(function($){ 
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
 
        e.preventDefault();
    });
});
