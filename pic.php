<?php
require('./php/mysqli.php');
if (isset($_GET['pic_id'])) {
    $db = mysqli();
    $sql = 'select * from pic where pic_id = ' . $_GET['pic_id'];
    // echo ($sql);
    $res = mysqli_query($db, $sql);
    $arr = mysqli_fetch_assoc($res);
    var_dump($arr_1);
    // die();
    $title = $arr['pic_title'];
    $user_id = $arr['pic_user_id'];
    $pic_time = $arr['pic_time'];

    $sql = 'select * from user where user_id = ' . $user_id . ';';
    $res = mysqli_query($db, $sql);
    $arr = mysqli_fetch_assoc($res);
    $owner_logo = $arr['user_pic_name'];
    $owner_name = $arr['user_name'];
    // 设定展示区域默认图片和资源路径
    $default_pic = "./src/img/default_pic.png";
    $default_path = "./src/user_images/";
    // 右侧评论区
    // 默认用户头像
    $default_logo_pic = "./src/img/default_user_logo.jpg";
} else {
    die('图片不存在');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>花瓣-素材-素材名</title>
    <link rel="stylesheet" href="./src/css/init.css">
    <link rel="stylesheet" href="./src/css/header.css">
    <link rel="stylesheet" href="./src/css/footer.css">
    <link rel="stylesheet" href="./src/css/pic_page.css">
    <!-- jQuery必须 -->
    <script src="./src/js/jquery-3.4.1.min.js"></script>
    <script src="./src/js/layer.js"></script>
</head>

<body>
    <!-- header上部 -->
    <header mystate='trans'>
        <div class="header_warp">
            <!-- logo -->
            <div class="header_logo">
                <a href="#" class="header_logo_a"></a>
            </div>
            <nav class="header_link">
                <ul>
                    <a href="http://localhost/flower_1/" class="header_link_li">
                        <li>发现</li>
                    </a>
                    <a href="#" class="header_link_li">
                        <li>最新</li>
                    </a>
                    <a href="#" class="header_link_li">
                        <li>美素</li>
                    </a>
                    <a href="#" class="header_link_li">
                        <li>活动</li>
                    </a>
                    <a href="#" class="header_link_li">
                        <li>教育</li>
                    </a>

                </ul>
            </nav>
            <!-- search -->
            <div class="header_search" id="header_search">
                <form method="get" target="todo">
                    <input type="text" name="keyword" class="header_search_text" placeholder="搜索你喜欢的"><input type="button" name="" value="" class="header_search_button">
                </form>
            </div>
            <!-- user整个用户区域-->
            <div class="header_user">
                <!-- 用户登录动作区域 -->
                <div class="header_user_prelogin" id="header_user_prelogin">
                    <button class="header_user_reg_btn" id="header_user_reg_btn">注册</button>
                    <button class="header_user_login_btn" id="header_user_login_btn">登录</button>
                </div>
                <!-- user登录后 -->
                <div class="header_user_logined" id="header_user_logined">
                    <ul class="header_user_list">
                        <li class="user_logo">
                            <div id="header_user_logo_pic"></div>
                        </li>
                        <li class="user_action"><a href="#" id="center_a">个人中心</a></li>
                        <li class="user_action"><a href="#" id="collection_a">我的收藏</a></li>
                        <li class="user_action"><a href="#" id='user_exit_btn'>退出登录</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- 登录弹窗-->
    <div class="alert" id="login_alert" style="display: none;">
        <div class="alert_wrap">
            <div class="exit" id="login_exit">
                <a href="#">X</a>
            </div>
            <div class="alert_logo"></div>
            <p>第三方社交软件登录</p>
            <div class="third_login"></div>
            <form action="" method="GEt">
                <input type="text" name="user_name" id="login_user_name" placeholder="账号:邮箱或手机号" autocomplete="off" myerror='myerror'>
                <input type="password" name="pwd" id="login_pwd" placeholder="密码:15位字母数字组合">
                <div class="code_div">
                    <input type="text" name="code" id="login_code" placeholder="验证码:" autocomplete="off" myerror='myerror'>
                    <div class="code_img" id="login_code_img" style="width: 100px;height: 30px;background-image:url('./src/php/gd.php');" onclick="document.getElementById('login_code_img').style.backgroundImage='url(./src/php/gd.php?0000'+Math.ceil(Math.random()*10000)+')';"></div>
                </div>
                <input type="button" id="go_login_btn" value="登录">
            </form>
            <p>还没有账号？<a href="#" id="go_to_reg">点击注册</a></p>
        </div>
    </div>
    <!-- 注册弹窗 -->
    <div class="alert" id="reg_alert" style="display: none;">
        <div class="alert_wrap">
            <div class="exit" id="reg_exit">
                <a href="#">X</a>
            </div>
            <div class="alert_logo"></div>
            <p>第三方社交软件注册</p>
            <div class="third_login"></div>
            <form action="" method="GET">
                <input type="text" name="user_name" id="reg_user_name" placeholder="账号:邮箱或手机号" autocomplete="off">
                <input type="password" name="pwd" id="reg_pwd" placeholder="密码:15位字母数字组合">
                <div class="code_div">
                    <input type="text" name="code" id="reg_code" placeholder="验证码:" autocomplete="off">
                    <div class="code_img" id="reg_code_img" style="width: 100px;height: 30px;background-image:url('./src/php/gd.php');" onclick="document.getElementById('reg_code_img').style.backgroundImage='url(./src/php/gd.php?0000'+Math.ceil(Math.random()*10000)+')';"></div>
                </div>
                <input type="button" id="go_reg_btn" value="注册">
            </form>
            <p>已经有账号？<a href="#" id="go_to_login">点击登录</a></p>
        </div>
    </div>
    <!-- 上传弹窗-->
    <div class="alert" id="upload_alert" style="display: none;">
        <div class="alert_wrap">
            <div class="exit" id="upload_exit">
                <a href="#">X</a>
            </div>
            <div class="alert_logo"></div>
            <form action="./src/php/upload.php" method="POST" enctype="multipart/form-data" id="upload_form">
                <input type="text" name="category" placeholder="分类" id="upload_category">
                <input type="text" name="title" placeholder="标题">
                <input type="text" name="detail" placeholder="描述">
                <input type="file" name="file" id="upload_img_file" accept="image/*">
                <input type="button" id="upload_btn" value="上传">
            </form>
        </div>
    </div>
    <!-- 背景锁 -->
    <div class="lock_div" id="lock_div" style="display: none;"></div>
    <!-- 引入 header.js -->
    <script src="./src/js/header.js"></script>
    </header>
    <div class='for_heaer'></div>
    <!-- 图片展示区域 -->
    <section class="pic_show">
        <!-- 定宽居中包裹 -->
        <div class="pic_show_wrap">
            <!-- 左侧 -->
            <div class="page_left">
                <!-- 上方按钮区域 -->
                <div class="page_left_buttons_area">
                    <button class="collection_btn">收藏</button>
                    <button class="go_back_btn" onclick="self.location=document.referrer;">返回</button>
                </div>
                <!-- 中部图片展示区域 -->
                <div class="page_left_pic_area">
                    <!-- 替换图片 与 title -->
                    <img src="<?php echo (isset($arr_1['pic_file'])) ? $default_path . $arr_1['pic_file']
                                    : $default_pic; ?>" alt="图片不存在，或者发生错误请联系管理员" width="550" title="<?php echo $arr['pic_title'] ?>">
                </div>
                <!-- 底部交流讨论区域 -->
                <div class="page_left_chat_area">
                    <form action="./src/php/chat.php" method="POST" id="form_chat">
                        <label>发表你的评论：</label>
                        <input type="hidden" name="pic_id" value="<?php echo $_GET['pic_id']; ?>">
                        <textarea name="chat" id="chat_area_textarea"></textarea>
                        <div class="page_left_chat_submit_wrap">
                            <a onclick="document.getElementById('form_chat').submit()">评论</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- 右侧 -->
            <div class="page_right">
                <!-- 发布者 -->
                <div class="owner_area">
                    <div class="owner_area_pic" style="background-image:url(<?php echo './src/
                    user_logos/' . $owner_logo ?>)"></div>
                    <div class="owner_area_info">
                        <a href="#">
                            <p><?php echo $owner_name ?></p>
                        </a>
                        <p name="time">发布于：<?php echo $pic_time ?></p>
                    </div>
                </div>
                <!-- 记录历史评论区域 -->
                <?php
                // 分页
                // 步进
                $step = 8;
                $page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
                $page_start = ($page - 1) * $step;
                // echo $page_start;

                // 数据库查询
                $db = mysqli();
                $sql = 'select * from chat,user where chat_pic_id=' . $_GET['pic_id'] . ' and user_id = chat_user_id order by chat_time desc limit ' . $page_start . ',' . $step;
                // die($sql);
                $res = mysqli_query($db, $sql);
                while ($arr = mysqli_fetch_assoc($res)) {
                ?>
                    <div class="recode_area">
                        <div class="recode_unit">
                            <div class="recode_unit_left">
                                <div class="recode_unit_pic" style="background-image:url(<?php echo './src/user_logos/' . $arr['user_pic_name']; ?>)"></div>
                            </div>
                            <div class="recode_unit_right">
                                <div class="recode_unit_content"><?php echo $arr['chat_data']; ?></div>
                                <div class="recode_unit_time">
                                    <div class="recode_chat_name"><?php echo $arr['user_name']; ?></div>
                                    <div class="recode_chat_time"><?php echo $arr['chat_time']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- 循环结束 生成分页按钮 -->
                <div style="height:50px;line-height:50px;text-align:center;">
                    <a href="?page=<?php echo ($page - 1) > 1 ? ($page - 1) : 1; ?>&pic_id=<?php echo $_GET['pic_id']; ?>">上一页</a>
                    <a href="?page=<?php echo ($page - 1); ?>&pic_id=<?php echo $_GET['pic_id']; ?>">下一页</a>
                </div>
            </div>
        </div>
    </section>
    <!-- 尾部 -->
    <footer>
        <!-- links -->
        <div class="footer_links">
            <!-- 水平居中 -->
            <div class="footer_links_wrap">
                <!-- left部分 -->
                <div class="footer_links_left_part">
                    <!-- 第一列 -->
                    <ul class="footer_links_ul">
                        <li class="footer_links_li_head">花瓣首页</li>
                        <li>采集工具</li>
                        <li>官方博客</li>
                    </ul>
                    <!-- 第二列 -->
                    <ul class="footer_links_ul">
                        <li class="footer_links_li_head">联系合作</li>
                        <li>联系我们</li>
                        <li>用户反馈</li>
                        <li>logo文档</li>
                    </ul>
                    <!-- 第三列 -->
                    <ul class="footer_links_ul">
                        <li class="footer_links_li_head">移动客户端</li>
                        <li>iPhone版本</li>
                        <li>Android版本</li>
                    </ul>
                </div>
                <!-- right部分 -->
                <div class="footer_links_right_part">
                    <ul class="footer_links_ul">
                        <li>关注我们</li>
                        <li>微博账号</li>
                        <li>腾讯账号</li>
                        <li id="shiming"></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- copy版权部分 -->
        <div class="footer_copyright">
            <a href=""><span>&copyHuaban 杭州位聚网络有限公司</span></a>
            <span>|</span>
            <a href=""><span>宇宙公网入网许可证 18703231041号</span></a>
        </div>
    </footer>
    <!-- 快速置顶 -->
    <section id="go_to_top" style=" display: none; display:visibility ;position: fixed;right: 20px;bottom: 120px;
	width: 50px;height: 50px;line-height: 50px;background-color: #EEE;color: black; 
	font-size: 14px;font-weight: bold;text-align: center;border: 1px solid #aaa; border-radius: 4px;cursor: pointer;">
        👆
    </section>
    <section id="upload" style="display: none; display:visibility ;position: fixed;right: 20px;bottom: 60px;
	width: 50px;height: 50px;line-height: 50px;background-color: #EEE;color: black; 
	font-size: 14px;font-weight: bold;text-align: center;border: 1px solid #aaa; border-radius: 4px; cursor: pointer;">
        上传
    </section>
</body>

</html>