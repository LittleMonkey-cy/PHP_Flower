//是否登录状态，判断cookie;
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}
//返回按钮
window.onload = function () {
    document.getElementById("go_back").onclick = function () {
        window.location.href = './index.html';
    }
}
//收藏功能
document.getElementById('collection_btn').onclick = function () {
    var user_id = getCookie("user_id");

    // 获取客户端的请求的字符串
    var pic_id = getQueryString('pic_id');
    // 将值返回给收藏的程序
    var url = './php/collection.php';
    $.ajax({
        url: url,
        type: 'get',
        data: {
            "user_id": user_id,
            "pic_id": pic_id
        },
        success: function (data) {
            var obj = eval('(' + data + ')');
            //程序运行出现错误时
            if (obj.error) {
                layer.msg(obj.error);
            } else {
                layer.msg('收藏成功');
            }
        }
    });
}
//评论按钮
document.getElementById('comment_submit').onclick = function () {
    var text = document.getElementById('chat_area_textarea').value;
    var user_id = getCookie("user_id");
    var pic_id = getQueryString('pic_id');
    var url = './php/chat.php';
    $.ajax({
        url: url,
        type: 'get',
        data: {
            "user_id": user_id,
            "pic_id": pic_id,
            "text": text
        },
        success: function (data) {
            console.log(data);
            var obj = eval('(' + data + ')');
            if (obj.error) {
                layer.msg(obj.error);
            } else {
                layer.msg('评论成功');
                // 评论成功后清空评论区里边的值
                var text = document.getElementById('chat_area_textarea').value = '';
                // 三秒后页面重新加载
                setTimeout("location.reload()", 3000);
            }
        }
    });
}