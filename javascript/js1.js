function click1(){
    alert('歌曲链接已生成！');
}

//页面弹出提示框
function disp_prompt(){
    var comment = prompt("写下你的评论","");
    if (comment!=null && comment!="") {
        alert("发表成功！");

    }
}


var oldKey = "";
var index = -1;
var pos = new Array();//用于记录每个关键词的位置，以方便跳转
var oldCount = 0;//记录搜索到的所有关键词总数

function search() {
    $(".result").removeClass("res");//去除原本的res样式
    var key = $("#key").val(); //取key值
    if (!key) {
        console.log("key为空则退出");
        $(".result").each(function () {//恢复原始数据
            $(this).replaceWith($(this).html());
        });
        oldKey = "";
        return; //key为空则退出
    }
    if (oldKey != key) {
        console.log("进入重置方法");
        //重置
        index = 0;
        $(".result").each(function () {
            $(this).replaceWith($(this).html());
        });
        pos = new Array();
        var regExp = new RegExp(key+'(?!([^<]+)?>)', 'ig');//正则表达式匹配
        $("body").html($("body").html().replace(regExp, "<span id='result" + index + "' class='result'>" + key + "</span>")); // 高亮操作
        $("#key").val(key);
        oldKey = key;
        $(".result").each(function () {
            pos.push($(this).offset().top);
        });
        oldCount = $(".result").length;
        console.log("oldCount值：",oldCount);
    }

    $(".result:eq(" + index + ")").addClass("res");//当前位置关键词改为红色字体

    $("body").scrollTop(pos[index]);//跳转到指定位置
}
function previous(){
    index--;
    index = index < 0 ? oldCount - 1 : index;
    search();
}
function next(){
    index++;
    //index = index == oldCount ? 0 : index;
    if(index==oldCount){
        index = 0 ;
    }
    search();
}