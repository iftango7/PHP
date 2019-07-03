<?php
header("Content-type:text/html;charset=utf-8");
include_once ("../DB/dbConnect.php");

$id = $_GET['article_id'];
//echo "<script>alert($id)</script>";
if(isset($_GET['article_id'])) {
    if($id<10000){
        $sqlStr = "select * from news where id = '" . $id . "'";

    }else{
        $sqlStr = "select * from policy where id = '" . $id . "'";

    }
    $result = mysqli_query($link, $sqlStr);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $a_title= $row['title'];
    $article= $row['article'];


    $json_arr = array("id"=>$id,"a_title"=>$a_title,"article"=>$article);
    $json_obj=json_encode($json_arr);
    echo $json_obj;

}
?>