<div class="box box-default" style="    margin-bottom:0px">
			<div class="box-header with-border">
			
		 <h3 class="box-title" id="mail_send_message"><?=($message_show)?$message_show:''?></h3>
				 
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
			
 	
				<div class="row ">
				<!-- onsubmit="return checkValidation()" -->
	<form action="" id="mail_info" onsubmit="return checkValidation()"  enctype="multipart/form-data"  method="post" accept-charset="utf-8">
			
				<div class="col-md-12"> 
			<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title" > Enter Email  Info....</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 
                  <div class="box-body">
                    <div class="form-group" >
                      <label for="toemail" class="col-sm-2 control-label"> To Email</label>
                      <div class="col-sm-10">
                        <input type="email" value="<?=isset($x_to)?$x_to:''?>"  required class="form-control toemail" id="toemail" name="toemail" placeholder="Email" style="margin-bottom:5px; ">
						<errormessage> <?=(form_error('toemail'))?form_error('toemail'):""?> </errormessage>
                      </div>
                    </div>
					<div class="form-group" >
                      <label for="toemail" class="col-sm-2 control-label"> Subject</label>
                      <div class="col-sm-10">
                        <input type="text" value="<?=isset($x_sub)?$x_sub:''?>" required class="form-control subject" id="subject" name="subject" placeholder="Subject" style="margin-bottom:5px; ">
						<errormessage> <?=(form_error('subject'))?form_error('subject'):""?> </errormessage>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="message" class="col-sm-2 control-label">Message</label>
                      <div class="col-sm-10">
                        <textarea class="form-control message"  name="message" rows="3" placeholder="Enter your message..." required><?=isset($x_message)?$x_message:''?></textarea>
						<errormessage> <?=(form_error('message'))?form_error('message'):""?> </errormessage>
                      </div>
                    </div>
                   
                  </div><!-- /.box-body -->
                  <div class="box-footer"> 
				
                    <button type="submit" class="btn btn-info pull-right send_mail">Send Mail</button>
                  </div><!-- /.box-footer -->
                
              </div><!-- /.box -->
			 
			 
				</div>
			 
			 
	</form>		 
			 
			 
				
				</div>
				 
				
				
				</div>
				
 			
			</div>

</div>			
 
 



<script>
 function checkValidation()
 {
	 
	 sendMgs();
			return true;
	 
		var toemail=$(".toemail").val();	
		var message=$(".message").val();		
		var subject=$(".subject").val();
		toemail=toemail.replace(/ /g,'');
		subject=subject.replace(/ /g,'');
		message=message.replace(/ /g,'');

		if(toemail!="" && message !="" && subject !="")	
		{
			sendMgs();
			return true;
		}	
		else
		{
			alert("Email,Subject and message is required !");
			return false;
		}
 
 	
 };

 function sendMgs()
 {
	 $("#mail_send_message").html("<b style='color:#3c8dbc'> Mail Sending........ </b>");
	
 }
 
 $(document).ready(function(){
	 
	 setTimeout(function(){ $("#mail_send_message").html("");}, 7000);
 });
 
</script>

<style>
.message{margin: 0px 1.5px 0px 0px; width: 100%; height:208px !important}

</style>
