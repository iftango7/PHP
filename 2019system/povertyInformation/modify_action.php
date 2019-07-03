<?php
/**
 * 修改用户资料功能实现
 */
/**
 * 开启session
 */
session_start();
/**
 * 开启检查用户是否登陆
 */

include ("../DB/dbConnect.php");
if (empty($_SESSION['username'])) {
    header("Location:../index.php");
}else{
    $sqlStr = "update people set name='$_POST[name]',sex='$_POST[sex]',IDcard='$_POST[IDcard]',
    telphone='$_POST[telphone]',birthday='$_POST[birthday]',
    address='$_POST[address]',introduce='$_POST[introduce]'
    where id=$_POST[id]";
//    echo $sqlStr;
    $result = mysqli_query($link, $sqlStr);
    header("refresh:1;url =../system.php?username=".$_SESSION['username']);
    echo "<script>alert('信息修改成功');</script>";
}

//,createTime='$_POST[createTime]',
/**
 * 修改用户新资料
 */

?>