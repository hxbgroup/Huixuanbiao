<?php include 'v_common.php'; ?>
<?php include 'v_header.php'; ?>
<script src="https://v.hxb.yizuodi.cn/v_weakv.js"></script>
<body>
<div class="container">
<div class="container theme-showcase" role="main" style="text-align:center">
    <div class="jumbotron">
        <h2>完成身份弱验证</h2>
        <p>Only For SYSU</p>
        <div id="noticev" class="alert alert-info">
        <p id="notice">验证前，请确保您当前设备已连接到中山大学校园网。</p>
        </div>
        <p><button type="button" onclick="v()" class="btn btn-success btn-lg">点我进行验证</button></p>
        <p>说明：弱验证通过识别您的网络环境，判断您是否使用校园网以进行验证。</p>
    </div>
<?php include 'v_footer.php'; ?>
</div>
</div>
</body>
</html>


