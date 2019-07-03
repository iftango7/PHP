<?php
include_once ("../DB/dbConnect.php");//引入数据库
$sqlStr = "select * from task";
$result = mysqli_query($link, $sqlStr);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .form_border{
            border: 1px solid #30d63a;
            border: 1px solid #30d63a;
            background-color: #a8f3be;
            padding-bottom: 10px;
        }
        .todo{
            list-style: none;


        }
        ul.todo li{
            background: #fff;
            color: #806e7f;
            padding: 15px;

            border-radius: 8px 0 8px 0;
            box-shadow: -2px 2px 4px rgba(41, 10, 77,.5);
            max-height: 65px;
            opacity: 1;
            position: relative;
            margin-bottom: 6px
        }
        #removeF{
            float: right;
            font-size: 24px;
            color: #cc4343c9;
        }
        #removeF:hover{

            font-size: 28px;
            color: red;
        }
    </style>
    <script>
        $(function () {
        $("#send_task").click(function () {

        var cont =$("input").serialize();

            $.ajax({
                url:"systemManage/task_form.php",
                type:"post",
                dataType:"json",
                data:cont,
                success:function(data) {
                    var str = data.log_task+data.log_time+data.log_people;
                    $("#toList").append("<div class='container-fluid'> <ul class='todo'> <li>" + str +"</li> </ul> </div>");

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("error");
                }
            });
        });
            $("ul.todo").on("click","li",function () {
                // var index = $("ul.todo li");
                // alert(index[1]);
                // for(i=0;i<index.length;i++){
                //     index[i].onclick = function(){
                //         alert(index[i]);
                //     }
                // }

                    var index =$(this).children("i:eq(0)").text();
                    // $("#tresult").val($(this).text());


                $.ajax({
                        url:"systemManage/del_task.php",
                        type:"get",
                        dataType:"json",
                        data:{"tid":index},
                        success:function(data) {
                            // var str = data.log_task+data.log_time+data.log_people;
                            alert(data.tid);
                            alert("删除成功");


                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            // alert("error");
                            // alert(jqXHR.statusText);
                            // alert(jqXHR.readyState );
                            alert(textStatus );
                            // alert(XMLHttpRequest.status);
                            // alert(XMLHttpRequest.readyState);
                        }
                    });
            });

            // $("#removeF").click(function () {
            //
            //     var cont =$("input").serialize();
            //     alert($("#task_li i").text());
            //     $.ajax({
            //         url:"systemManage/tast_form.php",
            //         type:"post",
            //         dataType:"json",
            //         data:cont,
            //         success:function(data) {
            //
            //
            //         },
            //         error: function (jqXHR, textStatus, errorThrown) {
            //             alert("error");
            //         }
            //     });
            // });
        });
  </script>



</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form_border" >
                <form id="upload" method="post" action="" >
                    <h3>添加任务</h3>
                    <div class="form-group ">
                        <input type="text" class="form-control" name="log_task" placeholder="任务">
                        <input type="date" class="form-control" name="log_time" placeholder="预计完成时间">
                        <input type="text" class="form-control" name="log_people" placeholder="指定完成人">
                    </div>
                </form>

                <button type="submit" class ="btn btn-primary" id="send_task">添加任务</button>
            </div>
            <div class="col-md-4">
                <div class="row" id="toList">
                    <h4>任务列表:</h4>
                    <ul class="todo">
                    <?php
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  //每读出一条数据就加一行<tr>
                    {
                        ?>

                            <li >
                                <i id="task_id_<?php echo $row['id'];?>"><?php echo $row['id'];?></i>
                                <b style="font-size: large ;margin: 0;padding: 0"><?php echo $row['log_task'];?></b>
                                <span style="color: #00ef8d"><?php echo $row['log_people'];?></span>
                                <i style="font-size: 12px;color: #919a97"><?php echo $row['log_time'];?></i>
                                <i id="removeF" class="glyphicon glyphicon-remove"></i>
                            </li>



                    <?php }?>
                    </ul>


                </div>
            </div>
        </div>

    </div>
</body>



