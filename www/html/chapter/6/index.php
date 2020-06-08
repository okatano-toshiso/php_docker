<?php
class Entree {
    public $name;
    public $ingredients = array();

    public function hasIngredient($ingredient) {
        return in_array($ingredient,$this->ingredients);
    }
}

$soup = new Entree;
$soup->name = 'Chicken Soup';
$soup->ingredients = array('chicken','water');

$sandwich = new Entree;
$sandwich->name = 'Chicken Sandwich';
$sandwich->ingredients = array('chicken','bread');

foreach(['chicken','lemon','bread','water'] as $ing) {
    if($soup->hasIngredient($ing)){
        print "Soup contains $ing.\n<br />";
    }
    if($sandwich->hasIngredient($ing)){
        print "Sandwich contains $ing.\n<br />";
    }
}

class Entree2 {
    public $name;
    public $ingredients = array();

    public function hasIngredient($ingredient) {
        return in_array($ingredient,$this->ingredients);
    }
    public function getSizes(){
        return array('small','medium','large');
    }
}

$sizes = Entree2::getSizes();

echo "<pre>";
echo var_dump($sizes);
echo "</pre>";

class Entree3 {
    public $name;
    public $ingredients = array();

    public function __construct($name,$ingredients) {
        $this->name = $name;
        $this->ingredients = $ingredients;
    }
    public function hasIngredient($ingredient) {
        return in_array($ingredient,$this->ingredients);
    }
}

$soup     = new Entree3('Chicken Soup',array('chicken','water'));
$sandwich = new Entree3('Chicken Sandwich',array('chicken','bread'));

echo "<pre>";
echo var_dump($soup);
echo "</pre>";

echo "<pre>";
echo var_dump($sandwich);
echo "</pre>";

class Entree4 {
    public $name;
    public $ingredients = array();

    public function __construct($name,$ingredients) {
        if(! is_array($ingredients)){
            throw new Exception('$ingredients must be an array');
        }
        $this->name = $name;
        $this->ingredients = $ingredients;
    }
    public function hasIngredient($ingredient) {
        return in_array($ingredient,$this->ingredients);
    }
}

try {
    $drink = new Entree4('Glass of Milk','milk');
    if($drink->hasIngredient('milk')){
        print "Yummy!";
    }
} catch (Exception $e) {
    print "Couldn't create the drink: ".$e->getMessage();
}

echo "<br />";

class ComboMeal extends Entree4 {

    public function __construct($name,$entrees) {
        parent::__construct($name,$entrees);
        foreach($entrees as $entree) {
            if(! $entree instanceof Entree4) {
                throw new Exception('Elements of $entrees must be Entree4 objects');
            }
        }
    }

    public function hasIngredient($ingredient){
        foreach($this->ingredients as $entree) {
            if($entree->hasIngredient($ingredient)){
                return true;
            }
        }
        return false;
    }
}

$soup     = new Entree4('Chicken Soup',array('chicken','water'));
$sandwich = new Entree4('Chicken Sandwich',array('chicken','bread'));
$combo    = new ComboMeal('Soup + Sandwich',array($soup,$sandwich));

foreach (['chicken','water','pickles'] as $ing) {
    if($combo->hasIngredient($ing)){
        print "Something in the combo contrains $ing.\n<br />";
    }
}

echo "<br />";

class Entree5 {
    public $name;
    public $ingredients = array();

    public function getName() {
        return $this->name;
    }

    public function __construct($name,$ingredients) {
        if(! is_array($ingredients)){
            throw new Exception('$ingredients must be an array');
        }
        $this->name = $name;
        $this->ingredients = $ingredients;
    }
    public function hasIngredient($ingredient) {
        return in_array($ingredient,$this->ingredients);
    }
}

