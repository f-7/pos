<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include("error_header.php");
?>

<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0; display:none">

<h4>A PHP Error was encountered</h4>

<p>Severity: <?php echo $severity; ?></p>
<p>Message:  <?php echo $message; ?></p>
<p>Filename: <?php echo $filepath; ?></p>
<p>Line Number: <?php echo $line; ?></p>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

	<p>Backtrace:</p>
	<?php foreach (debug_backtrace() as $error): ?>

		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

			<p style="margin-left:10px">
			File: <?php echo $error['file'] ?><br />
			Line: <?php echo $error['line'] ?><br />
			Function: <?php echo $error['function'] ?>
			</p>

		<?php endif ?>

	<?php endforeach ?>

<?php endif ?>

</div>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PHP Code Error</title>
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
body img{width:72%;}
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

	<img src="<?=$base_link.'assets/images/code_error.png'?>" />	 <br>	 
<span class="spancls">	
	<a href="<?=$base_link?>" >Back to Home</a>
</span>	
</body>
</html>

<?php //exit;?>
