<?php
//获取全部歌手ID及姓名
include_once 'music_public.php';
header('Content-type:text/html;charset=utf-8');

$perNumber=150; //每页显示的记录数
if(isset($_GET['page'])) { //判断是否存在page参数,获得页面值，否则取1
    $page = intval($_GET['page']);
}else{
    $page = 1;
}
if(!isset($_GET['page']) && isset($_POST['page'])) { //判断是否存在page参数,获得页面值，否则取1
$page = intval($_POST['page']);
}
$page_size = 150; //最大记录条数
$sql = "SELECT count(*) as amount FROM artists";

$result = sql_error($link,$sql);
$row = mysqli_fetch_assoc($result);//计算总页数
$amount = $row['amount'];

if($amount) {
    if($amount < $page_size) {
        $page_count = 1;
    }
    if($amount % $page_size) {
        $page_count = (int)($amount / $page_size) + 1;
    } else {
        $page_count = $amount / $page_size;
    }
} else {
    $page_count = 0;
}//计算分页数量

$sql = "select * from artists order by ARTIST_ID desc limit ". ($page-1)*$page_size .", $page_size";
$result = sql_error($link,$sql);
//从结果集中取出所有内容
//循环遍历
$artists = array();

//获取内容
$num = mysqli_num_rows($result);
for ($i = 0;$i < $num;$i++){
    $artists[] = mysqli_fetch_assoc($result);
}
/*
//
while($row = mysqli_fetch_assoc($res)){
    $news[] = $row;
}
*/

//print_r($news);

//包含显示模板(HTML)
include_once '../html/artists.html';
