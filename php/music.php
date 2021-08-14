<?php
//获取指定歌手的全部歌曲
include_once 'music_public.php';
header('Content-type:text/html;charset=utf-8');
//接受要查看的歌手名字
$name = isset($_GET['id']) ? utf8_decode($_GET['id']) : '0'; //0不会存在
//组织SQL指令
$sql = "select * from musics where ARTIST_NAME = '$name'";
//拿到结果集
$res = sql_error($link,$sql);

//从结果集中取出所有内容
//循环遍历
$musics = array();

//获取内容
$num = mysqli_num_rows($res);
for ($i = 0;$i < $num;$i++){
    $musics[] = mysqli_fetch_assoc($res);
}
/*
//
while($row = mysqli_fetch_assoc($res)){
    $news[] = $row;
}
*/

//print_r($news);

//包含显示模板(HTML)
include_once '../html/music.html';
