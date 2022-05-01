<?php
header("Content-Type: text/html; charset=utf8");

//检测是否有submit操作
if (isset($_POST["submit"]) && $_POST["submit"] == 'submit') {
    $user_name = $_POST['name'];
    $user_password = $_POST['password'];
    $user_role = $_POST['role'];
    if ($user_name && $user_password && $user_role) {
        require('./connect.php');
        $sql = "select uid from user where user_name='$user_name'";
        $result = $mysql->query($sql);
        if ($result->num_rows > 0) {
            echo "<script>alert('用户名已注册')</script>";
            echo "<script>setTimeout(function() {window.location.href='./signup.php';},1000);</script>";
        }
        else {
            $sql = "insert into user(uid, user_name, user_password, user_role) values (null, '$user_name', '$user_password', '$user_role')";
            $reslut = $mysql->query($sql);
            if (!$reslut) {
                echo "<script>alert('注册失败')</script>";
                echo "<script>setTimeout(function() {window.location.href='./signup.php';},1000);</script>";
            } else {
                echo "<script>alert('注册成功')</script>";
                echo "<script>setTimeout(function() {window.location.href='./login.php';},1000);</script>";
            }    
        }
        $mysql->close();    
    }
    else {
        echo "<script>alert('表单填写不完整')</script>";
        echo "<script>setTimeout(function() {window.location.href='./signup.php';},1000);</script>";
    }
}

require("./view/signup.html");
