<form method="post" action="" enctype="multipart/form-data">
<h3><?php _e('Import Users to Mailchimp','wns'); ?></h3>
<table class="form-table">

<tr>
<?php 
require_once wns_path .'lib/mailchimp/MCAPI.class.php';
require_once wns_path .'lib/mailchimp/Batch.php';
use \DrewM\MailChimp\MailChimp;

if(newsletter_subscription_get_option('wns_mailchimp_api_key')!='')
{
$MailChimp = new MailChimp(newsletter_subscription_get_option('wns_mailchimp_api_key'));

$results = $MailChimp->get('lists');


$i=0;

$total=count($results);
}
?>
<th scope="row"><label for="mailchimp_lists"><?php _e('Select mailchimp list','wns'); ?></label></th>
		<td>

			<select name="mailchimp_lists" id="mailchimp_lists" class="chosen-select" style="width:300px">
<?php

if(!empty($total))
for($i=0;$i<=$total;$i++)
{	
	
	$listname=$results['lists'][$i]['name'];
	$listid=$results['lists'][$i]['id'];
  ?>

<option value="<?php echo $listid;?>" ><?php echo $listname; ?></option>";
	
<?php } ?>

			</select>
</td>
</tr>
<tr valign="top">
		<th scope="row"><label for="import_users_mailchimp"><?php _e('Upload users CSV/Xls file to import','wns'); ?></label></th>
		<td>
			<input type="file" name="import_users_mailchimp" id="import_users_mailchimp" class="regular-text" />
		</td>
	</tr>
<tr valign="top">
		
	</tr>	
</table>
<p class="submit">
	<input type="submit" name="import_users_to_mailchimp" id="import_users_to_mailchimp" class="button button-primary" value="<?php _e('Import User to mailchimp','wns'); ?>"  />
</p>
</form>
