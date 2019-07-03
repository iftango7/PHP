<?php
$link = mysqli_connect('localhost', 'root', '');
$db_selected = mysqli_select_db($link, 'php');
mysqli_query($link, "set names 'utf8'");//设置MySQL返回的数据字符集