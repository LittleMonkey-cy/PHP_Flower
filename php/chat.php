<?php
// mysql中添加一个chat_data字段
// 设置自动返回js
$js = <<<js
        <script type="text/javascript">
            setTimeout(function(){
                self.location=document.referrer;
            },3000);
        </script>
    js;
// 引入mysqli
require('./mysqli.php');
// if (!isset($_POST['user_id'])) {
//     die('{"error":"请先进行登录！！！"}');
// }
// 接收
if (isset($_POST['chat']) && (!empty($_POST['chat'])) && $_POST['pic_id'] && $_COOKIE['user_id']) {
    // 防止脚本攻击 处理特殊文本
    $data = htmlspecialchars($_POST['chat']);
    // 数据库操作
    $db = mysqli();
    $sql = 'insert into chat (chat_pic_id,chat_user_id,chat_data) values (\'' . $_POST['pic_id'] . '\',\'' . $_COOKIE['user_id'] . '\',\'' . $data . '\');';
    $res = mysqli_query($db, $sql);
    $num = mysqli_affected_rows($db);
    if ($num) {
        $m = "评论成功 三秒后返回";
    } else {
        $m = "评论失败 三秒后返回";
    }
    echo '<hr>', $m, '<hr>';
    echo $js;
} else {
    echo "非法操作，3秒后返回";
    echo $js;
}
