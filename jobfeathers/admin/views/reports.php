<?php
include('../shared/header.php');
include ('../controllers/session_check.php');
include ('../lib/mainlib.php');
?>

<script>
// Report Script
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function () {
        $("#tabs").tabs();
    });
</script>
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
            <h4 class="heading glyphicons user"><i></i> Reports </h4>
        </div>
        <div class="widget-body" style="padding: 0;">
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1"> All Customers </a></li>
                    <li><a href="#tabs-2"> Expire Vacancies </a></li>
                    <li><a href="#tabs-3">Top Job Categories </a></li>
                    <li><a href="#tabs-4">Top Vacancies  </a></li>
                </ul>
                <div id="tabs-1" style="padding: 0px;">
                    <div class="innerLR">
                        <div class="widget widget-gray widget-body-white" >
                            <div class="widget-head">
                                <button class="pbtn" onclick="printContent('report')">Print Report</button>
                            </div>
                            <div class="widget-body" id="report" style="padding: 10px 0;">
                                <table class="dynamicTable table table-striped table-bordered table-primary table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Reg No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Register Date</th>
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
                                                <td>#<?php echo $select['id']; ?></td>
                                                <td><?php echo $select['name']; ?> </td>
                                                <td><?php echo $select['email']; ?></td>
                                                <td><?php echo $select['phone']; ?></td>
                                                <td><?php echo $select['date']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tabs-2">   
                    <div class="innerLR">
                        <div class="widget widget-gray widget-body-white" >
                            <div class="widget-head">
                                <button class="pbtn" onclick="printContent('report2')">Print Report</button>
                            </div>
                            <div class="widget-body" id="report2" style="padding: 10px 0;">
                                <table class="dynamicTable table table-striped table-bordered table-primary table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Reference No</th>
                                            <th>Job Title</th>
                                            <th>Closing Date</th>
                                            <th> Applicants</th>
                                            <th> Views</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ex_v = new reports();
                                        $ex_v->ex_vacancies();
                                        while ($ex_select = mysql_fetch_array($g_result)) {
                                            ?>                                    
                                            <tr class="gradeX">
                                                <td> #<?php echo $ex_select['reference_number']; ?></td>
                                                <td><?php echo $ex_select['job_title']; ?></td>
                                                <td><?php echo $ex_select['closing_date']; ?> </td>
                                                <td><?php echo $ex_select['apply_count']; ?></td>
                                                <td><?php echo $ex_select['view_count']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tabs-3">
                    <div class="innerLR">
                        <div class="widget widget-gray widget-body-white" >
                            <div class="widget-head">
                                <button class="pbtn" onclick="printContent('report3')">Print Report</button>
                            </div>
                            <div class="widget-body" id="report3" style="padding: 10px 0;">
                                <table class="dynamicTable table table-striped table-bordered table-primary table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Category No</th>
                                            <th>Name</th>
                                            <th>Views</th>                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $top_c = new reports();
                                        $top_c->top_catagories();
                                        while ($topc_select = mysql_fetch_array($topcdata)) {
                                            ?>                                    
                                            <tr class="gradeX">
                                                <td> #<?php echo $topc_select['id']; ?></td>
                                                <td><?php echo $topc_select['jobs_category']; ?></td>
                                                <td><?php echo $topc_select['view_count']; ?> </td>                                         
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tabs-4">
                    <div class="innerLR">
                        <div class="widget widget-gray widget-body-white" >
                            <div class="widget-head">
                                <button class="pbtn" onclick="printContent('report4')">Print Report</button>
                            </div>
                            <div class="widget-body" id="report4" style="padding: 10px 0;">
                                <table class="dynamicTable table table-striped table-bordered table-primary table-condensed">
                                    <thead>
                                        <tr>
                                            <th>REF No</th>
                                            <th>Job Title</th>
                                            <th> Views</th> 
                                            <th> Applicants</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $top_v = new reports();
                                        $top_v->top_vacancy();
                                        while ($topv_select = mysql_fetch_array($topvacan)) {
                                            ?>                                    
                                            <tr class="gradeX">
                                                <td> #<?php echo $topv_select['reference_number']; ?></td>
                                                <td><?php echo $topv_select['job_title']; ?></td>
                                                <td><?php echo $topv_select['view_count']; ?> </td> 
                                                <td><?php echo $topv_select['apply_count']; ?> </td> 
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('../shared/footer.php') ?>	