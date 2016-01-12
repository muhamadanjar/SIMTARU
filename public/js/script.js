(function($, window, document){
	$(function() {
        $("#btn_s").click(function(e){
		    e.preventDefault();
		    var $form = $( this ),
		    term = $form.find( "input[name='title']" ).val(),
		    _token = $form.find( "input[name='_token']" ).val(),
		    title = $form.find( "input[name='title']" ).val(),
		    caption = $form.find( "input[name='caption']" ).val(),
		    url_ = $form.find( "input[name='url']" ).val(),
		    link = $form.find( "input[name='link']" ).val(),

		    url = $form.attr( "action" );
		    


		    $.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
		    $.ajax({
				url: url,
				data:{
					'title':title,
					'caption':caption,
					'url':url_,
					'link':link,
				 	'_token': $('input[name=_token]').val(),
				},
				type: 'POST',
				dataType: 'json',
				
				success: function(data){
					console.log(data);
				},
				error: function(jqXHR, textStatus, errorThrown) {
				  	console.log(textStatus, errorThrown);
				}
			});
		});   

  	});
}(jQuery, window, document));