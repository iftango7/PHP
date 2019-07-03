<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加信息</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>

</head>
<body>

<div>
    <div class="container">

        <h1 class="text-center">添加信息</h1>
        <hr/>
        <form method="post" action="add_action.php" style="width: 30%;margin-left: 35%;">
            <input type="hidden" name="id" >
            <div class="form-group">
                <label>姓名</label>
                <input autofocus type="text" class="form-control" name="name" >
                <span aria-hidden="true"></span>
            </div>

            <div class="form-group">
                <label>性别</label>
                <select class="form-control" name="sex">
                    <option  selected="selected"  value="男">男</option>
                    <option  value="女">女</option>
                </select>
            </div>

            <div class="form-group">
                <label>身份证号</label>
                <input type="text" class="form-control" name="IDcard" >
                <span aria-hidden="true"></span>
            </div>
            <div class="form-group">
                <label>生日</label>
                <input type="date" class="form-control" name="birthday" >
                <span aria-hidden="true"></span>
            </div><div class="form-group">
                <label>电话</label>
                <input type="text" class="form-control" name="telphone" >
                <span aria-hidden="true"></span>
            </div><div class="form-group">
                <label>创建时间</label>
                <input readonly class="form-control" name="createTime" value="<?php echo date('Y-m-d') ?>">
                <span aria-hidden="true"></span>
            </div><div class="form-group">
                <label>地址</label>
                <select class="form-control" name="address">
                    <option  selected="selected"  value="文家湾">文家湾</option>
                    <option  value="洞子溪">洞子溪</option>
                    <option  value="十八部">十八部</option>
                    <option  value="红桥">红桥</option>
                    <option  value="向家">向家</option>
                </select>
            </div><div class="form-group">
                <label>个人情况</label>
                <textarea  class="form-control" name="introduce" ></textarea>
                <span aria-hidden="true"></span>
            </div>
            <button type="submit" name="sendMessage" class="btn btn-success">提交</button>
            <a href="index.php" class="btn">返回</a>
        </form>
    </div>
</div>


</body>
</html>