<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Date Time Validation</title>
</head>
<body>
<?php
function date_validator($day, $month, $year)
{
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

$name = $_GET["name"];

print ("Hello $name!<br>");

$day = $_GET["day"];
$month = $_GET["month"];
$year = $_GET["year"];

if (!date_validator($day, $month, $year)) {
    print ("Not a valid date. Aborted!");
} else {
    $hour = $_GET["hour"];
    $minute = $_GET["minute"];
    $second = $_GET["second"];

    $date = strtotime("$day-$month-$year $hour:$minute:$second");
    print ("You have an appointment on: ");
    print date("D d/M/Y H:i:s", $date);
}
?>
</body>
