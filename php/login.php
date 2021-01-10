<?php
// 调用连接数据库文件
require('./mysqli.php');
// 启动cookie回话 一定放在所有输出之前
session_start();
// 判断接受数据是否为空（空数组）
if (!empty($_POST)) {
    // 参数存在
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['code'])) {
        // 进行格式验证 
        // 验证username
        $name = $_POST['username'];
        $password = $_POST['password'];
        $code = $_POST['code'];
        // 验证码是否存在
        // if ($cosd != $_SESSION['code']) {
        //     die('验证码错误');
        // }
        // 正则格式判断
        // 设定正则字符串
        $email_style = '/^[a-z0-9]+@[a-z0-9]+\.[a-z]+$/';
        $phone_style = '/^1[23578][0-9]{9}$/';
        // $pwd_style_a = '/[0-9]+/';
        // $pwd_style_b = '/[a-z]+/';
        // $pwd_style_c = '/[A-Z]+/';
        // ***************************************************需要做验证码验证
        // 执行数据库验证
        // 1.验证user是否存在 2.验证密码是否正确
        // 验证码留在cookie中，节省资源 登陆后
        // 验证登录方式
        if (preg_match($phone_style, $name)) {
            $where_feild = "user_phone";
        } else {
            if (preg_match($email_style, $name)) {
                $where_feild = "user_email";
            } else {
                die('{error:非法账号格式}');
            }
        }
        // 制作查询sql(拼接)
        $sql = 'select user_password from user where ' . $where_feild . '=\'' . $name . '\'';
        // echo $sql;
        // 调用封装连接
        $db = mysqli();
        //curd
        // 针对$db数据库的查询（要使用的数据库连接，规定要查询的字符串）
        $res = mysqli_query($db, $sql);
        // 判断是否能够抓到一个对象
        // var_dump($res);
        // 抓取单条数据，生成关联数组
        // 从结果集中取得一行作为关联数组：
        $res_arr = mysqli_fetch_assoc($res);
        // var_dump($res_arr);
        // 密码比较，对密码进行加密处理并在登录成功之后返回相应数值
        if (md5($password) == $res_arr['user_password']) {
            // 密码正确时返回值
            // echo 'true';
            // 成功后开始从后台数据库中提取所需数据
            // 拿取数据库中的用户头像
            $sql = "select user_id,user_name,user_logo_name from user where " . $where_feild . " = '" . $name . "'";
            $res = mysqli_query($db, $sql);
            // var_dump($res);
            $res_arr = mysqli_fetch_assoc($res);
            // 把数组数据发送给Ajax接收--json格式
            $back = json_encode($res_arr);
            // 最终返回值
            echo $back;
        } else {
            // 密码错误时返回值
            echo '{"error":"账户或密码错误哦"}';
        }
    } else {
        die('{"error":"参数错误"}');
    }
}
