<?php

    $numberList = ["firstName"=>"Uditha", "middleName"=>"Arjuna", "lastName"=>"Silva"];

    echo $numberList["firstName"]."<br>";

    $myName = "Uditha";

    function hello()
    {
        global $myName;
            $myName = "Arjuna";
    };

    echo $myName;
    hello();
    echo "<br>".$myName;

    define("NAME","Uditha");

?>