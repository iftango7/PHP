<?php
include_once ("../DB/dbConnect.php");
$userID = $_GET["id"];
$sqlStr = "select * from people where id=$userID";
$result = mysqli_query($link, $sqlStr);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//echo $row["introduce"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改信息</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
        .mo_form{
            width: 100%;
            margin-left: 0;

        }
        @media (min-width:400px) {
            .mo_form{
                width: 30%;
                margin-left: 35%;

            }
        }
    </style>


</head>

</head>
<body>

<div>
    <div class="container">

        <h1 class="text-center">修改信息</h1>
        <hr/>
        <form method="post" action="modify_action.php" class="mo_form">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label>姓名</label>
                <input autofocus type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                <span aria-hidden="true"></span>
            </div>

            <div class="form-group">
                <label>性别</label>
                <select class="form-control" name="sex">
                    <option <?php if ($row['sex'] == '男') { ?> selected="selected" <?php } ?> value="男">男</option>
                    <option <?php if ($row['sex'] == '女') { ?> selected="selected" <?php } ?> value="女">女</option>
                </select>
            </div>

            <div class="form-group">
                <label>身份证号</label>
                <input type="text" class="form-control" name="IDcard" value="<?php echo $row['IDcard']; ?>">
                <span aria-hidden="true"></span>
            </div>
            <div class="form-group">
                <label>生日</label>
                <input type="date" class="form-control" name="birthday" value="<?php echo $row['birthday']; ?>">
                <span aria-hidden="true"></span>
            </div><div class="form-group">
                <label>电话</label>
                <input type="text" class="form-control" name="telphone" value="<?php echo $row['telphone']; ?>">
                <span aria-hidden="true"></span>
            </div><div class="form-group">
                <label>创建时间</label>
                <input readonly type="date" class="form-control" name="createTime" value="<?php echo $row['createTime']; ?>">
                <span aria-hidden="true"></span>
            </div><div class="form-group">
                <label>地址</label>
                <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
                <span aria-hidden="true"></span>
            </div><div class="form-group">
                <label>个人情况</label>
                <textarea  class="form-control" name="introduce" ><?php echo $row['introduce']; ?></textarea>
                <span aria-hidden="true"></span>
            </div>


            <button type="submit" name="sendMessage" class="btn btn-success">提交</button>
<!--            <a href="index.php" class="btn">返回</a>-->
        </form>
    </div>
</div>


</body>
</html>