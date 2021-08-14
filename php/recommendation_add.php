<?php
//收藏推荐歌曲

header('Content-type:text/html;charset=utf-8');
$id = $_GET['id'];
include_once 'music_public.php';
//组织SQL语句
$sql = "update recommendation set isLove = '是' where MUSIC_ID='{$id}'";

sql_error($link,$sql);

//提示结果
//提示
header('Refresh:0;recommendation.php');
?>
<script>alert('已收藏！');</script>
