<?php
//编辑热歌榜歌曲到数据库
include_once 'music_public.php';
header('Content-type:text/html;charset=utf-8');
//查询某个歌曲信息放到对应的表单中
//接受要修改的歌曲ID
$id = isset($_GET['id']) ? $_GET['id'] : '0'; //0不会存在
if($id == '0'){
    header('Refresh:3;url=music.php');
    echo '当前要编辑的歌曲不存在！';
    exit();
}

//获取当前id对应的歌曲信息
include_once 'music_public.php';
$sql = "select * from musics where MUSIC_ID = '$id'";
$res = sql_error($link,$sql);
$music = mysqli_fetch_assoc($res);

//加载模板
include_once '../html/hotsong_edit.html';
