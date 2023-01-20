<?php
    $path = explode("/", $_SERVER['REQUEST_URI']);
    array_splice($path, 1, 1);

    if (!isset($path[1])) {
        $length = 8; 
    } else {
        $length = $path[1];
    }

    if (!isset($path[2])) {
        $special = false; 
    } else {
        $special = $path[2];
    }

    if (!isset($path[3])) {
        $case = false; 
    } else {
        $case = $path[3];
    }

    if (!isset($path[4])) {
        $numbers = false; 
    } else {
        $numbers = $path[4];
    }

    $password = "";
    $possible_chars = "abcdefghijklmnopqrstuvwxyz";

    if ($special == "true") {
        $possible_chars .= "!@#€$%^&*{}()_+-=[];':\"<>,.?/\\|`~";
    }

    if ($case == "true") {
        $possible_chars .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    }

    if ($numbers == "true") {
        $possible_chars .= "0123456789";
    }

    for ($i = 0; $i < $length; $i++) {
        $password .= $possible_chars[rand(0, strlen($possible_chars) - 1)];
    }

echo json_encode(["password" => $password]);
