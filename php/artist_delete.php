<?php
//音乐库管理系统：删除歌手
//接受要删除的歌手ID
$id = isset($_GET['id']) ? $_GET['id'] : '0'; //0不会存在
if($id == '0'){
    header('Refresh:3;url=artists.php');
    echo '当前要删除的歌手不存在！';
    exit();
}

//删除数据
include_once './music_public.php';

//组织SQL
sql_error($link,"delete from artists where ARTIST_ID = " . $id);

//提示
header('Refresh:0;url=./artists.php');
?>
<script>alert('删除成功');</script>