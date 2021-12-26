<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php
if (stripos($this->request->getRequestUri(), 'json')) {
    $arr = array();
$this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
    while ($archives->next()) {
        $a = array('title' => $archives->title, 'date' => $archives->date->format('Y-m-d'), 'content' => $archives->content, 'tags' => $archives->tags,'permalink' => $archives->permalink,);
        $arr[] = $a;
    }
    $this->response->throwJson(array("servererror" => "", "status" => 1, "message" => $arr));
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="回旋镖是一款失物招领类应用。你的每一次找寻，都有回应。">
<title><?php $this->archiveTitle(array(
            'category'  =>  _t('%s'),
            'search'    =>  _t('含有关键字 %s 的消息'),
            'tag'       =>  _t('标签 %s 下的消息'),
            'author'    =>  _t('%s 发布的消息')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

<!-- 引入php通用变量  -->
<?php
include 'common.php';
?>

<!-- 引入样式及组件库 -->
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="<?php $this->options->themeUrl('/css/pagenav.css'); ?>">
<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- 通过自有函数输出HTML头部信息 -->
<?php $this->header(); ?>
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">🎯<?php $this->options->title() ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">广场</a></li>
            <?php $this->widget('Widget_Metas_Category_List')
               ->parse('<li><a href="{permalink}">{name}<span class="badge">{count}</span></a></li>'); ?>
            <?php if($this->user->hasLogin()): ?>
            <li><a href="/my/write-post.php">发布新消息</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户名：<?php $this->user->screenName(); ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">账号信息</li>
                <li><a href="#">账号uid:<?php $this->user->uid(); ?></a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/my/my.php">个人中心</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>">退出登录</a></li>
              </ul>
            </li>
            <?php else: ?>
            <li><a href="<?php $this->options->adminUrl('login.php'); ?>">登录</a></li>
            <li><a href="<?php $this->options->adminUrl('register.php'); ?>">注册</a></li>
            <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <p>回旋镖</p><p>导航栏</p><p></p>
    <div class="container theme-showcase" role="main" style="margin-top:30px">
    <div class="alert alert-success" role="alert">
        <p><form class="navbar-form navbar-center" method="post" action="">
                <input type="text" name="s" class="form-control" size="20" placeholder="请输入关键词进行搜索" />
                <input type="submit" class="btn btn-success" value="搜索🔍" />
            </form>
        </p>
        <p><a href="/my/write-post.php" style="color: #20a53a">没找到？快速发布一条新消息</a></p>
</div>