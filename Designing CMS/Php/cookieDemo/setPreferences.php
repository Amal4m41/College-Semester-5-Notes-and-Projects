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

<body>
<div class='aligncenter' >
<?php
$changeMade = false;


if(isset($_GET['bgColor'])){
    $bgColor=$_GET['bgColor']; $changesMade=true;
}
if(isset($_GET['fontFace'])){
    $fontFace=$_GET['fontFace']; $changeMade=true;
}
if(isset($_GET['fontSize'])) {
    $fontSize=$_GET['fontSize']; $changeMade=true;
}
   
// var_dump($bgColor,$fontFace,$fontSize);echo"<br>";
// var_dump($_GET);




?>
    <form>
        Background color : 
        <input type="color" name="bgColor">
        <br><br>
        
        Font Face : 
       <select name = 'fontFace'>
          <option value = 'Times New Roman' selected>Times New Roman</option>
          <option value = 'Verdana'>Verdana</option>
          <option value = 'Comic sans MS'>Comic sans MS</option>
       </select> <br><br>
        Font Size : 
       <select name = 'fontSize'>
          <option value = '18' selected>18</option>
          <option value = '22'>22</option>
          <option value = '26'>26</option>
          <option value = '30'>30</option>
       </select><br><br>
       <input type="submit" value="Set Preferences">
    </form>

    
    <?php

if($changeMade){
    // var_dump($changeMade);
    setcookie('cColor',$bgColor,0);
    setcookie('cFontFace',$fontFace,0);
    setcookie('cFontSize',$fontSize,0);
    echo "<br><br>Preferences Updated!";
}
?>

<br><br><a href="./">Back to home page</a>
</div>
</body>
</html>