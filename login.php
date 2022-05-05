<?php
header("Content-Type: text/html; charset=utf8");

//检测是否有submit操作
if (isset($_POST["submit"]) && $_POST["submit"] == "submit") {
    require('./connect.php');

    $user_name = $_POST['name'];
    $user_password = $_POST['password'];
    if ($user_name && $user_password) {
        $sql = "select * from user where user_name='$user_name' and user_password='$user_password'";
        $result = $mysql->query($sql);
        $rows = $result->num_rows;
        if ($rows > 0) {
            // 进入主界面
            $info = $result->fetch_assoc();
            $time = time() + 24 * 60 * 60;
            // 修改当前为登录状态
            setcookie("is_login", 1);
            // 设置部分用户信息（这里没有考虑安全的问题...ToDo）
            $uid_before = $_COOKIE["uid"];
            $uid = $info['uid'];
            $user_role = $info["user_role"];
            $user_name = $info["user_name"];
            setcookie("uid", $uid, $time, "/");
            setcookie("user_role", $user_role, $time, "/");                
            setcookie("user_name", $user_name, $time, "/");
            // 根据uid是否为之前的，确定是否将come_times+1
            if ($uid === $uid_before && $_COOKIE["come_times"]) {
                $come_times = $_COOKIE["come_times"] + 1;
                setcookie("come_times", $come_times, $time, "/");
                unset($come_times);
            }
            else {
                setcookie("come_times", 1, $time, "/");
            }
            echo "<script>location='./index.php'</script>"; //..登录成功跳转到主页
            // 关闭数据库
            $mysql->close();
        }
        else {
            echo "<script>setTimeout(()=>{alert('用户名或密码错误');window.history.back(-1);}, 1000);</script>";
            // 关闭数据库
            $mysql->close();
            exit();
        }
    }
    else {
        echo "<script>alert('表单填写不完整');window.history.back(-1)</script>";
        // 关闭数据库
        $mysql->close();
        exit();
    }
}

require("./view/login.html");