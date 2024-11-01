  <?php 
require_once wns_path .'lib/mailchimp/MCAPI.class.php';
require_once wns_path .'lib/mailchimp/Batch.php';
use \DrewM\MailChimp\MailChimp;

if(newsletter_subscription_get_option('wns_mailchimp_api_key')!='')
{

	$MailChimp = new MailChimp(newsletter_subscription_get_option('wns_mailchimp_api_key'));
	$results = $MailChimp->get('lists');
	$total=count($results);
}

?>
<form method="post" action="">

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <?php _e('WordPress Registration','wns'); ?>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">

<table class="form-table" >
<tr valign="top">
		<th scope="row"><label for="wns_wpregiter"><?php _e('With Default WP Registration','wns'); ?></label></th>
		<td>
			<select name="wns_wpregiter" id="wns_wpregiter"  class="form-control" style="width:200px">
				<option value="1" <?php selected(1, newsletter_subscription_get_option('wns_wpregiter') ); ?>><?php _e('Yes','wns'); ?></option>
				<option value="0" <?php selected(0, newsletter_subscription_get_option('wns_wpregiter') ); ?>><?php _e('No','wns'); ?></option>
			</select>
                       
		</td>
	</tr>
<tr valign="top">
		<th scope="row"><label for="wns_mailchimp_wpregiter"><?php _e('Mailchimp List','wns'); ?></label></th>
		<td>


<select name="wns_mailchimp_wpregiter" id="wns_mailchimp_wpregiter" class="form-control" style="width:150px">
<?php
if(!empty($total))
for($i=0;$i<=$total;$i++)
{	
	
	$listname=$results['lists'][$i]['name'];
	$listid=$results['lists'][$i]['id'];


  ?>

<option value="<?php echo $listid; ?>" <?php selected($listid, newsletter_subscription_get_option('wns_mailchimp_wpregiter') ); ?>><?php echo $listname; ?></option>

	
<?php } ?>

			</select>
</td>
</tr>
</table>
 </div>
    </div>
  </div>

 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
       <?php _e('Woocommerce Settings','wns'); ?>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">

<table class="form-table">
<tr valign="top">
		<th scope="row"><label for="wns_woocommerce"><?php _e('Woocommerce','wns'); ?></label></th>
		<td>
			<select name="wns_woocommerce" id="wns_woocommerce" style="width:200px">
				<option value="1" <?php selected(1, newsletter_subscription_get_option('wns_woocommerce') ); ?>><?php _e('Yes','wns'); ?></option>
				<option value="0" <?php selected(0, newsletter_subscription_get_option('wns_woocommerce') ); ?>><?php _e('No','wns'); ?></option>
			</select>
                       
		</td>
	</tr>
<tr valign="top">
		<th scope="row"><label for="wns_mailchimp_woocommerce"><?php _e('Mailchimp List','wns'); ?></label></th>
		<td>


<select name="wns_mailchimp_woocommerce" id="wns_mailchimp_woocommerce" class="form-control" style="width:150px">
<?php
if(!empty($total))
for($i=0;$i<=$total;$i++)
{	
	
	$listname=$results['lists'][$i]['name'];
	$listid=$results['lists'][$i]['id'];


  ?>

<option value="<?php echo $listid; ?>" <?php selected($listid, newsletter_subscription_get_option('wns_mailchimp_woocommerce') ); ?>><?php echo $listname; ?></option>

	
<?php } ?>

			</select>
</td>
</tr>
</table>
</div>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapseTwo">
          <?php _e('Comment Form','wns'); ?>
        </a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">

<table class="form-table">
<tr valign="top">
		<th scope="row"><label for="wns_comment"><?php _e('Comment Form','wns'); ?></label></th>
		<td>
			<select name="wns_comment" id="wns_comment"  style="width:200px">
				<option value="1" <?php selected(1, newsletter_subscription_get_option('wns_comment') ); ?>><?php _e('Yes','wns'); ?></option>
				<option value="0" <?php selected(0, newsletter_subscription_get_option('wns_comment') ); ?>><?php _e('No','wns'); ?></option>
			</select>
                       
		</td>
	</tr>
<tr valign="top">
		<th scope="row"><label for="wns_mailchimp_comment"><?php _e('Mailchimp List','wns'); ?></label></th>
		<td>


<select name="wns_mailchimp_comment" id="wns_mailchimp_comment" class="form-control" style="width:150px">
<?php
if(!empty($total))
for($i=0;$i<=$total;$i++)
{	
	
	$listname=$results['lists'][$i]['name'];
	$listid=$results['lists'][$i]['id'];


  ?>

<option value="<?php echo $listid; ?>" <?php selected($listid, newsletter_subscription_get_option('wns_mailchimp_comment') ); ?>><?php echo $listname; ?></option>

	
<?php } ?>

			</select>
</td>
</tr>
</table>
</div>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapseTwo">
       <?php _e('Buddypress','wns'); ?>
        </a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">

<table class="form-table">
<tr valign="top">
		<th scope="row"><label for="wns_buddypress"><?php _e('Buddypress','wns'); ?></label></th>
		<td>
			<select name="wns_buddypress" id="wns_buddypress" style="width:200px">
				<option value="1" <?php selected(1, newsletter_subscription_get_option('wns_buddypress') ); ?>><?php _e('Yes','wns'); ?></option>
				<option value="0" <?php selected(0, newsletter_subscription_get_option('wns_buddypress') ); ?>><?php _e('No','wns'); ?></option>
			</select>
                       
		</td>
	</tr>
<tr valign="top">
		<th scope="row"><label for="wns_mailchimp_buddypress"><?php _e('Mailchimp List','wns'); ?></label></th>
		<td>


<select name="wns_mailchimp_buddypress" id="wns_mailchimp_buddypress" class="form-control" style="width:150px">
<?php
if(!empty($total))	
for($i=0;$i<=$total;$i++)
{	
	
	$listname=$results['lists'][$i]['name'];
	$listid=$results['lists'][$i]['id'];


  ?>

<option value="<?php echo $listid; ?>" <?php selected($listid, newsletter_subscription_get_option('wns_mailchimp_buddypress') ); ?>><?php echo $listname; ?></option>

	
<?php } ?>

			</select>
</td>
</tr>
</table>
</div>
</div>
</div>

<p class="submit">
	<input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php _e('Save Changes','wns'); ?>"  />
	<input type="submit" name="reset-options" class="btn btn-default" id="reset-options" class="button" value="<?php _e('Reset Options','wns'); ?>"  />
</p>
</form>
</div>
