<html>

<head>
    <title>Square and Cube</title>
</head>

<body>
    <p>Generate Square and Cube values</p>
    <br />
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <?php
            if (array_key_exists("start", $_GET)) {
                $start = $_GET["start"];
                $end = $_GET["end"];
            } else {
                $start = 0;
                $end = 0;
            }
        ?>
        <table>
            <tr>
                <td>Select start number: </td>
                <td>
                    <select name="start">
                        <?php
                            for ($i = 0; $i <= 10; $i++) {
                                if ($start == $i) {
                                    print("<option selected>$i</option>");
                                } else {
                                    print("<option>$i</option>");
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Select end number: </td>
                <td>
                    <select name="end">
                        <?php
                            for ($i = 0; $i <= 20; $i++) {
                                if ($end == $i) {
                                    print("<option selected>$i</option>");
                                } else {
                                    print("<option>$i</option>");
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"> <input type="SUBMIT" value="Submit"></td>
                <td align="left"> <input type="RESET" value="Reset"></td>
            </tr>
        </table>

        <table>
            <tr>
                <th>Number</th>
                <th>Square</th>
                <th>Cube</th>
            </tr>
            <?php
                if (array_key_exists("start", $_GET)) {
                    // $start = $_GET["start"];
                    // $end = $_GET["end"];
                    $i = $start;
                    while ($i <= $end) {
                        $sqr = $i * $i;
                        $cubed = $i * $i * $i;
                        print("<tr><td>$i</td><td>$sqr</td><td>$cubed</td></tr>");
                        $i++;
                    }
                }
            ?>
        </table>
    </form>
</body>

</html>