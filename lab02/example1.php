<html>
    <head> <title>Variable Example </title> </head>
    <body>
        <?php
            $first_num = 12;
            $second_num = 356;
            // swap
            $tmp = $first_num;
            $first_num = $second_num;
            $second_num = $tmp;
            // modulo
            $mod = $first_num % $second_num;
            print ("first num = $first_num <br>
                    second num = $second_num <br>
                    mod = $mod");
            // concat of string is ".", not "+"
        ?>
    </body>
</html>