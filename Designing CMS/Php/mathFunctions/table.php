<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Number Table" ?></title>
</head>
<body>

<table border="1" cellpadding="10">
<?php

function roundToTwoDecimalPlaces($value): float {
    return round($value, 2);
}

// $numberLimit = 256;
$numberLimit = 90;
$numberOfColumns = 4;

// echo "<td>Decimal</td><td>Hex</td><td>Oct</td><td>Binary</td>";
echo "<td>Degree</td><td>Sin</td><td>Cos</td><td>Tan</td>";
for($i=0; $i<=$numberLimit;$i++){
    echo "<tr>";
    // echo "<td>$i</td><td>".dechex($i)."</td><td>".decoct($i)."</td><td>".decbin($i)."</td>";
    echo "<td>$i</td><td>".roundToTwoDecimalPlaces(sin($i))."</td><td>".roundToTwoDecimalPlaces(cos($i))."</td>
    <td>".roundToTwoDecimalPlaces(tan($i))."</td>";
    echo "</tr>";
}

?>

</table>
</body>
</html>