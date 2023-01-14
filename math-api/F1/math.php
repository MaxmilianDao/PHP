@ -1,20 +1,25 @@
<?php

    //explode the numbers string into an array
    $numbers = explode(",", filter_input(INPUT_GET, "number"));
    $json = [];

    //switch to determine the operation
    switch(filter_input(INPUT_GET, "operation")) {
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
@ -29,8 +34,8 @@
                    $json = ["REPORT" => "OK", "RESULT" => $result];
                }
            }

            break;

        case"mul":
            foreach ($numbers as $number) {
                if (!is_numeric($number)) {
@ -45,8 +50,8 @@
                    $json = ["REPORT" => "OK", "RESULT" => $result];
                }
            }

            break;

        case"div":
            foreach ($numbers as $number) {
                if (!is_numeric($number)) {
@ -61,9 +66,8 @@
                    $json = ["REPORT" => "OK", "RESULT" => $result];
                }
            }


            break;

        case"pow":
            foreach ($numbers as $number) {
                if (!is_numeric($number)) {
@ -78,4 +82,5 @@
                }
            }
    }
    //converts the array into a json string and echoes it as the response
    echo json_encode($json);
