
<?php

function generator($str){
        for ($i = 0; $i < strlen($str); $i++){
            yield $str[$i];
        }
    }

function myFunction($str): string
{
    $result = "";
    $counter = 0;
    foreach (generator($str) as $value){
        switch ($value){
            case 'h' :
                $value = '4';
                $counter++;
                break;
            case 'l':
                $value = '1';
                $counter++;
                break;
            case 'e':
                $value = '3';
                $counter++;
                break;
            case 'o':
                $value = '0';
                $counter++;
                break;
        }
        $result = $result.$value;
    }
    $result = $result."<br>".$counter." Times change</br>";
    return $result;
}

if (isset($_POST['submit_btn'])) {
    $myString = $_POST['text'];
    echo myFunction($myString);

}

