<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>err</title>
    </head>
    <body>
        <h1>bruh u so poopy get ERR0RED</h1>
        <p>ERROR_MESSAGE=
            <?php
                $err = "Unknown system error";
                if (!empty($_GET["err"]))
                    $err = base64_decode($_GET["err"]);
                echo $err;
            ?>
        </p>
    </body>
</html>