<?php
include_once ("../DB/dbConnect.php");
$sqlStr = "select * from manager ";
$result = mysqli_query($link, $sqlStr);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>贫困户人员信息</title>


</head>
<body>
<div class="container-fluid">
    <?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  //每读出一条数据就加一行<tr>
    {?>
    <div class="row">
        <div class="col-md-3">
            <img src=<?php echo "images/user0".$row['id'].".jpg" ?> class="img-responsive img-circle" style="width: 200px;height: 200px; alt="用户头像">
        </div>
        <div class="col-md-6" style="margin-top: 20px">
            <div class="row">
                <div class="col-md-3">
                    <p><i class="glyphicon glyphicon-pushpin"></i> 编号</p>
                    <p><i class="glyphicon glyphicon-user"></i> 姓名</p>
                    <p><i class="glyphicon glyphicon-earphone"></i> 电话</p>
                    <p><i class="glyphicon glyphicon-plane"></i> 职务</p>
                    <p><i class="glyphicon glyphicon-hand-up"></i> 主要任务</p>
                </div>
                    <p><?php echo $row["id"]?></p>
                    <p><?php echo $row["username"]?></p>
                    <p><?php echo $row["phone"]?></p>
                    <p><?php echo $row["duty"]?></p>
                    <p><?php echo $row["mission"]?></p>
            </div>
        </div>

    </div>
    <?php }?>

</div>
</body>
</html>

