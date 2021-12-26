<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<style type="text/css">
/*--------------------------------------------------------------
# comments-ajax
--------------------------------------------------------------*/
#loading{
	font-family:microsoft yahei;
	margin-bottom:20px
}
.submit-su , .submit-er , .err-ti {
	width:24px;
	height:24px
}
.err-ti{
	background: url(../images/err-loading.gif);
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    float: left;
    margin-right: 5px;
}
.submit-er {
	background: url(../images/err-icon.png);
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    float: left;
    margin-right: 5px;
}
.submit-su {
	background: url(../images/submit-yes.png);
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    float: left;
    margin-right: 5px;
}
#success_1 {
	font-family: microsoft yahei;
	display: inline-block;
    padding-left: 65px;
    margin-bottom: 20px;
}

/*--------------------------------------------------------------
# comments-nav
--------------------------------------------------------------*/

#loading-comments {display: none; 
max-width: 860px; 
margin:0 auto;
height: 40px;  
text-align: center; 
line-height: 45px;
background-image: url("../images/postload.gif");
background-position:center;
background-repeat:no-repeat; 
}

h3#comments-list-title {
max-width: 1245px;
width: 100%;
margin: 0 auto;
margin-bottom: 40px;
font-family: microsoft yahei;
color: #7D7D7D;
font-weight: 400;
}
#comments-list-title a {
font-size: 13px;
font-weight: 400;
color: #909090;
}	

/*--------------------------------------------------------------
## Comments
--------------------------------------------------------------*/
a.comment-reply-login {
    font-size: 13px;
    line-height: 32px;
    margin-left: 10px;
    color: dimgrey;
}

.author-smilies-box {
    position: relative;
    display: block;
}

#comment-author-info {
	display:none;
	margin-top: 30px;
}

#respond_box .author-updown {
	font-family:miranafont,"Hiragino Sans GB","Microsoft YaHei",SimSun,sans-serif;
}

#toggle-comment-info {
	color: #A0DAD0;
	cursor: pointer;
	font-size: 15px;
}

#toggle-comment-info:hover {
	color: #ddd;
}

.author-updown {
    margin-top: 30px;
}

.body img {
	margin: 0 4px 0 4px;
}

.com-footer {
    position: relative;
    display: inline-block;
    width: 100%;
}

.graybar {
	display:none
}

.comments #error {
	font-family:microsoft yahei;
	margin-bottom:20px
}
.notification-hidden {
    display: none;
}

form#commentform {
    outline: none;
}

#commentform a {
	color:#909090
}
/*评论翻页*/
nav#comments-navi {
margin: 0 auto;
max-width: 860px;
width: 100%;
color: #9A9A9A;
margin-bottom: 20px;
}
.lists-navigator {
	margin:-30px 0 35px;
}
.lists-navigator ol {
	margin:0;
	padding:0 10px;
	list-style:none;
	text-align:center
}
.lists-navigator ol li {
	display:inline-block;
	color:#5f5f5f;
}
.lists-navigator ol li a {
	font-size:14px;
	padding:0 20px;
	/* color:#5f5f5f;*/
}
#comments .lists-navigator ol li.current a {
	color:#A0DAD0
}
#comments a {
	color:#5f5f5f
}
#comments a:hover {
	color:#A0DAD0
}

