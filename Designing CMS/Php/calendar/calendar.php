<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Calendar" ?></title>
</head>
<style>
.content {
  max-width: 660px;
  margin: auto;
}
.aligncenter {
    text-align: center;
}

</style>
<body>

<div class='aligncenter'>
    <h1>Calendar</h1>
</div>
<div class="content">
<?php

// $presentDay = date('j');  //value between 1-31
// $presentMonth = date('n');  //value between 1-12
// $presentYear = date('Y');  //value between 0-31

$month = -1;
$nextMonth =-1;
$prevMonth =-1;

$year = -1;
$nextYear = -1;
$prevYear = -1;

function getPresentDate(): string {
    return date('j')." ".date('n')." ".date('Y');
}

function getFirstDayOfMonth($_month,$_year): Int {
    $firstDay = date('w',strtotime("$_month/1/$_year"));
    return $firstDay;
}

function getNumberOfDays($_month,$_year): Int {
    $noOfDaysPresentMonth = cal_days_in_month(CAL_GREGORIAN, $_month, $_year);
    return $noOfDaysPresentMonth;
}

function getNumberOfRows($_noOfDaysThisMonth,$_firstDay): Int {
    $noOfRows = ceil(($_noOfDaysThisMonth + $_firstDay)/7);
    return $noOfRows;
}


list($presentDay, $presentMonth, $presentYear) = explode(" ",getPresentDate());

//Logic starts here
if (isset($_GET['month']) && isset($_GET['year'])) {  //isset checks if the variable is declared and it's value is not null 
    // var_dump($_GET);
    $month = (int)$_GET['month'];
    $year = (int)$_GET['year'];
    // var_dump($month,$year);
    if($month == $presentMonth && $year == $presentYear){
        showPresentMonthCalendar($presentMonth, $presentYear,true);
    }
    else{
        showPresentMonthCalendar($month,$year);
    }
}
else{
    showPresentMonthCalendar($presentMonth, $presentYear,true);
}


function showPresentMonthCalendar($_month,$_year,$_isPresentDay=false){
    global $presentDay, $month, $year, $nextMonth, $nextYear, $prevMonth, $prevMonth;

    $month = $_month;
    $year = $_year;


    $firstDay = getFirstDayOfMonth($_month,$_year);
    $numberOfDays = getNumberOfDays($_month,$_year);
    $noOfRows = getNumberOfRows($numberOfDays,$firstDay);
    if($_isPresentDay){
        showCalendar($noOfRows,$numberOfDays,$firstDay,$presentDay);
    }
    else{
        showCalendar($noOfRows,$numberOfDays,$firstDay);
    }
}

// var_dump(getPresentDate(),$presentDay,$presentMonth,$presentYear);
// var_dump($firstDay,$noOfDaysPresentMonth);

echo "<br>";
// var_dump($noOfRows);

function showCalendar($_noOfRows, $_noOfDaysPresentMonth,$_firstDayInWeek,$_presentDay=-1){
    
    echo "<table border='1' cellpadding='20' >";
    echo "<td bgcolor='FF706B'>Sunday</td><td bgcolor='E0FFF4'>Monday</td><td bgcolor='E0FFF4'>Tuesday</td>
    <td bgcolor='E0FFF4'>Wednesday</td><td bgcolor='E0FFF4'>Thursday</td><td bgcolor='E0FFF4'>Friday</td><td bgcolor='FF706B'>Saturday</td>";
    $day=1;
    for($i=0; $i<$_noOfRows;$i++){
        echo "<tr>";

        
        for($j=0; $j<7;$j++){

            $bgcolor = ($_presentDay==$day) ? "B0EEA9" : "#FFE5B4";

            if($_firstDayInWeek<=$j && $day<=$_noOfDaysPresentMonth){

                echo "<td bgcolor='$bgcolor'>$day</td>";

                $_firstDayInWeek=0;
                $day++;
            }
            else{
                echo "<td bgcolor='$bgcolor'></td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}



$nextYear = ($month==12)? $year+1 : $year;
$nextMonth = ($month==12)? 1 : $month+1;

$prevYear = ($month==1)? $year-1 : $year;
$prevMonth = ($month==1)? 12 : $month-1;

// var_dump($prevMonth,$nextMonth);
echo "<p class='aligncenter'>";
echo "<br><a href='calendar.php?month=$prevMonth&year=$prevYear'><img height=100 src='left_arrow.png'></a>
<a href='calendar.php?month=$nextMonth&year=$nextYear'><img height=100 src='right_arrow.jpg'></a>";
echo "</p>";

?>
</div>


</body>
</html>