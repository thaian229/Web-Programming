<html>
<head>
    <title>Tuna Cafe</title>
</head>
<body>
<h2>Tuna Cafe Results Received</h2>
<?php
$menu = array('Tuna Casserole', 'Tuna Sandwich', 'Tuna Pie', 'Grilled Tuna', 'Tuna Suprise');

$prefer = $_GET['prefer'];
if (count($prefer) == 0) {
    print 'Ohh no! Please pick something as your favourite! ';
} else {
    print '<br>Your selection were <ul>';
    foreach ($prefer as $item) {
        print "<li>$menu[$item]</li>";
    }
    print '</ul>';
}

?>
</body>
</html>