span.page-numbers.current {
color: #74CCC4;
padding:0 5px;
}
a.page-numbers {
color: #ABABAB;
padding: 0 5px;
}
.comments {
clear: both;
overflow: hidden;
width: 100%;
padding: 50px 0 50px;
list-style: none;
background: #fff; }

.comments .comment-list {
max-width: 860px;
margin: 0 auto;
padding: 0; }

.comments .comment-list hr {
height: 0px;
width: 100%;
background: #eee;
border: 0;
margin: 40px 0; }

@media (max-width: 1080px) {
.comments .comment-list {
width: 100%;
padding: 0 6.39%;
max-width: 1245px;
margin-bottom: 40px; } }

.comments .comments-hidden {
display: none;
cursor: pointer; }

.comments .comments-main {
overflow: hidden;
-webkit-transition: height 0s ease-out;
-moz-transition: height 0s ease-out;
transition: height 0s ease-out; }

.comments ol.comment-list {
margin: 0 auto 70px;
font-family: microsoft yahei;}

.comnav {
width: 69.076%;
max-width: 860px;
margin: 0 auto; 
font-family: miranafont,"Hiragino Sans GB",STXihei,"Microsoft YaHei",SimSun,sans-serif;
}

a.cute.atreply {
    color: #4DA05F;
}

.comnav a {
padding: 10px;
color: #7B7B7B;
margin-bottom: 20px;
}
.comment-list li ol li .comment_body {
    padding-left: 65px;
}
div.children {
    margin: 0;
    padding: 0;
}
div.children ol{
    padding: 0 !important;
}




@media (max-width: 1080px) {
.comments {
padding: 0 0 6.39%;
margin-top:40px !important;
max-width:100%	 } }

.comment {
margin: 0;
padding: 0;
list-style: none; }

.comment .contents {
margin-bottom: 45px;
 }

.comment .isauthor {
display: none;
font-size: 15px;
color: #D3DBE2;
text-transform: uppercase; }

.comment .isauthor i {
	font-size: 16px;
    color: #FFD67A;
    float: right;
    margin-top: 3px;
    margin-left: 5px;
}

.comment.bypostauthor > .contents .isauthor {
display: inline; }

.comment .body {
font-family: miranafont,"Hiragino Sans GB","Microsoft YaHei",SimSun,sans-serif;
font-size: 16px;
line-height: 32px;
color: #63686d; }

.comment .body p {
font-family: miranafont,"Hiragino Sans GB","Microsoft YaHei",SimSun,sans-serif;
font-size: 14px;
line-height: 32px;
color: #63686d;
letter-spacing: 1px; }

@media (max-width: 580px) {
.comment .body p {
font-size: 15px;
line-height: 30px; } }

@media (max-width: 375px) {
.comment .body p {
line-height: 26px; } }

.comment .body > *:last-child {
margin-bottom: 0; }

.comment .profile {
float: left;
width: 6%;
margin-right: 2%;
}

.comment .profile img {
width: 100%;
max-width: 50px;
border-radius: 100%;
height: 50px;
 }

.comment .profile img:hover {
-webkit-animation: btn-pudding 1s linear;
animation: btn-pudding 1s linear;
 }
 

.comment .main {
float: right;
width: 89%;
background: #FFFFFF;
padding: 10px 20px;
}


.comment .commeta {
font-family: "microsoft jhenghei","Arial",Sans-Serif;
font-size: 16px;
padding-bottom: 10px;
border-bottom: 1px dashed #ddd;
overflow: hidden;
margin-bottom: 5px;
text-transform: uppercase;
color: #9499a8; }

.comment .left {
float: left; }

.comment .right {
float: right; }

.comment .comment-reply-link {
font-family: "microsoft jhenghei","Arial",Sans-Serif;
font-size: 14px;
display: block;
margin-top: 10px;
margin-left: 10px;
float: right;
text-transform: uppercase;
color: #9499a8; }

.comment .comment-reply-link:hover {
color: #606576; }

.comment .info {
margin-top: 10.5px;
font-size: 12px;
letter-spacing: 1px;
font-family: microsoft yahei light;
color: #DADADA; }

@media (max-width: 530px) {
.comment .info {
display: none; }
 }

.comment h4 {
font-family: miranafont,"Hiragino Sans GB",STXihei,"Microsoft YaHei",SimSun,sans-serif;
font-size: 24px;
margin: 0;
letter-spacing: 1px;
line-height: 25px;  }

.comment h4 img {
display: none;
border-radius: 100%;
margin-right: 15px;
vertical-align: -4px;
width: 42px;
height: auto; }

.comment h4 a {
color: #696969;
font-size:15px;
font-weight: 600;
}

.comment h4 a:hover {
color: #ADDAC9 }

.comment hr {
clear: both;
width: 100%;
height: 1px;
margin: 40px 0 60px;
border: 0;
background: #e6e6e6; }

.comment .children .profile {
float: left;
width: 5%; }

.comment .children .profile img {
height: 41px;
width:41px  }

.comment .children .main {
width: 89%; }

@media (max-width: 880px) {
.comment .isauthor i {
	display:none
}	
.comment hr {
margin: 6.39% 0; }
.comment .profile {
display: none; }
.comment .main, .comment .children .main {
width: 100%; }
.comment h4 img {
display: inline-block; }
	}
.comment .children h4 img {
width:32px }
	}
.comment-list li ol li .comment_body {
    padding-left: 35px;
}
	

.comment-respond {
width: 100%;
max-width: 860px;
margin: 0 auto;
padding: 0; }

.comment-respond .logged-in-as {
margin-bottom: 0; }

.comment-respond #cancel-comment-reply-link {
float: right;
background: #f4f6f8;
border-radius: 3px;
padding: 12px 25px;
font-size: 12px;
color: #454545; 
}

.comment-respond textarea, .comment-respond input {
font-family: miranafont,"Hiragino Sans GB",STXihei,"Microsoft YaHei",SimSun,sans-serif;
font-size: 14px;
float: left;
width: 31.5%;
margin: 0;
padding: 16px 25px 15px;
color: #535a63;
border: 0;
border-radius: 0px;
background: #FFFFFF; }

.comment-respond input {
margin-bottom: 20px;
border: 2px solid #DDE6EA;
margin-right: 3%;
}

.comment-respond input:last-of-type {
 margin-right:0;
 width: 31%;}

@media (max-width: 625px) {
.comment-respond input {
width: 100%;
margin-bottom: 15px; }
.comment-respond input:last-of-type {
 width: 100%;} }

.comment-respond textarea {
display: block;
font-family: miranafont,"Hiragino Sans GB",STXihei,"Microsoft YaHei",SimSun,sans-serif;
float: none;
width: 100%;
height: 180px;
margin-bottom: 40px;
color: #535a63;
border: 2px solid #DDE6EA; }

@media (max-width: 625px) {
.comment-respond textarea {
margin-top: 15px; } }

.comment-respond .form-submit {
clear: both;
display: block;
overflow: hidden;
margin-bottom: 40px;
padding: 0; }

.comment-respond input[type='submit'] {
width: auto;
margin: 0;
padding: 15px 35px;
text-transform: uppercase;
color: #fff;
background: #A0DAD0;
border-right: 0;
-webkit-transition: background 0.15s ease-out;
-moz-transition: background 0.15s ease-out;
transition: background 0.15s ease-out;
box-shadow: none;
border: 0;
border-radius: 2px;
text-shadow:none
}

.comment-respond input[type='submit']:hover {
background:#DDE6EA;
-webkit-animation: btn-pudding 1s linear;
animation: btn-pudding 1s linear;
}	

.comment-respond input:focus, .comment-respond textarea:focus, .comment-respond input:active, .comment-respond textarea:active {
outline: none; }

.comment-respond input::-webkit-input-placeholder, .comment-respond textarea::-webkit-input-placeholder {
color: #535a63; }

.comment-respond input:-moz-placeholder, .comment-respond textarea:-moz-placeholder {
opacity: 1;
color: #535a63; }

.comment-respond input::-moz-placeholder, .comment-respond textarea::-moz-placeholder {
opacity: 1;
color: #535a63; }

.comment-respond input:-ms-input-placeholder, .comment-respond textarea:-ms-input-placeholder {
color: #535a63; }

@media (max-width: 1080px) {
.comment-respond {
width: 100%;
padding: 0 6.39%;
max-width: 1245px; } }

.notification {
padding: 17px 32px 15px;
background: #FFFFFF;
color: #6F6F6F;
font-family: microsoft yahei;
width: 160px;
margin: 0 auto;
border: 1px solid #C7C7C7;  }

.comment-respond .logged-in-as {
margin-bottom:20px
}
.notification i, .comment-respond .logged-in-as i {
margin-right: 10px; }

.comment-respond .logged-in-as a {
color: #454545; }	

.notification a {
color: #B3B3B3;
}

.notification span {
font-size:13px;
}

.headertop {
position: relative;
overflow: hidden;
margin-top: 80px;
}
</style>
<?php $this->comments()->to($comments); ?>
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
	$depth = $comments->levels +1;
?>
	<?php //判断邮箱类型选取头像地址
		$email = $comments->mail;
		$avatar = "https://api.hxb.yizuodi.cn/avatar/hxb.png";
		$avatar2x = "https://api.hxb.yizuodi.cn/avatar/hxb.png";
	/*if(preg_match('|^[1-9]\d{4,10}@qq\.com$|i',$email)){
		$qqnumber = explode("@",$email);
		$avatar = '//q.qlogo.cn/g?b=qq&nk=' . $qqnumber[0]. '&s=100';
		$avatar2x = '//q.qlogo.cn/g?b=qq&nk=' . $qqnumber[0]. '&s=160';
	 }else{
		$avatar = 'https://sdn.geekzu.org/avatar/' . md5(strtolower($comments->mail)) . '?s=80&r=X&d=mm';
		$avatar2x = 'https://sdn.geekzu.org/avatar/' . md5(strtolower($comments->mail)) . '?s=160&r=X&d=mm';
		
	}*/
	//$avatar = 'https://api.hxb.yizuodi.cn/avatar/'. $email.".jpg";
	//$avatar2x = 'https://api.hxb.yizuodi.cn/avatar/'. $email.".jpg";
	?>

<li class="comment <?php $comments->alt('comment-odd', 'comment-even');?> depth-<?php echo $depth ?>" id="li-<?php $comments->theId(); ?>">
		<div id="<?php $comments->theId(); ?>" class="comment_body contents">
			<div class="profile">
				<a href="<?php $comments->url(); ?>"><img alt="<?php $comments->author(false); ?>" src="<?php echo $avatar ?>" srcset="<?php echo $avatar2x ?> 2x" class="avatar avatar-50 photo" height="50" width="50"></a>
			</div>
			<section class="commeta">
				<div class="left">
					<h4 class="author"><a href="<?php dirname('https://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]) ?>/author/<?php $comments->authorId(); ?>"><img alt="<?php $comments->author(false); ?>" src="<?php echo $avatar ?>" srcset="<?php echo $avatar2x ?> 2x" class="avatar avatar-50 photo" height="50" width="50"/><?php $comments->author(false); ?><span class="isauthor" title="Author"><i class="iconfont">&#xe615;</i></span></a></h4>
				</div>
				<?php if(true): ?>
				<a rel='nofollow' class='comment-reply-link' href='<?php $comments->responseUrl(); ?>' onclick="return TypechoComment.reply('<?php $comments->theId(); ?>', <?php $comments->coid();?>);" aria-label='回复给<?php $comments->author(false); ?>'>回复</a>
				<?php endif; ?>
				<div class="right">
					<div class="info"><time datetime="<?php $comments->date('Y-m-d'); ?>"><?php $comments->date('Y年m月d日'); ?></time></div>
				</div>
			</section>
			<div class="body">
				<p>
					<?php get_commentReply_at($comments->coid); ?>                                   <!-- 评论@ -->
					<?php $cos = preg_replace('#</?[p|P][^>]*>#','',$comments->content);echo $cos;?> <!-- 评论内容 -->
				</p>
			</div>
		</div>
		<?php if ($comments->children){ ?>
		<!-- 嵌套评论代码 -->
		<div class="children">
			<?php $comments->threadedComments($options); ?>
		</div>
		<?php } ?>
	</li>
<?php } ?>

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">评论（<?php $this->commentsNum(_t('NOTHING'), _t('已有<span class="noticom">1</span>条回复'), _t('已有<span class="noticom">%d</span>条回复')); ?>）</h3>
</div>
<div class="panel-body">
    
<div id="comments">
    <?php if ($comments->have()): ?>
    <div>
    <?php $comments->listComments(); ?>
    </div>
    <p><?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?><p>
    <?php endif; ?>
    <?php if($this->user->hasLogin()): ?>
    <?php if($this->user->hasv()): ?>
      <?php if($this->allow('comment')): ?>
      <div id="<?php $this->respondId(); ?>">
        <div>
            <?php $comments->cancelReply(); ?>
        </div>
        <div class="panel panel-default" class="comment-respond">
            <div class="panel-heading"> 
                <h3 id="response" class="panel-title"><?php _e('回复该消息'); ?></h3>
                </div>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
    	    <div>
    		<h4><?php _e('您的用户名: '); ?><a style="color:black" href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a></h4> 
    		<p>
                <p><textarea class="form-control" rows="5" placeholder="请在这里输入~" id="comment" name="text"></textarea></p>
    		<p>
                <button type="submit" class="btn btn-success"><?php _e('回复'); ?></button>
            </p>
            </div>
    	</form>
    	</div>
    </div>
    <?php else: ?>
    <h3><?php _e('该消息已过期，回复功能已关闭~'); ?></h3>
    <?php endif; ?>
    <?php else: ?>
<h3>👋 您尚未完成身份认证~</h3>
<p>您需要在身份认证后方可管理已发布的消息。</p>
<p><a href="<?php $this->options->adminUrl('v.php'); ?>">点我现在就进行身份认证</a></p>
    <?php endif; ?>
<?php else: ?>
    <h3><?php _e('您可以在登录后回复消息~'); ?></h3>
<?php endif; ?>
</div>
</div>
</div>