<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Calendar" ?></title>
</head>
<body>


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
    echo "<table border='1' cellpadding='10'>";
    echo "<td>Sunday</td><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td>";
    $day=1;
    for($i=0; $i<$_noOfRows;$i++){
        echo "<tr>";
        for($j=0; $j<7;$j++){
            if($_firstDayInWeek<=$j && $day<=$_noOfDaysPresentMonth){
                if($_presentDay==$day){
                    echo "<td>sdfs</td>";
                }
                else{
                    echo "<td>$day</td>";
                }
                $_firstDayInWeek=0;
                $day++;
            }
            else{
                echo "<td></td>";
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
echo "<br><a href='calendar.php?month=$prevMonth&year=$prevYear'><</a>
<a href='calendar.php?month=$nextMonth&year=$nextYear'>></a>";
?>


</body>
</html>