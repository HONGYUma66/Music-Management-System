function check(){
    var name = form1.username.value;
    var pwd = form1.password.value;
    if(name == "" && pwd == ""){
        form1.submit();
    }else if (name == "" || name == null){
        alert("请输入用户名！");
        form1.username.focus();
        return;
    }else if (pwd == "" || pwd == null){
        alert("请输入密码！");
        form1.password.focus();
        return;
    }else{
        alert("用户名或密码错误！");
        return;
    }
}
