<?php include 'v_common.php'; ?>
<?php include 'v_header.php'; ?>
<body>
<div class="container">
<div class="container theme-showcase" role="main" style="text-align:center">
    <div class="jumbotron">
        <h2><?php echo $v_sitename; ?> 演示</h2>
        <div id="noticev" class="alert alert-info">
        <p id="notice">Welcome!</p>
        </div>
        <p><button type="button" onclick="javascrtpt:window.location.href='v_weakv.php'" class="btn btn-success btn-lg">身份弱验证（网络环境验证）</button></p>
        <p><button type="button" onclick="javascrtpt:window.location.href='edumailv.php'" class="btn btn-success btn-lg">身份强验证（教育邮箱验证）</button></p>
    </div>
<?php include 'v_footer.php'; ?>
</div>
</div>
</body>
</html>



