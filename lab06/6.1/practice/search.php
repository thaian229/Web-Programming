<html>

<head>
    <title>Search Results</title>
</head>

<body>
    <?php

if (isset($_POST['key'])) {
    $host= 'localhost';
    $user = 'thaian229';
    $passwd = '22114455';
    $database = 'mydb';
    $Search = $_POST['key'];
    $connect = new mysqli($host, $user, $passwd);
    $table_name = 'Products';
    print '<font size="5" color="blue">';
    print "$table_name Data</font><br>";
    $query = "SELECT * FROM $table_name WHERE
            (Product_desc = '$Search')";
    print "The query is <i>$query</i> <br>";
    $connect->select_db($database);
    $results_id = $connect->query($query);
    if ($results_id) {
        print '<br><table border=1>';
        print '<th>Num<th>Product<th>Cost<th>Weight <th>Count';
        while ($row = $results_id->fetch_row()) {
            print '<tr>';
            foreach ($row as $field) {
            print "<td>$field</td> ";
            }
        print '</tr>';
        }
    } else {
        die ("query=$query Failed");
    }
    
    $connect->close();
}

    ?>
</body>

</html>