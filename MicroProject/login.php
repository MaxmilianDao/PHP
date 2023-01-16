<?php
    require_once "db.php";

    function handeErr($err) {
        header("Location: index.php?err=".base64_encode($err));
    }

    $last_error = "ERR_UNKNOWN";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        $user = trim($_POST["user"]);
        if (empty($user))
            die("noob (username)");

        $pass = trim($_POST["pass"]);
        if (empty($pass))
            die("noob (pw)");

        $sql = "SELECT * FROM users WHERE user = ?";
        if ($res = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($res, "s", $user);

            if (mysqli_stmt_execute($res)) {
                mysqli_stmt_store_result($res);

                if (mysqli_stmt_num_rows($res) == 1) {
                    mysqli_stmt_bind_result($res, $id, $username, $password, $rank);
                    if (mysqli_stmt_fetch($res)) {
                        $hashed_password = hash("sha256", $pass);
                        if ($hashed_password == $password) {
                            $_SESSION= array(
                                "username" => $username,
                                "password" => $password,
                                "rank" => $rank
                        );
                            header("Location: profile.php");
                        } else
                            handeErr("User/password is incorrect");
                    } else
                        handeErr("Unable to fetch/bind data");
                } else
                    handeErr("User/password is incorrect");;
            } else
                handeErr("Unable to execute the SQL cmd");
        } else
            handeErr("Unable to prepare & sanitize the variables");
    } else
        handeErr("Do U hav stoopid?");
?>