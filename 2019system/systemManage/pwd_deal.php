<?php
header("Content-type:text/html;charset=utf-8");
include_once ("../DB/dbConnect.php");
session_start();



$oldPassword = $_POST['oldPassword'];
$newPassword_01 = $_POST['newPassword_01'];
$newPassword_02 = $_POST['newPassword_02'];
//$json_arr = array("oldPassword"=>$oldPassword);
//$json_obj=json_encode($json_arr);
//echo $json_obj;

//
////    $link = mysqli_connect('localhost', 'root', '');
////    $db_selected = mysqli_select_db($link, 'php');
////    mysqli_query($link, "set names 'utf8'");
//
$sqlStr = "select pwd from manager where username = '".$_SESSION["username"]."'";
$result = mysqli_query($link, $sqlStr);
//
//
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//print_r($row);
//echo $row['pwd'];
////    在次后注释
if($row['pwd'] != $oldPassword) {
//        header("refresh:3;url = backpage.php??username=".$_SESSION["username"]."&role=".$_SESSION["role"]);
    $json_arr = array("info"=>"密码不正确");
    $json_obj=json_encode($json_arr);
    echo $json_obj;
} else
    {
        if($newPassword_01 != $newPassword_02)
        {
            //header("refresh:3;url = backpage.php?username=".$_SESSION["username"]."&role=".$_SESSION["role"]);
            $json_arr = array("info"=>"两次输入的密码不一致");
            $json_obj=json_encode($json_arr);
            echo $json_obj;
        }
        else
        {
            $sqlStr = "update manager set pwd = '".$newPassword_01."' where username = '".$_SESSION['username']."'";
            $result2 = mysqli_query($link, $sqlStr);//执行SQL语句
//            echo mysqli_error($link);

//            echo "<script> alert('密码修改成功');</script>";
            $json_arr = array("info"=>"密码修改成功");
            $json_obj=json_encode($json_arr);
            mysqli_close($link);//数据库链接关闭
            echo $json_obj;

//            header("refresh:1;url= ../system.php?username=".$_SESSION["username"]);
//            echo "<script> alert('密码修改成功');</script>";

        }
    }
