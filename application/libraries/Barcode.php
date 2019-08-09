<?php
include('barcode/BarcodeGenerator.php');
include('barcode/BarcodeGeneratorPNG.php');


 
class Barcode {

    function __construct() {
        $CI = & get_instance();
        log_message('Debug', 'Barcode class is loaded.');
		
		
    }

public static function create($data,$image_size=""){
	
	$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG(); 
	 
     $style_code=($image_size)?$image_size:"width:100px";	 
	return '<img src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode($data, $generatorPNG::TYPE_CODE_128)) . '"  style="'.$style_code.'"/>';
  
	 
    }

}

