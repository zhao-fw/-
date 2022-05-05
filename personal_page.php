<?php

if (isset($_COOKIE["is_login"]) && $_COOKIE["is_login"] == 1) {
    $uid = $_COOKIE["uid"];
    require("./connect.php");
    $data = get_grade($uid);
    $role = get_role($uid);

    if (!$data) {
        require './view/404.html';
    } else {
        require("./view/personal_page.html");
    }
}
