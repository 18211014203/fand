<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>密码重置</title>
</head>
<body>
    <h1>AC FUN用户:{{ $user['username'] }},您已启动密码修改功能.</h1>
    <a href="http://www.nnn.com/login/edit?user={{ $user['username'] }}&token={{ $token }}&time={{ $time }}">点击跳转修改密码!</a>

</body>
</html>