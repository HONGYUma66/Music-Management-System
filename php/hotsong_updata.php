<?php
//歌曲更新数据到数据库
header('Content-type:text/html;charset=utf-8');
//接收数据并验证
$id = isset($_POST['id']) ? $_POST['id'] : '0';
$ISLOVE = isset($_POST['ISLOVE']) ? $_POST['ISLOVE'] : '否';
$name = isset($_POST['ARTIST_NAME']) ? $_POST['ARTIST_NAME'] : '';
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
$sql = "update musics set ISLOVE = '{$ISLOVE}',comment='{$comment}' where MUSIC_ID='{$id}'";
//数据合法性验证
if (empty($ISLOVE)) {
    //提示并且回到提交页
    header('Refresh:2;url=artists.php');//header前不能有输出内容，refresh不会阻止脚本执行
    //选项不能为空
    exit("选项不能为空!");
}

include_once 'music_public.php';
//组织SQL
$sql = "update musics set ISLOVE = '{$ISLOVE}',comment='{$comment}' where MUSIC_ID='{$id}'";
sql_error($link, $sql);

//提示结果
//提示
header('Refresh:0;hotsong.php');
?>
<script>alert('编辑成功');</script>