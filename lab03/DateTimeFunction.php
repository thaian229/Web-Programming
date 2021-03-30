<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Date and Time</title>
</head>
<body>

<h1>Date Time Function</h1>

<?php
if (isset($_GET['reset'])) {
    unset($_GET["name1"]);
    unset($_GET["day1"]);
    unset($_GET["month1"]);
    unset($_GET["year1"]);
    unset($_GET["name2"]);
    unset($_GET["day2"]);
    unset($_GET["month2"]);
    unset($_GET["year2"]);
    header("Location: $_SERVER[PHP_SELF]");
}
?>

<?php
function display_date_in_char($time)
{
    echo date("l, F j, Y", $time);
}

function calculate_age($month, $day, $year)
{
    $str_date = $day . "." . $month . "." . $year;
    $bday = new DateTime($str_date);
    $today = new Datetime(date('d.m.y'));
    $diff = $today->diff($bday);
    return $diff;
}

function calculate_date_difference($d1, $d2)
{
    $days_between = ceil(abs($d1 - $d2) / 86400);
    return $days_between;
}

function calculate_age_difference($d1, $d2)
{
    $years_between = abs(
            calculate_age(date('m', $d1), date('d', $d1), date('Y', $d1))->y
        - calculate_age(date('m', $d2), date('d', $d2), date('Y', $d2))->y
    );
    return $years_between;

}

function validate_date($month, $day, $year)
{
    if ($day && $month && $year) {
        $days_in_month = date('t', strtotime('1-' . $month . '-' . $year));
        if ($month < 1 && $month > 12 && !is_int($month)) {
            echo "<br>Invalid month<br>";
            return false;
        }
    } else {
        return false;
    }

    if (!checkdate($month, $day, $year)) {
        echo "<br><b>The date is not exist!</b><br>";
        echo "<br>" . date('F', strtotime('1-' . $month . '-' . $year)) . " of $year has $days_in_month days<br>";
        return false;
    }
    return true;
}

?>
<form id="form_input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <table>
        <tr>
            <td>1st name:</td>
            <?php
            if (isset($_GET["name1"])) {
                $name1 = $_GET["name1"];
            }
            ?>
            <td><input type="text" name="name1" value="<?php echo $name1; ?>" required/></td>
        </tr>

        <tr>
            <td>Birthday:</td>
            <td>
                <ul style="list-style-type: none; padding: 0; margin: 0">
                    <li style="float: left">
                        <select name=day1>
                            <?php
                            if (isset($_GET["day1"])) {
                                $day1 = $_GET["day1"];
                                $i = $day1;
                            } else {
                                $day1 = NULL;
                            }
                            if (!$day1) {
                                echo("<option disabled selected></option>");
                            }
                            for ($i = 1; $i < 32; $i++) {
                                if ($day1 == $i) {
                                    echo("<option selected>$i</option>");
                                } else {
                                    echo("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </li>
                    <li style="float: left">
                        <select name=month1>
                            <?php
                            if (isset($_GET["month1"])) {
                                $month1 = $_GET["month1"];
                                $i = $month1;
                            } else {
                                $month1 = NULL;
                            }
                            if (!$month1) {
                                echo("<option disabled selected></option>");
                            }
                            for ($i = 1; $i < 13; $i++) {
                                if ($month1 == $i) {
                                    echo("<option selected>$i</option>");
                                } else {
                                    echo("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </li>
                    <li style="float: left">
                        <select name=year1>
                            <?php
                            if (isset($_GET["year1"])) {
                                $year1 = $_GET["year1"];
                                $i = $year1;
                            } else {
                                $year1 = NULL;
                            }
                            if (!$year1) {
                                echo("<option disabled selected></option>");
                            }
                            for ($i = 1900; $i <= date("Y"); $i++) {
                                if ($year1 == $i) {
                                    echo("<option selected>$i</option>");
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
            <td>2nd name:</td>
            <?php
            if (isset($_GET["name2"])) {
                $name2 = $_GET["name2"];
            }
            ?>
            <td><input type="text" name="name2" value="<?php echo $name2; ?>" required/></td>
        </tr>

        <tr>
            <td>Birthday:</td>
            <td>
                <ul style="list-style-type: none; padding: 0; margin: 0">
                    <li style="float: left">
                        <select name=day2>
                            <?php
                            if (isset($_GET["day2"])) {
                                $day2 = $_GET["day2"];
                                $i = $day2;
                            } else {
                                $day2 = NULL;
                            }
                            if (!$day2) {
                                echo("<option disabled selected></option>");
                            }
                            for ($i = 1; $i < 32; $i++) {
                                if ($day2 == $i) {
                                    echo("<option selected>$i</option>");
                                } else {
                                    echo("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </li>
                    <li style="float: left">
                        <select name=month2>
                            <?php
                            if (isset($_GET["month2"])) {
                                $month2 = $_GET["month2"];
                                $i = $month2;
                            } else {
                                $month2 = NULL;
                            }
                            if (!$month2) {
                                echo("<option disabled selected></option>");
                            }
                            for ($i = 1; $i < 13; $i++) {
                                if ($month2 == $i) {
                                    echo("<option selected>$i</option>");
                                } else {
                                    echo("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </li>
                    <li style="float: left">
                        <select name=year2>
                            <?php
                            if (isset($_GET["year2"])) {
                                $year2 = $_GET["year2"];
                                $i = $year2;
                            } else {
                                $year2 = NULL;
                            }
                            if (!$year2) {
                                echo("<option disabled selected></option>");
                            }
                            for ($i = 1900; $i <= date("Y"); $i++) {
                                if ($year2 == $i) {
                                    echo("<option selected>$i</option>");
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


    if (validate_date($month1, $day1, $year1) && validate_date($month2, $day2, $year2)) {
        $d1 = mktime(0, 0, 0, $month1, $day1, $year1);
        $d2 = mktime(0, 0, 0, $month2, $day2, $year2);

        print("<h3>Person 1: $name1</h3>");
        print("Birthday: ");
        print(display_date_in_char($d1) . "<br>");
        print("Age: " . calculate_age($month1, $day1, $year1)->y . " years old <br>");

        print("<h3>Person 2: $name2</h3>");
        print("Birthday: ");
        print(display_date_in_char($d2) . "<br>");
        print("Age: " . calculate_age($month2, $day2, $year2)->y . " years old <br>");
        print("<br>");
        print("<h4>Date differences</h4>");
        print(calculate_date_difference($d1, $d2) . ' days<br>');
        print("<h4>Age differences</h4>");
        print(calculate_age_difference($d1, $d2) . ' years<br>');
    }
    ?>
</form>

</body>
</html>