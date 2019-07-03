<!DOCTYPE html>
<html>
<head>
	<title>贫困户管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/backpage.css" rel="stylesheet">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

    <style>
        .main-nav.nav-tabs.nav-stacked > li > a{
            color: #126080;
        }
    	.navbar-brand{padding-left:10px;}
    	.container-fluid {
		    padding-right: 0px;
		    padding-left: 0px;}
		.table{
			margin-left: 0px;
		}
        .row{
            padding-right: 0px;
            padding-left: 0px;
            margin-right: 0px; 
            margin-left: 0px;
        }
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
            padding-right: 0px;
            padding-left: 0px;
        }
        .bg-primary{
            background: #1E9FFF;
        }
        .bg-info{
            background: #73b3e4 !important;
        }
          
        @media (min-width:400px){
            
           .container-fluid {
		    /*padding-right: 15px;*/
		    padding-left: 5px;
			
		}
         .row{
             padding-right: 0px;
             padding-left: 15px;
             margin-right: 0px;
             margin-left: -10px;
        }
    
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
            padding-right: 15px;
            /*padding-left: 15px;*/
        }
		.table{
		   	margin-left: 13px;
		}
        .navbar-brand{padding-left:30px;}

        }

    </style>
    
</head>
<!--显示时间-->
<!--<body onload="updateNowTime()">-->
<body>
<?php
	session_start();
	$_SESSION["username"] = "UserInfo";
    $_SESSION["username"] = $_GET["username"];
?>

<!--导航栏-->
<div class="navbar  navbar-static-top" role="navigation">
    <div class="container-fluid bg-primary">
        <div style="float: left">
            <a class="navbar-brand " href="#" id="logo">脱贫攻坚管理系统</a>

        </div>
       <div style="float: right" ><a class="navbar-brand "  href="systemManage/logout.php" > 退出系统&nbsp<i class="glyphicon glyphicon-log-out"></i></a></div>
<!--        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#title_collapse" ></button>-->
    </div>
</div>

<div class="container-fluid ">
    <div class="row">
        <div class="col-md-2 " >
            <ul id="main-nav" class="main-nav nav nav-tabs nav-stacked">
                <li>
                    <a href="#" id="homePage">
                        <i class="glyphicon glyphicon-th-large"></i>
                        <span style="color: #126080;">首页</span>
                    </a>
                </li>
                <li>
                    <a href="#systemSetting" class="nav-header collapsed" data-toggle="collapse">
                        <i class="glyphicon glyphicon-cog"></i>
                        系统管理

                        <span class="pull-right glyphicon glyphicon-chevron-toggle"></span>
                    </a>
                    <ul id="systemSetting" class="nav nav-list secondmenu collapse" style="height: 0px;">
                        <li><a data-id="userManager"><i class="glyphicon glyphicon-user" ></i>&nbsp;用户管理</a></li>
                        <li><a data-id="location_map"><i class="glyphicon glyphicon-map-marker"></i>&nbsp;位置地图</a></li>
                        <li><a data-id="modifyPwd"> <i class="glyphicon glyphicon-asterisk"></i> 修改密码</a></li>
                        <li><a href="#" data-id="logView"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;任务管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#povertyInfo" class="nav-header collapsed" data-toggle="collapse">
                        <i class="glyphicon glyphicon-credit-card"></i>
                        贫困户信息(桃符村)
                        <span class="pull-right glyphicon  glyphicon-chevron-toggle"></span>
                    </a>
                    <ul id="povertyInfo" class="nav nav-list secondmenu collapse">
                        <li class="active"><a data-id="WJW"><i class="glyphicon glyphicon-globe"></i>文家湾</a></li>
                        <li><a data-id="DZX"><i class="glyphicon glyphicon-star-empty"></i>&nbsp;洞子溪</a></li>
                        <li><a data-id="SBB"><i class="glyphicon glyphicon-ok-circle"></i>&nbsp;十八部</a></li>
                        <li><a data-id="HQ"><i class="glyphicon glyphicon-star"></i>红桥</a></li>
                        <li><a data-id="XJ"><i class="glyphicon glyphicon-text-width"></i>&nbsp;向家</a></li>

                    </ul>
                </li>

                <li>
                    <a id ="zhucun" href="#" class="nav-header " >
                        <i class="glyphicon glyphicon-globe"></i>
                        帮扶干部
                    </a>

                </li>

                <li>
                    <a id="worker" href="#" class="nav-header " >
                        <i class="glyphicon glyphicon-bold"></i>
                        工作人员
                    </a>

                </li>
                <li>
                    <a id = "about" href="#">
                        <i class="glyphicon glyphicon-fire"></i>
                        关于系统
                        <span class="badge pull-right">1</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="col-md-10" id="rightContent">

        </div>
    </div>
</div>
</div>

<script src="./js/showRight_AJAX.js"></script>
<script src="./js/showRight_AJAX2.js"></script>


</body>
</html>
