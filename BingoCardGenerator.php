<?php

class BingoCardGenerator
{
    var $columns = 5;
    var $size = 75;
    function __construct()
    {
    }

    function __generatecol($lower, $upper)
    {
        $col = array();

        while (count($col) <= 5) {
            $random = rand($lower, $upper);
            if (!in_array($random, $col)) {
                $col[] = $random;
            }
        }
        return $col;
    }

    public  function generateCard()
    {
        $step = $this->size / $this->columns;
        $l = 1;
        $matriz = array();
        for ($i = 0; $i < $this->columns; $i++) {
            $col = $this->__generatecol($l, $l + $step - 1);
            $l = $l + $step;
            $matriz[] = $col;
        }
        return $matriz;
    }
}

$cardGenerator = new BingoCardGenerator();
echo json_encode($cardGenerator->generateCard());