<?php
//关注歌手

header('Content-type:text/html;charset=utf-8');
$id = $_GET['id'];
include_once 'music_public.php';
//组织SQL语句
$sql = "update artists set isLove = '是' where ARTIST_ID='{$id}'";

sql_error($link,$sql);

//提示结果
//提示
header('Refresh:0;./artists.php');
?>
<script>alert('已关注！');</script>
