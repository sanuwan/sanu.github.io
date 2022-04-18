<!DOCTYPE html>
<html lang="en">
<?php include("comman/header.php"); ?>
<body>
<?php include("comman/nav.php"); ?>

<header id="main-header" class="py-2 bg-info text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><i class="fa fa-folder"></i> Orders</h1>
            </div>
        </div>
    </div>
</header>

<!-- ACTIONS -->
<section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto">
                <div class="input-group">

                </div>
            </div>
        </div>
    </div>
</section>

<!-- USERS -->
<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Users</h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>John Doe</td>
                            <td>jdoe@gmail.com</td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Brad Traversy</td>
                            <td>test@test.com</td>
                        </tr>
                        </tbody>
                    </table>

                    <nav class="ml-4">
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("comman/footer.php"); ?>
</body>
</html>
