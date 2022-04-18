<!--Main Menu		-->
<div id="menuInner">
    <div class="mainmenu">
        <ul>
            <li class="heading"><span>Category</span></li>
                <?php
                include ('../controllers/session_check.php');

                if ($_SESSION["user_group"] == 1) {
                    echo '<li class="glyphicons home"><a href="addjobs.php"><i></i><span> Add New Vacancy </span></a></li>';
                    echo '<li class="glyphicons charts "><a href="view_post.php"><i></i><span>View Your Vacancies</span></a></li>';
                    echo '<li class="glyphicons file"><a href="add_category.php"><i></i><span>Manage Job Category </span></a></li>';
                    echo '<li class="glyphicons cogwheels"><a href="user_settings.php"><i></i><span>Settings</span></a></li>';
                    echo '<li class="glyphicons claw_hammer"><a href="manage_jobs.php"><i></i><span>Manage Job Posts</span></a></li>';
                    echo '<li class="glyphicons group"><a href="add_admin.php"><i></i><span>Add Admins</span></a></li>';
                    echo '<li class="glyphicons group"><a href="manage_users.php"><i></i><span>Manage Users</span></a></li>';
                    echo '<li class="glyphicons group"><a href="reports.php"><i></i><span> Reports </span></a></li>';
                }
                if ($_SESSION["user_group"] == 2 || $_SESSION["user_group"] == 3) {
                    echo '<li class="glyphicons home"><a href="addjobs.php"><i></i><span> Add New Vacancy </span></a></li>';
                    echo '<li class="glyphicons charts "><a href="view_post.php"><i></i><span>View Your Vacancies</span></a></li>';
                    echo '<li class="glyphicons cogwheels"><a href="user_settings.php"><i></i><span>Settings</span></a></li>';
                }
                ?>
    </div>
</div>