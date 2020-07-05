<?php
class CallerBingoNumber

{
    var $numbers;
    var $lower_value = 1;
    var $upper_value = 75;
    var $size;
    function __construct()
    {
        $numbers = array();
        for ($i = $this->lower_value; $i <  $this->upper_value + 1; $i++) {
            # code...
            $this->numbers[] = $i;
        }
        $this->size = $i - 1;
    }

    function _getRandomNumber()
    {
        return rand(1, $this->size - 1);
    }

    public function getSize(){
        return $this->size;
    }

    public function getNumber()
    {
        $index = $this->_getRandomNumber();
       // echo "Index " . $index; 
        while (!in_array($index, $this->numbers) && $index <= $this->upper_value ) {
            $index = $index + 1;
            //echo "-----" . $index;
        }
         
        $chosen = $this->numbers[$index - 1];
        if ($this->size > 0) {
            unset($this->numbers[$index - 1]);
            $this->size = $this->size - 1;
        } else {
            $chosen = "None";
        }

        return $chosen;
    }
}


$caller = new CallerBingoNumber();

for ($j = 0; $j < 75; $j++) {
    # code...
    echo "Quedan :" . $caller->size . "\n";
    echo $caller->getNumber() .  "\n"; 
}