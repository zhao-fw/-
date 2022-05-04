<?php
if (isset($_GET["sign_out"]) && $_GET["sign_out"] == "sign_out") {
    $time = time() + 3600 * 24 * 30;
    setcookie("is_login", 0, $time, "/");
    echo "<script>setTimeout(function() {window.location.href='./login.php';},1000);</script>";
} else if (isset($_COOKIE["is_login"]) && $_COOKIE["is_login"] == 1) {
    if (isset($_COOKIE["come_times"]) && ($_COOKIE["come_times"] > 1)) {
        $yeah = "欢迎" . $_COOKIE["user_name"] . "的到来, 这是您第" . $_COOKIE["come_times"] . "次光临本站";
        echo "<script>setTimeout(()=>{alert('$yeah')}, 500)</script>";
    }
    $uid = $_COOKIE["uid"];
    require("./connect.php");
    $result = $mysql->query("select * from user;");
    $info = $result->fetch_all(MYSQLI_ASSOC);
    // echo '<pre>';
    // print_r(get_role($_COOKIE["uid"]));

    get_grade_info($uid);

    require("./view/index.html");
} else {
    echo "<script>alert('请先登录')</script>";
    echo "<script>setTimeout(function() {window.location.href='./login.php';},1000);</script>";
}
