<?php
$file = parse_ini_file("index.ini", $useSections = true, $mode = INI_SCANNER_NORMAL);


if (isset($_POST['submit_btn'])){
    $str = $_POST['text'];
    $texts = explode("\n", $str);
    ini_changer($texts);


}

function ini_changer($text){
    $file = parse_ini_file("index.ini", $useSections = true, $mode = INI_SCANNER_NORMAL);
    foreach ($text as $val){
        $my_text = explode(" ", $val);
        $i = 0;
        foreach ($file as $value) {
            if (array_key_exists('symbol', $value)) {
                $i++;
                if ($my_text[0] == $value['symbol']){
                    switch ($i){
                        case 1:
                            if ($value['upper']){
                                echo strtoupper(implode(" ", $text));
                            }
                            else echo strtolower(implode(" ", $text));
                            break;
                        case 2:
                            if ($value['direction'] == "+"){
                                $result = [];
                                $txt = preg_split('//', implode(" ", $text), -1);
                                foreach ($txt as $t){
                                    if ($t == '9'){
                                        array_push($result, '0');

                                    }else {
                                        if (is_numeric($t)) {
                                            $m = intval($t) + 1;
                                            array_push($result, $m);
                                        }
                                        else{
                                            array_push($result, $t);
                                        }
                                    }
                                }echo implode("", $result);

                            }elseif ($value['direction'] == "-") {
                                $result = [];
                                $txt = preg_split('//', implode(" ", $text), -1);
                                foreach ($txt as $t) {
                                    if ($t == '0') {
                                        array_push($result, '9');

                                    } else {
                                        if (is_numeric($t)) {
                                            $m = intval($t) - 1;
                                            array_push($result, $m);
                                        } else {
                                            array_push($result, $t);
                                        }
                                    }
                                }
                                echo implode("", $result);
                            }
                            break;

                        case 3:
                            $k = $value['delete'];
                            $l = str_replace($k, "", implode("", $text));
                            echo $l;
                            break;
                    }
                }
            }
        }
    }

}

