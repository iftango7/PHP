<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录页面</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <style>
        .wrap1 {
            position: absolute;
            top: -180px;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
        }
        .main_content {
            /*background: url(images/main_bg.png) repeat;*/
            margin-left: auto;
            margin-right: auto;
            text-align: left;
            float: none;
            border-radius: 8px;
        }

        @media (min-width: 768px){
            #btn-login{ margin-left: 40px}
            .pd-sm-50{padding:50px;}
            .wrap1{
                top: 0px;
            }
            #capatcha_img{
                top:-9px;
            }
        }
        @media (min-width:300px){
            .pd-xs-20{padding:20px;}


        }


    </style>
</head>
<body >
<div class="container wrap1" style="height:450px;">

    <div class="col-sm-8 col-md-5 center-auto pd-sm-50 pd-xs-20 main_content">
        <h2 class="mg-b20 text-center" >贫困户管理系统</h2>
        <p class="text-center font16">用户登录</p>
        <form id="info" method="post" action="verify.php" >
            <div class="form-group form-inline">
                <label class="label-font text-primary " > 账 号:</label>
                <input type="text" name = "username" class="form-control" id="user" placeholder="账号:" required>

            </div>
            <div class="form-group form-inline">
                <label class="label-font text-primary"> 密 码:</label>
                <input type="password" name = "password" class="form-control" id="pass" for="inputPassword" placeholder="密码:" required>
            </div>

            <div class="from-group form-inline">

                <label class="label-font text-primary " > 验证码:</label>
                <span id="position_img">
                <input type="text" class="form-control" id="validateCode" name = "authcode" placeholder="验证码:" required>
                <br/>

                <img id="capatcha_img" src = "verificationCode.php?r=<?php echo rand();?>">
                </span>
                <a href = "javascript:void(0)"
                    onclick = "document.getElementById('capatcha_img').src = 'verificationCode.php?r='+Math.random()">换一张图片...
                </a>
            </div>
            <div class="from-group form-inline">

                <input class=" btn btn-info " type="submit" id="btn-login"  value="登录" name = "submit"></input>
                <input class="btn btn-info " type="reset"  id="btn-reset"  value="清空"></input>
            </div>
        </form>
    </div>
</div>
<script src="dist/js/bootstrap.js">

</script>
</body>
</html>