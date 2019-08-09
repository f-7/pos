 <script src="<?= $this->template->Js()?>chart_stock_lib.js"></script>
 
<style>
.highcharts-credits{display:none}
.highcharts-input-group{display:none} 
</style> 
 
<script>




$.getJSON(base_url+'dashboard/get-pie-chart-data', function (data) {
	
	
	

 Highcharts.chart('pie_chart', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Area wise account opening chart'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f}% <br> <b>Total AC: </b> {point.y}',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [{
    name: 'Total Account',
    colorByPoint: true,
    data:data, 
    }]
  
});

});


 
$( document ).ready(function() {	
    // Create the chart
    var chart = Highcharts.stockChart('area_chart', {

        chart: {
            height: 400
        },

        title: {
            text: 'Daily wise account opening chart '
        },

       

          rangeSelector: {
            buttons: [
			{
                type: 'day',
				count: 1,
				text: 'Day'
            },			
			{
				type: 'month',
				count: 1,
				text: 'Month'
            },
			{
				type: 'year',
				count: 1,
				text: 'Year'
            },			
			{
                type: 'all',
                text: 'All'
            }],
            inputEnabled: true,
            selected: 3
        },
        series: [{
            name: 'Total Account Number : ',
            data:[<?=$area_chart_data?>],
            type: 'area',
            threshold: null,
            tooltip: {
                valueDecimals: 2
            }
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    chart: {
                        height: 300
                    },
                    subtitle: {
                        text: null
                    },
                    navigator: {
                        enabled: false
                    }
                }
            }]
        }
    });
 
});



// bottom chart



$.getJSON(base_url+'dashboard/get_pie_chart_loan_data', function (data) {
	
	
	

 Highcharts.chart('bottom_left_chart', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Area wise loan distribution chart'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} % <br><b>Total amount: </b> {point.y}',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [{
    name: 'Total Account',
    colorByPoint: true,
    data:data, 
    }]
  
});

});




$( document ).ready(function() {	
    // Create the chart
    var chart = Highcharts.stockChart('bottom_right_chart', {

        chart: {
            height: 400
        },

        title: {
            text: 'Daily wise loan distribution chart'
        },

       

          rangeSelector: {
            buttons: [
			{
                type: 'day',
				count: 1,
				text: 'Day'
            },			
			{
				type: 'month',
				count: 1,
				text: 'Month'
            },
			{
				type: 'year',
				count: 1,
				text: 'Year'
            },			
			{
                type: 'all',
                text: 'All'
            }],
            inputEnabled: true,
            selected: 3
        },
        series: [{
            name: 'Total Account Number : ',
            data:[<?=$area_daily_loan_chart_data;?>],
            type: 'area',
            threshold: null,
            tooltip: {
                valueDecimals: 2
            }
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    chart: {
                        height: 300
                    },
                    subtitle: {
                        text: null
                    },
                    navigator: {
                        enabled: false
                    }
                }
            }]
        }
    });
 
});






</script>
<?php 
$total_loan=($loan_progress_data['data']->installment_amount+$loan_progress_data['data']->deposit_amount);
$total_collection=($loan_progress_data['data']->collection_loan_amount+$loan_progress_data['data']->collection_deposit_amount);

if($total_loan<1){
    $total_loan=1 ;
}

 $perncet=(($total_collection*100)/$total_loan);
?>
 
 
<div class="row borderbox">

    <div class="col-md-12 process_bar" id="process_bar" >
        <div class="col-md-12 text-center" >
                <b style="font-size:18px">Loan collection  of  <a style='color:red'><?=date('F-Y')?> </a> </b> <br>
        </div>	
        <div class="col-md-12 text-center" >
            <div class="col-md-6 text-right" >Total : <a style='color:red'> <?=number_format((float)$total_loan, 2, '.', '')?> </a> </div>
            <div class="col-md-6 text-left" >Collection : <a style='color:green'><?=$total_collection?> </a></div>
        </div>
      
        <div class="col-md-12 text-center" >
                <div class="progress">
                    <div class="progress-bar" style="width:<?=$perncet?>%"><?=number_format((float)$perncet, 2, '.', '');?>% Complete</div>
                </div>
        </div>
    </div>
    	
    <div class="col-md-12" >
        <div class="col-md-3" >Loan : <a style='color:red;'> <?=$loan_progress_data['data']->installment_amount?> </a> </div>
        <div class="col-md-3" >Deposit : <a style='color:red'><?=$loan_progress_data['data']->deposit_amount?> </a></div>
        <div class="col-md-3" >Loan Collection : <a style='color:green'><?=$loan_progress_data['data']->collection_loan_amount?> </a> </div>
        <div class="col-md-3" >Deposit Collection : <a style='color:green'><?=$loan_progress_data['data']->collection_deposit_amount?> </a> </div>
    </div>	
 
</div>

<div class="row borderbox">

    <div class="col-md-12 process_bar" id="process_bar" >
       
        <div class="col-md-12 text-center" >
            <div class="col-md-6" ><b>Total loan distribution</b> : <a style='color:red'> <?=number_format((float)$loan_distribution['info']->loan_amount, 2, '.', '')?> </a> </div>
            <div class="col-md-6" ><b>Total deposit</b> : <a style='color:red'> <?=number_format((float)$loan_distribution['info']->deposit_amount, 2, '.', '')?> </a> </div>
            
        </div>
      
        
    </div>
        
  
 
</div>

<div class="row">
    <div class="col-md-12"> 
        <div class="col-md-6 pie_chart" id="pie_chart" ></div>
        <div class="col-md-6 area_chart" id="area_chart"></div> 
     </div>   
</div>
<hr>

<div class="row">
        <div class="col-md-12"> 
        	<div class="col-md-6" id="bottom_left_chart"></div>
        	<div class="col-md-6" id="bottom_right_chart"></div> 
        </div>
</div>

<style>
.borderbox{ padding: 10px;}
</style>