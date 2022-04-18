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
            <h4 class="heading glyphicons user"><i></i>Add New Vacancy</h4>
        </div>
        <div class="widget-body" style="padding-bottom: 0;">
            <div class="row-fluid">
                <div class="span3">
                    <strong>Vacancy Details</strong>
                    <p class="muted">Add your job  details here</p>
                </div>
                <div class="span9">
                    <form action="../controllers/addjobs.php" method="post" enctype='multipart/form-data'>
                        <label for="inputUsername">Select Job Category *</label>
                        <select class="span10" name="jc">
                            <?php
                            $SAtable = "jobs_category";
                            $ST = new SelectTableAll();
                            $ST->SelectTbAll($SAtable);
                            while ($select = mysql_fetch_array($SAquery)) {
                                ?>
                                <option value="<?php echo $select['id']; ?>"> <?php echo $select['jobs_category']; ?> </option>
                            <?php } ?>
                        </select>
                        <div class="separator"></div>
                        <label for="inputUsername">Job Title *</label>
                        <input type="text" id="inputUsername" class="span10" value="" name="jt" required/>
                        <div class="separator"></div>
                        <label for="inputUsername">Closing Date *</label>
                        <input type="date" id="datepicker" value="" name="cdate" class="hasDatepicker" required/>
                        <div class="separator"></div>
                        <label for="inputUsername">Job Related URL *</label>
                        <input type="text" id="inputUsername" class="span10" value="" name="jurl"/>
                        <div class="separator"></div>
                        <label for="inputUsername">Job Description  *</label>
                        <textarea id="inputUsername" class="span10"  name="jd" required> </textarea>
                        <div class="separator"></div>
                        <label for="inputUsername">Respond Email * </label>
                        <input type="email" name="remail" id="inputUsername" class="span10" value="" name="re" required/>
                        <div class="separator"></div>
                        <label for="inputUsername">Vacancy Attachment ( Image../jpg/png )</label>
                        <input type="file" id="inputUsername" class="span10" name="fileToUpload"/>
                        <div class="separator"></div>
                </div>
            </div>
            <hr class="separator bottom" />
            <div class="row-fluid">
                <div class="span3">
                    <strong>Special Notes </strong>
                    <p class="muted">(This will not show on your Vacancy. only for Job Feathers Staff Access)</p>
                </div>
                <div class="span9">
                    <div class="row-fluid">
                        <div class="span9">
                            <label for="inputPhone">Notes</label>
                            <div class="">
                                <textarea id="inputUsername" class="span10" value="" name="jsn"> </textarea>
                            </div>
                            <div class="separator"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions" style="margin: 0; padding-right: 0;">
                <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Save</button>
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