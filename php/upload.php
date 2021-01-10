<?php
require('./mysqli.php');
//设置自动返回js
$js = <<< JS
    <script type="text/javascript">
        setTimeout(function() {
          self.location=document.referrer;
        },3000);
    </script>    
JS;
// 验证上传数据
if (isset($_POST['category']) && isset($_FILES['file'])) {
	// 判断登录状态
	if (isset($_COOKIE['user_id'])) {
		// 验证图片文件
		// var_dump($_FILES);
		if ($_FILES['file']['error'] != 0) {
			die('文件上传失败 服务器最大上传7M:' . $_FILES['file']['error']);
		}
		// 取出文件后缀 explode:把字符串打散为数组
		$x = explode("image/", $_FILES['file']['type']);
		$x = $x[1];
		// 判断上传图片格式类型
		$arr = array('jpeg', 'jpg', 'gif', 'png');
		$isFind = false;
		for ($i = 0; $i < count($arr); $i++) {
			if ($x == $arr[$i]) {
				$isFind = true;
				break;
			}
		}
		if ($isFind == false) {
			die("上传类型不符合要求,请上传'jpeg','jpg','gif'类型格式图片");
		}
		// 写入文件
		$cate = $_POST['category'] ? $_POST['category'] : '其他';
		$title = $_POST['title'] ? $_POST['title'] : "无标题";
		$detail = $_POST['detail'] ? $_POST['detail'] : "无描述";
		$user_id = $_COOKIE['user_id'];
		// 格式化时间戳
		// $time = date('Y-m-d h:i:s', time()); 
		//uniqid() 函数基于以微秒计的当前时间，生成一个唯一的 ID。
		$tmp_name = $_FILES['file']['tmp_name'];
		$new_name = md5($user_id) . uniqid() . '.' . $x;
		// 移动保存副本
		move_uploaded_file($tmp_name, '../src/user_images/' . $new_name);
		// 插入
		$db = mysqli();
		$sql = 'insert into pic (pic_category  ,pic_title ,pic_detail,pic_file) values (\'' . $cate . '\',\'' . $title . '\',\'' . $detail . '\',\'' . $new_name . '\')';
		// echo $sql;
		mysqli_query($db, $sql);
		if (mysqli_affected_rows($db)) {
			// 返回主页
			// header("Location: ../index.php");
			// self.location = document.referrer;
			$m = "上传成功 三秒后返回";
		} else {
			$m = "上传失败 三秒后返回";
		}
		echo "<hr>", $m, "<hr>";
		echo $js;
	}
} else {
	die('上传内容不符合要求,缺少必要数据');
}
