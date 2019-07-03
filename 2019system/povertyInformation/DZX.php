
<?php
include_once ("../DB/dbConnect.php");
$sqlStr = "select * from people where address = '洞子溪'";
$result = mysqli_query($link, $sqlStr);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>贫困户人员信息</title>
    <script src="js/jquery-2.1.4.js"></script>
    <!--    让列表可拖动的插件-->
    <script src="js/colResizable-1.6.min.js"></script>
    <script type="text/javascript">
        $(function() {
            // $("table").colResizable(
            //     resizeMode:'flex'
            // );

            $(".modify_pwd_td").on("click",".del_a",function(){

                var del_id=$(this).attr("id");
                if(window.confirm('你确定要刪除吗？')) {


                    $.ajax({
                        url: "povertyInformation/del_people.php",
                        type: "get",
                        dataType: "json",
                        data: {"del_id": del_id},
                        success: function (data) {
                            // var str = data.log_task + data.log_time + data.log_people;
                            alert("删除成功");
                            // alert(data.id);
                            window.location.href = window.location.href;


                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(textStatus);
                        }
                    });
                }


            });



        });


    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4 col-md-pull-1">
            <form  method="get" class="form-inline" action="povertyInformation/search.php">
                <div class="input-group-sm">
                    <input type="text"  name="searchKey" class="form-control input-lg" >
                    <input type="submit"  class="btn btn-primary" value="搜索"></input>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-condensed table-hover table-bordered table-striped"  align="center" cellpadding="5">
            <caption>贫困户人员信息<a href="povertyInformation/add_people.php"> =>新增人员</a></caption>
            <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>身份证号</th>
                <th>生日</th>
                <th>电话</th>
                <th>进入系统年度</th>
                <th>帮扶干部</th>
                <th>地址</th>
                <th>个人情况</th>
                <th>操作</th>
            </tr>

            <?php
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  //每读出一条数据就加一行<tr>
            {
                ?>
                <tr>
                    <td><?php echo $row["id"]?></td>
                    <td><a href="povertyInformation/detail_info.php?id=<?php echo $row["IDcard"]?> "><?php echo $row["name"]?></a></td>
                    <td><?php echo $row["sex"]?></td>
                    <td><?php echo $row["IDcard"]?></td>
                    <td><?php echo $row["birthday"]?></td>
                    <td><?php echo $row["telphone"]?></td>
                    <td><?php echo $row["createTime"]?></td>
                    <td><?php echo $row["help_people"]?></td>
                    <td><?php echo $row["address"]?></td>
                    <td style="overflow: auto; white-space:nowrap;"><?php echo $row["introduce"]?></td>
                    <td class="modify_pwd_td"><a href="povertyInformation/modify_info.php?id=<?php echo $row['id']?> " class="btn btn-primary" style="padding: 3px 8px" >修改</a>
                        <!--                <a id="del" href="povertyInformation/del_people.php?id=--><?php //echo $row['id']?><!--" class=" btn btn-danger" style="padding: 3px 8px" >删除</a>-->
                        <a id="<?php echo $row['id']?>" href="#" class="del_a btn btn-danger" style="padding: 3px 8px" >删除</a>
                    </td>
                </tr>
            <?php }?>

        </table></div>
</div>


</body>
</html>

