<?php
// var_dump($_POST);
// exit();

$date = $_POST['date'];
$course_select = $_POST['course_select'];
$play_fee = $_POST['play_fee'];
$competition_name = $_POST['competition_name'];
$competitor01 = $_POST['competitor01'];
$competitor02 = $_POST['competitor02'];
$competitor03 = $_POST['competitor03'];
$tee_time = $_POST['tee_time'];
$weather = $_POST['weather'];
$temperature = $_POST['temperature'];
$wind = $_POST['wind'];
$hole01 = $_POST['hole01'];
$hole02 = $_POST['hole02'];
$hole03 = $_POST['hole03'];
$hole04 = $_POST['hole04'];
$hole05 = $_POST['hole05'];
$hole06 = $_POST['hole06'];
$hole07 = $_POST['hole07'];
$hole08 = $_POST['hole08'];
$hole09 = $_POST['hole09'];
$hole10 = $_POST['hole10'];
$hole11 = $_POST['hole11'];
$hole12 = $_POST['hole12'];
$hole13 = $_POST['hole13'];
$hole14 = $_POST['hole14'];
$hole15 = $_POST['hole15'];
$hole16 = $_POST['hole16'];
$hole17 = $_POST['hole17'];
$hole18 = $_POST['hole18'];

$write_data = "{$date} {$course_select} {$play_fee} {$competition_name} {$competitor01} {$competitor02} {$competitor03} {$tee_time} {$weather} {$temperature} {$wind} {$hole01} {$hole02} {$hole03} {$hole04} {$hole05} {$hole06} {$hole07} {$hole08} {$hole09} {$hole10} {$hole11} {$hole12} {$hole13} {$hole14} {$hole15} {$hole16} {$hole17} {$hole18}\n";
$file = fopen('data/data.txt','a');
flock($file,LOCK_EX);
fwrite($file,$write_data);
flock($file,LOCK_UN);
fclose($file);
header('location:jyaponica_input.php');


// $todo = $_POST['todo'];
// $deadline = $_POST['deadline'];
// $write_data = "{$deadline} {$todo}\n";
// $file = fopen('data/data.txt','a');
// flock($file,LOCK_EX);
// fwrite($file,$write_data);
// flock($file,LOCK_UN);
// fclose($file);

// header('location:jyaponica_input.php');

