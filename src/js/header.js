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
// console.log(document.cookie);
if (getCookie("user_id")) {
  //登录状态 补全登录信息
  document.getElementById("header_user_prelogin").style.display = "none";
  document.getElementById("header_user_logined").style.display = "block";
  document.getElementById("user_logo_pic").style.backgroundImage =
    "url(./src/user_logos/" + getCookie("user_logo_name") + ")";
  $().ready(function () {
    document.getElementById("upload").style.display = "";
  });
  // // // 更新个人下拉跳转url
  document.getElementById("center_a").href =
    "center.php?user_id=" + getCookie("user_id");
  //   "center.html";

  document.getElementById("collection_a").href =
    "collection.php?id=" + getCookie("user_id");
  //   "class.html";
}

// // 个人头像动效显示下拉
document.getElementById("header_user_logined").onmouseover = function () {
  var arr = document.getElementsByClassName("user_action");
  for (var i = arr.length - 1; i >= 0; i--) {
    arr[i].style.display = "block";
  }
};
document.getElementById("header_user_logined").onmouseout = function () {
  var arr = document.getElementsByClassName("user_action");
  for (var i = arr.length - 1; i >= 0; i--) {
    arr[i].style.display = "none";
  }
};

// 电话号码判断
function isPhone(value) {
  if (value.length == 11) {
    // 不是无穷，就不是NAN
    if (isFinite(value)) {
      return true;
    }
  }
  return false;
}

// console.log(isPhone("12345678911"));
//email判断
function isEmail(value) {
  var atpos = value.indexOf("@");
  var dotpos = value.indexOf(".");
  // console.log(atpos, dotpos);
  if (atpos >= 0 && dotpos >= 0) {
    return true;
  }
  return false;
}

// console.log(isEmail('test@123.com'));
// 验证码判断
function isCode(value) {
  if (value.length == 4) {
    // 不是无穷，就不是NAN
    if (isFinite(value)) {
      return true;
    }
  }
  return false;
}

// console.log(isCode('1234'));
// 绑定事件
// 添加账号登录的验证事件
function check_username(id) {
  document.getElementById(id).onblur = function () {
    if (isPhone(this.value) || isEmail(this.value)) {
      // 正确的手机号和邮箱账号
      this.style.color = "green";
    } else {
      // 错误输入
      this.style.color = "red";
      alert("用户名格式问题，请仔细检查");
      layer.msg("不正确的输入");
      // 标志位
      this.setAttribute("myerror", "myerror");
    }
  };
  document.getElementById(id).onfocus = function () {
    if (this.getAttribute("myerror")) {
      this.removeAttribute("myerror");
      // this.setAttribute('myerror', '0');
      this.style.color = "black";
      this.value = "";
    }
  };
}

// check_upload 检查上传数据完整性
function check_upload() {
  // 分类不可空
  if (!document.getElementById("upload_category").value) {
    layer.msg("分类名称为空");
  } else {
    // 判断是否选择了文件
    if (document.getElementById("upload_img_file").value) {
      // 文件不为空执行上传
      document.getElementById("upload_form").submit();
    } else {
      layer.msg("请选择上传文件");
    }
  }
}
//添加密码监听事件
function check_pwd(id) {
  document.getElementById(id).onblur = function () {
    if (this.value.length < 8 || this.value.length > 30) {
      // 位数错误
      this.style.color = "red";
      // alert('密码错误，请重新输入')
      this.setAttribute("myerror", "myerror");
    } else {
      var val = this.value;
      var check_char = 0;
      var check_num = 0;
      // 循环取出字符串
      for (var i = val.length - 1; i >= 0; i--) {
        // 是否不是一个数字
        if (isNaN(val[i])) {
          check_char = 1;
          // 判断其是否是一个数字
        } else if (!isNaN(val[i])) {
          check_num = 1;
        }
      }
      if (check_num && check_char) {
        //   正确
      } else {
        //   错误
        this.setAttribute("myerror", "myerror");
        this.style.color = "orange";
      }
    }
  };
  document.getElementById(id).onfocus = function () {
    if (this.getAttribute("myerror")) {
      this.removeAttribute("myerror");
      this.style.color = "black";
      this.value = "";
    }
  };
}

check_username("login_user_name");
check_username("reg_user_name");
check_pwd("login_password");
check_pwd("reg_password");

// 验证码判断
function isCode(value) {
  if (value.length != 4) {
    return false;
  }
  return true;
}

