<?php
header("Content-type:text/html;charset=utf-8");
include_once ("../DB/dbConnect.php");



if(isset($_GET['tid']))
{
    $tid = $_GET['tid'];
    $sqlStr = "delete from task where id = '".$tid."'";
    mysqli_query($link,$sqlStr);
    $json_arr = array("tid"=>$tid);
    $json_obj=json_encode($json_arr);
//    $json_obj= {"tid":tid};
    echo $json_obj;
}

