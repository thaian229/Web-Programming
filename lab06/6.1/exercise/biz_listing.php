<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Listing</title>
</head>

<body>
    <?php
        // print the registration form
        print "<h2>Business Listing</h2>";
        
        $host = 'localhost';
        $user = 'thaian229';
        $passwd = '22114455';
        $database = 'business_service';
        $table_name_write = 'Businesses';
        $table_name_read = 'Categories';

        $connect = new mysqli($host, $user, $passwd);
        $connect->select_db($database);
        
        $query_all = "
            SELECT Category_ID, Title FROM $table_name_read
        ";

        $rs = NULL;
        if ($rs = $connect->query($query_all)) {
            // print href list
            print "
                <table>
                    <tr>
                        <td>
                            <table border='1'>
                                <tr>
                                    <th> Click on category you want to show </th>
                                </tr>
            ";
            
            // print all href
            while ($row = $rs->fetch_row()) {
                print "
                                <tr>
                                    <td>
                                        <a href='./biz_listing.php?cat_id=$row[0]'> $row[1] </a>
                                    </td>
                                </tr>
                ";
            }

            print "
                            </table>
                        </td>
                        <td>
            ";
            
            // handle clicked on category, print table of that search
            if (isset($_GET['cat_id'])) {
                $cat_id = $_GET['cat_id'];

                $query_biz = "
                    SELECT * FROM `businesses` AS b 
                    WHERE EXISTS ( 
                        SELECT * FROM `biz_categories` AS c 
                        WHERE c.Business_ID = b.Business_ID AND c.Category_ID = '$cat_id' 
                    )
                ";

                print "
                            <table border='1'>
                ";

                if ($rs = $connect->query($query_biz)) {
                    while ($row = $rs->fetch_row()) {
                        print "<tr>";
                        foreach ($row as $field) {
                            print "
                                <td> $field </td>
                            ";
                        }
                        print "</tr>";
                    }
                }

                print "                                
                            </table>
                ";
            }

            print "
                        </td>
                    </tr>
                </table>
            ";
        } else {
            print "<br/> <h4> Cannot connect to database!!! </h4>";
        }
        $connect->close();
    ?>
</body>

</html>