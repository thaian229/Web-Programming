<?php namespace shape;
require_once "Polygon.php";

class Rectangle extends Polygon
{
    public $width;
    public $height;

    function getNumberOfSides()
    {
        return 4;
    }

    function getArea()
    {
        return ($this->width * $this->height);
    }
}

?>
