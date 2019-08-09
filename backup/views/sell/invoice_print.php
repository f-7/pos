<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(1) {
        text-align: left;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(3) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    
    
    .rtl table tr td:nth-child(3) {
        text-align: right;
    }
    .text-right{text-align: right;}
    .text-left{text-align: left;}
    .total td{text-align: right;}
    .product_list td{border: 1px solid #eee ;padding-left: 10px;}
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?php echo $this->template->Images();?>/utc-logo.png" style="width:80px; max-width:300px;">
                            </td>
                            <td></td>
                            <td></td>
                            
                            <td class="text-right">
                                Invoice #: <?php echo  $invoice[0]->invoice_id;?><br>
                                Created: <?php echo date('d-F-Y',strtotime($invoice[0]->sell_date));?><br>
                              
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="text-left">
                                Berhowliya Bazar,<br>
                                Faridpur, Pabna
                            </td>
                            
                            <td class="text-right">
                                <?php echo $info['customer_info']->customer_name;?><br>
                                <?php echo $info['customer_info']->mobile;?><br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
           
            
            <tr class="heading">
                <td>Sl</td>
                <td>Serial No</td>
                <td>Item</td>
                <td>Price</td>
            </tr>
            
            <?php if($invoice){ $i=1;
                    foreach($invoice as $d){ ?>


                     <tr class="product_list">
                        <td><?php echo $i++;?></td>
                        <td><?php echo $d->serial_no;?></td>
                        <td><?php echo $d->product_name;?></td>
                        <td  width="90" class="text-right"><?php echo "৳".$d->unit_price;?></td>
                    </tr>


               <?php }}
            ?>

            <tr class="total">
                <td colspan="2"></td>
                <td >Sub Total</td>
                <td><?php echo "৳". $invoice[0]->total_amt;?></td>
            </tr>
            <tr class="total">
                <td colspan="2"></td>
                 <td >Discount</td>
                <td><?php echo "৳". $invoice[0]->discount_amount;?></td>
            </tr>
            <tr class="total">
                <td colspan="2"></td>
                 <td >Total</td>
                <td><?php echo "৳". ($invoice[0]->total_amt - $invoice[0]->discount_amount);?></td>
            </tr>
            <tr class="total">
                <td colspan="2"></td>
                <td >Paid amount</td>
                <td><?php echo  "৳". $invoice[0]->paid_amount;?></td>
            </tr>
            <tr class="total">
                <td colspan="2"></td>
                <td >Due amount</td>
                <td><?php echo  "৳". (($invoice[0]->total_amt - $invoice[0]->discount_amount) - $invoice[0]->paid_amount) ;?></td>
            </tr>
                        
          

            
        </table>

        <table>
            <tr>
                <td>NB: This is computer generated invoice and do not require any stamp or signature</td>
            </tr>
        </table>
    </div>
</body>
</html>