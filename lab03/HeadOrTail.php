<html>

<head>
    <title> Coin Flip! </title>
</head>

<body>
    <h1>Please pick head or tail</h1>
    <form action="GotFlip.php" method="POST">
        <?php
            print "<INPUT TYPE=\"radio\" NAME=\"pick\" value=0 > Head";
            print "<INPUT TYPE=\"radio\" NAME=\"pick\" value=1 > Tail";
            print "<br/>";
        ?>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>

</html>