<?php
//PHP操作mysql的公共文件

//连接初始化
$link = mysqli_connect('localhost:3306','root','zya123.0') or die('连接失败');
//封装SQL指令错误检查函数
/*
 * @param1 string $sql 要执行的指令
 * @param2 $res
 */
function sql_error($link,$sql){
    $res = mysqli_query($link,$sql);
    //如果发生错误
    if(!$res) {
        echo 'SQL指令执行错误，错误编号为' . mysqli_errno($link).'<br>';
        echo 'SQL指令执行错误，错误信息为' . mysqli_error($link).'<br>';
        //终止代码执行
        exit();
    }
    //返回结果
    return $res;
}

//字符集处理
sql_error($link,'set names utf8');

//选择数据库
sql_error($link,'use music');
