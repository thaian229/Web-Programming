<html>

<head>
    <title>Table Output</title>
</head>

<body>
    <?php

$host= 'localhost';
$user = 'thaian229';
$passwd = '22114455';
$database = 'mydb';
$connect = new mysqli($host, $user, $passwd);
$table_name = 'Products';
print '<font size="5" color="blue">';
print "$table_name Data</font><br>";
$query = "SELECT * FROM $table_name";
print "The query is <i>$query </i><br>";
$connect->select_db($database);
$results = $connect->query($query);
if ($results) {
    print '<table border=1>';
    print '<th>Num<th>Product<th>Cost<th>Weight<th>Count';
    while ($row = $results->fetch_row()) {
        print '<tr>';
        foreach ($row as $field) {
            print "<td>$field</td> ";
        }
        print '</tr>';
    }
} else { 
    die ("Query=$query failed!"); 
}
$connect->close();

?>
    </table>
</body>

</html>