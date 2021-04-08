<html>

<head>
    <title>Product Update Results</title>
</head>

<body>
    <?php

$host= 'localhost';
$user = 'thaian229';
$passwd = '22114455';
$database = 'mydb';

function Show_all($connect, $table_name){
    $query = "SELECT * from $table_name";
    $results_id = $connect->query($query);
    print '<table border=1><th> Num </th>
        <th>Product</th><th>Cost</th>
        <th>Weight</th><th>Count</th>';
    if ($results_id) {
        while ($row = $results_id->fetch_row()) {
            print '<tr>';
            foreach ($row as $field){
                print "<td>$field</td> ";
            }
            print '</tr>';
        }
    }
}

if (isset($_POST['Product'])) {
    $Product = $_POST['Product'];
    $connect = new mysqli($host, $user, $passwd);
    $table_name = 'Products';
    print '<font size="5" color="blue">';
    print "Update Results for Table $table_name</font><br>\n";
    $query = "UPDATE $table_name 
            SET Numb = Numb-1 
            WHERE (Product_desc = '$Product')";
    print "The query is <i> $query </i> <br><br>\n";
    $connect->select_db($database);
    $results_id = $connect->query($query);
    if ($results_id){
        Show_all($connect, $table_name);
    } else {
        print "Update=$query failed";
    }
    $connect->close();
    unset($_POST['Product']);
} else {
    print "
    <form action=\"./sale.php\" method=\"POST\">
    Hammer: <input type=\"radio\" name=\"Product\"
    value=\"Hammer\"/>
    Screwdriver: <input type=\"radio\"
    name=\"Product\" value=\"Screwdriver\"/>
    Wrench: <input type=\"radio\" name=\"Product\"
    value=\"Wrench\"/><br/>
    <input type=\"submit\" value=\"submit\"/>
    <input type=\"reset\" value=\"reset\"/>
    </form>
    ";
    $connect = new mysqli($host, $user, $passwd);
    $connect->select_db($database);
    $table_name = 'Products';
    Show_all($connect, $table_name);
}

    ?>
</body>

</html>