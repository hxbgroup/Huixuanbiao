<?php
include 'common.php';
include 'header.php';
echo "Loading...";
$stat = Typecho_Widget::widget('Widget_Stat');
?>
<?php 
if ($user->hasLogin()) {
    echo "Loading...";
    $response->redirect($options->siteUrl."my/my.php");
}
else{
    echo '您还未登录~';
    $response->redirect($options->siteUrl."my/login.php");
}
?>
<?php include 'footer.php'; ?>
