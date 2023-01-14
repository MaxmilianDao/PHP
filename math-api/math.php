<?php
    //only one switch case is commented, as there is no need to comment them individually, only the operation changes
    //get the operation and numbers from the URL path
    $path = explode("/", $_SERVER['REQUEST_URI']);
    $operation = $path[2];
    $numbers = array_slice($path, 3);
    $json = [];
    //switch to determine the operation
    switch($operation) {
        case"add":
            //loop through numbers to check if they are numeric
            foreach ($numbers as $number) {
                if (!is_numeric($number)) {
                    //if any number is non-numeric, return "NaN"
                    $json = ["REPORT" => "NaN"];
                    break;
                } else {
                    //if all numbers are numeric, perform the operation and return "OK" with the result
                    $json = ["REPORT" => "OK", "RESULT" => array_sum($numbers)];
                }
            }
            break;
        case"sub":
            foreach ($numbers as $number) {
                if (!is_numeric($number)) {
                    $json = ["REPORT" => "NaN"];
                    break;
                } else {
                    $result = reset($numbers);
                    foreach (array_slice($numbers, 1) as $value) {
                        $result -= $value;
                        break;
                    }
                    $json = ["REPORT" => "OK", "RESULT" => $result];
                }
            }
            break;
        case"mul":
            foreach ($numbers as $number) {
                if (!is_numeric($number)) {
                    $json = ["REPORT" => "NaN"];
                    break;
                } else {
                    $result = reset($numbers);
                    foreach (array_slice($numbers, 1) as $value) {
                        $result *= $value;
                        break;
                    }
                    $json = ["REPORT" => "OK", "RESULT" => $result];
                }
            }
            break;
        case"div":
            foreach ($numbers as $number) {
                if (!is_numeric($number)) {
                    $json = ["REPORT" => "NaN"];
                    break;
                } else {
                    $result = reset($numbers);
                    foreach (array_slice($numbers, 1) as $value) {
                        $result /= $value;
                        break;
                    }
                    $json = ["REPORT" => "OK", "RESULT" => $result];
                }
            }
            break;
        case"pow":
            foreach ($numbers as $number) {
                if (!is_numeric($number)) {
                    $json = ["REPORT" => "NaN"];
                    break;
                } else {
                    $result = reset($numbers);
                    foreach (array_slice($numbers, 1) as $value) {
                        $result **= $value;
                    }
                    $json = ["REPORT" => "OK", "RESULT" => $result];
                }
            }
    }
    //converts the array into a json string and echoes it as the response
    echo json_encode($json);
