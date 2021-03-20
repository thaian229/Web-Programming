<html>

<head>
    <title> Quote </title>
</head>

<body>
    <h1> Your Costs </h1>
    <?php
        function carpet_cost ( $w, $l, $g, &$cost ) {
            if ($w > 0 && $l > 0) {
                if ($g == 1) {
                    $cost = $w * $l * 4.99;
                    return 1;
                } elseif ($g == 2) {
                    $cost = $w * $l * 3.99;
                    return 1;
                } else {
                    print "Unknown carpet grade = $g";
                    return 0;
                }
            } else {
                return 0;
            }
        }
        $w = $_POST["width"];
        $l = $_POST["length"];
        $g = $_POST["grade"];
        $cost = 0;
        $ret = carpet_cost($w, $l, $g, $cost);
        echo "<p>";
        if ($ret) {
            $size = $w * $l;
            $t_cost = $cost + ($cost * .5);
            print "Total square meter = $size";
            echo "<br/>";
            print "Carpet grade = $g";
            echo "<br/>";
            print "Carpet cost = \$$cost";
            echo "<br/>";
            print "Total cost estimated (installed) = \$$t_cost";
        } else {
            print "Illegal value.";
        }
        echo "</p>";
    ?>
</body>

</html>