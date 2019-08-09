<?php

$captcha = array(
  'name'  => 'captcha',
  'id'  => 'captcha',
  'maxlength' => 8,
);

?>

<div style="width:100%; height:55px;">
   <div style="width:20%; height:50px; float: left;">
    <span class="logo-lg"  > <img class="img-circle" src="<?= $this->template->Images()?>utc-logo.png"  style=" height: 50px;background: white;"/></span>
   </div>
    <div style="width: 80%;height:50px; float: right;font-size: 20px;font-weight: bold;padding-top: 10px;color: #185b39;text-transform: uppercase;">
    United trade and commerce  
   </div>
   
</div>
 
<!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Please enter your user and password</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="User Name" name ="login" value="<?=set_value('login')?>">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span class="has-error"><?php echo form_error('login'); ?><?php echo isset($errors['login'])?$errors['login']:''; ?></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span class="has-error"> <?php echo form_error('password'); ?><?php echo isset($errors['password'])?$errors['password']:''; ?></span>
          </div>

            <?php if ($show_captcha) {
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
              </tr>
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
              </tr> 
              <?php }
              } ?>



          <div class="row">
           <!-- <div class="col-xs-8">
              <div class=" checkbox icheck">
                <label style="margin-left:20px;">
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div>
			--><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

      <!--  <a href="#">I forgot my password</a><br>-->
        

      </div><!-- /.login-box-body -->