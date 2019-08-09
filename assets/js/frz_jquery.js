/* -----------------------------------------format number of digit----------------------------------------------*/
 function  formate_three_digit(raw_code)
 {
	raw_code= parseInt(raw_code);
	 	return raw_code=(raw_code<10)?"00"+raw_code:(raw_code<100 && raw_code>9)?"0"+raw_code:raw_code;
 }
 function  formate_two_digit(raw_code)
 {
	raw_code= parseInt(raw_code);
	 	return raw_code=(raw_code<10)?"0"+raw_code:raw_code;
 }
 
  function  formate_five_digit(raw_code)
 {
	raw_code= parseInt(raw_code);
	if(raw_code<10)
	{
		return "0000"+raw_code;		
	}
	else if(raw_code<100)
	{
		return "000"+raw_code;	
	}	
	else if(raw_code<1000)
	{
		return "00"+raw_code;	
	} 
	else if(raw_code<10000)
	{
		return "0"+raw_code;	
	} 	
 }
 
function formate_eight_digit(raw_code)
 {
	raw_code= parseInt(raw_code);
	 	
	if(raw_code<10)
	{
		return "0000000"+raw_code;		
	}
	else if(raw_code<100)
	{
		return "000000"+raw_code;	
	}	
	else if(raw_code<1000)
	{
		return "00000"+raw_code;	
	} 
	else if(raw_code<10000)
	{
		return "0000"+raw_code;	
	} 
	else if(raw_code<100000)
	{
		return "000"+raw_code;	
	} 
	else if(raw_code<1000000)
	{
		return "00"+raw_code;	
	} 
	else if(raw_code<10000000)
	{
		return "0"+raw_code;	
	} 
	else  
	{
		return raw_code;	
	} 
	
	
 }
 
 function formate_teen_digit(raw_code)
 {
	 
	  
	raw_code= parseInt(raw_code);
	if(raw_code.length>=10) 	
	{
		return raw_code;
	}else{
		
		while(raw_code.length<10)
		{
			raw_code="0"+raw_code;
		}
		return raw_code;
	}
	
 }
 
 function removeLeadingZero(number_of_string){
	 
	 number_of_string = Number(number_of_string).toString();
	 return number_of_string;

	 
 }
 
 function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}
 
 function getGender(id)
 {
 
 
 var obj = {
   '1': 'MALE',
   '2': 'FEMALE',
   '3': 'OTHERS' 
  };
 return obj[id];
  
}
  
  function getGender(id)
  {
 
 
 var obj = {
   '1': 'MALE',
   '2': 'FEMALE',
   '3': 'OTHERS' 
  };
 return obj[id];
  
} 
 
function change_url_paramater(para_name,values)
{
	
	if (history.pushState) {
          var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?'+para_name+'='+values;
          window.history.pushState({path:newurl},'',newurl);
      } 
 
	
} 
  
  
  
  
  
  
  
/*----------------------------------- responsive data table --------------------------*/
 
 $(window).on("resize", function (event) {responsiveView('responsive_table');});
$(document).ready(function() {
	setTimeout(function(){   $(".show-message-titile-box").html("");  },10000); 
	
	setTimeout(function(){ responsiveView('responsive_table'); },2000);
	
	});

 function responsiveView(table_class_name)
 {
	  if(window.innerWidth<700){
		 
		 
		 var myarray = [];
		  $("."+table_class_name).find("th").each(function(){
			  
			  if($(this).hasClass("reshide"))
			  {
				 myarray.push($(this).index()); 
			  }
					  
		  });
		  
		 myarray.forEach(function(item) {
			 
			 $("."+table_class_name).find('tbody').find("td:nth-child("+(item+1)+")").addClass('table_res_hide');		
		});
		
		$("."+table_class_name).find("th.reshide").addClass('table_res_hide');			  
		  
	  }else{
		  
		   $("."+table_class_name).find("th").removeClass('table_res_hide');
		   $("."+table_class_name).find('tbody').find("td").removeClass('table_res_hide');
	  }
 }


/* ------------------------------------any image file upalod ---------------------------*/

$(document).on("change",".browse_file",function(){
    
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
        }
        else
        {     
			var file_id_imagebox_class=$(this).attr("id");			 
			
             readURL(this,file_id_imagebox_class);
        }
});    
   
 
					
