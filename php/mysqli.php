<?php
// 链接数据库公用部分
function mysqli()
{
    $db = mysqli_connect('localhost', 'root', '', 'flower', '3306');
    if (mysqli_connect_error()) {
        die('连接错误:' . mysqli_connect_errno() . '----' . mysqli_connect_error());
    }
    //设定连接字符串编码
    mysqli_query($db, "set names utf8");

    return $db;
}
