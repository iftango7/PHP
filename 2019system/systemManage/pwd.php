<!DOCTYPE html>
<html>
<head>
    <title>System</title>
<!--    引入bootstrap.css 文件-->
<!--    <script src="js/jquery.min.js"></script>-->
<!--    <link href="../css/bootstrap.css" rel="stylesheet">-->
    <script>
        $(function () {
            $("#pwd_submit").click(function () {

                // alert(cont);

                var oldPassword=$("input[name='oldPassword']").val();
                var newPassword_01=$("input[name='newPassword_01']").val();
                var newPassword_02=$("input[name='newPassword_02']").val();
                if(oldPassword==""){
                    alert("请输入旧密码");
                }
                if(newPassword_01=="") {
                    alert("请输入新密码");
                }
                if(newPassword_02==""){
                    alert("请输入新密码");
                }

                var cont2 =$("input").serialize();

                if(oldPassword && newPassword_01 && newPassword_02){
                    $.ajax({
                        url:"systemManage/pwd_deal.php",
                        type:"post",
                        dataType:"json",
                        // data:{"oldPassword":oldPassword,"newPassword_01":newPassword_01,"newPassword_02":newPassword_02},
                        data:cont2,
                        success:function(data) {
                            // var str = data.log_task+data.log_time+data.log_people;
                            // alert(data.tid);
                            $("input[name='oldPassword']").val("")
                            $("input[name='newPassword_01']").val("")
                            $("input[name='newPassword_02']").val("")
                            alert(data.info);



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
                }



            });

        });
    </script>
</head>
<body>

<?php
session_start();
?>

<div class = "container-fluid">
    <div class = "row">
        <b>
            <?php
            if(isset($_GET["username"]))
            {
                $_SESSION["username"] = $_GET["username"];
            }
//            echo $_SESSION["username"];
            ?>
        </b>

        <div class="col-md-4 col-md-offset-4">
<!--            <form  method="post" action="--><?php //echo $_SERVER['PHP_SELF'];?><!--" style="margin-top:30px" >-->
            <form  method="post" action="" style="margin-top:30px" >
                <div class="form-group form-inline">
                    <label>旧密码</label>
                    <input type="password" class="form-control" name = "oldPassword" placeholder="旧密码" autocomplete="current-password" >
                </div>
                <div class="form-group form-inline">
                    <label>新密码</label>
                    <input type="password" class="form-control" name = "newPassword_01" placeholder="新密码" autocomplete="current-password">
                </div>
                <div class="form-group form-inline">
                    <label>新密码</label>
                    <input type="password" class="form-control" name = "newPassword_02" placeholder="新密码" autocomplete="current-password">
                </div>


            </form>
            <div class="form-group form-inline" >
                <button type="submit"  class="btn btn-default" style="margin:0 15px;" id="pwd_submit">确认修改</button>
                <button type="reset" class="btn btn-default">清除密码</button>
            </div>

        </div>

    </div>
</div>
</body>
</html>
