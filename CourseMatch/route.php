<?php
$route = new Router(Request::uri()); //搭配 .htaccess 排除資料夾名稱後解析 URL
$route->getParameter(1); // 從 http://127.0.0.1/game/aaa/bbb 取得 aaa 字串之意

// 用參數決定載入某頁並讀取需要的資料
switch($route->getParameter(1)){

    case "register":
      include('view/header/default.php'); // 載入共用的頁首
      include('view/body/register.php');    // 載入新增用的表單
      include('view/footer/default.php'); // 載入共用的頁尾
    break;
    case "signin":
      include('view/header/default.php'); // 載入共用的頁首
      include('view/body/signin.php');    // 載入新增用的表單
      include('view/footer/default.php'); // 載入共用的頁尾
    break;

    case "home":
      include('view/header/default.php'); // 載入共用的頁首
      include('view/body/main.php');    // 載入新增用的表單
      include('view/footer/default.php'); // 載入共用的頁尾
    break;

    case "personal":
      include('view/header/login.php');
      include('view/body/personal.php');
      include('view/footer/default.php');
    break;

    case "editcourse":
      include('view/header/login.php');
      include('view/body/editcourse.php');
      include('view/footer/default.php');
    break;

    case "block":
      include('view/header/login.php');
      include('view/body/block.php');
      include('view/footer/default.php');
    break;

    default:
      include('view/header/default.php'); // 載入共用的頁首
      include('view/body/main.php');
      include('view/footer/default.php'); // 載入共用的頁尾
    break;
}
