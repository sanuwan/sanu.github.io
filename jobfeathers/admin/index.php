<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
    <?php
    error_reporting(4);
    session_start();
    include ('lib/mainlib.php');
    include ('s_logins/fb/index.php');
    if ($_SESSION["userid"] == !null) {
        header("location:views/view_post.php");
    }
    ?>
    <head>
        <title>Job Feathers </title>
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
        <!-- JQuery v1.8.2 -->
        <script src="theme/scripts/jquery-1.8.2.min.js"></script>
        <!-- Modernizr -->
        <script src="theme/scripts/modernizr.custom.76094.js"></script>
        <!-- MiniColors -->
        <link rel="stylesheet" media="screen" href="theme/scripts/jquery-miniColors/jquery.miniColors.css" />
        <!-- Theme -->
        <link rel="stylesheet" href="theme/css/style.min.css?1363272449" />
        <link rel="stylesheet" href="theme/css/style.css" />
        <!-- LESS 2 CSS -->
        <script src="theme/scripts/less-1.3.3.min.js"></script>
    </head>
    <body>

        <!-- Start Content -->
        <div class="container-fluid fixed login">
            <div id="login">
                <a href="../index.php"> <img class="logo" src="images/logo1.png"> </a>
                <?php
                if (isset($_GET["uneqmsg"])) {
                    echo '<div class="msd-div" style="text-align:center;">';
                    echo $_GET["uneqmsg"];
                    echo '</div>';
                }
                ?>	
                <form class="form-signin" method="post" action="controllers/userlog.php">
                    <div class="widget widget-4">
                        <div class="widget-head">
                            <h4 class="heading">Restricted area</h4>
                        </div>
                    </div>
                    <h2 class="glyphicons unlock form-signin-heading"><i></i> Please Sign in</h2>
                    <div class="uniformjs">
                        <input type="text" class="input-block-level" placeholder="Email address" name="username" required> 
                        <input type="password" class="input-block-level" placeholder="Password" name="password" required> 
                    </div>
                    <button class="btn btn-large btn-primary" style="float:right;" type="submit">Sign in</button> 
                    <a href="views/signup.php" class="btn btn-large btn-primary"  type="submit">Register</a>
                    <div  style="text-align: left; margin-top: 25px;">
                        <a href='<?php echo $helper->getLoginUrl(array('email')) ?> '> <img src="images/fb-login-button1.png"> </a>
                    </div>
                </form>
            </div>		
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