// 绑定登录弹窗出现
document.getElementById("header_user_login").onclick = function alert() {
  // 计算高度，设定锁的高度
  document.getElementById("lock_div").style.height = window.innerHeight + "px";
  document.getElementById("login_alert").style.display = "block";
  document.getElementById("lock_div").style.display = "block";
};

// 绑定注册弹框出现
document.getElementById("header_user_reg").onclick = function () {
  document.getElementById("lock_div").style.height = window.innerHeight + "px";
  document.getElementById("reg_alert").style.display = "block";
  document.getElementById("lock_div").style.display = "block";
};
// 绑定上传和置顶弹框出现
$().ready(function () {
  // 上传
  document.getElementById("upload").onclick = function () {
    document.getElementById("lock_div").style.height =
      window.innerHeight + "px";
    document.getElementById("upload_alert").style.display = "block";
    document.getElementById("lock_div").style.display = "block";
  };
  //置顶
  document.getElementById("go_to_top").onclick = function () {
    scrollTo(0, 0);
  };
  document.body;
});

// 关闭绑定
// 关闭登录窗口
document.getElementById("login_exit").onclick = function () {
  document.getElementById("lock_div").style.display = "none";
  document.getElementById("login_alert").style.display = "none";
};

// 关闭注册窗口
document.getElementById("reg_exit").onclick = function () {
  document.getElementById("lock_div").style.display = "none";
  document.getElementById("reg_alert").style.display = "none";
};

// 关闭上传窗口
document.getElementById("upload_exit").onclick = function () {
  document.getElementById("lock_div").style.display = "none";
  document.getElementById("upload_alert").style.display = "none";
};

// 滚动搜索显示切换
// 监听滚动
document.body.onscroll = function () {
  if (
    document.documentElement.scrollTop > 280 &&
    document.getElementsByTagName("header")[0].getAttribute("mystate") ==
    "trans"
  ) {
    //显示搜索
    document.getElementById("header_search").style.display = "block";
    //更改样式
    document.getElementsByTagName("header")[0].style.backgroundColor = "#fff";
    document.getElementsByClassName("header_logo_a")[0].style.backgroundImage =
      "url('./src/img/logo.svg')";
    var li_arr = document.getElementsByClassName("header_link_li");
    for (var i = 0; i < li_arr.length; i++) {
      li_arr[i].style.color = "black";
    }
    document.getElementById("header_user_login").style.color = "#000";
    document.getElementById("header_user_login").style.borderColor = "#000";
    document.getElementsByTagName("header")[0].setAttribute("mystate", "#fff");
    // gotoptop
    document.getElementById("go_to_top").style.display = "block";
  } else if (
    document.documentElement.scrollTop < 280 &&
    document.getElementsByTagName("header")[0].getAttribute("mystate") == "#fff"
  ) {
    //显示搜索
    document.getElementById("header_search").style.display = "none";
    //更改样式
    document.getElementsByTagName("header")[0].style.backgroundColor =
      "transparent";
    document.getElementsByClassName("header_logo_a")[0].style.backgroundImage =
      "url('./src/img/logo_wt.svg')";
    var li_arr = document.getElementsByClassName("header_link_li");
    for (var i = 0; i < li_arr.length; i++) {
      li_arr[i].style.color = "#fff";
    }
    document.getElementById("header_user_login").style.color = "#fff";
    document.getElementById("header_user_login").style.borderColor = "#fff";
    // 更改标志位
    document.getElementsByTagName("header")[0].setAttribute("mystate", "trans");
    // gotoptop:hidden
    document.getElementById("go_to_top").style.display = "none";
  }
};

