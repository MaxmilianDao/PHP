<?php
    $path = explode("/", $_SERVER['REQUEST_URI']);
    array_splice($path, 1, 1);
    $length = $path[1];
    $special = $path[2];
    $case = $path[3];
    $numbers = $path[4];
    $password = "";
    $possible_chars = "abcdefghijklmnopqrstuvwxyz";

        if ($special == "true") {
            $possible_chars .= "!@#€$%^&*{}()_+-=[];':\"<>,.?/\\|`~";
        }

        if ($case == "true") {
            $possible_chars .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }

        if ($case == "true") {
            $possible_chars .= "0123456789";
        }

        for ($i = 0; $i < $length; $i++) {
            $password .= $possible_chars[rand(0, strlen($possible_chars) - 1)];
        }

echo json_encode(["password" => $password]);
