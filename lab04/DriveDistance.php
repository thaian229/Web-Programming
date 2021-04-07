<html>
<head>
    <title> Distance from Chicago!</title>
</head>
<body>
Welcome to the Distance Calculator
<br>The page that calculates the distance from Chicago
<br>Select a destination:
<form action="CheckDistance.php" method="get">
    <select name="destination[]" size="5" multiple>
        <option>Boston</option>
        <option>Dallas</option>
        <option>Miami</option>
        <option>Nashville</option>
        <option>Las Vegas</option>
        <option>Pittsburgh</option>
        <option>San Francisco</option>
        <option>Toronto</option>
        <option>Washington, DC</option>
    </select>
    <input type="submit" value="Submit"/>
    <input type="reset" value="Reset"/>
</form>
</body>
</html>