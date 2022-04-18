<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
    <head>
        <title>Job Feathers </title>
        <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
        <?php
        error_reporting(4);
        session_start();

        include ('../lib/mainlib.php');

        if ($_SESSION["userid"] == !null) {
            header("location:../views/view_post.php");
        }
        include ('/../s_logins/fb/index.php');
        ?>
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
        <div class="container-fluid fixed" style="  width: 700px;">
            <div id="wrapper">
                <div id="content" style="width: 700px;   margin: 0px;">
                    <div class="separator"></div>
                    <div class="heading-buttons">
                        <div id="search" style="width: 24%; float: right; padding: 5px 6px 0px 0px;">
                            <a href="../../index.php"><img class="logo" src="../images/logo1.png"></a>
                        </div>
                        <h3 class="glyphicons display" style="width: 400px;"><i></i> Welcome</h3> 
                        <div class="separator"></div>
                    </div>

                    <div class="separator"></div>
                    <div class="tab-pane active" id="account-settings">
                        <?php
                        if (isset($_GET["msg"])) {
                            echo '<div class="msd-div">';
                            echo $_GET["msg"];
                            echo '</div>';
                        }
                        ?>	
                        <div class="widget widget-2">
                            <div class="widget-head">
                                <h4 class="heading glyphicons user"><i></i>Sign Up</h4>
                            </div>
                            <div class="widget-body" style="padding-bottom: 0;">
                                <div class="row-fluid">
                                    <div class="span3">
                                        <strong>Company Details</strong>
                                        <p class="muted">Add your company  details here</p>
                                    </div>
                                    <div class="span9">
                                        <form action="../controllers/signup.php" method="post">
                                            <label for="inputUsername">Your Name</label>
                                            <input type="text" id="inputUsername" class="span10" value="" name="name" required/>
                                            <div class="separator"></div>
                                            <label for="inputUsername">Company Name</label>
                                            <input type="text" id="inputUsername" class="span10" value="" name="comname" required/>
                                            <div class="separator"></div>
                                            <label for="inputUsername">Company Address Line 1</label>
                                            <input type="text" id="inputUsername" class="span10" value="" name="add1" required/>
                                            <div class="separator"></div>
                                            <label for="inputUsername">Company Address Line 2</label>
                                            <input type="text" id="inputUsername" class="span10" value="" name="add2" required/>
                                            <div class="separator"></div>
                                            <label for="inputUsername">Email (email will be your username)</label>
                                            <input type="email" id="inputUsername" class="span10" value="" name="email" required/>
                                            <div class="separator"></div>
                                            <label for="inputPasswordOld">Password</label>
                                            <input type="password" id="inputPasswordOld" class="span10" value="" placeholder="Password" name="pass" required/>

                                            <div class="separator"></div>

                                            <label for="inputPasswordOld">Repeat Password</label>
                                            <input type="password" id="inputPasswordOld" class="span10" value="" placeholder=" Repeat Password" name="passr" required/>

                                            <div class="separator"></div>

                                    </div>
                                </div>
                                <hr class="separator bottom" />
                                <div class="row-fluid">
                                    <div class="span3">
                                        <strong>Contact Details</strong>
                                        <p class="muted">Add your company contact details here</p>
                                    </div>
                                    <div class="span9">
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <label for="inputPhone">Phone</label>
                                                <div class="input-prepend">
                                                    <span class="add-on glyphicons phone"><i></i></span>
                                                    <input type="text" id="inputPhone" class="input-large" placeholder="01234567897" name="phone" required/>
                                                </div>
                                                <div class="separator"></div>

                                                <label for="inputWebsite">Web</label>
                                                <div class="input-prepend">
                                                    <span class="add-on glyphicons link"><i></i></span>
                                                    <input type="text" id="inputWebsite" class="input-large" placeholder="Add your web site url" name="web"/>
                                                </div>
                                                <div class="separator"></div>
                                            </div>
                                            <div class="span6">
                                                <label for="inputFacebook">Facebook</label>
                                                <div class="input-prepend">
                                                    <span class="add-on glyphicons facebook"><i></i></span>
                                                    <input type="text" id="inputFacebook" class="input-large" placeholder="Add your facebook url" name="facebook"/>
                                                </div>
                                                <div class="separator"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions" style="margin: 0; padding-right: 0;">
                                    <a href='<?php echo $helper->getLoginUrl(array('email')) ?> '> <img src="../images/fb-login-button1.png"> </a>
                                    <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Save and Register</button>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- End Content -->
                </div>
                <!-- End Wrapper -->
            </div>
            <!-- Sticky Footer -->
        </div>
        <?php include('../shared/footer.php') ?>	