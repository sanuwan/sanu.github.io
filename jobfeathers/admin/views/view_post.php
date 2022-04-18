<?php
include('../shared/header.php');
include ('../controllers/session_check.php');
include ('../lib/mainlib.php');
?>
<div class="separator"></div>
<div class="tab-pane active" id="account-settings">
    <div class="widget widget-2">

        <?php
        if (isset($_GET["msg"])) {
            echo '<div class="msd-div">';
            echo $_GET["msg"];
            echo '</div>';
        }
        ?>	
        <div class="widget-head">
            <h4 class="heading glyphicons user"><i></i>Your Vacancies</h4>
        </div>
        <div class="widget-body" style="padding-bottom: 0; border:none; min-height:450px;">
            <div class="widget-body tbn" style="padding: 10px; border:none;">
                <form action="../controllers/userstatuschange.php" method="post">
                    <table class="dynamicTable table table-striped table-bordered table-primary table-condensed">
                        <thead>
                            <tr>
                                <th class="center">Reference NO</th>
                                <th class="center">Title</th>
                                <th class="center">Job Category</th>
                                <th class="center"> Views</th>
                                <th class="center"> Applicants</th>
                                <th class="center">Date</th>
                                <th class="center"> Approval</th>
                                <th class="center">Publish</th>
                                <th class="center">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $suser_id = $_SESSION["userid"];
                            $select_table = "job_posts";
                            $swhere = "user_id";
                            $ST = new SelectTable();
                            $ST->SelectTb($suser_id, $select_table, $swhere);
                            $count = 1;
                            while ($select = mysql_fetch_array($query)) {
                                ?>
                                <tr class="gradeX">
                                    <td><input type="hidden" name="id<?php echo $count; ?>" value="<?php echo $select['id']; ?> "># <?php echo $select['reference_number']; ?></td>
                                    <td> <div class="tdfield2">  <?php echo $select['job_title']; ?> </div></td>
                                    <td class=""> 
                                        <div class="tdfield2"> 
                                            <?php
                                            $select_table2 = "jobs_category";
                                            $swhere2 = "id";
                                            $suser_id2 = $select['catogory_id'];

                                            $SCT = new SelectTable();
                                            $SCT->SelectTb2($suser_id2, $select_table2, $swhere2);
                                            $catagory = mysql_fetch_array($query2);
                                            // Select Cataogry
                                            echo $catagory['jobs_category'];
                                            ?> 
                                        </div>
                                    </td>
                                    <td> <?php echo $select['view_count']; ?> </td>
                                    <td> <?php echo $select['apply_count']; ?> </td>
                                    <td> <?php echo $select['date']; ?> </td>                                  
                                    <?php
                                    $status = $select['admin_status'];

                                    if ($status == 1) {
                                        echo '<td class="center" style="width: 80px;"><span class="label label-block label-important">Approved</span></td>';
                                    } else {

                                        echo '<td class="center" style="width: 80px;"><span class="label label-block label-inverse">Not Approved</span></td>';
                                    }
                                    ?>
                                    <td class="center">
                                        <?php
                                        $status = $select['user_status'];
                                        if ($status == 1) {
                                            $box = "checked";
                                        } else {
                                            $box = "";
                                        }
                                        ?>
                                        <input type="checkbox" class="checkbox" name="check_list<?php echo $count; ?>" <?php echo $box; ?> ></td>

                                    <td class="center"><a class="fancybox fancybox.iframe" href="jobview.php?id=<?php echo $select['id']; ?> ">View</a></td>
                                </tr>
                                <?php $count++; ?>
                            <?php } ?>
                        <input type="hidden" name="count" value="<?php echo $count; ?>"/>
                        </tbody>
                    </table>
            </div>
            <br/>
            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Save</button>
            </form>
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