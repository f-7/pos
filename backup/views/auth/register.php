<?php 

$captcha = array(
  'name'  => 'captcha',
  'id'  => 'captcha',
  'maxlength' => 8,
);


?>

<div class="row">
          <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Registration Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?=site_url();?>auth/register" method="post" >
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label">User Name</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email" name='username' value="<?=set_value('username')?>">
                        <span class="has-error"><?php echo form_error('username'); ?><?php echo isset($errors['username'])?$errors['username']:''; ?></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                      <div class="col-sm-6">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name='email'value="<?=set_value('email')?>">
                        <span class="has-error"><?php echo form_error('email'); ?><?php echo isset($errors['email'])?$errors['email']:''; ?></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                      <div class="col-sm-6">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name='password'>
                        <span class="has-error"><?php echo form_error('password'); ?><?php echo isset($errors['password'])?$errors['password']:''; ?></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label"> Confirm Password</label>
                      <div class="col-sm-6">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name='confirm_password'>
                        <span class="has-error"><?php echo form_error('confirm_password'); ?><?php echo isset($errors['confirm_password'])?$errors['confirm_password']:''; ?></span>

                      </div>
                    </div>


                  <?php if ($captcha_registration) {
                      if ($use_recaptcha) { ?>
                      <table>
                    <tr>
                      <td colspan="2">
                        <div id="recaptcha_image"></div>
                      </td>
                      <td>
                        <a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
                        <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
                        <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="recaptcha_only_if_image">Enter the words above</div>
                        <div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
                      </td>
                      <td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
                      <td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
                      <?php echo $recaptcha_html; ?>
                    </tr> </table>
                    <?php } else { ?>
                    <tr>
                      <td colspan="3">
                        <p>Enter the code exactly as it appears:</p>
                        <?php echo $captcha_html; ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
                      <td><?php echo form_input($captcha); ?></td>
                      <td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
                    </tr> </table>
                    <?php }
                    } ?>
                  


                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
        </div>

      <div class="col-md-6">
      </div>


</div>


            