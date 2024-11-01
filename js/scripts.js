jQuery(document).ready(function() {
jQuery('.form').find('input, textarea').on('keyup blur focus', function (e) {

  var $this = jQuery(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});


jQuery("#subscriptionform").submit(function(event){
    // cancels the form submission
    event.preventDefault();
   wns_subscribe_user();
});


});




function wns_subscribe_user()
{
var fname=jQuery('#user_fname').val();	
var lname=jQuery('#user_lname').val();
var email=jQuery('#user_email').val();	
var str = 'action=wns_add_user_to_mailchimplist&email='+email+'&fname='+fname+'&lname='+lname;
jQuery.ajax({
		url: ajaxurl,
		data: str,
		type: 'POST',
		success:function(data){
			jQuery('#subscriptionform').remove();
			jQuery('#signup').append( data);	
		
			
		},
		error:function(data){alert(data);
			alert(data.error);
		}		
	});

}
