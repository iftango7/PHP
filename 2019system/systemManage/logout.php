<?php
/**
 * 用户退出功能实现
 */
/**
 * 开启session
 */
session_start();
/**
 * 取出当前登陆用户名
 */
$username = $_SESSION['username'];
/**
 * 清空session
 */
$_SESSION['username'] = array();
//if (isset($_COOKIE[session_name()])) {
//    setcookie(session_name(), '', time() - 42000, '/');
//}
//
//session_destroy();
/**
 * 开启检查用户是否登陆  表示退出  并做退出标记
 */
if (empty($_SESSION['username'])) {
    header("Location:../index.php?action=out");
}