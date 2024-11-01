
 <div class="panel-body">
      
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Form Setting
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
           <form action="" method="post">
              
                         <div class="input-group">
                              <label for="wns_mailchimp_api_key"><?php _e('Enter Mailchimp Api Key','userpro'); ?></label>
              			<input type="text" name="wns_mailchimp_api_key" id="hidden_from_view" value="<?php echo newsletter_subscription_get_option('wns_mailchimp_api_key'); ?>" placeholder="Mailchimp Api Key" class="form-control" aria-label="title"/>
                          </div><!-- /input-group -->
                           <div class="alert alert-defualt" role="alert"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Enter Mailchimp Api Key</div>
                       
                      
                   <table class="form-table">

	<tr valign="top">
		<th scope="row"><label for="wns_double_optin"><?php _e('Mailchimp Double Optin','wns'); ?></label></th>
		<td>
			<select name="wns_double_optin" id="wns_double_optin" class="chosen-select" style="width:300px">
				<option value="true" <?php selected('true', newsletter_subscription_get_option('wns_double_optin')); ?>><?php _e('Yes','wns'); ?></option>
				<option value="false" <?php selected('false', newsletter_subscription_get_option('wns_double_optin')); ?>><?php _e('No','wns'); ?></option>
			</select>
		</td>
	</tr>    
           </table>
              			
 <p class="submit">
	<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes','wns'); ?>"  />
	<input type="submit" name="reset-options" id="reset-options" class="button" value="<?php _e('Reset Options','wns'); ?>"  />
</p>
                      </form>
                      
                      
          </div>
    </div>
  </div> 
</div>

      
  </div>
