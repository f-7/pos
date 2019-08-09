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
	<form action="" id="slider_info" onsubmit="return checkValidation()"  enctype="multipart/form-data"  method="post" accept-charset="utf-8">
			
				<div class="col-md-12"> 
			<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title" > Slider upload </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 
                  <div class="box-body">
                    <div class="form-group" >
                      <label for="toemail" class="col-sm-2 control-label"> Title</label>
                      <div class="col-sm-10">
                        <input type="text"  required class="form-control title" id="title" name="title" placeholder="Title" style="margin-bottom:5px; " maxlength="45">
						<errormessage> <?=(form_error('title'))?form_error('title'):""?> </errormessage>
                      </div>
                    </div>
					 
                    <div class="form-group">
                      <label for="message" class="col-sm-2 control-label">Details </label>
                      <div class="col-sm-10">
                        <textarea class="form-control details" name="details" rows="2" placeholder="Maximum 120 character "  maxlength="120" required></textarea>
						<errormessage> <?=(form_error('details'))?form_error('details'):""?> </errormessage>
                      </div>
                    </div>
                   
				    <div class="form-group">
                      <label for="message" class="col-sm-2 control-label" style="margin-top:20px"> Slider Image </label>
                      <div class="col-sm-10">
                        <input type="file" class="image" id="image" name="image" accept="image/*" style="margin-top:20px; cursor: pointer;    border: 1px solid #ccc;">
						<i style="font-size:12px">(jpg,png,bmp)</i>
						<errormessage> <?=(form_error('image'))?form_error('image'):""?> </errormessage>
                      </div>
                    </div>
                   
				   
                  </div><!-- /.box-body -->
                  <div class="box-footer"> 				
                    <button type="submit" class="btn btn-info pull-right send_mail">Upload data</button>
                  </div><!-- /.box-footer -->
                
              </div><!-- /.box -->
			 
			 
				</div>
			 
			 
	</form>		 
			 
			 
				
				</div>
				 
				
				
				</div>
				
 			
			</div>

</div>			
 
 



<script>

var fl = document.getElementById('image');

fl.onchange = function(e){ 
    var ext = this.value.match(/\.(.+)$/)[1];
    switch(ext)
    {
        case 'jpg':
		case 'JPG':
		case 'jpeg':
		case 'JPEG':
        case 'bmp':
		case 'BMP':
        case 'png':
		case 'PNG': 
            return true;
            break;
        default:
            alert('Not allowed');
            this.value='';
    }
};











 function checkValidation()
 {
	 
	 sendMgs();
			return true;
	 
		var title=$(".title").val();	
		var details=$(".details").val(); 
		title=title.replace(/ /g,'');
		details=details.replace(/ /g,''); 
		if(title!="" && details !="")	
		{
			sendMgs();
			return true;
		}	
		else
		{
			alert("All  filed is required !");
			return false;
		}
 
 	
 };

 function sendMgs()
 {
	 $("#mail_send_message").html("<b style='color:#3c8dbc'> File upload is processing....... </b>");
	
 }
 
 $(document).ready(function(){
	 
	 setTimeout(function(){ $("#mail_send_message").html("");}, 7000);
 });
 
</script>

<style>
.message{margin: 0px 1.5px 0px 0px; width: 100%; height:208px !important}

</style>
