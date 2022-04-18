<!DOCTYPE html>
<?php
include ('../lib/mainlib.php');

$suser_id = $_GET['id'];
$select_table = "job_posts";
$swhere = "id";

if (isset($_GET['id'])) {
    $id1 = $_GET['id'];
    $cid = $id1;
    $hits = new hits();
    $hits->job_view_count($cid);
}

$jp = new SelectTable();
$jp->SelectTb($suser_id, $select_table, $swhere);
$STbA = mysql_fetch_array($query);

$select_table3 = "job_posts";
$wh1 = "catogory_id";
$wh2 = "admin_status";
$ST = new SelectTable();
$ST->SelectTb3($id1, $id2, $select_table3, $wh1, $wh2);
?>
<html>
    <head>
        <title><?php echo $STbA['job_title']; ?></title>
        <style>
            .jobpostdiv{overflow-y:auto !important; height:400px !important; padding: 10px 10px 0px 10px;}
        </style>
        <link rel="stylesheet" href="../theme/css/style.min.css?1363272390">
    </head>
    <body style="overflow-y:hidden; margin:0px; padding:0px;">
        <h3 class="jt"><?php echo $STbA['job_title']; ?></h3>
        <div class="jobpostdiv">
            <p> <b>Opening Date : </b> <?php echo $STbA['date']; ?> /<b>Closing Date : </b> <?php echo $STbA['closing_date']; ?> </p>
            <?php
            if ($STbA['attachment'] == !null) {
                echo '<img src="../uploads/' . $STbA['attachment'] . '" width="50%" height="500px"/>';
            }
            if ($STbA['job_discription'] == !null) {

                echo '<h3> Job Discription </h3> <p>' . $STbA['job_discription'] . '</p> ';
            }
            $suser_id2 = $STbA['user_id'];
            $select_table2 = "users";
            $swhere2 = "id";

            $ST = new SelectTable();
            $ST->SelectTb2($suser_id2, $select_table2, $swhere2);
            $select = mysql_fetch_array($query2);
            ?>
            <div class="jobpostdiv2">
                <p>  <a href="uploadcv.php?id=<?php echo $suser_id; ?> &company=<?php echo $select['company_name']; ?>"> <button class="btn btn-block btn-primary" style="width: 96px; margin: 10px; background: #37a6cd !important; cursor: pointer;"> Apply </button> </a> </p>
                <p> <b>Address </b> <br/> <?php echo $select['company_address1']; ?> <br/> <?php echo $select['company_address2']; ?>  </p>
                <p> <b>Phone : </b> <?php echo $select['phone']; ?> </p>
            </div>
            <div class="footer" style="padding:10px; text-align:left;"> 
                <p>  <a href= "<?php echo $select['facebook']; ?>" style="color:#37a6cd;   text-decoration: none;" target="_blank"> Facebook</a> </p>
                <p>  <a href= "<?php echo $select['website']; ?>" style="color:#37a6cd;   text-decoration: none;" target="_blank"> Company Web</a> </p>
            </div>
        </div>
    </body>
</html>