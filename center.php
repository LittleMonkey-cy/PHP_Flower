<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>花瓣网-个人中心</title>
  <link rel="stylesheet" href="./src/css/init.css" />
  <link rel="stylesheet" href="./src/css/header.css" />
  <link rel="stylesheet" href="./src/css/loop.css" />
  <link rel="stylesheet" href="./src/css/footer.css" />
  <link rel="stylesheet" href="./src/css/center_page.css" />
  <link rel="stylesheet" href="./src/css/class_table.css" />
  <script src="./src/js/jquery-3.4.1.min.js"></script>
  <script src="./src/js/layer.js"></script>
</head>

<body>
  <!-- 通用导航 -->
  <header mystate="trans">
    <div class="header_warp clearFix">
      <!-- logo -->
      <div class="header_logo fl">
        <a href="#" class="header_logo_a"></a>
      </div>
      <!-- nav -->
      <nav class="header_link fl">
        <ul>
          <li class="header_link_li"><a href="#">最新</a></li>
          <li class="header_link_li"><a href="#">美思</a></li>
          <li class="header_link_li"><a href="#">活动</a></li>
          <li class="header_link_li"><a href="#">教育</a></li>
          <li class="header_link_li"><a href="#">发现</a></li>
        </ul>
      </nav>
      <!-- search -->
      <div class="header_search fl" id="header_search">
        <form action="#" method="POST">
          <input type="text" name="" placeholder="搜索你喜欢的" class="header_search_text" /><input type="button" name="" value="" class="header_search_button" />
        </form>
      </div>
      <!-- 整个用户区域 -->
      <div class="header_user rl">
        <!-- 用户登录动作区域 -->
        <div class="header_user_prelogin" id="header_user_prelogin">
          <button class="header_user_reg" id="header_user_reg">注册</button>
          <button class="header_user_login" id="header_user_login">
            登录
          </button>
        </div>
        <!-- user登录后 -->
        <div class="header_user_logined" id="header_user_logined">
          <ul class="header_user_list" id="header_user_list">
            <li class="user_logo"><span id="user_logo_pic"></span></li>
            <li class="user_action"><a href="#" id="center_a">个人中心</a></li>
            <li class="user_action"><a href="#" id="collection_a">个人收藏</a></li>
            <li class="user_action" id="user_exit_btn">退出登录</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- 登录弹窗 -->
    <div class="login_alert" id="login_alert" style="display: none;">
      <div class="alert_wrap">
        <div class="exit" id="login_exit">
          X
        </div>
        <div class="alert_logo"></div>
        <p>第三方社交软件登录</p>
        <div class="third_login"></div>
        <form action="" method="POST">
          <input type="text" id="login_user_name" name="user_name" placeholder="账号：邮箱或者手机号" autocomplete="off" myerror="myerror" /><input id="login_password" type="password" name="password" placeholder="密码：8位字母和数字组合" myerror="myerror" />
          <div class="code_div clearFix">
            <input type="text" class="fl" id="login_code" name="code" placeholder="输入4位验证码" autocomplete="off" />
            <div class="code_img rl" id="login_code_img" style="
                    width: 100px;
                    height: 30px;
                    line-height: 30px;
                    border: 1px solid red;
                    z-index: 1;
                    margin: 5px auto;
                    background-image: url(../../flower/php/gd.php?8769);
                  " onclick="document.getElementById('login_code_img').style.backgroundImage = 'url(../../flower/php/gd.php?'+Math.ceil(Math.random()*10000)+')';">
            </div>
          </div>
          <div id="go_login">
            <input type="button" id="go_login_btn" value="登&nbsp;&nbsp;&nbsp;录" />
          </div>
        </form>
        <p>还没有账号？还不赶紧去<span id="go_to_reg">注册</span></p>
      </div>
    </div>
    <!-- 注册弹窗-->
    <div class="reg_alert" id="reg_alert" style="display: none;">
      <div class="alert_wrap">
        <div class="exit" id="reg_exit">
          X
        </div>
        <div class="alert_logo"></div>
        <p>第三方社交软件注册</p>
        <div class="third_login"></div>
        <form action="" method="POST">
          <input type="text" id="reg_user_name" name="user_name" placeholder="账号：邮箱或者手机号" autocomplete="off" myerror="myerror" /><input id="reg_password" type="password" name="password" placeholder="密码：8位字母和数字组合" myerror="myerror" />
          <div class="code_div clearFix">
            <input type="text" class="fl" id="reg_code" name="code" placeholder="输入4位验证码" autocomplete="off" />
            <div class="code_img rl" id="reg_code_img" style="
                    width: 100px;
                    height: 30px;
                    line-height: 30px;
                    border: 1px solid red;
                    z-index: 1;
                    margin: 5px auto;
                    background-image: url(../../flower/php/gd.php?8769);
                  " onclick="document.getElementById('reg_code_img').style.backgroundImage = 'url(../../flower/php/gd.php?'+Math.ceil(Math.random()*10000)+')';">
            </div>
          </div>
          <div id="go_reg">
            <input type="button" id="go_reg_btn" name="go_reg_btn" value="注&nbsp;&nbsp;&nbsp;册" />
          </div>
        </form>
        <p>已经有了账号？那就<span id="go_to_login">点击登录</span>吧</p>
      </div>
    </div>
    <!-- 上传弹框 -->
    <div class="alert" id="upload_alert" style="display: none;z-index: 999;">
      <div class="alert_wrap">
        <div class="exit" id="upload_exit">
          X
        </div>
        <div class="alert_logo"></div>
        <form action="./php/upload.php" method="post" id="upload_form" enctype="multipart/form-data">
          <input type="text" name="category" placeholder="分类" id="upload_category" />
          <input type="text" name="title" placeholder="标题" />
          <input type="text" name="detail" placeholder="描述" />
          <!-- 重要属性 -->
          <input type="file" name="file" id="upload_img_file" accept="image/gif,image/jpeg,image/jpg,image/png" enctype="multipart/form-data" style="border: none;" />
          <input type="button" id="upload_btn" value="上 传" style="background-color: #f10;" />
        </form>
      </div>
    </div>
    <!-- 背景锁定 -->
    <div class="lock_div" id="lock_div"></div>
    <!-- header.js引入 -->
    <script src="./src/js/header.js"></script>
  </header>
  <!-- 自定义背景图 -->
  <section class="custom_bg">
    <div class="custom_bg_bottom">
      <div class="user_head_pic"></div>
      <p class="user_nickname">超级管理员</p>
    </div>
  </section>
  <!-- 个人中心信息内容 -->
  <section class="user_info">
    <div class="user_info_menu">
      <button class="user_info_menu_btn user_info_menu_checked" id="user_info_menu_btn" style="border: none; outline:none">个人信息</button>
      <button class="user_collection_menu_btn" id="user_collection_menu_btn" style="border: none;outline:none">我的收藏</button>
    </div>
    <!-- jquery的应用 -->
    <script>
      $(document).ready(function() {
        $('#user_info_menu_btn').click(function() {
          $(this).css('color', 'red')
          $("#user_collection_menu_btn").css('color', 'black');
          $('#user_main_info').css('display', 'block');
          $('#user_main_collection').css('display', 'none');
        });
        $('#user_collection_menu_btn').click(function() {
          $(this).css('color', 'red')
          $("#user_info_menu_btn").css('color', 'black');
          $('.user_main_info').css('display', 'none');
          $('.user_main_collection').css('display', 'block');
        });
      });
    </script>
    <div class="user_info_area">
      <!-- 个人信息部分 -->
      <div class="user_main_info" id="user_main_info">
        <form action="#" method="POST">
          <table>
            <tbody>
              <!-- 每一行的内容 -->
              <!-- 账号 -->
              <tr>
                <td>
                  <label>登录账号</label>
                </td>
                <td>
                  <input type="text" name="user_name" class="user_login_name" placeholder="鹏飞九万里" />
                </td>
                <td><button>修改</button></td>
              </tr>
              <!-- 密码 -->
              <tr>
                <td>
                  <label>登录密码</label>
                </td>
                <td><input type="password" name="password" class="user_login_password" /></td>
                <td><button>修改</button></td>
              </tr>
              <!-- 用户性别 -->
              <tr>
                <td>
                  <label>用户性别</label>
                </td>
                <td>
                  <label for="male">
                    <input type="radio" name="sex" value="male" id="male" />男
                  </label>
                  <label for="female">
                    <input type="radio" name="sex" value="female" id="female" />女
                  </label>
                </td>
                <td><button>修改</button></td>
              </tr>
              <!-- 上传头像 -->
              <tr>
                <td>
                  <label>上传头像</label>
                </td>
                <td>
                  <input type="file" name="user_pic" />
                </td>
                <td>
                  <button>修改</button>
                </td>
              </tr>
              <!-- 所在地 -->
              <tr>
                <td>
                  <label>常用地址</label>
                </td>
                <td>
                  <input type="text" name="address" />
                </td>
                <td>
                  <button>修改</button>
                </td>
              </tr>
              <!-- 电话号码 -->
              <tr>
                <td>
                  <label>绑定手机</label>
                </td>
                <td>
                  <input type="text" name="phone_number" />
                </td>
                <td>
                  <button>修改</button>
                </td>
              </tr>
              <!-- 个性签名 -->
              <tr>
                <td>
                  <label>个性签名</label>
                </td>
                <td>
                  <textarea name="sign"></textarea>
                </td>
                <td>
                  <button>修改</button>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
      <!-- 个人收藏部分 -->
      <div class="user_main_collection clearFix" id="user_main_collection">
        <!-- 素材单元 -->
        <div class="user_main_collection_unit fl">
          <!-- unit作品区域 -->
          <!-- 素材与标题区域 -->
          <div class="collection_unit_works">
            <a href="#">
              <div class="workers_pic"></div>
              <div class="workers_title">幸福来敲门</div>
            </a>
          </div>
          <!-- 提供者与时间 -->
          <div class="collection_unit_info">
            <div class="owner_head_pic"></div>
            <div class="owner_info">
              <p>来自于<a href="#">明天还会更好</a>提供</p>
              <p>2019-12-31</p>
            </div>
          </div>
        </div>
        <div class="user_main_collection_unit fl">
          <!-- unit作品区域 -->
          <!-- 素材与标题区域 -->
          <div class="collection_unit_works">
            <a href="#">
              <div class="workers_pic"></div>
              <div class="workers_title">幸福来敲门</div>
            </a>
          </div>
          <!-- 提供者与时间 -->
          <div class="collection_unit_info">
            <div class="owner_head_pic"></div>
            <div class="owner_info">
              <p>来自于<a href="#">鹏飞九万里</a>提供</p>
              <p>2019-12-31</p>
            </div>
          </div>
        </div>
        <div class="user_main_collection_unit fl">
          <!-- unit作品区域 -->
          <!-- 素材与标题区域 -->
          <div class="collection_unit_works">
            <a href="#">
              <div class="workers_pic"></div>
              <div class="workers_title">幸福来敲门</div>
            </a>
          </div>
          <!-- 提供者与时间 -->
          <div class="collection_unit_info">
            <div class="owner_head_pic"></div>
            <div class="owner_info">
              <p>来自于<a href="#">who</a>鹏飞九万里</p>
              <p>2019-12-31</p>
            </div>
          </div>
        </div>
        <div class="user_main_collection_unit fl">
          <!-- unit作品区域 -->
          <!-- 素材与标题区域 -->
          <div class="collection_unit_works">
            <a href="#">
              <div class="workers_pic"></div>
              <div class="workers_title">幸福来敲门</div>
            </a>
          </div>
          <!-- 提供者与时间 -->
          <div class="collection_unit_info">
            <div class="owner_head_pic"></div>
            <div class="owner_info">
              <p>来自于<a href="#">鹏飞九万里</a>提供</p>
              <p>2019-12-31</p>
            </div>
          </div>
        </div>
        <div class="user_main_collection_unit fl">
          <!-- unit作品区域 -->
          <!-- 素材与标题区域 -->
          <div class="collection_unit_works">
            <a href="#">
              <div class="workers_pic"></div>
              <div class="workers_title">幸福来敲门</div>
            </a>
          </div>
          <!-- 提供者与时间 -->
          <div class="collection_unit_info">
            <div class="owner_head_pic"></div>
            <div class="owner_info">
              <p>来自于<a href="#">鹏飞九万里</a>提供</p>
              <p>2019-12-31</p>
            </div>
          </div>
        </div>
        <div class="user_main_collection_unit fl">
          <!-- unit作品区域 -->
          <!-- 素材与标题区域 -->
          <div class="collection_unit_works">
            <a href="#">
              <div class="workers_pic"></div>
              <div class="workers_title">幸福来敲门</div>
            </a>
          </div>
          <!-- 提供者与时间 -->
          <div class="collection_unit_info">
            <div class="owner_head_pic"></div>
            <div class="owner_info">
              <p>来自于<a href="#">鹏飞九万里</a>提供</p>
              <p>2019-12-31</p>
            </div>
          </div>
        </div>
        <div class="user_main_collection_unit fl">
          <!-- unit作品区域 -->
          <!-- 素材与标题区域 -->
          <div class="collection_unit_works">
            <a href="#">
              <div class="workers_pic"></div>
              <div class="workers_title">幸福来敲门</div>
            </a>
          </div>
          <!-- 提供者与时间 -->
          <div class="collection_unit_info">
            <div class="owner_head_pic"></div>
            <div class="owner_info">
              <p>来自于<a href="#">鹏飞九万里</a>提供</p>
              <p>2019-12-31</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 循环添加背景图片 -->
    <script>
      var nums = $('.workers_pic');
      for (var j = 0; j < nums.length + 1; j++) {
        $(nums[j]).css({
          "background-image": "url(./src/user_collection/" + (j + 1) + ".png)",
          "backgroundSize": "cover;"
        });

      }
    </script>
  </section>
  <!-- 通用页尾 -->
  <footer>
    <!-- 友情连接 -->
    <div class="footer_links">
      <!-- 水平居中 -->
      <div class="footer_links_wrap clearFix">
        <!-- left -->
        <div class="footer_links_leftPart fl">
          <!-- first -->
          <div class="desc">
            <h4 class="footer_links_head">花瓣首页</h4>
            <ul class="footer_links_ul">
              <li><a href="#">花瓣采集工具</a></li>
              <li><a href="#">花瓣官方微博</a></li>
            </ul>
          </div>
          <!-- second -->
          <div class="desc">
            <h4 class="footer_links_head">联系与合作</h4>
            <ul class="footer_links_ul">
              <li><a href="#">联系我们</a></li>
              <li><a href="#">用户反馈</a></li>
              <li><a href="#">花瓣logo标准文档</a></li>
            </ul>
          </div>
          <!-- third -->
          <div class="desc">
            <h4 class="footer_links_head">移动客户端</h4>
            <ul class="footer_links_ul">
              <li><a href="#">花瓣iPhone版</a></li>
              <li><a href="#">花瓣Android版</a></li>
              <li><a href="#">花瓣HD</a></li>
            </ul>
          </div>
        </div>
        <!-- right -->
        <div class="footer_links_rightPart rl">
          <div class="desc">
            <h4 class="footer_links_head">关注我们</h4>
            <p>新浪微博：@花瓣网</p>
            <p>官方QQ：188126952</p>
            <p><a href="#" class="attestation"></a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- 版权信息 -->
    <div class="footer_copyright">
      <div>
        <a href="#"><span>&copy;Huaban杭州纬聚网络有限公司</span></a>
        <span>|</span>
        <span><a href="#">浙江公网安备33010602001878号</a></span>
      </div>
    </div>
  </footer>
  <!-- 返回顶部 -->
  <section id="go_to_top" class="go_to_top" style="
        display: none;
        position: fixed;
        right: 20px;
        bottom: 60px;
        width: 50px;
        cursor: pointer;
        height: 50px;
        line-height: 50px;
        text-align: center;
        background-color: #eee;
        color: #000;
        font-size: 14px;
        font-weight: 700;
        border: 2px solid #aaa;
        border-radius: 6px;
      ">
    👆
  </section>
  <!-- 上传 -->
  <section id="upload" class="upload" style="
        display: none;
        position: fixed;
        right: 20px;
        bottom: 120px;
        width: 50px;
        cursor: pointer;
        height: 50px;
        line-height: 50px;
        text-align: center;
        background-color: #eee;
        color: #000;
        font-size: 14px;
        font-weight: 700;
        border: 2px solid #aaa;
        border-radius: 6px;
      ">
    上传
  </section>
</body>

</html>