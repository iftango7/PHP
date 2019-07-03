<?php
session_start();
include_once ("../DB/dbConnect.php");
$name = $_POST['name'];


$username = $_SESSION["username"];
//$sex = $_POST['sex'];

//$IDcard = $_['$IDcard'];
//$birthday = $_POST['$birthday'];
//$telphone = $_POST['$telphone'];
//$createTime = $_POST['$createTime'];
//$address = $_POST['$address'];
//$introduce = $_POST['$introduce '];
$sqlStr = "INSERT INTO people (name,sex,IDcard,birthday,telphone,createTime,address,introduce) 
VALUES ('$_POST[name]','$_POST[sex]','$_POST[IDcard]','$_POST[birthday]','$_POST[telphone]','$_POST[createTime]','$_POST[address]','$_POST[introduce]')";

$result = mysqli_query($link,"SELECT * FROM people WHERE IDcard='$_POST[IDcard]'");

$result = mysqli_fetch_array($result);
if(empty($result)){
    if (mysqli_query($link, $sqlStr)) {
        header("refresh:1;url =../system.php?username=".$username);
        echo "<script>alert('添加成功');</script>";

    } else {
      echo "Error creating table: " . mysqli_error($link);


    }

}else{
    header("refresh:1;url = ../system.php");
    echo "<script>alert('身份证重复使用');</script>";
}


?>