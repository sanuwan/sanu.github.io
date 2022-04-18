<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
    <head>
        <title>Admin Panel Job Feathers </title>
        <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />

        <!-- Bootstrap Extended -->
        <link href="../bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
        <link href="../bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
        <link href="../bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">

        <!-- Select2 -->
        <link rel="stylesheet" href="../theme/scripts/select2/select2.css"/>

        <!-- Notyfy -->
        <link rel="stylesheet" href="../theme/scripts/notyfy/jquery.notyfy.css"/>
        <link rel="stylesheet" href="../theme/scripts/notyfy/themes/default.css"/>

        <!-- JQueryUI v1.9.2 -->
        <link rel="stylesheet" href="../theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />

        <!-- Glyphicons -->
        <link rel="stylesheet" href="../theme/css/glyphicons.css" />

        <!-- Bootstrap Extended -->
        <link rel="stylesheet" href="../bootstrap/extend/bootstrap-select/bootstrap-select.css" />
        <link rel="stylesheet" href="../bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />

        <!-- Uniform -->
        <link rel="stylesheet" media="screen" href="../theme/scripts/pixelmatrix-uniform/css/uniform.default.css" />

        <!-- JQuery v1.8.2 -->
        <script src="../theme/scripts/jquery-1.8.2.min.js"></script>

        <!-- Modernizr -->
        <script src="../theme/scripts/modernizr.custom.76094.js"></script>

        <!-- MiniColors -->
        <link rel="stylesheet" media="screen" href="../theme/scripts/jquery-miniColors/jquery.miniColors.css" />

        <!-- Theme -->
        <link rel="stylesheet" href="../theme/css/style.min.css?1363272390" />

        <!-- LESS 2 CSS -->
        <script src="../theme/scripts/less-1.3.3.min.js"></script>

<!--[if IE]><script type="text/javascript" src="theme/scripts/excanvas/excanvas.js"></script><![endif]-->
<!--[if lt IE 8]><script type="text/javascript" src="theme/scripts/json2.js"></script><![endif]-->

        <!-- Jquery Popup -->
        <!-- Add jQuery library -->
        <script type="text/javascript" src="../popup/lib/jquery-1.10.1.min.js"></script>

        <!-- Custom -->
        <script type="text/javascript" src="../popup/popup.js"></script>

        <!-- Add mousewheel plugin (this is optional) -->
        <script type="text/javascript" src="../popup/lib/jquery.mousewheel-3.0.6.pack.js"></script>

        <!-- Add fancyBox main JS and CSS files -->
        <script type="text/javascript" src="../popup/source/jquery.fancybox.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="../popup/source/jquery.fancybox.css?v=2.1.5" media="screen" />

        <!-- Add Button helper (this is optional) -->
        <link rel="stylesheet" type="text/css" href="../popup/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
        <script type="text/javascript" src="../popup/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

        <!-- Add Thumbnail helper (this is optional) -->
        <link rel="stylesheet" type="text/css" href="../popup/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
        <script type="text/javascript" src="../popup/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

        <!-- Add Media helper (this is optional) -->
        <script type="text/javascript" src="../popup/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        <!-- Jquery Popup -->

    </head>
    <body>
        <!-- Start Content -->
        <div class="container-fluid fixed">
            <div id="wrapper">
                <div id="menu" class="hidden-phone">
                    <div id="menuInner">
                        <div id="search">
                            <a href="../../index.php"><img class="logo" src="../images/logo1.png"> </a>
                        </div>
                        <?php include('../shared/menu.php') ?>
                    </div>
                </div>
                <div id="content">
                    <div class="separator"></div>
                    <div class="heading-buttons">
                        <h3 class="glyphicons display" style="width:auto;"><i></i> Admin Panel</h3> 
                        <div class="buttons pull-right">
                            <span style="color: rgb(125, 172, 235);padding-right: 17px;">  
                                Name :
                                <?php
                                echo $_SESSION["name"];
                                ?>
                            </span>
                            <a href="../controllers/logout.php" class="btn btn-default btn-icon glyphicons user"><i></i> Logout</a>
                        </div>
                        <div class="clearfix" style="clear: both;"></div>
                    </div>
                    <div class="separator"></div>
                    <h4 class="heading-arrow">Your Dashboard</h4>