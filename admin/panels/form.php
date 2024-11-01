<div class="panel-body">
      
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <?php _e('Form Setting','wns');?>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
           <form action="" method="post">
               <div class="row">                  
                        <div class="col-lg-6">
                          <div class="input-group">
                            <span class="input-group-addon">
			  <input type="checkbox" name="fnamecheck" value="1"  <?php echo (get_option('fname')=='1')? 'checked':'';?> />

                            
                            </span>
                            <input type="text" name="wns_first_name" placeholder="First Name" value="<?php echo newsletter_subscription_get_option('wns_first_name');?>" class="form-control" aria-label="First Name">
                          </div><!-- /input-group -->
                          <div class="alert alert-defualt" role="alert"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <?php _e('Click on checkbox for enable first name on form','wns');?></div>
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                         <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" name="lnamecheck" value="1" <?php echo (get_option('lname')=='1')? 'checked':'';?>/>
                            </span>
                            <input type="text" name="wns_last_name" placeholder="Last Name" class="form-control" value="<?php echo newsletter_subscription_get_option('wns_last_name');?>" aria-label="Last Name">
                          </div><!-- /input-group -->
                           <div class="alert alert-defualt" role="alert"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <?php _e('Click on checkbox for enable last name on form','wns');?></div>
                        </div><!-- /.col-lg-6 -->
                        
                        <div class="col-lg-6">
                         <div class="input-group">
                            <span class="input-group-addon">
                             <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="wns_form_title" value="<?php echo newsletter_subscription_get_option('wns_form_title');?>" placeholder="Subscriber form name" class="form-control" aria-label="title">
                          </div><!-- /input-group -->
                           <div class="alert alert-defualt" role="alert"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <?php _e('Enter subscription form title','wns'); ?></div>
                        </div><!-- /.col-lg-6 -->
                        
                        <div class="col-lg-6">
                         <div class="input-group">
                            <span class="input-group-addon">
                             <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="wns_submit_title" value="<?php echo newsletter_subscription_get_option('wns_submit_title');?>" placeholder="Submit Button Text" class="form-control" aria-label="title">
                          </div><!-- /input-group -->
                           <div class="alert alert-defualt" role="alert"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <?php _e('Enter subscription submit button title','wns');?></div>
                        </div><!-- /.col-lg-6 -->
                        
                        <div class="col-lg-6">
                         <div class="input-group">
                            <span class="input-group-addon">
                             <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="wns_sussesfull_message" value="<?php echo newsletter_subscription_get_option('wns_sussesfull_message');?>" placeholder="Thank you message" class="form-control" aria-label="title">
                          </div><!-- /input-group -->
                           <div class="alert alert-defualt" role="alert"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <?php _e('Enter thank you message here-after complete subscription','wns');?></div>
                        </div><!-- /.col-lg-6 -->
                       
                        <div class="col-lg-6">
                         <div class="input-group">
                            <span class="input-group-addon">
                             <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                            </span>
                            <textarea  name="wns_comment_textmessage" placeholder="Message" class="form-control" ><?php echo newsletter_subscription_get_option('wns_comment_textmessage');?></textarea>
                          </div><!-- /input-group -->
                           <div class="alert alert-defualt" role="alert"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <?php _e('Enter additional information for subscription form','wns');?></div>
                        </div><!-- /.col-lg-6 -->    
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
  <div class="col-lg-6">
     <div class="input-group">
<label for="wns_mailchimp_lists"><?php _e('Select mailchimp list','userpro'); ?></label>

<select name="wns_mailchimp_lists" id="wns_mailchimp_lists" class="form-control style="width:300px">
<?php
if(!empty($total))
for($i=0;$i<=$total;$i++)
{	
	
	$listname=$results['lists'][$i]['name'];
	$listid=$results['lists'][$i]['id'];


  ?>

<option value="<?php echo $listid; ?>" <?php selected($listid, newsletter_subscription_get_option('wns_mailchimp_lists') ); ?>><?php echo $listname; ?></option>

	
<?php } ?>

			</select>
                   
                   </div></div>     
               </div>
               
                        
               <div class="row">   <hr>
                        
                        </div><!-- /.row -->
                         <p class="submit">
	<input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php _e('Save Changes','wns'); ?>"  />
	<input type="submit" name="reset-options" id="reset-options" class="btn btn-default" value="<?php _e('Reset Options','wns'); ?>"  />
</p>
                      </form>
                      
                      
          </div>
    </div>
  </div> 
</div>

      
  </div>
