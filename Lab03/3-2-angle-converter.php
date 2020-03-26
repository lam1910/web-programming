<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
</head>
<body>
<?php
function rad_to_deg ($angle){
    return ($angle * 180) / M_PI;
}

function deg_to_rad ($angle){
    return ($angle * M_PI) / 180;
}

function convert_angle ($angle, $unit){
    if ($unit == "rad"){
        return rad_to_deg($angle);
    }
    elseif ($unit == "degree"){
        return deg_to_rad($angle);
    }
}
    print ("What you are entered: ");
    $angle = $_POST['angle'];
    $unit = $_POST['unit'];
    if ($unit == "rad"){
        print ("$angle radian(s) <br>");
    }
    else{
        print ("$angle $unit(s) <br>");
    }

    $converted = convert_angle($angle, $unit);
    print ("The conversion result: $converted");
    if ($unit == "rad"){
        print (" degree(s)");
    }
    else{
        print ("radian(s)");
    }
?>
</body>
