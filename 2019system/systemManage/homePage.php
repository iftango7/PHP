<?php
include_once ("../DB/dbConnect.php");
$sqlStr = "select * from news";
$result = mysqli_query($link, $sqlStr);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>主页</title>
    <script>
        $(function () {
            $(".list-group a ").on("click","h5",function(){
                var article_id=$(this).attr("id");
                console.log("值=="+article_id);

                $.ajax({
                    url: "systemManage/content.php",
                    type: "get",
                    dataType: "json",
                    data: {"article_id":article_id},
                    success: function (data) {
                        // var str = data.log_task + data.log_time + data.log_people;
                        if(data.id<10000){
                            $("#article_info").replaceWith("<div class='col-md-7' id='article_info'>"+"<h2>"+data.a_title+"</h2>"+ data.article+"</div>");
                        }
                        else {
                            $("#article_info2").replaceWith("<div class='col-md-7' id='article_info2'>"  +data.a_title+ data.article+"</div>");
                        }
                        // alert(data.id);

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("error");
                    }
                });
            });
        });
    </script>

</head>
<body>
<!--containter-fluid让内容充满整个屏幕-->
<div class="containter-fluid">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" style="padding-left: 5px" href="#"><img style="width: 100px; height: 30px;" alt ="logo" src="images/876234.jpg"></a>
        </div>
        <div>
            <ul class="nav  nav-tabs ">
                <li class="active"><a href="#news" data-toggle="pill">新闻资讯</a></li>
                <li><a href="#policyFile" data-toggle="pill">政策文件</a></li>
                <li><a href="#dataDown" data-toggle="pill">贫困户申请文件下载</a></li>

            </ul>
        </div>
    </nav>
    <div class="row tab-content" >
        <div class="tab-pane active" id="news">
            <div class="col-md-7" id="article_info">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="images/c1.jpg" style="width: 680px;height: 300px;" alt="...">
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <div class="item">
                            <img src="images/c2.jpg" style="width: 680px;height: 300px;" alt="...">
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <div class="item">
                            <a href="http://www.baidu.com">
                            <img src="images/c3.jpg" style="width: 680px;height: 300px;" alt="...">
                            <div class="carousel-caption">

                            </div>
                            </a>
                        </div>


                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-5" >
                        <ul class="list-group">
                            <?php
                            $article_count = 0;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  //每读出一条数据就加一行<tr>
                            {
                            ?>
                            <a  href="#" class="list-group-item">
                                <span class="badge" style="background-color: #7b9de6"><?php echo $row["pubTime"]?> </span>

                                <h5 id=<?php echo $row["id"]?> class="list-group-item-heading"><?php echo substr($row["title"],0,66)?></h5>

<!--<p class="list-group-item-text">--><?php //echo substr($row["article"],0,20)?><!--</p>-->

                            </a>
                            <!--让新闻资讯值显示前10篇文章-->
                            <?php $article_count++;
                            if ($article_count>10){
                                break;
                            }
                            }?>
                        </ul>


            </div>
            <div class="col-md-1" ></div>
        </div>
        <div class="tab-pane" id="policyFile">
            <div class="row">

                <ul class="col-md-5 list-group" style="padding-left: 30px">
                    <?php
                    $sqlStr2 = "select * from policy";
                    $result2 = mysqli_query($link, $sqlStr2);
                    while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))  //每读出一条数据就加一行<tr>
                    {
                        ?>
                        <a href="#" class="list-group-item">
                            <span class="badge" style="background-color: #7b9de6"><?php echo $row2["pubtime"]?> </span>

                            <h5 id=<?php echo $row2["id"]?> class="list-group-item-heading"><?php echo substr($row2["title"],0,63)?></h5>

                            <!--                                <p class="list-group-item-text">--><?php //echo substr($row["article"],0,20)?><!--</p>-->

                        </a>
                    <?php }?>
                </ul>
                <div class="col-md-7" id="article_info2"></div>
            </div>
        </div>
        <div class="tab-pane" id="dataDown">
                <a href = "systemManage/downFile.php?f=贫困户信息登记表" download>
                    贫困户信息登记表.docx
                </a><br>
                <a href = "systemManage/downFile.php?f=贫困户子女情况证明表" download>
                    贫困户子女情况证明表.docx
                </a>
        </div>

    </div>
</div>
</body>
</html>