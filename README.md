将db文件下的数据库文件运行在本地环境上
将该项目拷贝到web项目工程下。例如（拷贝在Xampp 软件中的htdocs文件下运行）
# 一、项目实现思路
花瓣网为基础 以图片素材展示分享为主要业务功能 web整站项目

目标网站：花瓣网 www.huaban.com

1  准备阶段

1-1课程简述
	HTML CSS JS PHP MYSQL http协议 cookie Session 文件处理 
1-2环境搭建
	XAMPP集成环境 （跨平台）开发环境 win7 Xammp （Apache PHP Mysql PHPMyAdmin）
1-3项目环境需求
	使用php模块 mbstring gd mysqli ......
2  开发阶段

2-1  前端开发
2-1-1思路 先完成HTML整体框架
找出共用部分 可复用
分析可拆分部分 HTML相同 CSS不同

---------------
首页
1 top导航与登录
2 有搜索的首页大图展示
3 系统推荐关注区
4 推荐区A
5 分类区A
6 尾部区
7 备案结尾区域
8 功能条


---------------
发现页
1 top导航与登录
2 分类区B
3 分类区C
4 图片推荐区B

5 尾部区
6 备案结尾区域
7 功能条
8 登录区
9 底部引导区
------------------

2-2  数据库分析设计
2-3  后端开发

3  测试阶段 细节修补
4 二次开发阶段，功能增补

------------------
# 二、数据库设计思想
1.数据库选择
mysql(开源免费) 被收购 未来不可期-->mariaDB(兼容mysql mariaDB_10.1  == mysql_5.7)
2.表的设计
2-1.user表  用户信息
user_id int(32) pri  auto_inc   unsigned //默认自增序列 唯一身份标识   长度考虑业务实际数量级在一个是否涉及哈希加密 加密长度
user_name varchar(48) unique     //sdfghjklqwe_fgh123 随即出来的 也是唯一
user_email varchar(48) unque // zhangsan@163.com 存在唯一 用来登录
user_phone big_int(16) unsinged // unsigned无符号 
user_password varchar(48)  //写入库的密码不可以是明文 zhangsan的密码是 zhangsan X 不可保证数据泄露 使用哈希处理再保存 
                            //md5()给出一个唯一定长字符串   先对来说安全md5 现在已经可以反向识别 
user_state //用户状态  可用于不可用  0 不可用冻结 1 正常运行  //其他情况有把简单的权限表写着这里的 
//user_level //用户界别  //99 admin 90 版主 10 普通用户  12 优秀用户   简单线性权限 随着分配数值增高而增高 实际中不多见 实际业务权限很难线性递增 前提：上级一定包含下级所有权限功能。
//user_sorce //用户积分
user_time_reg timestamp //注册时间 类型时间戳  本质还是int 对只有一个时区的业务用int 跨时区的用时间戳 utc 时间戳跟随服务器utc时间改变
//user_time_login
//user_time_logout

user_pic_name varchar() // 用户头像 1 .存储url   2.把后台的头像图片放在指定目录位置 使用user_name.* 作为图片文件名
user_bg_name varchar() // 个人中心背景
//user_token int(16) //防止跨站攻击
//user_code varchar(8) //验证码
user_fans_number int unsigned //粉丝数



//分类    1.单一级别 分类  就一层分类   川菜 粤菜 卤菜 。。菜  。。菜 （本次选择）
//       2。 多级别的  中国菜：川菜 粤菜 卤菜 。。菜  。； 印度菜: 手抓饭  咖喱系 黑暗料理系列 水果系列   
//         多层最常见的就是 地址选择器 国家 省份 城市 城区 街道 门牌号
//       3. 标签   z重点在于归类 不需要提前预知输入类别 允许分类的复合 缺点 资源消耗相对巨大 标签量的多少决定了精确度 6-10个对咱们的本次业务足够
热巧克力牛奶：食品（999） 液体(988) 咖啡色 巧克力味 热饮 青少(19) |
盖饭：食品  快餐 中国菜 经济实惠 食堂 小饭店 米饭 |
煎饼 食品 中国菜 小米面 鸡蛋 葱花 路边 早高峰 山东 天津

2-2.pic表  素材信息
pic_id
pic_title //素材名
pic_category  varchat //素材分类  素材上传的过程中由用户指定
pic_time //素材上传时间
pic_owner //素材所有者
pic_detail //简述
pic_collection_number //收藏总数=


2-3.chat表 //思路因为 用户+素材+时间=》评论关系  线性时间性 累加不删除
chat_id
chat_pic_id
chat_user_id
chat_time


2-4.collection 收藏表 用户+素材+时间=> 收藏关系   添加与更新
collection_id
collection_user_id
collection_pic_id
collection_state tiny_int unsigned //收藏状态 收藏与取消收藏的状态值 -0或1
collection_time int //收藏时间 时间戳=指定时间之后的总秒数

2-5.attention //关注关系表  A用户+B用户+时间 = 关注关系 添加与更新  数据库中使用状态位的值来表示数据删除与否
attention_id
attention_star_id //被关注人    明星
attention_fans_id //进行关注的人 粉丝
attention_time //记录时间


补充问题  我们保存的是什么？
纯英文（其他种类语言）
用户多种语言（英文 数字 中文）
-----------问题的来源  编码问题 
解决编码不通用问题  --------unicode --- 【utf-8】  mysql中叫做utf8  【1一个英文字符占1个字节    一个中文占3个以上   ==资源成本 -- 业务成本  == money 】

配置文件(linux风格 层级覆盖)  默认配置（编译配置） --》 系统配置（全局配置） --》 用户个人配置（相应的个人目录下) 服务类应用通常直接配置系统设置。
方法1
持久改变
win方法 去找my.ini
linux方法 去/etc/mysql
方法2
临时改变
在你建表建库的时候临时加上 charset=utf8
mysql配置等级》》 系统mysql的 -》 库database的 -》 *表tabel的* -》 列的colmun


*连接字符编码
SET NAMES utf8

补充 字符乱码: 1数据库编码设置 2数据库通信传输编码 3业务（php）对数据库数据编码处理 4HTML meta charset


补充2 
2-1          1 000 000 不足8位  但是也要显示8位再左侧高位上补零
int(8)//设定最小显示位数 配设ZEROFILL补位零使用 保证至少显示x位
bigint（16）//设定最小显示位数
tinyint(4)//设定最小显示位数
最常见的情况 会员卡 员工编号 车牌号 冀A D 00002

2-2
char(32) //！这是限定长度！
这个长度由数字决定 影响着整改字段的体积
char(8)  字段的值占用8个
abcde输入后变为-》abcde   [右边空格补齐]
abcd 123456 中文怎么办->8 - 8 -8

2-3
varchar(12) 数字代表最大容量 不补零
 可变abcd 123456 中文怎么办  --》 4 - 6 - 5

 单位！5.*版本 单位是字符个数！！！
     4.*版本中 字节数！！！

char体积一般小于varchar ？ 是的 搜索也一般快一些
char(8) varcahr(8)
第0个 1234
第1个 asdfqwe
第2个 123
第3个 123
char：会把他们都变成8位 然后每个数据的地址等于 起始位置+8x所在序列数
varchar：他会保存每个数据的地址 


