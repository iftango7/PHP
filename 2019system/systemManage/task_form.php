<?php
header("Content-type:text/html;charset=utf-8");
include_once ("../DB/dbConnect.php");

$log_task = $_POST['log_task'];
$log_time = $_POST['log_time'];
$log_people = $_POST['log_people'];

#$sqlStr = "insert into 'task' ('log_task', 'log_time','log_people') values ('$log_task','$log_time','$log_people')";
$sqlStr = "INSERT INTO `task`( `log_task`, `log_time`, `log_people`) VALUES ('$log_task','$log_time','$log_people')";

mysqli_query($link,$sqlStr);
$json_arr = array("log_task"=>$log_task,"log_time"=>$log_time,"log_people"=>$log_people);
$json_obj=json_encode($json_arr);
echo $json_obj;


