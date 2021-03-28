<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Php program</title>
</head>
<body>

This is my 1st php website<br>
<?php
//write php code here
echo "Echo is used in php to print data to webpage";
echo "<br>";
echo "Second line";
echo "<br>";

$variable1=10;
echo "<br>";
$variable2=20;
echo $variable1;
echo "<br>";
echo $variable2;
echo "<br>";

echo $variable1+$variable2;
echo "<br>";
echo var_dump(true==true);

//operators in php
//Arithmetic operators              +,-,*,/
//Assignment operators              =,+=(variable+=1),-=(variable-=1)
//Comparison operators              ==,<,>,>=,<=,!=
//Increment/Decrement operators     ++variable,--variable,variable++,variable--
//Logical operators                 and(&&),or(||),xor,not(!)

echo "<br>";
$var="Hello php";
echo var_dump($var); //this shows the type(datatype) of the variable with length
echo "<br>";
//change char in string
//echo str_replace("o","a",$var);
// echo $var;

//show starting position of a character in string
// echo strpos($var,"o");
// echo "<br>";
// echo $var;

//shows the length of the string 
// echo strlen($var);
// echo "<br>";
//shows words count of the string
// echo str_word_count($var);
// echo "<br>";
//reverses a given string
// echo strrev($var);
// echo "<br>";
//str_replace("o","a",$str);
//echo $str;

//arrays in php 
// echo "<br>";
// $arr=array("Phone","tablet","laptop");
// echo $arr[1];
// echo "<br>";
// echo count($arr);

// loops in php

//while loop
// $i=0;
// while($i<=10){
//     echo $i;
//     echo "<br>";
//     $i++;
// }

//use while loop to print array elements
// $i=0;
// $arr=array("Phone","tablet","laptop");
// while($i<count($arr)){
//     echo $arr[$i];
//     echo "<br>";
//     $i++;
// }

//for loop in php
// $arr=array("Phone","tablet","laptop");
// for($i=0;$i<count($arr);$i++){
//     echo $arr[$i];
//     echo "<br>";
// }

//functions in php
// function print_number($number){
//     echo "number is :";
//     echo "<br>";
//     echo $number;
// }
// print_number(5);

//concatenation operator in php
//like we have + symbol for concatenation in java we have . for concatenation in php
// $str="Hello";
// echo $str." php";
// echo "<br>";
// echo "Length of the string is: ".strlen($str)." This is php";

?>
    
</body>
</html>