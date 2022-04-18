<?php
include('../shared/header.php');
include ('../controllers/session_check.php');
include ('../lib/mainlib.php');
?>

<div class="separator"></div>
<div class="tab-pane active" id="account-settings">
    <div class="widget widget-2">
        <div class="widget-head">
            <h4 class="heading glyphicons user"><i></i>Manage Users </h4>
        </div>
        <div class="widget-body" style="padding-bottom: 0;">
            <div class="row-fluid" style="  overflow-y: scroll;height: 414px;">
                <?php
                if (isset($_GET["uneqmsg"])) {
                    echo '<div class="msd-div">';
                    echo $_GET["uneqmsg"];
                    echo '</div>';
                }
                ?>	
                <table class="dynamicTable table table-striped table-bordered table-primary table-condensed">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th class="center">Join Date</th>
                            <th class="center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $SAtable = "users";
                        $ST = new SelectTableAll();
                        $ST->SelectTbAll($SAtable);
                        while ($select = mysql_fetch_array($SAquery)) {
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $select['name']; ?> 

                                    <?php
                                    if ($select['user_group'] == 1) {
                                        echo '<span style="color:rgb(228, 36, 36);">(admin )</span>';
                                    }
                                    ?></span>
                                    <br/> <span class="comname"><?php echo $select['email']; ?></span>
                                    <br/> <span class="comname"> <a href="<?php echo $select['website']; ?>" target="_blank" style="color:#DA9439;"> <?php echo $select['website']; ?></a></span>
                                    <br/> <span class="comname"> <a href="<?php echo $select['facebook']; ?>" target="_blank" style="color:#59B23A;"> <?php echo $select['facebook']; ?></a></span>
                                </td>
                                <td><?php echo $select['company_name']; ?> <br/> Phone: <span class="comname"><?php echo $select['phone']; ?></span></td></td>
                                <td><?php echo $select['company_address1']; ?> <br/> <?php echo $select['company_address2']; ?> </td>
                                <td class="center"><?php echo $select['date']; ?>  </td>
                                <td class="center"><a class="" href="../controllers/delete_user.php?id=<?php echo $select['id']; ?> ">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Content -->
    </div>
    <!-- End Wrapper -->
</div>
<!-- Sticky Footer -->
<?php include('../shared/footer.php') ?>	