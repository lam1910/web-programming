<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Semester Result</title>
</head>
<body>
    <?php
        $first = $_GET["firstName"];
        $middle = $_GET["middleName"];
        $last = $_GET["lastName"];

        print("Hi $first! Your full name is $last $middle $first.<br>");
        if ($first == $last){
            print ("$first and $last are equal");
        }
        elseif ($first > $last){
            print ("$first is less than $last");
        }
        else {
            print ("$first is greater than $last");
        }
        print ("<br>");

        $grade1 = $_GET["grade1"];
        $grade2 = $_GET["grade2"];
        $final = (2 * $grade1 + 3 * $grade2)/5;

        print ("Your final grade is $final. ");
        if ($final > 89){
            print ("You got an A. Congratulation");
        }
        elseif ($final > 79){
            print ("You got a B");
        }
        elseif ($final > 69){
            print ("You got a C");
        }
        elseif ($final > 59){
            print ("You got a D");
        }
        elseif ($final >= 0){
            print ("You got a F");
        }
        else{
            print ("Illegal grade less than 0. Final grade = $final");
        }
    ?>
</body>
</html>
