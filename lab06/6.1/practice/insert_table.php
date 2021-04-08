<html>

<head>
    <title>Insert Results</title>
</head>

<body>
    <?php

$host = 'localhost';
$user = 'thaian229';
$passwd = '22114455';
$database = 'mydb';
$connect = new mysqli($host, $user, $passwd);
$table_name = 'Products';
if (isset($_POST['Item'])) {

    $Item = $_POST['Item'];
    $Cost = $_POST['Cost'];
    $Weight = $_POST['Weight'];
    $Quantity = $_POST['Quantity'];
    $query = "INSERT INTO $table_name VALUES
        ('0','$Item','$Cost','$Weight','$Quantity')";
    
    print "The Query is <i>$query</i><br>";
    $connect->select_db($database);
    print '<br><font size="4" color="blue">';
    if ($connect->query($query)){
        print "Insert into $database was successful!</font>";
    } else {
        print "Insert into $database failed!</font>";
    } 
    
    $connect->Close();
}

 ?>
</body>

</html>