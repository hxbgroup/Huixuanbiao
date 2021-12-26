<?php
if (!defined('__TYPECHO_ADMIN__')) {exit;}

$header = '<link rel="stylesheet" href="' . Typecho_Common::url('normalize.css?v=' . $suffixVersion, $options->adminStaticUrl('css')) . '">
<link rel="stylesheet" href="' . Typecho_Common::url('grid.css?v=' . $suffixVersion, $options->adminStaticUrl('css')) . '">
<link rel="stylesheet" href="' . Typecho_Common::url('style.css?v=' . $suffixVersion, $options->adminStaticUrl('css')) . '">';

/** 注册一个初始化插件 */
$header = Typecho_Plugin::factory('my/header.php')->header($header);
?>
<?php if(!$user->hasLogin()){
    
}?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php echo $header; ?>
        <meta charset="<?php $options->charset(); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php _e('%s', $options->title); ?></title>
        <meta name="robots" content="noindex, nofollow">
        
<!-- 引入样式及组件库 -->
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="<?php $options->themeUrl('/css/pagenav.css'); ?>">
<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<?php if($user->group != "administrator"): ?>
		
		<link rel="stylesheet" href="<?php $options->siteUrl(); ?>/my/user/user.css?v=1.02">
		<script>
		var UserLink="<?php $options->adminUrl('profile.php'); ?>";
		var SiteLink="<?php $options->siteUrl(); ?>";
		var UserName="<?php $user->screenName(); ?>";
		var UserGroup="<?php $user->group(); ?>";
		var SiteName="<?php $options->title(); ?>";
		var MenuTitle="<?php $menu->title(); ?>";
		</script>
		<style>
		<?php if(($menu->title == "网站概要")||($menu->title == "")): ?>
		.typecho-page-main div:nth-child(4){}
		.typecho-page-main .col-tb-4{}
		<?php endif; ?>
		<?php if($menu->title == "登录到".$options->title): ?>
		.popup{}
		<?php endif; ?>
		<?php endif; ?>
		</style>
    </head>
<body>
    
    <?php if($user->group != "administrator"): ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="/">🎯回旋镖</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/my/my.php">个人中心</a></li>
            <?php if($user->hasLogin()): ?>
            <li><a href="/my/write-post.php">发布新消息</a></li>
            <li><a href="/my/manage-posts.php">管理我发布的</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">欢迎：<?php $user->screenName(); ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">账号信息</li>
                <li><a href="#">账号uid:<?php $user->uid(); ?></a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php $options->adminUrl('my.php'); ?>">个人中心</a></li>
                <li><a href="<?php $options->logoutUrl(); ?>">退出登录</a></li>
              </ul>
            </li>

            <?php else: ?>
            <li><a href="<?php $options->adminUrl('login.php'); ?>">登录</a></li>
            <li><a href="<?php $options->adminUrl('register.php'); ?>">注册</a></li>
            <?php endif; ?>
            <li><a href="/" target="_top">返回广场</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <?php endif; ?>