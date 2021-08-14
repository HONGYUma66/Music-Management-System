<?php
echo '<pre>';
header('Content-type:text/html;charset=utf-8');
//首先验证数据有效性
$name = isset($_POST['MUSIC_NAME']) ? $_POST['MUSIC_NAME'] : null;
$ISLOVE = $_POST['ISLOVE']=='是' ? '是' : '否';//默认不收藏
$comment = isset($_POST['comment']) ? $_POST['comment'] : null;
$ARTIST_NAME = isset($_POST['ARTIST_NAME']) ? $_POST['ARTIST_NAME'] : null;//trim去除字符串空格
$id = isset($_POST['MUSIC_ID']) ? $_POST['MUSIC_ID'] : null;
//数据合法性验证
if(empty($name) || empty($ARTIST_NAME)){
    //提示并且回到提交页
    header('Refresh:3;url=../html/music_add.html');//header前不能有输出内容，refresh不会阻止脚本执行

    //歌曲名和歌手名都不能为空
    exit('歌曲名和歌手名都不能为空');
}

//数据入库
include_once 'music_public.php';
$sql = "insert into musics values('{$id}','{$name}','{$ARTIST_NAME}','{$ISLOVE}','{$comment}')";

$insert_id = sql_error($link,$sql);

//成功操作
?>
<script>
    alert('添加歌曲成功!');
</script>
<?php
header('Refresh:0;url=music.php?id=' . $ARTIST_NAME);
?>
