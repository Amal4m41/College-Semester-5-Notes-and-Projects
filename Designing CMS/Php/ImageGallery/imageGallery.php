<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Image Gallery" ?></title>
</head>
<body>


<table border="1" cellpadding="10">
<?php
function showFullScreenImage($imagePath){
    // echo "$imagePath";
    echo "<img height=600 src=$imagePath><br><br><a href='imageGallery.php'>Back to gallery</a>";
}


$imagesStringPath = "images/rocket.jpg,images/rocket2.jpg,images/saturn1.jpg,images/messi.jpg,images/neymar.jpg,images/ronaldo.jpg,images/doggy.jpg,images/doggy2.jpg,images/cat.jpg";

$array = explode(",",$imagesStringPath);

$numberOfColumns=3;
$numberOfRows=3;
$counter=0;
if (isset($_GET['image'])) {
    showFullScreenImage($_GET['image']);
}
else{
    echo "<h1>Image Gallery</h1>";

    for($i=0; $i<$numberOfRows;$i++){
        // echo "$i";
        // list($e1,$e2,$e3) = array_slice($array,$i,3);
        echo "<tr>";
        for($j=0;$j<$numberOfColumns;$j++){
            echo "<td><a href='imageGallery.php?image=$array[$counter]'><img height=160 src=$array[$counter]></a></td>";
            $counter++;
        }
        echo "</tr>";
    }
}
?>
</table>
</body>
</html>