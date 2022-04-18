<?php
include('../shared/header.php');
include ('../controllers/session_check.php');
include ('../lib/mainlib.php');
?>
<script>
    $(document).ready(function () {
        $(".btn").click(function () {
            $(".edit-text").toggle();
            $(".value").toggle();
        });
    });


    $(document).ready(function () {
        $(".cp").click(function () {
            $(".pwcs").toggle();
        });
    });
</script>
<div class="separator"></div>
<div class="tab-pane active" id="account-settings">
    <div class="widget widget-2">
        <div class="widget-head">
            <h4 class="heading glyphicons user"><i></i>Your Details</h4>
        </div>
        <div class="widget-body" style="padding-bottom: 0; border:none; min-height:450px;">
            <div class="widget-body" style="padding: 0px; border:none; background:#fff;">
                <div class="widget widget-gray widget-body-white pwcs">
                    <?php
                    if (isset($_GET["msg"])) {
                        echo '<div class="msd-div">';
                        echo $_GET["msg"];
                        echo '</div>';
                    }
                    ?>	
                    <div class="widget-head"><h4 class="heading"> About </h4> </div>
                    <div class="widget-body" style="padding: 0px;">
                        <a href="#" id="button"  class="btn btn-default btn-icon glyphicons edit eb cp" style="float: left !Important;   margin: 3px 0px 3px 0px;"><i></i> Change Password</a>
                        <table class="table table-bordered table-striped">
                            <?php
                            $suser_id = $_SESSION["userid"];
                            $select_table = "users";
                            $swhere = "id";
                            $ST = new SelectTable();
                            $ST->SelectTb($suser_id, $select_table, $swhere);

                            $users = mysql_fetch_array($query);
                            ?>
                            <tbody>
                            <form action="../controllers/user_settings.php" method="post">	
                                <tr>
                                    <td class="">Name</td>
                                    <td>
                                        <span class="value" style=""> <?php echo $users['name']; ?></span> 
                                        <input type="text"  placeholder="<?php echo $users['name']; ?>" class="textbox1 display edit-text" value="" name="name" style="display:none;"/> 
                                        <a href="#" id="button"  class="btn btn-default btn-icon glyphicons edit eb edit-text"><i></i> Edit</a>
                                        <a href="#" id="button" style="display:none"  class="btn btn-default btn-icon glyphicons edit eb edit-text"><i></i>Cancel</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">Company Name</td>
                                    <td>
                                        <span class="value" style=""> <?php echo $users['company_name']; ?></span> 
                                        <input type="text"  placeholder="<?php echo $users['company_name']; ?>" class="textbox1 display edit-text" value="" name="cname" style="display:none;"/> 
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">Company Address </td>
                                    <td>
                                        <span class="value" style=""><?php echo $users['company_address1']; ?> <br/> <?php echo $users['company_address2']; ?>
                                        </span>
                                        <input type="text"  placeholder="<?php echo $users['company_address1']; ?>" class="textbox1 display edit-text" value="" name="add1" style="display:none;"/> 
                                        <input type="text"  placeholder="<?php echo $users['company_address2']; ?>" class="textbox1 display edit-text" value="" name="add2" style="display:none;"/>
                                    </td>

                                </tr>
<!--                                <tr>
                                    <td class="">Email</td>
                                    <td>
                                        <span class="value" style=""><?php echo $users['email']; ?> </span>
                                        <input type="text"  placeholder="<?php echo $users['email']; ?>" class="textbox1 display edit-text" value="" name="email" style="display:none;"/>
                                    </td>
                                </tr>-->
                                <tr>
                                    <td class="">Phone Number</td>
                                    <td>
                                        <span class="value" style=""><?php echo $users['phone']; ?> </span>
                                        <input type="text"  placeholder="<?php echo $users['phone']; ?>" class="textbox1 display edit-text" value="" name="phn" style="display:none;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">Facebook</td>
                                    <td>
                                        <span class="value" style=""> <a href="<?php echo $users['facebook']; ?>" target="_blank"><?php echo $users['facebook']; ?> </a> </span>
                                        <input type="text"  placeholder="<?php echo $users['facebook']; ?>" class="textbox1 display edit-text" value="" name="fb" style="display:none;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">Web</td>
                                    <td>
                                        <span class="value" style=""><a href="<?php echo $users['website']; ?>" target="_blank"><?php echo $users['website']; ?> </a></span>
                                        <input type="text"  placeholder="<?php echo $users['website']; ?>" class="textbox1 display edit-text" value="" name="web" style="display:none;"/>
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right edit-text" style="display:none;"><i></i>Save</button>
                    </form>
                </div>			
            </div>
            <!--  Change Pass word section  -->
            <div class="widget widget-gray widget-body-white pwcs" style="display:none">
                <a href="#" id="button"  class="btn btn-default btn-icon glyphicons edit eb cp" style="z-index: 1; margin: 3px 3px 0px 0px;"><i></i> Cancel</a>
                <div class="widget-head"><h4 class="heading"> Change Password</h4></div>
                <div class="widget-body" style="padding: 10px 10px 30px 10px;">
                    <?php
                    $suser_id = $_SESSION["userid"];
                    $select_table = "users";
                    $swhere = "id";
                    $ST = new SelectTable();
                    $ST->SelectTb($suser_id, $select_table, $swhere);

                    $users = mysql_fetch_array($query);
                    ?>
                    <form action="../controllers/changepassword.php" method="post">	
                        <label for="inputPasswordOld">Enter Your Current Password</label>
                        <input type="password" id="inputPasswordOld" class="span10" value="" placeholder="Current Password" name="cpass" style="  width: 68%;" required/>
                        <div class="separator"></div>
                        <label for="inputPasswordOld">Enter New Password</label>
                        <input type="password" id="inputPasswordOld" class="span10" value="" placeholder=" New Password" name="npass" style="  width: 68%;" required/>
                        <div class="separator"></div>
                        <label for="inputPasswordOld">Repeat New Password</label>
                        <input type="password" id="inputPasswordOld" class="span10" value="" placeholder=" Repeat Password" name="rnpass" style="  width: 68%;" required/>
                        <div class="separator"></div>
                        <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right " style=""><i></i>Save</button>
                </div>
                </form>
            </div>
            <!--  Change Pass word section  -->
        </div>
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