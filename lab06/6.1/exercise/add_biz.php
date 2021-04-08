<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Registration</title>
</head>

<body>
    <?php
        // print the registration form
        print "<h2>Business Registration</h2>";
        
        $host = 'localhost';
        $user = 'thaian229';
        $passwd = '22114455';
        $database = 'business_service';
        $table_name_write = 'Businesses';
        $table_name_read = 'Categories';

        $connect = new mysqli($host, $user, $passwd);
        $connect->select_db($database);
        
        $query_all = "
            SELECT * FROM $table_name_read
        ";

        $rs = NULL;
        if ($rs = $connect->query($query_all)) {
            print "
                <form action='./add_biz.php' method='POST'>
                    <table>
                        <tr>
                            <td>
                                <tr>
                                    <p> Click on one, or ctrl-click on multiple categories: </p>
                                </tr>
                                <tr>
                                    <select name='cat[]' size='5' multiple required>
            ";

            while ($row = $rs->fetch_row()) {
                print "
                                        <option> $row[1] </option>
                ";
            }

            print "
                                    </select>
                                </tr>
                            </td>
                            <td>
                                <tr>
                                    <td> Business Name: </td>
                                    <td> <input type='text' size='50' maxlength='100' name='biz_name' required/> </td>
                                </tr>
                                <tr>
                                    <td> Address: </td>
                                    <td> <input type='text' size='50' maxlength='100' name='biz_address' required/> </td>
                                </tr>
                                <tr>
                                    <td> City: </td>
                                    <td> <input type='text' size='50' maxlength='50' name='biz_city' required/> </td>
                                </tr>
                                <tr>
                                    <td> Telephone: </td>
                                    <td> <input type='text' size='50' maxlength='20' name='biz_telephone' required/> </td>
                                </tr>
                                <tr>
                                    <td> URL: </td>
                                    <td> <input type='text' size='50' maxlength='100' name='biz_url' required/> </td>
                                </tr>
                            </td>
                        </tr>
                    </table>
                    <input type='submit' name='submit' value='Registry New Business'/>
                </form>
            ";
        } else {
            print "<br/> <h4> Cannot connect to database!!! </h4>";
        }

        // print form

        // handle submission
        if (isset($_POST['submit'])) {

            $cat = $_POST['cat'];
            $biz_id = NULL;
            $biz_name = $_POST['biz_name'];
            $biz_address = $_POST['biz_address'];
            $biz_city = $_POST['biz_city'];
            $biz_telephone = $_POST['biz_telephone'];
            $biz_url = $_POST['biz_url'];
            
            $query_insert = "
                INSERT INTO $table_name_write VALUES
                    ('0', '$biz_name', '$biz_address', '$biz_city', '$biz_telephone', '$biz_url')
            ";

            if ($connect->query($query_insert)) {   // insert and take back id
                $biz_id = $connect->insert_id;
            }

            foreach ($cat as $c) {  // add all biz_cat
                // get cat_id from cat_title
                $cat_id = NULL;
                $q = "
                    SELECT Category_ID FROM $table_name_read
                    WHERE (Title = '$c')
                ";
                if ($r = $connect->query($q)) {
                    $cat_id = $r->fetch_row()[0];
                }
                // insert into biz_cat
                if ($cat_id) {
                    $querry_insert_2 = "
                        INSERT INTO `Biz_Categories` VALUES
                        ('$biz_id', '$cat_id')
                    ";
                    $connect->query($querry_insert_2);
                }
            }

            // notify status then refesh webpage
            print "
                <script> alert(\"Added Successfully! Confirm To Continue.\"); </script>
            ";
            unset($_POST['submit']);
            $connect->close();
            echo "<meta http-equiv='refresh' content='0'>";
        }
        $connect->close();
    ?>
</body>

</html>