
<?php
include('../shared/header.php');
include ('../controllers/session_check.php');
include ('../lib/mainlib.php');
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
            <h4 class="heading glyphicons user"><i></i>Add New Category </h4>
        </div>
        <div class="widget-body" style="padding-bottom: 0;">
            <div class="row-fluid">
                <div class="span9">
                    <form action="../controllers/add_category.php" method="post">
                        <label for="inputUsername">Category Name</label>
                        <input type="text" id="inputUsername" class="span10" value="" name="category_name" required/>
                        <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Username can't be changed"><i></i></span>
                        <div class="separator"></div>
                </div>
                <div class="form-actions" style="margin: 0; padding-right: 0;">
                    <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Add Category</button>
                </div>
            </div>
            </form>
        </div>
        <div style="  overflow-y: scroll;height: 370px;margin-top: 4px;">
            <table class="dynamicTable table table-striped table-bordered table-primary table-condensed">
                <thead>
                    <tr>
                        <th class="center">Job Category Name</th>
                        <th class="center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $SAtable = "jobs_category";
                    $ST = new SelectTableAll();
                    $ST->SelectTbAll($SAtable);
                    while ($select = mysql_fetch_array($SAquery)) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $select['jobs_category']; ?></td>
                            <td class="center"><a class="" href="../controllers/delete_category.php?id=<?php echo $select['id']; ?> ">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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