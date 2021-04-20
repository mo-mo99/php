<?php

//$str = 'abcdabcanna';
//$pos = strrpos($str, 'a');
//echo $pos;


function send_ping($address)
{

    exec("ping ".$address, $arr);
    if (strpos($arr[0], 'Ping request could not find host') !== false){
        echo 'something went wrong try again!!';
    }else{
        $current_ip = substr($arr[7], 19);
        $len = strpos($arr[8], '%') - strpos($arr[8], '(') - 1;
        $success = 100 - (substr($arr[8],strpos($arr[8], '(') + 1 , $len ));

        echo "the ip address is ". $current_ip;
        echo "<br>";
        echo "successful was : ".$success. "%";

    }


}

function send_traceroute($address){
    exec("tracert ".$address, $arr);
    $res = [];
    foreach ($arr as $val){
        if(strpos($val, 'ms') !== false){
            $pos =  strrpos($val, 'ms');
            array_push($res, substr($val, $pos + 2)."<br>");
        }
    }
    if (count($res) === 0){
        echo 'something went wrong';
    }else {
        echo 'the ip address is : ' . $res[count($res) - 1];
        echo implode(" ", $res);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['submit'])) {
        $str = $_POST['address'];
        if (empty($_POST['req'])){
            echo 'select Ping or Tracert';
        }
        else{
            $request = $_POST['req'];
            if ($request === 'ping'){
                send_ping($str);
            }else{
                send_traceroute($str);
            }
        }
    }
}
else{
    header("location:index.html");
}
