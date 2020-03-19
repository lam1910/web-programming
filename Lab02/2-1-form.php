<HTML>
    <head>
        <title>Forms</title>
    </head>
    <body>
        <span style="font-size: large; ">Thank you: Got Your Input</span>
        <?php
            $sep = ", ";
            $name = $_POST["name"];
            $sex = $_POST["sex"];
            $email = $_POST["email"];
            $home = $_POST["home"];
            $school = $_POST["school"];
            $unit = $_POST["unit"];
            $hobby1 = $_POST["hobby1"];
            $hobby2 = $_POST["hobby2"];
            $hobby3 = $_POST["hobby3"];
            $hobby4 = $_POST["hobby4"];
            $hobby5 = $_POST["hobby5"];
            $hobby6 = $_POST["hobby6"];
            $hobby7 = $_POST["hobby7"];
            $hobby8 = $_POST["hobby8"];
            $hobby = $hobby1 . $sep . $hobby2 . $sep . $hobby3 . $sep . $hobby4 . $sep . $hobby5 . $sep .
                $hobby6 . $sep . $hobby7 . $sep . $hobby8 . null . ".";
            $language1 = $_POST["lang1"];
            $language2 = $_POST["lang2"];
            $language3 = $_POST["lang3"];
            $language4 = $_POST["lang4"];
            $language5 = $_POST["lang5"];
            $language6 = $_POST["lang6"];
            $language = $language1 . $sep . $language2 . $sep . $language3 . $sep . $language4 . $sep .
                $language5 . $sep . $language6 . ".";
            $isSeekJob = $_POST["job"];

            print ("<br>$name");
            print (". $sex");
            print ("<br>Your email address is $email");
            print ("<br>Your home address is $home");
            print ("<br>Study at $school");
            print (". Of class: $unit");
            print ("<br>You like $hobby");
            print ("<br>You are proficient in: $language");
            print ("<br>Your job seeking status: $isSeekJob");
        ?>
    </body>
</HTML>

