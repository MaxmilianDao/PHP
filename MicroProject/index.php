<?php
session_start()?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="index.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Form</title>
    </head>
    <body>
      <div class="pindik">
        <form method="post" action="login.php">
            <div class="container">
                <h1 class="pepa">Log in</h1>
                <input type="text" placeholder="Enter Username" name="user" required>
                <input type="password" placeholder="Enter Password" name="pass" required>
                <button type="submit">Login</button>
                <br \>
                <br \>
                <p>
                  <?php
                      $err="";
                      if (!empty($_GET["err"]))
                          $err = base64_decode($_GET["err"]);
                      echo $err;
                  ?>
              </p>
            </div>
        </form>
      </div>
    </body>
</html>
