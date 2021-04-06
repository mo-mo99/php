<?php

$capital = '/[A-Z]{4}/';
$small = '/[a-z]{4}/';
$number = '/\d{4}/';
$symbol = '/[(%|$|#|_|*)]{4}/';

if (isset($_POST['submit_btn'])){
    $str = $_POST['pass'];

    preg_match_all("/\d/",$str, $num_array );
    preg_match_all("/[A-Z]/",$str, $capital_array );
    preg_match_all("/[a-z]/",$str, $small_array );
    preg_match_all("/[(%|$|#|_|*)]/",$str, $symbol_array );

    if (strlen($str) < 10) echo 'password should have more than 10<br>';
    if (check($number, $str)) echo 'there is more than 3 numbers<br>';
    elseif (elements($num_array[0])) echo 'there is less than 2 numbers<br>';

    if (check($capital, $str)) echo 'there is more than 3 capital letter<br>';
    elseif (elements($capital_array[0])) echo 'there is less than 2 capital letter<br>';

    if (check($small, $str)) echo 'there is more than 3 small letter<br>';
    elseif (elements($small_array[0])) echo 'there is less than 2 small letter<br>';

    if (check($symbol, $str)) echo 'there is more than 3 symbol<br>';
    elseif (elements($symbol_array[0])) echo 'there is less than 2 symbol<br>';
    print_r($symbol_array[0]);

}

function check($pattern, $array){
    if (preg_match($pattern, $array)){
        return true;
    }return false;
}

function elements($array){
    if(count($array) < 2)return true;
    else false;
}

