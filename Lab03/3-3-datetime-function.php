<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Datetime Demo</title>
</head>
<body>
<?php
function date_validator($day, $month, $year)
{
    if (($month < 1) || ($month > 12)){
        return false;
    }
    if (($year % 4 != 0) || (($year % 100 == 0) && ($year % 400 != 0))) {
        switch ($month) {
            case 4:
            case 6:
            case 9:
            case 11:
                if ($day > 30) {
                    return false;
                } else {
                    return true;
                }
            case 2:
                if ($day > 28) {
                    return false;
                } else {
                    return true;
                }
            default:
                return true;
        }
    } else {
        switch ($month) {
            case 4:
            case 6:
            case 9:
            case 11:
                if ($day > 30) {
                    return false;
                } else {
                    return true;
                }
            case 2:
                if ($day > 29) {
                    return false;
                } else {
                    return true;
                }
            default:
                return true;
        }
    }
}

function age_calculator($date)
{
    $SECOND_IN_YEAR = 31556926;
    return floor((time() - $date) / $SECOND_IN_YEAR);
}

function day_diff_calculator($date1, $date2)
{
    $SECOND_IN_DAY = 86400;
    return floor(abs(($date1 - $date2)) / $SECOND_IN_DAY);
}

$name1 = $_POST["name1"];
$day1 = $_POST["day1"];
$month1 = $_POST["month1"];
$year1 = $_POST["year1"];
$name2 = $_POST["name2"];
$day2 = $_POST["day2"];
$month2 = $_POST["month2"];
$year2 = $_POST["year2"];

$valid_1 = date_validator($day1, $month1, $year1);
$valid_2 = date_validator($day2, $month2, $year2);
print ("Person 1: $name1. Birthday: $day1/$month1/$year1.");
if ($valid_1) {
    print ("Which is acceptable.<br>");
} else {
    print ("Which is incorrect.<br>");
}

print ("Person 2: $name2. Birthday: $day2/$month2/$year2.");
if ($valid_2) {
    print ("Which is acceptable.<br>");
} else {
    print ("Which is incorrect.<br>");
}

if ($valid_1 && $valid_2) {
    $date1 = strtotime("$day1-$month1-$year1");
    $date2 = strtotime("$day2-$month2-$year2");
    print ("Birthday of person 1 in a fancy way: ");
    print date("D d/M/Y", $date1);
    print ("<br>");
    print ("Birthday of person 2 in a fancy way: ");
    print date("D d/M/Y", $date2);
    print ("<br>");
    $day_diff = day_diff_calculator($date1, $date2);
    print ("2 birthdays are $day_diff day(s) from each other: <br>");
    $age1 = age_calculator($date1);
    $age2 = age_calculator($date2);
    print ("Age of $name1: $age1, while $name2 is $age2 years old.<br>");
}
else{
    print ("Check input.");
}
?>
</body>
