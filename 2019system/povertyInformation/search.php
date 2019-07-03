<?php
include_once ("../DB/dbConnect.php");
$searchKey = $_GET['searchKey'];//获取地址栏 searchKey
$sqlstr = "select * from people where IDcard like '%$searchKey%' or name like '%$searchKey%'";
$result = mysqli_query($link,$sqlstr);//数据库执行，返回结果给result
if(!$result){
    die('无法读取数据库中数据'.mysqli_error());
}
//print_r(mysqli_fetch_array($result)) ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>搜索贫困户人员信息</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            // $("table").colResizable(
            //     resizeMode:'flex'
            // );

            $(".modify_pwd_td").on("click",".del_a",function(){

                var del_id=$(this).attr("id");
                if(window.confirm('你确定要刪除吗？')) {


                    $.ajax({
                        url: "del_people.php",
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
            <div class="table-responsive">
                <table class="table table-condensed table-striped table-bordered table-hover" border="1 solid" rules="all" align="center" cellpadding="5">
                    <caption>贫困户人员信息</caption>
                    <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>身份证号</th>
                <th>生日</th>
                <th>电话</th>
                <th>创建时间</th>
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
                  <td><?php echo $row["name"]?></td>
                  <td><?php echo $row["sex"]?></td>
                  <td><?php echo $row["IDcard"]?></td>
                  <td><?php echo $row["birthday"]?></td>
                  <td><?php echo $row["telphone"]?></td>
                  <td><?php echo $row["createTime"]?></td>
                  <td><?php echo $row["address"]?></td>
                  <td><?php echo $row["introduce"]?></td>
                    <td class="modify_pwd_td"><a href="modify_info.php?id=<?php echo $row['id']?> " class="btn btn-primary" style="padding: 3px 8px" >修改</a>
                        <!--                <a id="del" href="povertyInformation/del_people.php?id=--><?php //echo $row['id']?><!--" class=" btn btn-danger" style="padding: 3px 8px" >删除</a>-->
                        <a id="<?php echo $row['id']?>" href="#" class="del_a btn btn-danger" style="padding: 3px 8px" >删除</a>
                    </td>
                </tr>
                <?php }?>

                  </table>
            </div>
        </div>
</body>