	$(function() {
		 $('#newsletter').on( "click", function(event) {
			 event.preventDefault();
		     $('html, body').animate({'scrollTop' : $('#newsletter_input').offset().top}, 1000);
			 $('#newsletter_input').focus();
		    });
		 $('#newsletter_abonnement').on( "click", function(event) {
			 event.preventDefault();
			 $.ajax({
				 url:'/newsletter',
				 type:'POST',
				 data: {email:$('#newsletter_input').val()},
			 }).done(function(result){
				 $('#newsletter_abonnement').html(result);
			 });
	    });
	});	