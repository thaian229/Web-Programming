<html>
<head><title>Distance and Time Calculations</title></head>
<body>

<table border="1">
    <thead>
    <tr style="background: blueviolet; color: white" >
        <th>No.</th>
        <th>Destination</th>
        <th>Distance</th>
        <th>Driving time</th>
        <th>Walking time</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cities = array('Dallas' => 803, 'Toronto' => 435, 'Boston' => 848,
        'Nashville' => 406, 'Las Vegas' => 1526, 'San Francisco' => 1835,
        'Washington, DC' => 595, 'Miami' => 1189, 'Pittsburgh' => 409);
    $destination = $_GET['destination'];
    //print $destination;
    foreach ($destination as $id => $dest) {
        print '<tr>';
        print ("<td>" . ($id + 1) . "</td>");
        print "<td>$dest</td>";
        if (isset($cities[$dest])) {
            $distance = $cities[$dest];
            $time = round(($distance / 60), 2);
            $walktime = round(($distance / 5), 2);
            print "<td>$distance</td>";
            print "<td>$time</td>";
            print "<td>$walktime</td>";

        } else {
            print "<td>NULL</td>";
            print "<td>NULL</td>";
            print "<td>NULL</td>";
        }
        print '</tr>';

    }

    ?>

    </tbody>
</table>
</body>
</html>