function readURL(input,image_class_name) {
      
         
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.'+image_class_name).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}				
/* --------------------------file uplaod code close----------------*/	


function datePicker(filed_id)
{
	
	   $(filed_id).datepicker({
            changeMonth: true,
            changeYear: true,
			 dateFormat: 'yy-mm-dd',
			yearRange: "-80:+0", 
          /*  showButtonPanel: true,
            maxDate: '@maxDate',
            minDate: '@minDate'
			*/
        });
	
}




// post method user id pass
 var myRedirect = function(redirectUrl, arg, value) {
  var form = $('<form action="' + redirectUrl + '" method="post">' +
  '<input type="hidden" name="'+ arg +'" value="' + value + '"></input>' + '</form>');
  $('body').append(form);
  $(form).submit();
}; 


// user form check
$(document).on("submit",".dataSubmitedForm", function(event) {
   
var email=$('.checkEmail').val();
var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(email))                    
    {
        $(this).parent('td').append("<i class='redEmail'><br>Please enter a valid email address</i>"); 
        return false;        
    } 
});

/// check valid emaiil
$(document).on("blur",".checkEmail",function(e){
       var email= $(this).val();
       $(this).parent('td').find('.redEmail').remove();
		 var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(!re.test(email))                    
                $(this).parent('td').append("<i class='redEmail'><br>Please enter a valid email address</i>");

	
        if(email==""){ $(this).parent('td').find('.redEmail').remove();}
});




//check only alphabet allow
$(document).on("keydown",".alphabetinput",function(e){
  // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13,32, 110, 190]) !== -1 ||
      // Allow: Ctrl+A,Ctrl+C,Ctrl+V, Command+A
      ((e.keyCode == 65 || e.keyCode == 86 || e.keyCode == 67) && (e.ctrlKey === true || e.metaKey === true)) ||
      // Allow: home, end, left, right, down, up
      (e.keyCode >= 35 && e.keyCode <= 40)) {
      // let it happen, don't do anything
      return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 65 || e.keyCode > 90)) ) {
      e.preventDefault();
    }

});


// only numeric
$(document).on("keydown",".numericinput",function(e){
  // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46,32, 8, 9, 27, 13, 110, 190]) !== -1 ||
      // Allow: Ctrl+A,Ctrl+C,Ctrl+V, Command+A
      ((e.keyCode == 65 || e.keyCode == 86 || e.keyCode == 67) && (e.ctrlKey === true || e.metaKey === true)) ||
      // Allow: home, end, left, right, down, up
      (e.keyCode >= 35 && e.keyCode <= 40)) {
      // let it happen, don't do anything
      return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
    }

});


function onlyNumeric(e)
{
	 // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46,32, 8, 9, 27, 13, 110, 190]) !== -1 ||
      // Allow: Ctrl+A,Ctrl+C,Ctrl+V, Command+A
      ((e.keyCode == 65 || e.keyCode == 86 || e.keyCode == 67) && (e.ctrlKey === true || e.metaKey === true)) ||
      // Allow: home, end, left, right, down, up
      (e.keyCode >= 35 && e.keyCode <= 40)) {
      // let it happen, don't do anything
      return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
    }

	
	
	
}

/*------------------------------------------browser info-------------------------------------*/
 function getBrowser() { 
     if((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1 ) 
    {
        return 'Opera';
    }
    else if(navigator.userAgent.indexOf("Chrome") != -1 )
    {
       return 'Chrome';
    }
    else if(navigator.userAgent.indexOf("Safari") != -1)
    {
         return'Safari';
    }
    else if(navigator.userAgent.indexOf("Firefox") != -1 ) 
    {
          return 'Firefox';
    }
    else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) //IF IE > 10
    {
      return 'IE'; 
    }  
    else 
    {
       return 'unknown';
    }
    }

/*--------------------------------nav menu ----------------------*/	
function navMenuHideShow()
{
	
if(window.innerWidth<700){
	
	if($("#responsive_nave").hasClass("option_hide"))
	{
		
		$("#responsive_nave").removeClass('option_hide');
	}else{
		
		$("#responsive_nave").addClass('option_hide');
	} 	
}else{
	 
	$("#responsive_nave").addClass('option_hide');
}	
}
	
 function hideShowSpecificTag(class_name,true_false)
 {
	 
	 if(true_false)
	 {
		 if(window.innerWidth<700){ $("."+class_name).hide();}	
	 }else{
		  if(window.innerWidth>700){ $("."+class_name).show();}
	 }	 
	  
}	

/*-------------------------------------------------------- editor modal--------------------------------------------- */
function dealyModal(id_name,show_hide){
	setTimeout(function(){ 
	
	$('#'+id_name).modal(show_hide);
	}, 1000);	
	
}