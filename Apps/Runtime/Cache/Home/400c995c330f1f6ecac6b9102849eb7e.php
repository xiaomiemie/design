<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>川大跳蚤市场首页</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="keywords" content="交易,跳蚤,川大,买,卖,出售" />
  <meta name="description" content="川大跳槽市场，专注买卖交易出售租赁活动" />
  <meta charset='utf-8'>
  <link rel="bookmark" href="/design/favicon.ico"/>
  <link rel="shortcut icon" type="image/ico" href="/design/favicon.ico">
  <link rel="stylesheet" type="text/css" href="/design/Apps/Home/Public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/design/Apps/Home/Public/css/index.css">
  <link rel="stylesheet" type="text/css" href="/design/Apps/Home/Public/css/form.css">
  <link rel="stylesheet" type="text/css" href="/design/Apps/Home/Public/css/content.css">
  <link rel="stylesheet" type="text/css" href="/design/Apps/Home/Public/css/toolbar.css">
  <script type="text/javascript" src="/design/Apps/Home/Public/framework/require.js" data-main='/design/Apps/Home/Public/js/index/indexapp'></script>
  <!-- // <script type="text/javascript" src="framework/bootstrap.min.js"></script>
-->
</head>
<body>

<div class="main">
  <!-- search -->
  <div class="search">
    <select class="form-control select-radius" id='searchtype'>
      <option value='3' selected>全部</option>
      <option value='0'>转租</option>
      <option value='1'>出售</option>
      <option value='2'>可租可售</option>
    </select>
    <input type="text" id='searchinput' class="form-control input-radius" placeholder="关键词" />
    <button type="submit" class="btn btn-info" id="searchbutton" style="width:80px">搜索</button>
  </div>
  <!-- content -->
  <div class="content">

    <div class="leftlist">
      <div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading heading-text">快速入口</div>
        <div class="panel-body">
          <div class="list-group">
            <a href="#" class="list-group-item" data-type="0">服装饰品</a>
            <a href="#" class="list-group-item" data-type='1'>零食水果</a>
            <a href="#" class="list-group-item" data-type='2'>生活娱乐</a>
            <a href="#" class="list-group-item" data-type='3'>学习用品</a>
            <a href="#" class="list-group-item" data-type='4'>电子产品</a>
            <a href="#" class="list-group-item" data-type='5'>其他</a>
          </div>
        </div>
      </div>
    </div>

    <div class="rightlist clearfloat">

      <ul class="goodlist"></ul>
      <!-- <div class="loadnext">继续加载</div>
    -->
  </div>

</div>
<!-- main end -->
</div>

<div class="loading">
<img src="/design/Apps/Home/Public/image/loading2.jpg"></div>
<!--工具条-->
<div class="toolbar">
<span class="toolbar-item"></span>
</div>
<!-- 头部信息 -->
  <header class="header">
    <span class="logo-name"><img src="/design/Apps/Home/Public/image/logoheader.png" alt="川大跳槽市场"/>川大跳蚤市场</span>
    <ul class='nav-ul'>

      <?php if($_SESSION['nickname']!= ''): ?><li class='loginnickName'>
          <?php echo (session('nickname')); ?>
          <ul class="menu-ul">
          
            <li >
              <a target="_blank" style="display:block;width: 100%;" href="<?php echo U('Personal/index');?>">个人中心</a>
            </li>
            <li class="logoutbutton"><a href="<?php echo U('Login/logout');?>" style="display:block;width: 100%;">退出</a></li>
          </ul>
        </li>
        <?php elseif(1): ?>  
        <li style="width:50px">
          <a href=" <?php echo U('Login/index');?>">登录</a>
        </li>

        <?php else: ?>  
        <a href="<?php echo U('Login/index');?>">登录</a><?php endif; ?>

      <li style="width:30px">
        <a href="<?php echo U('Register/index');?>">注册</a>
      </li>
    </ul>
  </header>

<footer style="text-align: center;font-size: 12px;color:#ccc;margin-top:50px;">2015©川大跳蚤市场网</footer>

</body>
</html>