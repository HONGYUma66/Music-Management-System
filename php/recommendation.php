<?php
//获取每日推荐歌单

include_once 'music_public.php';

header('Content-type:text/html;charset=utf-8');

//组织SQL指令
$sql = "select * from recommendation";
//拿到结果集
$res = sql_error($link,$sql);

//从结果集中取出所有内容
//循环遍历
$recommendations = array();

//获取内容
$num = mysqli_num_rows($res);
for ($i = 0;$i < $num;$i++){
    $recommendations[] = mysqli_fetch_assoc($res);
}
/*
//
while($row = mysqli_fetch_assoc($res)){
    $news[] = $row;
}
*/

//print_r($news);

//包含显示模板(HTML)
include_once '../html/recommendation.html';