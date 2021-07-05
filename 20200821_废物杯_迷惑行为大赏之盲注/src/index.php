<?php
header("Content-Type:text/html;charset=utf-8");
include 'config.php';

if(isset($_POST['login']))
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if(($username=='')||($password=='')) {
        header('refresh:3;url=index.php');
        echo "用户名或密码不能为空，3秒后跳转到登录页面";
        exit;
    }else{
        try
        {
            $password = md5($password);
            $connection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $prepared = $connection->prepare("SELECT COUNT(`id`) FROM `user` WHERE `username` = :bp_username AND `passw0rd` = :bp_password ; ");
            $prepared->bindParam(':bp_username', $username);
            $prepared->bindParam(':bp_password', $password);
            $prepared->execute();
            header('refresh:3;url=index.php');
            if ($prepared->fetchColumn() == 1){
                echo "登录成功，但没有什么用，3秒后跳转到登录页面";
            }else{
                echo "用户名或密码错误，3秒后跳转到登录页面";
            }
            $prepared = null;
            $connection = null;
            exit;
        }catch(PDOException $x) { die("数据库查询出错！"); }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>管理员登录</title>
    <style type="text/css">
        ul,li{margin:0;padding:0;}
        form{margin:40px 30px 0;width: 280px;}
        form li{list-style:none;padding:5px 0;}
        form li label{float:left;width:70px;text-align:right}
        form li a{font-size:12px;color:#999;text-decoration:none}
        .login_btn{border:none;background:#01A4F1;color:#fff;font-size:14px;font-weight:bold;height:28px;line-height:28px;padding:0 10px;cursor:pointer;float: right;}
        form li img{vertical-align:top}
    </style>
</head>
<body>
<form action="index.php" method="POST">
    <fieldset>
        <legend>用户登录</legend>
        <ul>
            <li>
                <a id="info"></a>
            </li>
            <li>
                <label for"">用户名:</label>
                <input type="text" name="username"/>
            </li>
            <li>
                <label for"">密码:</label>
                <input type="password" name="password"/>
            </li>
            <li>
                <a href="forgot.php">忘记密码？</a>
                <label for""> </label>
                <input type="submit" name="login" value="登录" class="login_btn"/>
            </li>
        </ul>
    </fieldset>
</form>
</body>
</html>
