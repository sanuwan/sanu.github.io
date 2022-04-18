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
        <?php
        if (isset($_GET["uneqmsg"])) {
            echo '<div class="msd-div">';
            echo $_GET["uneqmsg"];
            echo '</div>';
        }
        ?>
        <div class="widget-head">
            <h4 class="heading glyphicons user"><i></i>Manage Vacancies</h4>
        </div>
        <div class="widget-body " style="padding-bottom: 0; border:none; min-height:450px;">
            <div class="widget-body tbn" style="padding: 10px; border:none;">
                <form action="../controllers/statuschange.php" method="post">	
                    <table class="dynamicTable table table-striped table-bordered table-primary table-condensed">
                        <thead>
                            <tr>
                                <th>Reference NO</th>              
                                <th class="center">Date</th>
                                <th class="center">User</th>
                                <th class="center"> Views</th>
                                <th class="center"> Applicants</th> 
                                <th class="center">View</th>
                                <th class="center">Publish</th>
                                <th class="center">User Note</th>
                                <th class="center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Manage Jobs
                            $user_id = 0;
                            $SAtable = "job_posts";
                            $SAwhere = "user_id";
                            $ST = new SelectTableAll();
                            $ST->SelectTbAll($SAtable);
                            $count = 1;
                            while ($select = mysql_fetch_array($SAquery)) {
                                ?>
                                <tr class="gradeX">
                                    <td><input type="hidden" name="id<?php echo $count; ?>" value="<?php echo $select['id']; ?> "> # <?php echo $select['reference_number']; ?> </td>
                                    <td> <?php echo $select['date']; ?> </td>

                                    <?php
                                    $status = $select['user_status'];

                                    if ($status == 1) {
                                        echo '<td class="center" style="width: 80px;"><span class="label label-block label-important">Publish</span></td>';
                                    } else {

                                        echo '<td class="center" style="width: 80px;"><span class="label label-block label-inverse">Unpublish</span></td>';
                                    }
                                    ?>

                                    <td> <?php echo $select['view_count']; ?> </td>
                                    <td> <?php echo $select['apply_count']; ?> </td>

                                    <td class="center"><a class="fancybox fancybox.iframe" href="jobview.php?id=<?php echo $select['id']; ?>">View</a></td>
                                    <td class="center">
                                        <?php
                                        $status = $select['admin_status'];

                                        if ($status == 1) {
                                            $box = "checked";
                                        } else {
                                            $box = "";
                                        }
                                        ?>
                                        <input type="checkbox" class="checkbox" name="check_list<?php echo $count; ?>" <?php echo $box; ?> ></td>
                                        <td> <?php echo $select['notes']; ?> </td>
                                    <td class="center"><a class="" href="../controllers/delete_job.php?id=<?php echo $select['id']; ?>" >Delete</a></td>
                                </tr>
                                <?php
                                $count++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="count" value="<?php echo $count; ?>"/>
            </div>
            <br/>
            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Save</button>
        </div>				
    </div>
</div>
<?php include('../shared/footer.php') ?>	