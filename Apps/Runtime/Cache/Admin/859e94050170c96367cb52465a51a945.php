<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>后台主页</title>
  <link rel="stylesheet" type="text/css" href="/design/Apps/Admin/Public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/design/Apps/Admin/Public/css/index.css">
  <link rel="stylesheet" type="text/css" href="/design/Apps/Admin/Public/css/form.css">

  <script type="text/javascript" src="/design/Apps/Admin/Public/framework/require.js" data-main="/design/Apps/Admin/Public/js/index/indexapp"></script>

</head>
<body>
  <header class="main-header">

    <ul>
      <?php if($_SESSION['username']!= ''): ?><li class='loginUserName'><?php echo (session('username')); ?></li>
        <li>
          <a href="<?php echo U('Login/logout');?>">退出</a>
        </li>
        <?php elseif(1): ?>
        <li style="width:50px">
          <a href=" <?php echo U('Login/index/');?>">登录</a>
        </li>
        <?php else: ?>
        <a href="<?php echo U('Login/index/');?>">登录1</a><?php endif; ?>
    </ul>
    <span>校园租赁买卖信息交流平台后台主页</span>
  </header>
  <div class="main-content">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" >
        <a href="#info"  role="tab" data-toggle="tab">信息列表</a>
      </li>
      <li role="presentation" class="active">
        <a href="#user"  role="tab" data-toggle="tab">用户列表</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane " id="info">
        <!-- 搜索 -->
        <div class="search">
          <input type="text" id='searchinfoinput' class="form-control input-radius" placeholder="关键词" />
          <button type="submit" class="btn btn-info" id="searchinfobutton" style="width:80px">搜索</button>
        </div>
        <!-- 列表 -->
        <ul class="goodlist"></ul>
      </div>
      <div role="tabpanel" class="tab-pane active" id="user">
        <!-- 搜索 -->
        <div class="search">
          <input type="text" id='searchuserinput' class="form-control input-radius" placeholder="关键词" />
          <button type="submit" class="btn btn-info" id="searchuserbutton" style="width:80px">搜索</button>
        </div>
        <!-- 列表 -->
        <table class="table table-bordered table-responsive table-hover usertable">
          <thead>
            <tr>
              <td>用户名</td>
              <td>用户昵称</td>
              <td>操作</td>
            </tr>
          </thead>
          <tbody class="usertbody">
            <tr>
              <td>用户名</td>
              <td>用户昵称</td>
              <td>
                <button class="btn btn-info">发送系统消息</button>
                &nbsp;
                <button class="btn btn-info">删除该用户</button>
              </td>
            </tr>
          </tbody>
        </table>
          <nav id='nav-page'>
            <!-- <ul class="pagination">
              <li>
                <a href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li>
                <a href="#">1</a>
              </li>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul> -->
          </nav>
      </div>
    </div>

  </div>
</body>
</html>