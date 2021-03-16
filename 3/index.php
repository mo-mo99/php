<?php


function my_sort($c, $d): int
{
    if ($c[1] == $d[1]) return 0;
    return ($c[1]<$d[1])?-1:1;
}

function shuffler($str): array
{
    $a = explode("\n", $str);
    $arr2 = [];
    for($i = 0; $i < count($a); $i++){
        $a[$i] = explode(" ", $a[$i]);
        array_push($arr2, $a[$i]);
        shuffle($a[$i]);
        array_push($arr2, $a[$i]);
    }
    return $arr2;

}
if (isset($_POST['submit_btn'])){
    $myStr = $_POST['text'];
    $b = shuffler($myStr);


    uasort($b, "my_sort");

    foreach ($b as $value){
        echo implode(" ", $value)."<br>";
    }
}
