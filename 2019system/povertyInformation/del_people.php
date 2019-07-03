<?php
header("Content-type:text/html;charset=utf-8");
include_once ("../DB/dbConnect.php");


if(isset($_GET["del_id"]))
{
    $id = $_GET["del_id"];
    $sqlStr = "delete from people where id = '".$id."'";
//    if(mysqli_query($link, $sqlStr)){
//        echo "<script> alert('人员信息删除成功');
//        history.back();
//        ;</script>" ;
//    }
    $del_result = mysqli_query($link,$sqlStr);

    $json_arr = array("del_result"=>$del_result);
    $json_obj=json_encode($json_arr);
    echo $json_obj;


}