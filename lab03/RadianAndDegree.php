<html>

<head>
    <title>Radians and Degrees Converter</title>
</head>

<body>
    <h1>Radian and Degree Converter</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
        <input type="radio" name="choice" value="0" />
        <label>Radians to Degrees</label>
        <input type="radio" name="choice" value="1" />
        <label>Degrees to Radians</label>
        <br />
        <input type="text" name="number" required />
        <input type="submit" value="Submit">
        <input type="submit" value="Reset">
        <?php
            function toDeg($rad) {
                $_deg=$rad*180/M_PI;
                return $_deg;
            }
            function toRad($deg){
                $_rad=$deg*M_PI/180;
                return $_rad;
            }
            if (isset($_GET["choice"])) {
                $choice = $_GET["choice"];
                $number = $_GET["number"];
                if (is_numeric($number)) {
                    echo "<br/><br/>";
                    switch($choice) {
                        case 0:
                            $rs = toDeg($number);
                            print ("$number <i>rad</i> ≈ " .number_format($rs,4)."°");
                            break;
                        case 1:
                            $rs = toRad($number);
                            print ("$number<i>°</i> ≈ " .number_format($rs,4). " <i>rad</i>");
                            break;
                        default:
                            break;
                    }
                }
            }
        ?>
    </form>
</body>

</html>