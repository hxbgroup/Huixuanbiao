<?php if(!defined('__TYPECHO_ADMIN__')) exit; ?>
</div>
<footer id="footer" role="contentinfo">
   <div class="well" style="text-align:center">
       <p>&copy; <?php echo date('Y'); ?> “<?php $options->title(); ?>”是一款失物招领类应用</p>
       <p>反馈与建议：<a style="color:black" href="https://hxb.yizuodi.cn">回旋镖Team</a></p>
       <p><a style="color:black" href="https://beian.miit.gov.cn/">鲁ICP备20005134号-2</a><p>
   </div>
</footer>
<!-- end #footer -->
</body>
</html>

<?php
/** 注册一个结束插件 */
Typecho_Plugin::factory('my/footer.php')->end();
