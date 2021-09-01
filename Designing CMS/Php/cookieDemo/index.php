<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Demo</title>
    
</head>
<style>
.content {
  max-width: 660px;
  margin: auto;
}
.aligncenter {
    
    margin-top: 100px;
    text-align: center;
}

</style>
<?php
  $bgColor="white"; 
  $fontFace="Times New Roman"; 
  $fontSize="18"; 

    if(isset($_COOKIE['cColor']))
        $bgColor=$_COOKIE['cColor'];
    if(isset($_COOKIE['cFontFace']))
        $fontFace=$_COOKIE['cFontFace'];
    if(isset($_COOKIE['cFontSize']))
        $fontSize=$_COOKIE['cFontSize'];

echo "<body style='background-color: $bgColor'>";
echo "<div class='aligncenter'>";


echo "<p style='font-family:$fontFace;font-size:$fontSize"."px'>This is demo content.</p>";
// var_dump($bgColor,$fontFace,$fontSize);


?>
<a href="./setPreferences.php">Set Preferences</a>
</div>
</body>
</html>