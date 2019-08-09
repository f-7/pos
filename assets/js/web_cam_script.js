
 var current_file_name= ""; 
 var image_box="";
 var image_input_name="";
 function openCamera(camera_box_id,image_box_cls_id="",image_input_name_cls_id="")
 {  
 image_box=image_box_cls_id;
 image_input_name=image_input_name_cls_id;
 
 $('.webcamera_box_css').html('');
	current_file_name=new Date().getTime();
	 webcam.set_api_url(base_url+'user_information/set_get_camera_image_file/'+current_file_name);
 
	webcam.set_swf_url(base_url+'assets/js/webcam/webcam.swf');
	webcam.set_quality(90);
	webcam.set_shutter_sound(true,base_url+'assets/js/webcam/shutter.mp3');
	$("#"+camera_box_id).html(webcam.get_html(218,197))
	
	 // webcam.set_stealth(true);

 } 
 
 
 function camera_done()
 {
	 
	 var image_name=current_file_name+'.jpg';
	  setTimeout(function(){ 
		  $('.'+image_box).attr('src', base_url+"documents/temp_camera_data/"+image_name);  
			$("."+image_input_name).val(image_name);	
			$("#"+image_box).val("");
	 }, 500);
 }
  
  
 
 
 