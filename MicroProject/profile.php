<!DOCTYPE html>
<html>
    <head>
        <body>
        <link rel="stylesheet" type="text/css" href="profile.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <div class="pepa">
                <div class="pindikk">
                    <h1>Welcome</h1>
                    <p>You have succesfully logged in as</p>

                    <p><strong> <?php session_start();echo $_SESSION["username"];?> </strong></p>

                    <p>Your rank is</p>

                    <p><strong> <?php echo $_SESSION["rank"];?> </strong></p>

                    <p>Your hashed password</p>

                    <p class="pepovoheslo"><strong> <?php echo $_SESSION["password"];?> </strong></p>
                </div>
            </div>
        </body>
    </head>
</html>