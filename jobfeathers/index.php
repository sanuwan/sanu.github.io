<?php include ('admin/header.php'); ?>
<body style="padding:0px;">
    <div class="iheader"> 
        <a href="admin/index.php"> <button class="btn btn-block btn-primary" style="float: right;width: 70px; margin: 10px; background: #37a6cd !important;">Sign in</button> </a>
        <div class="ilogo"> <a href="index.php"><img class="logo" src="admin/images/logo1.png"> </a>  
        </div>    
        <script>
            function submit() {
                document.getElementById("myForm").submit();
            }
        </script>
    </div>
    <div id="wrapper" class="mbody">
        <!-- Start Content -->
        <div class="container-fluid fixed" style=" border:none; width: 100%;   background: #fff;">
            <?php
            include ('admin/lib/mainlib.php');
            $SAtable = "jobs_category";
            $ST = new SelectTableAll();
            $ST->SelectTbAll($SAtable);
            ?>
            <div class="row-fluid" style="margin:0 auto; width:100%; position: relative; top: 3em;">
                <div class="hm-list">      
                    <?php
                    $rowcount = mysql_num_rows($SAquery);
                    $count = 0;
                    while ($select = mysql_fetch_array($SAquery)) {
                        ?> 
                        <?php
                        if ($count == 0) {
                            ?>
                            <ul>
                                <?php
                            }
                            ?>
                            <li> <a href="admin/vacancies.php?id=<?php echo $select['id']; ?>"> <?php echo $select['jobs_category']; ?> </a> </li>
                            <?php
                            if ($count == 3 || $rowcount == 1) {
                                ?>
                            </ul>
                            <?php
                            $count = -1;
                        }
                        ?>
                        <?php
                        $count++;
                        $rowcount--;
                    }
                    ?>
                </div>
                <div class="clear"> </div>
                <div class="rbtn">
                    <div class="ta"> 
                        <a href=" admin/views/signup.php" class="btn btn-block btn-primary"> Post Your Job Vacancy Free</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include ('admin/footer.php'); ?>



