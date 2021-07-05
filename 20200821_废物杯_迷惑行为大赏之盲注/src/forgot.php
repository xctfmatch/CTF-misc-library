<?php
include 'config.php';
// 创建连接
$conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("数据库连接出错！");
}
if(isset($_POST['username'])){
    try{
        $sql = "SELECT COUNT(1) AS total FROM user WHERE username='".$_POST['username']."'";
        $result = $conn->query($sql);
        $data=mysqli_fetch_assoc($result);
        if ($data['total'] > 0) {
            echo '用户存在，但是不允许修改密码 :P';
        } else {
            echo '用户名不存在';
        }
        $conn->close();
        exit;
    }catch(PDOException $x) { die("数据库查询出错！"); }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>忘记密码</title>
    <style type="text/css">
        ul,li{margin:0;padding:0;}
        form{margin:40px 30px 0;width: 280px;}
        form li{list-style:none;padding:5px 0;}
        form li label{float:left;width:70px;text-align:right}
        form li a{font-size:12px;color:#999;text-decoration:none}
        form li img{vertical-align:top}
        #info{color: #f00;}
    </style>
</head>
<body>
<form action="forgot.php" method="POST" onsubmit="return checkUser()">
    <fieldset>
        <legend>重置密码</legend>
        <ul>
            <li>
                <label for"">用户名:</label>
                <input type="text" name="username" id="username"/>
            </li>
            <li>
                <a id="info"></a>
            </li>
        </ul>
    </fieldset>
</form>
<script>
    function checkUser() {
        var username = document.getElementById("username");
        if(!username.value || username.value.trim().length === 0){
            document.getElementById("info").innerText = "用户名不能为空";
        }else{
            var XHR=null;
            if (window.XMLHttpRequest) {
                XHR = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                XHR = new ActiveXObject("Microsoft.XMLHTTP");
            } else {
                XHR = null;
            }
            if(XHR){
                XHR.open("POST", "forgot.php",true);
                XHR.onreadystatechange = function () {
                    if (XHR.readyState == 4 && XHR.status == 200) {
                        document.getElementById("info").innerText = XHR.response;
                        XHR = null;
                    }
                };
                XHR.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                XHR.send('username=' + username.value);
            }
        }
        return false;
    }
</script>
</body>
</html>