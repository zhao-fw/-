<?php
header("Content-Type: text/html; charset=utf8");

//检测是否有submit操作
if (isset($_POST["submit"]) && $_POST["submit"] == "submit") {
    require('./connect.php');

    $user_name = $_POST['name'];
    $user_password = $_POST['password'];
    if ($user_name && $user_password) {
        $sql = "select uid, user_role from user where user_name='$user_name' and user_password='$user_password'";
        $result = $mysql->query($sql);
        $rows = $result->num_rows;
        if ($rows > 0) {
            // 进入主界面
            $info = $result->fetch_assoc();
            $uid_before = $_COOKIE["uid"];
            $uid = $info['uid'];
            $time = time() + 24 * 60 * 60;
            setcookie("is_login", 1);
            if ($uid === $uid_before && $_COOKIE["come_times"]) {
                $come_times = $_COOKIE["come_times"] + 1;
                setcookie("come_times", $come_times, $time, "/");
                unset($come_times);
            }
            else {
                $user_role = $info["user_role"];
                $user_name = $info["user_info"];
                setcookie("uid", $uid, $time, "/");
                setcookie("user_role", $user_role, $time, "/");                
                setcookie("user_name", $user_name, $time, "/");
                setcookie("come_times", 1, $time, "/");
                unset($user_name);
                unset($user_role);
            }
            echo "<script>location='./index.php'</script>"; //..登录成功跳转到主页
        }
        else {
            // echo "$(window).load(function(){});";
            echo "<script>setTimeout(()=>{alert('用户名或密码错误');window.history.back(-1);}, 1000);</script>";
            exit();
        }
    }
    else {
        echo "<script>alert('表单填写不完整');window.history.back(-1)</script>";
        exit();
    }
    // 关闭数据库
    $mysql->close();
}

require("./view/login.html");
