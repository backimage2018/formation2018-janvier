	$(function() {
		 
		 $('.add-to-cart').on( "click", function(event) {
			 event.preventDefault();
			 $.ajax({
				 url:'/ajax/addtocart',
				 type:'POST',
				 data: {qty:1},
			 }).done(function(result){
				 console.log(`ajax done ${result}`);
				 //$('#newsletter_abonnement').html(result);
			 });
	    });
	});	