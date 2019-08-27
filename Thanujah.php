<?php

$na="Thanujah";
$ad=" Karaitivu";
$bo="21th april";
$sc="Girls' vid";

echo 'Your Name: '.$na."<br>";
echo 'Address: '.$ad."<br>";
echo 'Birthday: '.$bo."<br>";
echo 'School: '.$sc."<br>";


$car = array ("Volve","BMW","Toyota");
$number = array(10,14,12);
var_dump ($car);

print_r($number);
echo "<br>Car<br>";

print_r($car);
echo '<br>$car[0]';

echo $car[0];




$x="Hello world";
$x=null;

var_dump($x);




$x=8956785;
var_dump($x);

$c="false";
var_dump($c);

$d=false;
var_dump($d);

$y=10.6782;
var_dump($y);

echo $x."<br>";
echo $c."<br>";
echo $y."<br>";
echo $d."<br>";

<html>
    <body>
        <form action="login_get.php" method="GET">
            User Name:<br>
            <input type="text" name="username"><br>
            Password:<br>
            <input type="password" name="password"><br>
            <input type="Submit" value="LogIN">
        </form>
    </body>
</html>

?>