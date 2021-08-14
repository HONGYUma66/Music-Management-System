<?php
$user = $_POST['username'];
$pwd = $_POST['password'];
if($user == 'zhaoyian' && $pwd == 'zya123.0') {
    //echo '匹配正确！', '<br>', '用户名:' . $user, '<br>', '密码:' . $pwd;
    header('Refresh:0;url=artists.php');
}else{
   //echo '数据上传服务器失败！';
    header('Refresh:0;url=../html/login.html');
}

