<?php namespace shape;
require_once "Shape.php";

class Circle extends Shape
{
    public $radius;

    public function getArea()
    {
        return (pi() * $this->radius * $this->radius);
    }
}

?>
