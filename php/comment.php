<?php
//根据热歌榜歌曲名选择评论
header('Content-type:text/html;charset=utf-8');
$id = $_GET['id'];
$name = $_GET['name'];
include_once 'music_public.php';
//组织SQL指令
$sql = "SELECT * FROM comments WHERE MUSIC_NAME = '$name'";
//获取结果集
$res = sql_error($link,$sql);

//从结果集中取出所有内容
//循环遍历
$comments = array();

//获取内容
$num = mysqli_num_rows($res);
for ($i = 0;$i < $num;$i++){
    $comments[] = mysqli_fetch_assoc($res);
}

include_once '../html/comments.html';

