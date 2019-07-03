<?php
$link = mysqli_connect('localhost', 'root', '');

$db_selected = mysqli_select_db($link, 'php');
mysqli_query($link, "set names 'utf8'");//设置MySQL返回的数据字符集
$sqlStr = "select * from work";
$result = mysqli_query($link, $sqlStr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>工作人员信息</title>
    <script src="js/jquery-2.1.4.js"></script>
    

</head>
<body>
<div class="container-fluid">
    <div class="row">
      
       <div class="col-md-8" style="margin-top: 10px">
            <div class="row">
                <table class="table table-condensed table-hover table-bordered table-striped"  align="center" cellpadding="5">
                    <caption>人员信息</caption>
                    <tr>
                        <th><i class="glyphicon glyphicon-th-list"></i> 编号</th>
                        <th><i class="glyphicon glyphicon-user"></i> 姓名</th>
                        <th><i class="glyphicon glyphicon-certificate"></i> 性别 </th>
                        <th><i class="glyphicon glyphicon-earphone"></i> 电话</th>
                        <th><i class="glyphicon glyphicon-thumbs-up"></i> 职务</th>
                        <th><i class="glyphicon glyphicon-home"></i> 包组</th>
                    </tr>

                    <?php
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  //每读出一条数据就加一行<tr>
                    {
                        ?>
                        <tr>
                            <td><?php echo $row["ID"]?></td>
                            <td><?php echo $row["name"]?></td>
                            <td><?php echo $row["sex"]?></td>
                            <td><?php echo $row["Tel"]?></td>
                            <td><?php echo $row["duty"]?></td>
                            <td><?php echo $row["group1"]?></td>
                        </tr>
                    <?php }?>

                </table>
            </div>
        </div>

    </div>


</div>
</body>
</html>

