 <div class="form">
      
 
        <div id="signup">   
          <h4> <?php _e(newsletter_subscription_get_option('wns_form_title'),'wns')?></h4>
          
          <form  method="post" id="subscriptionform" >
       
	   
          <div class="top-row">
		<?php

		
	 if(get_option('fname')=='1')
		{ ?> 
	           <div class="field-wrap">
              <label>
              <?php _e(newsletter_subscription_get_option('wns_first_name'),'wns')?><span class="req">*</span>
              </label>
              <input type="text" id="user_fname" required autocomplete="off" />
            </div>
          <?php } ?>

		<?php if(get_option('lname')==1)
		{ ?> 
            <div class="field-wrap">
              <label>
                <?php _e(newsletter_subscription_get_option('wns_last_name'),'wns')?><span class="req">*</span>
              </label>
              <input type="text" id="user_lname" required autocomplete="off"/>
            </div>
	<?php } ?>
          </div>

          <div class="field-wrap">
            <label>
             <?php _e("Email Address","wns")?><span class="req">*</span>
            </label>
            <input type="email" id="user_email" required autocomplete="off"/>
          </div>
          <button type="submit"  class="button button-block"/> <?php _e(newsletter_subscription_get_option('wns_submit_title'),"wns")?></button>
</form></div></div>
