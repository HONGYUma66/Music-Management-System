<?php
include_once "music_public.php";
//热歌榜热评
header('Content-type:text/html;charset=utf-8');
//组织SQL指令
$sql = "select MUSIC_ID,MUSIC_NAME,isLove from comments";
//拿到结果集
$res = sql_error($link,$sql);
//从结果集中取出所有内容
//循环遍历
$songs = array();

//定义二维数组去重函数
function a_array_unique($array)
{
    $out = array();
    foreach ($array as $key => $value) {
        if (!in_array($value, $out)) {
            $out[$key] = $value;
        }
    }
    $out = array_values($out);
    return $out;
}


//获取内容
$num = mysqli_num_rows($res);
for ($i = 0;$i < $num;$i++){
    $songs[] = mysqli_fetch_assoc($res);
}
//数组去重
$songs = a_array_unique($songs);

/*此算法加载较慢，不适合做动态加载
foreach ($hotsongs as $key => $song) {
    $name = $song['MUSIC_NAME'];
    //组织SQL指令
    $sql2 = "select * from musics where MUSIC_NAME = '$name'";
    #echo $sql;
    //拿到结果集
    $res2 = sql_error($link, $sql2);

    //从结果集中取出所有内容
    //循环遍历


    //获取内容
    $num2 = mysqli_num_rows($res2);
    for ($i = 0; $i < $num2; $i++) {
        $songs[] = mysqli_fetch_assoc($res2);
    }
}
*/
include_once '../html/hotsong.html';