$(function() {
    $("#systemSetting li").on("click", "a", function() {
        var sId = $(this).data("id"); //获取data-id的值
        window.location.hash = sId; //设置锚点
        loadInner(sId);//函数调用
    });
    // 首页点击的AJAX 加载
    $("#homePage").on("click", function() {
        $("#rightContent").load("systemManage/homePage.php");
        window.location.hash="";
    });
    //驻村信息点击的AJAX 加载
    $("#zhucun").on("click", function() {
            $("#rightContent").load("zhucun.php");
            window.location.hash="";
        });
    //工作人员点击的AJAX 加载
    $("#worker").on("click", function() {
        $("#rightContent").load("worker.php");
        window.location.hash="";
    });
    //关于点击的AJAX 加载
    $("#about").on("click", function() {
        $("#rightContent").load("about.php");
        window.location.hash="";
    });


    function loadInner(sId) {
        var sId = window.location.hash;
        var pathn, i;

        switch(sId) {
            case "#userManager":
                pathn = "systemManage/userManager.php";
                i = 0;
                break;
            case "#modifyPwd":
                pathn = "systemManage/pwd.php";
                i = 1;
                break;
            case "#logView":
                pathn = "systemManage/logview.php";
                i = 2;
                break;
            case "#location_map":
                pathn = "systemManage/location_map.html";
                i = 3;
                break;
            default:
                pathn = "systemManage/homePage.php";
                i = 4;
                break;
        }
        $("#rightContent").load(pathn); //加载相对应的内容
        // $(".userMenu li").eq(i).addClass("current").siblings().removeClass("current"); //当前列表高亮
    }
    var sId = window.location.hash;
    // console.log(sId)
    loadInner(sId);



});
