<?php
if (isset($_GET["sign_out"]) && $_GET["sign_out"] == "sign_out") {
    // 登出
    $time = time() + 3600 * 24 * 30;
    setcookie("is_login", 0, $time, "/");
    echo "<script>setTimeout(function() {window.location.href='./login.php';},1000);</script>";
}
else if (isset($_COOKIE["is_login"]) && $_COOKIE["is_login"] == 1) {
    // 是上次登录的用户，就提示，否则不提示欢迎语句
    if (isset($_COOKIE["come_times"]) && ($_COOKIE["come_times"] > 1)) {
        $yeah = "欢迎" . $_COOKIE["user_name"] . "的到来, 这是您第" . $_COOKIE["come_times"] . "次光临本站";
        echo "<script>setTimeout(()=>{alert('$yeah')}, 500)</script>";
    }

    // 连接数据库并且从中获取试卷信息
    $uid = $_COOKIE["uid"];
    require("./connect.php");
    // echo '<pre>';
    // print_r(get_role($_COOKIE["uid"]));
    $data = get_exam();

    require("./view/index.html");
}
else {
    // 还未登录的用户
    echo "<script>alert('请先登录')</script>";
    echo "<script>setTimeout(function() {window.location.href='./login.php';},1000);</script>";
}
