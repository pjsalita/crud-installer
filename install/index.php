<?php
    require('../app/install.php');

    if((new Install)->run())
        die("Sorry, configuration file is already found. <a href='../'>Go back</a>");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP_PATRICK - CRUD Installer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <h1>Database Configuration</h1>

                <?php if(isset($_SESSION['errors'])) : ?>
                <div class="alert alert-primary" role="alert">
                    <?=$_SESSION['errors']?>
                </div>
                <?php endif; ?>

                <form action="" method="post">
                    <div>
                        <label for="dbhost">Database Host: </label>
                        <input type="text" class="form-control" name="dbhost" id="dbhost" value="localhost" required />
                    </div>
                    <div>
                        <label for="dbuser">Database Username: </label>
                        <input type="text" class="form-control" name="dbuser" id="dbuser" value="root" required />
                    </div>
                    <div>
                        <label for="dbpass">Database Password: </label>
                        <input type="text" class="form-control" name="dbpass" id="dbpass" value="" />
                    </div>
                    <div>
                        <label for="dbname">Database Name: </label>
                        <input type="text" class="form-control" name="dbname" id="dbname" value="php_training" required />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-3">Install</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>