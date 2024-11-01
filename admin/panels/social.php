<form method="post" action="">
<h3><i class="wns-icon-facebook"></i><?php _e('Facebook Integration','wns'); ?></h3>
<table class="form-table">

	<tr valign="top">
		<th scope="row"><label for="facebook_connect"><?php _e('Allow Facebook Social Connect','wns'); ?></label></th>
		<td>
			<select name="facebook_connect" id="facebook_connect" class="chosen-select" style="width:300px">
				<option value="1" <?php selected('1', newsletter_subscription_get_option('facebook_connect')); ?>><?php _e('Yes','wns'); ?></option>
				<option value="0" <?php selected('0', newsletter_subscription_get_option('facebook_connect')); ?>><?php _e('No','wns'); ?></option>
			</select>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="facebook_app_id"><?php _e('Facebook App ID','wns'); ?></label></th>
		<td>
			<input type="text" name="facebook_app_id" id="facebook_app_id" value="<?php echo newsletter_subscription_get_option('facebook_app_id'); ?>" class="regular-text" /><br>
			
		</td>
	</tr>
</table>

<h3><i class="wns-icon-google-plus"></i><?php _e('Google Integration','wns'); ?></h3>
<table class="form-table">

	<tr valign="top">
		<th scope="row"><label for="google_connect"><?php _e('Allow Google Social Connect','wns'); ?></label></th>
		<td>
			<select name="google_connect" id="google_connect" class="chosen-select" style="width:300px">
				<option value="1" <?php selected('1', newsletter_subscription_get_option('google_connect')); ?>><?php _e('Yes','wns'); ?></option>
				<option value="0" <?php selected('0', newsletter_subscription_get_option('google_connect')); ?>><?php _e('No','wns'); ?></option>
			</select>
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="google_client_id"><?php _e('Client ID','wns'); ?></label></th>
		<td>
			<input type="text" name="google_client_id" id="google_client_id" value="<?php echo newsletter_subscription_get_option('google_client_id'); ?>" class="regular-text" />
		</td>
	</tr>
	
	<tr valign="top">
		<th scope="row"><label for="google_client_secret"><?php _e('Client secret','wns'); ?></label></th>
		<td>
			<input type="text" name="google_client_secret" id="google_client_secret" value="<?php echo newsletter_subscription_get_option('google_client_secret'); ?>" class="regular-text" />
		</td>
	</tr>
	</table>
<p class="submit">
	<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes','wns'); ?>"  />
	<input type="submit" name="reset-options" id="reset-options" class="button" value="<?php _e('Reset Options','wns'); ?>"  />
</p>
	
</form>
