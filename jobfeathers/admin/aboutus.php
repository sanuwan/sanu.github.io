<!DOCTYPE html>
<head>
    <title> Job Feathers</title>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <!-- Bootstrap Extended -->
    <link href="bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
    <link href="bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="theme/scripts/select2/select2.css"/>
    <!-- JQueryUI v1.9.2 -->
    <link rel="stylesheet" href="theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />
    <!-- Glyphicons -->
    <link rel="stylesheet" href="theme/css/glyphicons.css" />
    <!-- Bootstrap Extended -->
    <link rel="stylesheet" href="bootstrap/extend/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
    <!-- Uniform -->
    <link rel="stylesheet" media="screen" href="theme/scripts/pixelmatrix-uniform/css/uniform.default.css" />
    <!-- DataTables -->
    <link rel="stylesheet" media="screen" href="theme/scripts/DataTables/media/css/DT_bootstrap.css" />
    <!-- JQuery v1.8.2 -->
    <script src="theme/scripts/jquery-1.8.2.min.js"></script>
    <!-- Modernizr -->
    <script src="theme/scripts/modernizr.custom.76094.js"></script>
    <!-- MiniColors -->
    <link rel="stylesheet" media="screen" href="theme/scripts/jquery-miniColors/jquery.miniColors.css" />
    <!-- Theme -->
    <link rel="stylesheet" href="theme/css/style.min.css?1363272440" />
    <!-- LESS 2 CSS -->
    <script src="theme/scripts/less-1.3.3.min.js"></script>
    <!-- Jquery Popup -->
    <!-- Add jQuery library -->
    <script type="text/javascript" src="popup/lib/jquery-1.10.1.min.js"></script>
    <!-- Custom -->
    <script type="text/javascript" src="popup/popup.js"></script>
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="popup/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="popup/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="popup/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="popup/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="popup/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="popup/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    <!-- Jquery Popup -->
    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="popup/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="popup/source/jquery.fancybox.css?v=2.1.5" media="screen" />
</head>
<body style="margin:0px; padding:0px;">
    <!-- Start Content -->
    <div class="iheader"> 
        <a href="index.php"> <button class="btn btn-block btn-primary" style="float: right;width: 96px; margin: 10px; background: #37a6cd !important;">Login</button> </a>
        <div class="ilogo" style="padding: 1% 0px 0px 0px; margin-left: 8%;"> <a href="../index.php"><img class="logo" src="images/logo1.png" style="  width: 235px;"> </a></div>
    </div>	
    <div class="row-fluid" style="margin:0 auto; width:70%;   min-height: 533px;">
        <div class="widget-body" style="padding: 10px 0;"> 	
            <?php
            if (isset($_GET["emsg"])) {
                echo '<div class="msd-div" style="text-align:center;">';
                echo $_GET["emsg"];
                echo '</div><br/>';
            }
            ?>
            <section style="text-align: justify;font-size: 14px;line-height: 22px;margin-top: 3%;">
                Job Feathers is developed for Help for employee and employer to fulfill their jobs requirements. And also this is total free service for any kind of users. In this system there are two parts of users.  One type is who are interesting to the post job advertisement on the internet for fulfill their job vacancies. Another type is who are looking new jobs from internet and trying to apply for the jobs.
            </section>
        </div>
    </div>
    <!-- Sticky Footer -->
    <div class="nfooter"> 
        Job Feathers  ©2019. <span class="contact-link">  <a href="aboutus.php"> About </a> <a href="contact.php"> Contact</a> </span>
    </div>
    <!-- JQueryUI v1.9.2 -->
    <script src="theme/scripts/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- JQueryUI Touch Punch -->
    <!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
    <script src="theme/scripts/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <!-- MiniColors -->
    <script src="theme/scripts/jquery-miniColors/jquery.miniColors.js"></script>
    <!-- Select2 -->
    <script src="theme/scripts/select2/select2.js"></script>
    <!-- Themer -->
    <script>
        var themerPrimaryColor = '#DA4C4C';
    </script>
    <script src="theme/scripts/jquery.cookie.js"></script>
    <script src="theme/scripts/themer.js"></script>
    <!-- Resize Script -->
    <script src="theme/scripts/jquery.ba-resize.js"></script>
    <!-- Uniform -->
    <script src="theme/scripts/pixelmatrix-uniform/jquery.uniform.min.js"></script>
    <!-- DataTables -->
    <script src="theme/scripts/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="theme/scripts/DataTables/media/js/DT_bootstrap.js"></script>
    <!-- Bootstrap Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Extended -->
    <script src="bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
    <script src="bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
    <script src="bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
    <script src="bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
    <script src="bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script>
    <script src="bootstrap/extend/bootbox.js" type="text/javascript"></script>
    <script src="bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script>
    <script src="bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js" type="text/javascript"></script>
    <!-- Custom Onload Script -->
    <script src="theme/scripts/load.js"></script>
    <!-- Layout Options -->
    <script src="theme/scripts/layout.js"></script>
</body>
</html>