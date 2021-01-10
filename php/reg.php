<?php
// 调用连接数据库文件
//出现错误后直接断开连接，不再继续向下执行
require('./mysqli.php');
// 判断接受数据是否为空（空数组）
session_start();
// var_dump($_GET);
if (!empty($_POST)) {
	// 参数存在
	// 检查变量是否设置成功
	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['code'])) {
		// 进行格式验证
		// 验证username 
		$name = $_POST['username'];
		$password = $_POST['password'];
		$code = $_POST['code'];
		// //验证码是否存在	
		// if ($code != $_SESSION['code']) {
		// 	die('{error}:验证码错误');
		// }
		// 正则验证	
		$email_style = '/^[a-z0-9]+@[a-z0-9]+\.[a-z]+$/';
		$phone_style = '/^1[23578][0-9]{9}$/';
		$pwd_style = '/^[a-zA-Z0-9]{6,18}$/';
		// $pwd_style_a = '/[0-9]+/';
		// $pwd_style_b = '/[a-z]+/';
		// $pwd_style_c = '/[A-Z]+/';
		// 判断登录方式与登录名
		//执行匹配正则表达式（要搜索的模式，输入字符串）
		if (preg_match($phone_style, $name)) {
			$where_feild = 'user_phone';
		} else {
			if (preg_match($email_style, $name)) {
				$where_feild = "user_email";
			} else {
				die('{error:非法账号格式}');
			}
		}

		if (!preg_match($email_style, $name) && !preg_match($phone_style, $name)) {
			die('{"error":"账号格式错误"}');
		}
		$sql = 'select user_id from user where ' . $where_feild . '=\'' . $name . '\'';
		// echo ($sql);
		$db = mysqli();
		$res = mysqli_query($db, $sql);
		// $res 一定是个对象返回
		$arr = mysqli_fetch_assoc($res);
		// 判断数组是否为空
		if ($arr) {
			die('{"error":"账号已存在"}');
		}
		// 验证密码 错误跳出
		// if (!preg_match($pwd_style_a, $password) || !preg_match($pwd_style_b, $password) || !preg_match($pwd_style_c, $password)) {
		// 	die('{"error":"密码格式错误"}');
		// }
		if (!preg_match($pwd_style, $password)) {
			die('{"error":"密码格式错误"}');
		}

		// 制作查询sql
		$sql = 'insert into user (user_name,' . $where_feild . ',user_password) values (\'user_' . $name . '\',\'' . $name . '\',\'' . md5($password) . '\')';
		// echo ($sql);
		//调用封装好的连接
		$db = mysqli();
		// curd
		mysqli_query($db, $sql);
		// 返回影响行数
		$num = mysqli_affected_rows($db);
		if ($num) {
			echo '{"ok":"ok"}';
		} else {
			// 密码错误返回
			echo '{"error":"创建失败"}';
		}
	}
	// else {
	// 	die('{"error"："参数错误"}');
	// }
}
