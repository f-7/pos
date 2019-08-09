<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <meta name="description" content="<?=(isset($metadata_description))? $metadata_description: '';?>">
    <meta name="keywords" content="<?=(isset($metadata_keyword))? $metadata_keyword: '';?>">
    <link rel="icon" type="image/gif" href="<?= $this->template->Images()?>icon.ico" />
    <title><?php echo $template['title']; ?></title>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:700,300,600,400" rel="stylesheet" type="text/css">
    <link href="<?= $this->template->Fonts()?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="<?= $this->template->Css()?>bootstrap.css" rel="stylesheet">
    <link href="<?= $this->template->Css()?>AdminLTE.min.css" rel="stylesheet">
    <link href="<?= $this->template->Css()?>custom.css" rel="stylesheet">
    
    <?=(isset($template['metadata_css']))? $template['metadata_css']: '';?>
    <!-- jQuery -->
    <script src="<?= $this->template->Js()?>jquery.js"></script>
    <!-- Custom CSS -->
   
    <!-- Custom CSS -->
   
    <?=(isset($template['metadata_js']))? $template['metadata_js']: '';?>
   
</head>
<body class="hold-transition login-page">
    <div class="login-box">
      
  <!--                    dynamic content-->
                    <?=(isset($template['body']))?$template['body']: ''; ?>
<!--                    end dynamic content-->

    </div><!-- /.login-box -->

</body>

</html>
