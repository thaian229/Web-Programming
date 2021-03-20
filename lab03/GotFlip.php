<html>

<head>
    <title> Coin Flip Result </title>
</head>

<body>
    <?php
        srand((double) microtime() * 100000000);
        $flip = rand (0, 1);
        $pick = $_POST["pick"];

        if ($flip == 0 && $pick == 0) {
            print "The flip = $flip, which is head!<br/>";
            print "<h2>You got it right!</h2>";
        } elseif ($flip == 0 && $pick == 1) {
            print "The flip = $flip, which is head!<br/>";
            print "<h2>You got it wrong!</h2>";
        } elseif ($flip == 1 && $pick == 1) {
            print "The flip = $flip, which is tail!<br/>";
            print "<h2>You got it right!</h2>";
        } elseif ($flip == 1 && $pick == 0) {
            print "The flip = $flip, which is tail!<br/>";
            print "<h2>You got it wrong!</h2>";
        } else {
            print "<br/>Illegal state error!";
        }
    ?>
</body>

</html>