<?php

class Pdf {

    function __construct() {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }

    function load($param = NULL) {
     //   require_once APPPATH .'third_party/vendor/autoload.php';
 require_once __DIR__ . '/../third_party/vendor/autoload.php';

return new \Mpdf\Mpdf();
 
	/*
        if ($param == NULL) {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';
        }
       // return new Mpdf($param);
	 return  $mpdf = new \third_party\vendor\mpdf\Mpdf\Mpdf();
	 */
    }

}