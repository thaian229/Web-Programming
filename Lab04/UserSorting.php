<?php
function user_sort($a, $b)
{
    // smarts is all-important, so sort it first
    if ($b == 'smarts') {
        return 1;
    } else if ($a == 'smarts') {
        return -1;
    }

    return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
}

$submitted_click = 0;
//$sort_type = null;
//$submitted = null;

$values = array(
    'name' => 'Buzz Lightyear',
    'email_address' => 'buzz@starcommand.gal',
    'age' => 32,
    'smarts' => 'some'
);
if (isset($_POST['sort_type'])) $sort_type = $_POST['sort_type'];
$sort_config = ['usort' => ['usort', 'user_sort'],
    'uksort' => ['uksort', 'user_sort'],
    'uasort' => ['uasort', 'user_sort'],
    'sort' => ['sort'],
    'rsort' => ['rsort'],
    'ksort' => ['ksort'],
    'krsort' => ['krsort'],
    'asort' => ['asort'],
    'arsort' => ['arsort']];
if (isset($_POST['submitted'])) $submitted = $_POST['submitted'];
else $submitted = null;

$sorted_values = array_merge([], $values);

if ($submitted) {
    $config = $sort_config[$sort_type];
    if (isset($config[1])) {
        $config[0]($sorted_values, $config[1]);
    } else {
        $config[0]($sorted_values);
    }
    $submitted_click = 1;
}
?>

<form action="UserSorting.php" method="post">
    <table align="center" style="width:120%">
        <tbody>
        <tr>
            <td rowspan="3">
                <input type="radio" name="sort_type" value="sort" checked="checked"/>
                Standard sort<br/>
            </td>
            <td rowspan="3">
                <input type="radio" name="sort_type" value="usort"/> User-defined sort<br/>
            </td>
            <td rowspan="3">
                <input type="radio" name="sort_type" value="krsort"/> Reverse key sort<br/>
            </td>
            <td rowspan="2">
                <input type="radio" name="sort_type" value="asort"/> Value sort<br/>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td rowspan="2">
                <input type="radio" name="sort_type" value="arsort"/> Reverse value sort<br/>
            </td>
        </tr>
        <tr>
            <td rowspan="3">
                <input type="radio" name="sort_type" value="rsort"/> Reverse sort<br/>
            </td>
            <td rowspan="3">
                <input type="radio" name="sort_type" value="ksort"/> Key sort<br/>
            </td>
            <td rowspan="3">
                <input type="radio" name="sort_type" value="uksort"/> User-defined key sort<br/>
            </td>
        </tr>
        <tr>
            <td rowspan="2">
                <input type="radio" name="sort_type" value="uasort"/> User-defined value sort<br/>
            </td>
        </tr>
        </tbody>
    </table>
    <p align="center">
        <input type="submit" value="Sort" name="submitted"/>
    </p>
    <table style="width:100%">
        <tbody>
        <tr>
            <td style="width:15%" text-align="center">
                <p>
                    Values unsorted (before sort):
                </p>
            </td>
            <td>
                <ul>
                    <?php
                    foreach ($values as $key => $value) {
                        echo "<li><b>$key</b>: $value</li>";
                    }
                    ?>
                </ul>
            </td>
            <?php
            if ($submitted_click == 1) {
                print "<td>";
                print "<p>Values sorted by $sort_type:</p>";
                print "</td><td>";
                print "<ul>";
                foreach ($sorted_values as $key => $value) {
                    echo "<li><b>$key</b>: $value</li>";
                }
                print "</ul>";
                print "</td>";
            }
            ?>
        </tr>
        </tbody>
    </table>
</form>