<?php



function ini_changer(){
    $file = parse_ini_file("index.ini", $useSections = true, $mode = INI_SCANNER_NORMAL);
    $input_file =$file['main']['filename'];
    $new_file = fopen($input_file, "r");
    $reader = fread($new_file, filesize("mainFile.txt"));
    $lines = explode("\n", $reader);
    fclose($new_file);
    foreach ($lines as $val){
        $my_text = explode(" ", $val);
        $i = 0;
        foreach ($file as $value) {
            if (array_key_exists('symbol', $value)) {
                $i++;
                if ($my_text[0] == $value['symbol']){
                    switch ($i){
                        case 1:
                            if ($value['upper']){
                                echo strtoupper(implode(" ", $my_text))."<br>";
                            }
                            else echo strtolower(implode(" ", $my_text))."<br>";
                            break;
                        case 2:
                            if ($value['direction'] == "+"){
                                $result = [];
                                $txt = preg_split('//', implode(" ", $my_text), -1);
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
                                }echo implode("", $result)."<br>";

                            }elseif ($value['direction'] == "-") {
                                $result = [];
                                $txt = preg_split('//', implode(" ", $my_text), -1);
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
                                echo implode("", $result)."<br>";
                            }
                            break;

                        case 3:
                            $k = $value['delete'];
                            $l = str_replace($k, "", implode("", $my_text));
                            echo $l."<br>";
                            break;
                    }
                }
            }
        }
    }

}

ini_changer();