<style type="text/css">
  
  .discount{width: 60px;}
  .txt-rigth{ text-align: right!important;}
  .sl{border: 0px;}
  tr{background: #fff;}

  .select2-container{width: 100%!important;}
  .delete{cursor: pointer;}
</style>
<script src="<?php echo $this->template->Js()?>select2.min.js"></script>
  <link href="<?php echo $this->template->Css();?>select2.min.css" rel="stylesheet">


<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title"> Product details form</h3>
                       <a style="display: none" class="pull-right btn btn-primary" href="javascript:;" id="product_msg"></a>
                    
                    </div><!-- /.box-header -->
                   
                      <div class="box-body">



                          <div class="col-md-12">  
                            <div class="col-md-9">
                                <select class="itemName"  name="itemName"></select>
                            </div>
                            <div class="col-md-3">
                              <button type="button" class="add_product" > Add product</button>
                            </div>
                          
                        </div>


                        <div class="col-md-12"> 
			                            <table class="table  responsive_table dataTable no-footer">
			                              <thead>
			                                <tr>
			                                <th >SL</th>
			                                <th >SL No</th> 
			                                <th>Details</th>
			                                <th>Price</th> 
			                                <th></th>  
			                              </tr>
			                              </thead>
			                              
			                              <tbody>
			                              	<?php if($temp_invoice){
			                              		$id = 0;
			                              		foreach ($temp_invoice as $key => $value) {
			                              			$id++;

			                              			echo "<tr class='".$id."'> <td>".$id."</td> <td> <input class='sl' readonly value='".$value->serial_no."' name='sl[]'/></td> <td>".$value->product_name."</td> <td class='price'>".$value->unit_price."</td> <td><div id='".$value->serial_no."' class='delete'>X</div></td>"
			                              			?>


			                              	<?php 	}}

			                              		?>
			                                
			                              </tbody>
			                              <thead>
			                                <tr>
			                                <th></th>
			                                <th></th> 
			                                <th class="txt-rigth">Net Price</th>
			                                <td class="net_price">0</td>   
			                                <td></td>
			                              </tr>
			                              <tr>
			                                <th></th>
			                                <th></th> 
			                                <th class="txt-rigth">Discount</th>
			                                <td><input type="" name="discount" class="discount" value="<?php echo isset($temp_invoice[0]->discount_amount)?$temp_invoice[0]->discount_amount:0;?>"> </td>   
			                                <td></td>
			                              </tr>

			                              <tr>
			                                <th></th>
			                                <th></th> 
			                                <th class="txt-rigth">Total price</th>
			                                <td class="total_price">0</td>   
			                                <td></td>
			                              </tr>

			                              <tr>
			                                <th></th>
			                                <th></th> 
			                                <th class="txt-rigth">Cash payment</th>
			                                <td><input id="paid_amount" type="" name="paid_amount" class="discount" value="<?php echo isset($temp_invoice[0]->paid_amount)?$temp_invoice[0]->paid_amount:0;?>"> </td>   
			                                <td></td>
			                              </tr>

                                     <tr>
                                      <th></th>
                                      <th></th> 
                                      <th class="txt-rigth">Due amount</th>
                                      <td class="due_amount">0</td>   
                                      <td></td>
                                    </tr>

			                              </thead>

			                            </table>

			                        </div>   

			                      </div>  

			                   </div>  

			    		</div>
			    	</div>



 <script>
     
    
  $(".itemName").select2({
  ajax: {
    url: base_url+"ajax-query/product_info",
    dataType: 'json',
    delay: 250,
    data: function (params) {
      var query = {
        search: params.term,
        type: 'public'
      }

      // Query parameters will be ?search=[term]&type=public
      return query;
    }  ,
    processResults: function (data) {
     
      return {
        results: data
        
      };
    },
    cache: true
  },
  placeholder: 'Search for a repository',
 escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
  minimumInputLength: 3,
  templateResult: formatRepo,
  templateSelection: formatRepoSelection
});

function formatRepo (repo) {
  if (repo.loading) {
    return "Searching.....";
  }
  //console.log(repo);

  var markup = "<div> <p>" + repo.product_name + "( size: "+ repo.size+" "+repo.color_name+") ৳"+ repo.unit_price+" </p>  <p><b>SL No.:</b> "+ repo.serial_no+" <b>Category:</b> "+repo.category_name+" <b>Brand:</b> "+repo.brand_name+"  </p> </div>";

 
  return markup;
}

function formatRepoSelection (repo) {
  if(repo.product_name){
    $(".add_product").focus();
    return "<div> <p>" + repo.product_name + "("+repo.color_name+" size: "+ repo.size+" ) ৳"+ repo.unit_price+" SL No. "+repo.serial_no+" </p> </div>";  
  }else{

    return "<div> <p> Enter product serial number here</p> </div>";
  }
  
}




$(document).on("click",".add_product",function(e){

     // if(e.which == 13) {
          
      productList();

          
            $(".itemName").focus();
          
       // }

});

$(document).on("blur","#paid_amount",function(){

      if(parseFloat( $(".total_price").text()) > parseFloat($(this).val())){

        $("#modal-title").html("Nofification!");
        $("#body").html("Pay amount is less than the total price!");
        $("#modal").modal('show');
        loanAmount(); // Only for loan distribution 
      }else{

        $("#cash_sell").show();
      }
     
          
       
}); 


$(document).on("keyup",".discount",function(e){

      totalPrice();
       loanAmount(); // Only for loan distribution 

});


netPrice();

function loanAmount(){

  $(".due_amount").html( parseFloat( $(".total_price").text()) - parseFloat($("#paid_amount").val()));
  $("#loan_amount").val( parseFloat( $(".total_price").text()) - parseFloat($("#paid_amount").val()));
   

}


function netPrice(){

  var sum = 0.0; 

    $(".price").each(function() {

        var value = $(this).text();
        // add only if the value is number
        if(!isNaN(value) && value.length != 0) {
            sum += parseFloat(value);
        }
    });

    $(".net_price").text(sum);
    totalPrice();
    loanAmount(); // Only for loan distribution 
}


function totalPrice(){

  var discount = $(".discount").val();
  var netPrice = $(".net_price").text();
  
   $(".total_price").text(parseFloat(netPrice) - parseFloat(discount));
  

}







function productList(){


        var repo = $('.itemName').select2('data');
        var row = $('tbody tr').length;
        var repo= repo[0];
        console.log(repo);
        var product_name = repo.product_name + "("+repo.color_name+" size: "+ repo.size+")";

        $.post(base_url+"ajax-query/app_temp_table",{serial_no:repo.serial_no,product_name:product_name},function(data){

        		if(data == 'exist'){
        				
        				$("#product_msg").text("Already added this product in invoice or another user added this product in the invoice. ");
        				$("#product_msg").show();
        				setTimeout(function(){ 	$("#product_msg").fadeOut(); }, 3000);
        			return true;
        		}
        		
        		if(data != "false"){

        			var tr = "<tr class='"+(row+1)+"'> <td>"+ (row+1) +"</td> <td> <input class='sl' readonly value='"+ repo.serial_no+"' name='sl[]'/></td> <td>"+ repo.product_name + "("+repo.color_name+" size: "+ repo.size+")</td> <td class='price'>"+repo.unit_price+"</td> <td><div id='"+repo.serial_no+"' class='delete'>X</div></td>";
	           $('tbody').append(tr);

	           netPrice();

        		}

        		
			

		},"json");



        
}
    

    $(document).on("change",".itemName",function(e){

        
       

        if(e.which == 13) {
          

           var data = $('.itemName').select2('data');

           var tr = "<tr> <td>1</td> <td>1</td> <td>1</td> <td>1</td> <td>1</td> <td>1</td>";
           $('tbody').append(tr);
          if(data) {
            console.log(data);
          }
        }



       
    })



    $(document).on("click",".delete",function(){

      	var serial_no =  $(this).attr('id');
       $.post(base_url+"Ajax_query/temp_serial_no_delete",{serial_no:serial_no},function(data){

       		//if(data == 'ok'){

       				
       			 $("#"+serial_no).closest('tr').remove();       		
        			netPrice();
       		//}

       		

       });
       

    });

    
    </script>

