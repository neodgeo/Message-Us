jQuery(function($){
	var $data = $('.infoPopup').html();
	
	if($data !== null && $data !== undefined){
		$data= JSON.parse($data);
		$data = extractText($data);
		console.log($data);
		

		
		var html = '<div class="popup" data-popup="popup-1" style="display: block;"><div class="popup-inner"><a class="popup-close" data-popup-close="popup-1" href="#">x</a></div></div>';
		$('body').append(html);
		var $popup = $('.popup');
		$('.popup-close').on('click', function(e)  {
	        $popup.fadeOut(350);
	 
	        e.preventDefault();
	    });
	    $('.popup-inner').prepend('<p class=\'msg-pop\'>'+$data[5]+'</p>');
	    $('.popup-inner').prepend('<h2>'+$data[3]+'</h2>');
	    $('.popup-inner').append('<a href="https://m.me/'+$data[1]+'" target=_blank>Message us</a>');

	   $('.popup-inner').css({
	    	"background":$data[7],
	    	"color":$data[9]
	    })
		
	}
	
	

});
function extractText( str ){
  var ret =[];
  	
  	var arr= str.split(';');
  	for(var i =0; i< arr.length; i++){
  		if(arr[i].match( /"(.*?)"/ ) !== null){
  			ret.push(arr[i].match( /"(.*?)"/ )[1]);
  		}
  		
  		
  		
  	}
 

  return ret;
}