//登录与注册弹窗切换
//1.登录跳转到注册
document.getElementById("go_to_reg").onclick = function () {
  document.getElementById("login_alert").style.display = "none";
  // 计算锁的高度
  document.getElementById("lock_div").style.height = window.innerHeight + "px";
  document.getElementById("reg_alert").style.display = "block";
  document.getElementById("lock_div").style.display = "block";
};
//2.注册跳转到登录
document.getElementById("go_to_login").onclick = function () {
  document.getElementById("reg_alert").style.display = "none";
  // 计算锁的高度
  document.getElementById("lock_div").style.height = window.innerHeight + "px";
  document.getElementById("login_alert").style.display = "block";
  document.getElementById("lock_div").style.display = "block";
};
// 注册接收结果处理，监听注册动作
document.getElementById("go_reg_btn").onclick = function () {
  if (
    document.getElementById("reg_user_name").getAttribute("myerror") ||
    document.getElementById("reg_password").getAttribute("myerror")
  ) {
    layer.msg("注册账号或密码不符合要求，请改正后再尝试");
  } else {
    // 正常注册
    var url = "./php/reg.php";
    var name = document.getElementById("reg_user_name").value;
    var password = document.getElementById("reg_password").value; // var rpassword = document.getElementById('reg_rpassword').value;
    var code = document.getElementById("reg_code").value;
    data = "username=" + name + "&password=" + password + "&code=" + code;
    //重点 jQuery
    $.ajax({
      url: url,
      type: "POST",
      headers: {
        //请求头
        "Content-Type": "application/x-www-form-urlencoded;charset=utf8",
      },
      data: {
        username: name,
        password: password,
        code: code,
      },
      success: function (data) {
        // console.log(data);
        var obj = eval("(" + data + ")");
        // console.log(obj);
        if (obj.error) {
          // 注册失误
          layer.msg("注册错误:" + obj.error);
        } else {
          // 注册成功
          layer.msg("注册成功啦,那就请尽情登录吧！！！");
          // 修改用户区域- 关闭注册 打开登录
          document.getElementById("reg_alert").style.display = "none";
          document.getElementById("lock_div").style.height =
            window.innerHeight + "px";
          document.getElementById("login_alert").style.display = "block";
          document.getElementById("lock_div").style.display = "block";
          //没登陆不用加cookie
        }
      },
    });
  }
};
// 登录本地接受结果处理，监听登录动作
document.getElementById("go_login_btn").onclick = function () {
  if (
    document.getElementById("login_user_name").getAttribute("myerror") ||
    document.getElementById("login_password").getAttribute("myerror")
  ) {
    layer.msg("用户名或密码错误");
  } else {
    //正确登录
    var url = "./php/login.php";
    var data = "";
    var name = document.getElementById("login_user_name").value;
    var password = document.getElementById("login_password").value;
    var code = document.getElementById("login_code").value;
    data = "username=" + name + "&password=" + password + "&code=" + code;
    $.ajax({
      url: url,
      type: "post",
      headers: {
        //请求头
        "Content-Type": "application/x-www-form-urlencoded;charset=utf8",
      },
      data: {
        username: name,
        password: password,
        code: code,
      },
      success: function (data) {
        var obj = eval("(" + data + ")");
        // console.log(obj);
        if (obj.error) {
          layer.msg("登录错误:" + obj.error);
        } else {
          layer.msg("登录成功，开始造作吧！！！");
          console.log(obj);
          // 修改右上角连接
          document.getElementById('center_a').href = './center.php?id=' + obj.user_id;
          // document.getElementById('center_a').href = 'center.html';
          document.getElementById('collection_a').href = './collection.php?id=' + obj.user_id;
          // document.getElementById('collection_a').href = 'class.html';
          document.getElementById("center_a").setAttribute =
            ("href", "flower/center.php?style=a");
          document.getElementById("collection_a").setAttribute =
            ("href", "flower/collection.php?style=a");
          // 显示上传
          document.getElementById("upload").style.display = "block";
          // 修改用户区域-头像
          document.getElementById("login_alert").style.display = "none";
          document.getElementById("lock_div").style.height =
            window.innerHeight + "px";
          document.getElementById("lock_div").style.display = "none";
          document.getElementById("header_user_prelogin").style.display =
            "none";
          document.getElementById("header_user_logined").style.display =
            "block";
          document.getElementById("user_logo_pic").style.backgroundImage =
            "url(./src/user_logos/" + obj.user_logo_name + ")";
          // js添加cookie
          document.cookie = "user_id=" + obj.user_id;
          document.cookie = "user_name=" + obj.user_name;
          document.cookie = "user_logo_name=" + obj.user_logo_name;
        }
      },
    });
  }
};
// 监听上传动作
document.getElementById("upload_btn").onclick = function () {
  check_upload();
};
// js 不能清除cookie 但是可以让它过期
function deleteCookie(name) {
  document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
}

// 退出登录
document.getElementById("user_exit_btn").onclick = function () {
  document.getElementById("header_user_prelogin").style.display = "block";
  document.getElementById("header_user_logined").style.display = "none";
  layer.msg("退出成功");
  // 隐藏upload
  document.getElementById("upload").style.display = "none";
  // 清除cookie
  deleteCookie("user_id");
  console.log(document.cookie);
};
// 评论跳转
function go_to_chat() {
  location.href = "pic2.php?page=1&pic_id=38";
  // document.getElementById('go_to_chat').href = 'pic2.php?page=1&pic_id='+getCookie('pic_id');
}