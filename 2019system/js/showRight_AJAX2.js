$(function() {
    $("#povertyInfo li").on("click", "a", function() {
        var sId = $(this).data("id"); //获取data-id的值
        console.log("this is a id name...")
        console.log(sId)
        window.location.hash = sId; //设置锚点
        console.log(window.location.hash)
        loadInner(sId);
    });

    function loadInner(sId) {
        var sId = window.location.hash;
        var pathn, i;

        switch(sId) {
            case "#DZX":
                pathn = "povertyInformation/DZX.php";
                i = 0;
                break;
            case "#HQ":
                pathn = "povertyInformation/HQ.php";
                i = 1;
                break;
            case "#SBB":
                pathn = "povertyInformation/SBB.php";
                i = 2;
                break;
            case "#WJW":
                pathn = "povertyInformation/WJW.php";
                i = 3;
                break;
            case "#XJ":
                pathn = "povertyInformation/XJ.php";
                i = 4;
                break;
            // default:
            //     pathn = "systemManage/welcome.html";
            //     i = 0;
            //     break;
        }
        $("#rightContent").load(pathn); //加载相对应的内容
        // $(".userMenu li").eq(i).addClass("current").siblings().removeClass("current"); //当前列表高亮
    }
    var sId = window.location.hash;
    // console.log(sId)
    loadInner(sId);
});
