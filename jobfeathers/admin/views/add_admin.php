<?php
include('../shared/header.php');
include ('../controllers/session_check.php');
?>
<div class="separator"></div>
<div class="tab-pane active" id="account-settings">
    <div class="widget widget-2">
        <?php
        if (isset($_GET["uneqmsg"])) {
            echo '<div class="msd-div">';
            echo $_GET["uneqmsg"];
            echo '</div>';
        }
        ?>	
        <div class="widget-head">
            <h4 class="heading glyphicons user"><i></i>Add New Admin</h4>
        </div>
        <div class="widget-body" style="padding-bottom: 0;">
            <div class="row-fluid">
                <div class="span3">
                    <strong>Company Details</strong>
                    <p class="muted">Add your company  details here</p>
                </div>
                <div class="span9">
                    <form action="../controllers/add_admin.php" method="post">
                        <label for="inputUsername">Admin Name</label>
                        <input type="text" id="inputUsername" class="span10" value="" name="name" required/>
                        <div class="separator"></div>
                        <label for="inputUsername">Admin Company Name</label>
                        <input type="text" id="inputUsername" class="span10" value="" name="comname"/>
                        <div class="separator"></div>
                        <label for="inputUsername">Admin Address Line 1</label>
                        <input type="text" id="inputUsername" class="span10" value="" name="add1"/>
                        <div class="separator"></div>
                        <label for="inputUsername">Admin Address Line 2</label>
                        <input type="text" id="inputUsername" class="span10" value="" name="add2"/>
                        <div class="separator"></div>
                        <label for="inputUsername">Email (email will be your username)</label>
                        <input type="text" id="inputUsername" class="span10" value="" name="email" required/>
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

                            <label for="inputWebsite">Web site</label>
                            <div class="input-prepend">
                                <span class="add-on glyphicons link"><i></i></span>
                                <input type="text" id="inputWebsite" class="input-large" placeholder="Add your web site url" name="web" />
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