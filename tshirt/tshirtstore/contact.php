
<!DOCTYPE html>
<html lang="en">
<?php include("comman/header.php"); ?>
<body>
<?php include("comman/nav.php"); ?>


<!-- ACTIONS -->
<section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">

        </div>
    </div>
</section>

<!-- LOGIN -->
<section id="product">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Contact</h4>
                    </div>
                    <div class="card-body">
                        <form action="action/contact.php" method="post">
                            <div class="form-group">
                                <label for="email">Your Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="password">Your E-mail</label>
                                <input type="text" class="form-control" name="email">
                                <label for="password">Your Message</label>
                                <textarea type="text" class="form-control" name="message"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" name="submit">
                        </form>
                    </div>
    </div>
</section>



<?php include("comman/footer.php"); ?>
</body>
</html>
