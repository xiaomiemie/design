<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="/design/Apps/Admin/Public/css/login.css">
  <link rel="stylesheet" type="text/css" href="/design/Apps/Admin/Public/css/bootstrap.min.css">
  <script type="text/javascript" src="/design/Apps/Admin/Public/framework/require.js" data-main="/design/Apps/Admin/Public/js/login/loginapp"></script>
</head>
<body>
  <header class="login-header">校园租赁买卖信息分享平台后台登录</header>

  <div class="login-form">
    <form class="form-horizontal">
      <div class="form-group has-feedback">
        <label  class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-10">
          <input type="text" name="username" class="form-control"></div>
      </div>
      <div class="form-group  has-feedback">
        <label class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
          <input type="password" name='password' class="form-control" placeholder="密码"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="button" class="btn btn-primary" style='width:200px;font-size:20px;'>登录</button>
        </div>
      </div>
    </form>
  </div>
  <footer style="text-align: center;font-size: 12px;color:#ccc;margin-top:50px;">2015©租赁买卖网</footer>

</body>
</html>