<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include("error_header.php");
?>

<div style="display:none">
 
<p><?=$heading?></p>	 
<p><?=$message?></p>
</div>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	width:95%;
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}
body img{width:88%;}
a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

 

p {
	margin: 12px 15px 12px 15px;
}
.spancls{    width: 100%;
    float: left;
    text-align: center;}
.spancls a{color: red !important;font-weight: bold;font-size: 16px;}
</style>
</head>
<body>
 <img src="<?=$base_link.'assets/images/404.png'?>" />	 <br>	 
<span class="spancls">	
	<a href="<?=$base_link?>" >Back to Home</a>
</span>	
</body>
</html>
<?php //exit;?>