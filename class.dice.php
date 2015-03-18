<?php

class Dice {

    protected $sides;

    public function __construct($sides = 6) {
        $this->sides = $sides;
    }

    public function rollD($times = 1) {
        $rolls = array();
        for ($variabel = 0; $variabel < $times; $variabel++) {
            $temp = rand(1, $this->sides);
            $rolls["dice"][] = $temp;
        }
        $rolls["summa"] = array_sum($rolls["dice"]);
        $rolls["sides"] = $this->sides;
        $rolls["times"] = $times;

        return $rolls;
    }

}
