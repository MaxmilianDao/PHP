<?php
    $numbers = explode(",", filter_input(INPUT_GET, "number"));
    $json = [];

        switch(filter_input(INPUT_GET, "operation"))
        {
            case"add";
                foreach($numbers as $number) {
                    if (!is_numeric($number)) {
                        $json = ["REPORT" => "NaN"];
                        break;
                        }
                    else {
                        $json = ["REPORT" => "OK", "RESULT" => array_sum($numbers)];
                    }
                }

            case"sub";
                foreach($numbers as $number) {
                    if (!is_numeric($number)) {
                        $json = ["REPORT" => "NaN"];
                        break;
                        }
                    else {
                            $result = reset($numbers);
                            foreach (array_slice($numbers, 1) as $value) {
                            $result -= $value;
                            }
                        $json = ["REPORT" => "OK", "RESULT" => $result];
                }
            }
            case"mul";
                foreach($numbers as $number) {
                    if (!is_numeric($number)) {
                        $json = ["REPORT" => "NaN"];
                        break;
                        }
                else {
                        $result = reset($numbers);
                        foreach (array_slice($numbers, 1) as $value) {
                        $result *= $value;
                        }
                        $json = ["REPORT" => "OK", "RESULT" => $result];
            }
        }
            case"div";
            foreach($numbers as $number) {
                if (!is_numeric($number)) {
                    $json = ["REPORT" => "NaN"];
                    break;
                    }
            else {
                    $result = reset($numbers);
                    foreach (array_slice($numbers, 1) as $value) {
                    $result /= $value;
                    }
                    $json = ["REPORT" => "OK", "RESULT" => $result];
        }
    }

            case"pow";
            foreach($numbers as $number) {
                if (!is_numeric($number)) {
                    $json = ["REPORT" => "NaN"];
                    break;
                    }
            else {
                    $result = reset($numbers);
                    foreach (array_slice($numbers, 1) as $value) {
                    $result **= $value;
                    }
                    $json = ["REPORT" => "OK", "RESULT" => $result];
        }
    }

        }
            echo json_encode($json);
?>