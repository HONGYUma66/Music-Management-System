<?php
//音乐库管理系统：删除歌曲
header('Content-type:text/html;charset=utf-8');
//接受要删除的歌曲ID
$id = isset($_GET['id']) ? $_GET['id'] : '0'; //0不会存在
$artist_name = isset($_GET['artist_name']) ? $_GET['artist_name'] : '0'; //0不会存在
if($id == '0'){
    header('Refresh:3;url=artists.php');
    echo '当前要删除的歌曲不存在！';
    exit();
}
if($artist_name == '0'){
    header('Refresh:3;url=artists.php');
    echo '当前要删除的歌曲不存在！';
    exit();
}
//删除数据
include_once 'music_public.php';

//组织SQL
$artist_name_utf8_dec = utf8_decode($artist_name);
$sql = "delete from musics where MUSIC_ID = '{$id}' and ARTIST_NAME = '{$artist_name_utf8_dec}'";
sql_error($link,$sql);

//提示

$artist_name = utf8_decode($artist_name);
header('Refresh:0;url=music.php?id=' . $artist_name);
?>
<script>alert('删除成功');</script>