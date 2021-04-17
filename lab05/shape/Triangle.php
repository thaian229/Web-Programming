<?php namespace shape;
require_once "Polygon.php";

class Triangle extends Polygon
{
    public $base;
    public $height;


    function getNumberOfSides()
    {
        return 3;
    }

    function getArea()
    {
        return (($this->base * $this->height) / 2);
    }
}