<?php
include_once ("../DB/dbConnect.php");
$IDcard = $_GET['id'];//获取地址栏 searchKey
$sqlstr = "select * from family_info where family_IDcard= '".$IDcard."'";
$result = mysqli_query($link,$sqlstr);//数据库执行，返回结果给result
if(!$result){
    die('无法读取数据库中数据'.mysqli_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>贫困户家庭人员信息</title>
    <script src="../js/jquery-2.1.4.js"></script>
    <!--    让列表可拖动的插件-->
    <script src="../js/colResizable-1.6.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("table").colResizable();
        })
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-condensed" border="1 solid" rules="all" align="center" cellpadding="5">
            <caption>贫困户人员信息</caption>
            <tr>
                <th>姓名</th>
                <th>性别</th>
                <th>身份证号</th>
                <th>关系</th>
                <th>健康状态</th>
                <th>个人情况</th>
                <th>备注</th>
            </tr>
            <?php
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  //每读出一条数据就加一行<tr>
            {
                ?>
                <tr>
                    <td><?php echo $row["name"]?></td>
                    <td><?php echo $row["sex"]?></td>
                    <td><?php echo $row["IDcard"]?></td>
                    <td><?php echo $row["guanxi"]?></td>
                    <td><?php echo $row["health"]?></td>
                    <td><?php echo $row["personal_info"]?></td>
                    <td><?php echo $row["beizhu"]?></td>
                </tr>
            <?php }?>
        </table></div>
</div>
</body>