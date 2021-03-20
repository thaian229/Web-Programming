<html>

<head>
    <title>Our Shop</title>
</head>

<body>
    <?php
        $today = date('1, F d, Y');
        print "<h1>Welcome on $today to our huge blowout sale!</h1>";
        $month = date('m');
        $year = date('Y');
        $dayofyear = date('z');
        if ($month == 12 && $year == 2001) {
            $dayleft = (365 - $dayofyear + 10);
            print "<br/> There are $dayleft sale days left";
        } elseif ( $month == 01 && $year == 2002) {
            if ($dayofyear <= 10) {
                $dayleft = 10 - $dayofyear;
                print "<br/> There are $dayleft sale days left";
            } else {
                print "<br/>Sorry, our sale is over.";
            }
        } else {
            print "<br/>Sorry, our sale is over.";
        }
        print "<br/>Our sale ends Januarary 10, 2002";
    ?>
</body>

</html>