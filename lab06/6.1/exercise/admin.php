<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Administration</title>
</head>

<body>
    <?php
        // print the table of all categories
        print "<h2>Category Administration</h2>";
        
        $host = 'localhost';
        $user = 'thaian229';
        $passwd = '22114455';
        $database = 'business_service';
        $connect = new mysqli($host, $user, $passwd);
        $table_name = 'Categories';
        $query_all = "SELECT * FROM $table_name";

        $connect->select_db($database);
        $result = NULL;
        if ($result = $connect->query($query_all)) {
            print "
                <table border='1'>
                    <tr>
                        <th> Cat_ID </th>
                        <th> Title </th>
                        <th> Description </th>
                    </tr>
            ";
            while ($row = $result->fetch_row()) {
                print "<tr>";
                foreach ($row as $field) {
                    print "<td> $field </td>";
                }
                print "</tr>";
            }
            print "
                <tr> 
                    <form action='./admin.php' method='POST'>
                        <td> <input type='text' size='20' maxlength='20' name='cat_id' required/> </td>
                        <td> <input type='text' size='50' maxlength='50' name='title' required/> </td>
                        <td> <input type='text' size='50' maxlength='50' name='description' required/> </td>
                        
                </tr>
            ";
            print "</table>";
            print "
                    <input type='submit' value='Add new category'/>
                </form>
            ";
        } else {
            print "<br/> <h4> Cannot connect to database!!! </h4>";
        }

        // handle submission
        if (isset($_POST['cat_id'])) {
            $cat_id = $_POST['cat_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];

            $query_insert = "
                INSERT INTO `$table_name` VALUES
                    ('$cat_id', '$title', '$description')
            ";
            $connect->query($query_insert);
            unset($_POST['cat_id']);
            // refesh webpage
            $connect->close();
            echo "<meta http-equiv='refresh' content='0'>";
        }
        $connect->close();
    ?>
</body>

</html>