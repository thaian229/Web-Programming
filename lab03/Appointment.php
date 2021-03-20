<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <h1>You have an appointment!!!</h1>
    <title>Date and Time</title>
</head>
<body>
<?php
if (isset($_GET['reset'])) {
    unset($_GET["name"]);
    unset($_GET["day"]);
    unset($_GET["month"]);
    unset($_GET["year"]);
    unset($_GET["hour"]);
    unset($_GET["minute"]);
    unset($_GET["second"]);
    header("Location: $_SERVER[PHP_SELF]");
}
?>
<form id="form_input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <table>
        <tr>
            <td>Your name:</td>
            <?php
            if (isset($_GET["name"])) {
                $name = $_GET["name"];
            }
            ?>
            <td><input type="text" name="name" value="<?php echo $name; ?>" required/></td>
        </tr>

        <tr>
            <td>Set Date:</td>
            <td>
                <ul style="list-style-type: none; padding: 0; margin: 0">
                    <li style="float: left">
                        <select name=day>
                            <?php
                            if (isset($_GET["day"])) {
                                $day = $_GET["day"];
                                $i = $day;
                            } else {
                                $day = NULL;
                            }
                            if (!$day) {
                                echo("<option disabled selected></option>");
                            }
                            for ($i = 1; $i < 32; $i++) {
                                if ($day == $i) {
                                    echo ("<option selected>$i</option>");
                                } else {
                                    echo("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </li>
                    <li style="float: left">
                        <select name=month>
                            <?php
                            if (isset($_GET["month"])) {
                                $month = $_GET["month"];
                                $i = $month;
                            } else {
                                $month = NULL;
                            }
                            if (!$month ) {
                                echo("<option disabled selected></option>");
                            }
                            for ($i = 1; $i < 13; $i++) {
                                if ($month == $i) {
                                    echo ("<option selected>$i</option>");
                                } else {
                                    echo("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </li>
                    <li style="float: left">
                        <select name=year>
                            <?php
                            if (isset($_GET["year"])) {
                                $year = $_GET["year"];
                                $i = $year;
                            } else {
                                $year = NULL;
                            }
                            if (!$year) {
                                echo("<option disabled selected></option>");
                            }
                            for ($i = 1600; $i < 3001; $i++) {
                                if ($year == $i) {
                                    echo ("<option selected>$i</option>");
                                } else {
                                    echo("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </li>
                </ul>
            </td>
        </tr>
        <tr>
            <td>Set Time:</td>
            <td>
                <ul style="list-style-type: none; padding: 0; margin: 0">
                    <li style="float: left">
                        <select name=hour>
                            <?php
                            if (isset($_GET["hour"])) {
                                $hour = $_GET["hour"];
                                $i = $hour;
                            } else {
                                $hour = NULL;
                            }
                            if (!$hour) {
                                echo("<option disabled selected></option>");
                            }
                            for ($i = 0; $i < 24; $i++) {
                                if ($hour == $i) {
                                    echo ("<option selected>$i</option>");
                                } else {
                                    echo("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </li>
                    <li style="float: left">
                        <select name=minute>
                            <?php
                            if (isset($_GET["minute"])) {
                                $minute = $_GET["minute"];
                                $i = $minute;
                            } else {
                                $minute = NULL;
                            }
                            if (!$minute) {
                                echo("<option disabled selected></option>");
                            }
                            for ($i = 0; $i < 60; $i++) {
                                if ($minute == $i) {
                                    echo ("<option selected>$i</option>");
                                } else {
                                    echo("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </li>
                    <li style="float: left">
                        <select name=second>
                            <?php
                            if (isset($_GET["second"])) {
                                $second = $_GET["second"];
                                $i = $second;
                            } else {
                                $second = NULL;
                            }
                            if (!$second) {
                                echo("<option disabled selected></option>");
                            }
                            for ($i = 0; $i < 60; $i++) {
                                if ($second == $i) {
                                    echo ("<option selected>$i</option>");
                                } else {
                                    echo("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </li>
                </ul>
            </td>
        </tr>
        <tr>
            <td align="right"><input type="SUBMIT" value="Submit"></td>
            <td align="left"><input type="SUBMIT" value="Reset" name="reset"></td>
        </tr>
    </table>
    <?php
    if ($name && $day && $month && $year && $hour && $minute && $second) {
        switch ($month) {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                $days_in_month = 31;
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                $days_in_month = 30;
                break;
            case 2:
                if (date("l", $year)) {
                    $days_in_month = 29;
                } else {
                    $days_in_month = 28;
                }
                break;
            default:
                echo "<br>Invalid month<br>";
                break;
        }

        echo "<br>Hi $name! <br>";
        $d = mktime($hour, $minute, $second, $month, $day, $year);

        if (!checkdate($month, $day, $year)) {
            echo "<b>The date is not exist!</b><br>";
            echo "<br>More information <br>";
            echo "<br>This month has $days_in_month days";
        } else {
            echo "Your appoinment on " . date("H:i:s", $d) . ", " . date("d/m/Y", $d) . "<br>";
            echo "<br>More information <br>";
            echo "<br>In 12 hours, the time and date is " . date("h:i:s A", $d) . ", " . date("d/m/Y", $d) . "<br>";
            echo "<br>This month has $days_in_month days";
        }
    }
    ?>
</form>

</body>
</html>