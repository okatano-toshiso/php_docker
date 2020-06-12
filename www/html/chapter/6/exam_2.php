<?php

class Ingredient {
    protected $name;
    protected $cost;
    public function __construct($name, $cost) {
    $this->name = $name;
    $this->cost = $cost;
    }
    public function getName() {
        return $this->name;
    }
    public function getCost() {
        return $this->cost;
    }
    // このメソッドは費用を新しい値に設定する
    public function setCost($cost) {
    $this->cost = $cost;
    }
}
