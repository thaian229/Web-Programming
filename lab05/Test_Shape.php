<?php

spl_autoload_register(function ($class) {
    require_once $class . '.php';
});

//function __autoload($className)
//{
//    if (file_exists($className . ".php"))
//    {
//        require_once $className . ".php";
//        return true;
//    }
//    return false;
//}

$myCollection = array();

// make a rectangle
$r = new shape\Rectangle;
$r->width = 5;
$r->height = 7;
$myCollection[] = $r;
unset($r);

// make a triangle
$t = new shape\Triangle;
$t->base = 4;
$t->height = 5;
$myCollection[] = $t;
unset($t);

// make a circle
$c = new shape\Circle;
$c->radius = 3;
$myCollection[] = $c;
unset($c);

// make a color
$color = new color\Color;
$color->name = "blue";
$myCollection[] = $color;
unset($color);

foreach ($myCollection as $s) {
    if ($s instanceof shape\Shape) {
        print ("Area: " . $s->getArea() . "<br/>");
    }

    if ($s instanceof shape\Polygon) {
        print ("Sides: " . $s->getNumberOfSides() . "<br/>");
    }

    if ($s instanceof color\Color) {
        print ("Color: " . $s->name . "<br/>");
    }

    print ("<br/>");
}

?>