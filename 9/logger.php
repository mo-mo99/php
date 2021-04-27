<?php
abstract class logger
{
    public $str;
    public function __construct($str)
    {
        $this->str = $str;
    }
    abstract public function operation($name);

    public function printOut(){
        echo $this->str;
    }

}

class child1 extends logger
{

    public function operation($name) {
        $my_file = $this->str.".txt";
        $handle = fopen($my_file, 'w');
        fwrite($handle, $name);
        fclose($handle);
    }
}

class child2 extends logger{

    public function operation($arg){
        if ($arg === 'time'){
            $date = date('m/d/Y h:i:s a', time());
            echo $date."<br>";
            echo $this->str;
        }

        else{
            echo $this->str;
        }
    }
}
$c = new child1('new_file');
$c->operation('Hello world');

//$c1 = new child2('hello');
//$c1->operation('time');

