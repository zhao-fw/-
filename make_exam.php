<?php
require("./connect.php");

$uid = $_COOKIE["uid"];
$role = get_role($uid);
if (isset($_POST["submit"]) && $_POST["submit"] == "制作" && isset($_COOKIE["is_login"]) && $_COOKIE["is_login"] == 1) {
    $exam = array();
    $exam["title"] = $_POST["title"];
    if (isset($_POST["timeout"])) $exam["timeout"] = $_POST["timeout"] * 60;
    else $exam["timeout"] = 30 * 60;
    $exam["exam_type"] = $_POST["exam_type"];
    if (isset($_POST["binary"])) {
        $exam["data"]["binary"]["name"] = "判断题";
        $exam["data"]["binary"]["score"] = (int)$_POST["binary_num"] * (int)$_POST["binary_score"];
        $exam["data"]["binary"]["data"] = $_POST["binary"]["data"];
    }
    if (isset($_POST["single"])) {
        $exam["data"]["single"]["name"] = "选择题";
        $exam["data"]["single"]["score"] = (int)$_POST["single_num"] * (int)$_POST["single_score"];
        $exam["data"]["single"]["data"] = $_POST["single"]["data"];
    }
    if (isset($_POST["multiple"])) {
        $exam["data"]["multiple"]["name"] = "多选题";
        $exam["data"]["multiple"]["score"] = (int)$_POST["multiple_num"] * (int)$_POST["multiple_score"];
        $exam["data"]["multiple"]["data"] = $_POST["multiple"]["data"];
    }
    insert_exam($exam["title"], $exam["timeout"], $exam["exam_type"], $_COOKIE["uid"], $_COOKIE["user_name"]);
    $exam_id = get_exam_num();
    $fp = fopen("./exam/$exam_id.php", "w");
    fwrite($fp, "<?php return\n");
    fwrite($fp, var_export($exam, true));
    fwrite($fp, ";\n?>");
    fclose($fp);

    echo "<script>window.location.href='./index.php';</script>";
}
require("./view/make_exam.html");
$mysql->close();
