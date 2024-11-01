<form method="post" action="">
<h3><i class="wns-design"></i><?php _e('Design','wns'); ?></h3>
<table class="form-table">
<tr valign="top">
		<th scope="row"><label for="backgroud_color"><?php _e('Widget Background','wns'); ?></label></th>
		<td>
			<input type="color" name="backgroud_color" id="backgroud_color" value="<?php echo newsletter_subscription_get_option('backgroud_color'); ?>" class="regular-text" />
		</td>
	</tr>
</table>

<p class="submit">
	<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes','wns'); ?>"  />
	<input type="submit" name="reset-options" id="reset-options" class="button" value="<?php _e('Reset Options','wns'); ?>"  />
</p>
	
</form>
