<?php

function has_capital($str){
    return preg_match('/[A-Z]/', $str);
}

function has_small($str){
    return preg_match('/[a-z]/', $str);
}

function has_num($str){
    return preg_match('/\d/', $str);
}

function has_symbol($str){
    return preg_match('/[^a-zA-Z\d]/', $str);
}
if (isset($_POST['submit_btn'])){
    $pass = $_POST['pass'];
    $result = has_symbol($pass) + has_num($pass) + has_capital($pass) + has_small($pass);
    echo ($result > 2)? 'more than 2 type' : (($result < 2) ? 'less than 2 type' : 'valid pass');
}

