<?php
include 'common.php';
include 'header.php';

$stat = Typecho_Widget::widget('Widget_Stat');
$posts = Typecho_Widget::widget('Widget_Contents_Post_Admin');
$isAllPosts = ('on' == $request->get('__typecho_all_posts') || 'on' == Typecho_Cookie::get('__typecho_all_posts'));
?>
<div class="container theme-showcase" style="margin-top:100px">
    <div class="jumbotron">
        <?php if($user->hasv()): ?>
        <h1>管理我发布的</h1>
        <div class="row typecho-page-main" role="main">
            <div class="col-mb-12 typecho-list">
                <div class="clearfix">
                    
                    <ul class="typecho-option-tabs right">
                    <?php if($user->pass('editor', true) && !isset($request->uid)): ?>
                        <li class="<?php if($isAllPosts): ?> current<?php endif; ?>"><a href="<?php echo $request->makeUriByRequest('__typecho_all_posts=on'); ?>"><?php _e('所有'); ?></a></li>
                        <li class="<?php if(!$isAllPosts): ?> current<?php endif; ?>"><a href="<?php echo $request->makeUriByRequest('__typecho_all_posts=off'); ?>"><?php _e('我的'); ?></a></li>
                    <?php endif; ?>
                    </ul>
                    
                    
                    
                </div>

                <div class="typecho-list-operate clearfix">
                    <form method="get">
                        <div class="operate">
                            <label><i class="sr-only"><?php _e('全选'); ?></i><input type="checkbox" class="typecho-table-select-all" /></label>
                            
                            <div class="btn-group btn-drop">
                                <button class="btn dropdown-toggle btn-s" type="button"><i class="sr-only"><?php _e('操作'); ?></i><?php _e('选中项'); ?> <i class="i-caret-down"></i></button>
                                
                                <ul class="dropdown-menu">
                                    <li><a lang="<?php _e('你确认要删除这些消息吗?'); ?>" href="<?php $security->index('/action/contents-post-edit?do=delete'); ?>"><?php _e('删除'); ?></a></li>
                                </ul>
                                
                            </div>  
                        </div>
                        <div class="search" role="search">
                            
                            <?php if ('' != $request->keywords || '' != $request->category): ?>
                            <a href="<?php $options->adminUrl('manage-posts.php'
                                . (isset($request->status) || isset($request->uid) ? '?' .
                                    (isset($request->status) ? 'status=' . htmlspecialchars($request->get('status')) : '') .
                                    (isset($request->uid) ? '?uid=' . htmlspecialchars($request->get('uid')) : '') : '')); ?>"><?php _e('&laquo; 取消筛选'); ?></a>
                            <?php endif; ?>
                            <input type="text" class="text-s" placeholder="<?php _e('请输入关键字'); ?>" value="<?php echo htmlspecialchars($request->keywords); ?>" name="keywords" />
                            <select name="category">
                            	<option value=""><?php _e('所有分类'); ?></option>
                            	<?php Typecho_Widget::widget('Widget_Metas_Category_List')->to($category); ?>
                            	<?php while($category->next()): ?>
                            	<option value="<?php $category->mid(); ?>"<?php if($request->get('category') == $category->mid): ?> selected="true"<?php endif; ?>><?php $category->name(); ?></option>
                            	<?php endwhile; ?>
                            </select>
                            <button type="submit" class="btn btn-s"><?php _e('筛选'); ?></button>
                            <?php if(isset($request->uid)): ?>
                            <input type="hidden" value="<?php echo htmlspecialchars($request->get('uid')); ?>" name="uid" />
                            <?php endif; ?>
                            <?php if(isset($request->status)): ?>
                                <input type="hidden" value="<?php echo htmlspecialchars($request->get('status')); ?>" name="status" />
                            <?php endif; ?>
                        </div>
                    </form>
                </div><!-- end .typecho-list-operate -->
            
                <form method="post" name="manage_posts" class="operate-form">
                <div class="typecho-table-wrap">
                    <table class="typecho-list-table">
                        <colgroup>
                            <col width="20"/>
                            <col width="35%"/>
                            <col width="45%"/>
                            <col width=""/>
                            <col width="18%"/>
                            <col width="16%"/>
                        </colgroup>
                        <thead>
                            <tr>
                                <th> </th>
                                
                                <th><?php _e('标题'); ?></th>
                                <th><?php _e('分类'); ?></th>
                                <th><?php _e('发布时间'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if($posts->have()): ?>
                            <?php while($posts->next()): ?>
                            <tr id="<?php $posts->theId(); ?>">
                                <td><input type="checkbox" value="<?php $posts->cid(); ?>" name="cid[]"/></td>
                                
                                <td>
                                <a href="<?php $options->adminUrl('write-post.php?cid=' . $posts->cid); ?>"><?php $posts->title(); ?></a>
                                <?php 
                                if ($posts->hasSaved || 'post_draft' == $posts->type) {
                                    echo '<em class="status">' . _t('草稿') . '</em>';
                                } else if ('hidden' == $posts->status) {
                                    echo '<em class="status">' . _t('隐藏') . '</em>';
                                } else if ('waiting' == $posts->status) {
                                    echo '<em class="status">' . _t('待审核') . '</em>';
                                } else if ('private' == $posts->status) {
                                    echo '<em class="status">' . _t('私密') . '</em>';
                                } else if ($posts->password) {
                                    echo '<em class="status">' . _t('密码保护') . '</em>';
                                }
                                ?>
                                <a href="<?php $options->adminUrl('write-post.php?cid=' . $posts->cid); ?>" title="<?php _e('编辑 %s', htmlspecialchars($posts->title)); ?>"><i class="i-edit"></i></a>
                                <?php if ('post_draft' != $posts->type): ?>
                                <a href="<?php $posts->permalink(); ?>" title="<?php _e('浏览 %s', htmlspecialchars($posts->title)); ?>"><i class="i-exlink"></i></a>
                                <?php endif; ?>
                                </td>
        
                                <td><?php $categories = $posts->categories; $length = count($categories); ?>
                                <?php foreach ($categories as $key => $val): ?>
                                    <?php echo '<a href="';
                                    $options->adminUrl('manage-posts.php?category=' . $val['mid']
                                    . (isset($request->uid) ? '&uid=' . $request->uid : '')
                                    . (isset($request->status) ? '&status=' . $request->status : ''));
                                    echo '">' . $val['name'] . '</a>' . ($key < $length - 1 ? ', ' : ''); ?>
                                <?php endforeach; ?>
                                </td>
                                <td>
                                <?php if ($posts->hasSaved): ?>
                                <span class="description">
                                <?php $modifyDate = new Typecho_Date($posts->modified); ?>
                                <?php _e('保存于 %s', $modifyDate->word()); ?>
                                </span>
                                <?php else: ?>
                                <?php $posts->dateWord(); ?>
                                <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                            <?php else: ?>
                            <tr>
                            	<td colspan="6"><h6 class="typecho-list-table-title"><?php _e('没有任何文章'); ?></h6></td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                </form><!-- end .operate-form -->

                <div class="typecho-list-operate clearfix">
                    <form method="get">
                        <div class="operate">
                            <label><i class="sr-only"><?php _e('全选'); ?></i><input type="checkbox" class="typecho-table-select-all" /></label>
                            <div class="btn-group btn-drop">
                                <button class="btn dropdown-toggle btn-s" type="button"><i class="sr-only"><?php _e('操作'); ?></i><?php _e('选中项'); ?> <i class="i-caret-down"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a lang="<?php _e('你确认要删除这些文章吗?'); ?>" href="<?php $security->index('/action/contents-post-edit?do=delete'); ?>"><?php _e('删除'); ?></a></li>
                                </ul>
                            </div>  
                        </div>

                        <?php if($posts->have()): ?>
                        <ul class="typecho-pager">
                            <?php $posts->pageNav(); ?>
                        </ul>
                        <?php endif; ?>
                    </form>
                </div><!-- end .typecho-list-operate -->
                <?php else: ?>
<h3>👋 您尚未完成身份认证~</h3>
<p>您需要在身份认证后方可管理已发布的消息。</p>
<p><a href="<?php $options->adminUrl('v.php'); ?>">现在就进行身份认证</a></p>
<?php endif; ?>
                
</div>
</div>

<?php
include 'common-js.php';
include 'table-js.php';
include 'footer.php';
?>
