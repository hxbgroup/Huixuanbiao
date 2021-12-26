<?php
header('content-type:text/html;charset=utf-8');
//1.包含所需文件
require_once 'swiftmailer-master/lib/swift_required.php';
require_once 'swiftmailer-master/lib/swift_init.php';
require_once 'PdoMySQL.class.php';
require_once 'config.php';
require_once 'pwd.php';
//2.接收信息
$act = $_GET['act'];
$table = 'user';
//3.得到连接对象
$PdoMySQL = new PdoMySQL();
if ($act === 'mailv') {
    //addslashes() 过滤用户输入的内容
    $username = addslashes($_POST['username']);
    $email = $_POST['email'];
    if (($username != "") && ($email != "")) {
        //$email = $email . ".sysu.edu.cn";
        $theemailexist = $PdoMySQL->find($table, "email='{$email}'", 'status');
        $countmailexist = count($theemailexist);
        $vmailexist=1;//默认该邮箱可用
        if($countmailexist!=0){//验证系统已有该邮箱尝试验证的记录，下面检查是否有已经通过的
        if($countmailexist==1){
            if($theemailexist['status'] != 0){
                $vmailexist=0;//有已经通过验证的
                echo "该邮箱已被使用过，每个邮箱仅能绑定一个回旋镖账号。如您有疑问，您可以联系我们处理。";
            }
        }
        else{
            for ($i = 0;$i < $countmailexist;$i++) {
            if ($theemailexist[$i]['status'] != 0) {
                $vmailexist=0;//有已经通过验证的
                echo "该邮箱已被使用过，每个邮箱仅能绑定一个回旋镖账号。如您有疑问，您可以联系我们处理。";
                break;
            }
            }
        }
        }
        
        if ($vmailexist == 1) { //如果对应邮箱可用
            $regtime = time(); //注册时间
            //完成注册的功能
            $token = md5($username . $regtime . "hxbdsstt"); //账户激活码生成
            $token_exptime = $regtime + 24 * 3600; //过期时间
            //compact():快速创建数组
            $data = compact('username', 'email', 'token', 'token_exptime', 'regtime');
            $res = $PdoMySQL->add($data, $table);
            $lastInsertId = $PdoMySQL->getLastInsertId();
            if ($res) {
                //发送邮件，以QQ邮箱为例
                //配置邮件服务器，得到传输对象
                $transport = Swift_SmtpTransport::newInstance('smtp.qq.com', 465, 'ssl');
                //设置登陆帐号和密码
                $transport->setUsername('请在这里填入您的邮箱地址');
                $transport->setPassword($emailPassword);
                //得到发送邮件对象Swift_Mailer对象
                $mailer = Swift_Mailer::newInstance($transport);
                //得到邮件信息对象
                $message = Swift_Message::newInstance();
                //设置管理员的信息
                $message->setFrom(array('请在这里填入您的邮箱地址' => '回旋镖社区'));
                //将邮件发给谁
                $message->setTo(array($email => 'hxbuser'));
                //设置邮件主题
                $message->setSubject('回旋镖社区身份验证');
                $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?act=active&token={$token}";
                //转码
                $urlencode = urlencode($url);
                $str = <<<EOF
    		亲爱的{$username}您好，欢迎您进行回旋镖社区身份验证！<br/>
    		请点击下面的验证链接进行验证！<br/>
    		<a href="{$url}">{$urlencode}</a>
    		<br/>
    		如果点此链接无反应，可以将其复制到浏览器中打开，验证链接的有效时间为24小时。<br/>
    		如您未发起过回旋镖的身份验证，请忽略本邮件，切勿点击上面的链接。<br/>
    		<a href="https://hxb.yizuodi.cn">回旋镖</a>-你的每一次找寻，都有回应。
EOF;
                //设置邮件的内容
                $message->setBody("{$str}", 'text/html', 'utf-8');
                try {
                    if ($mailer->send($message)) {
                        echo "恭喜您{$username}提交验证请求成功，请到邮箱中点击验证邮件中的验证链接<br/>";
                        echo '5秒钟后将跳转至回旋镖首页';
                        echo '<meta http-equiv="refresh" content="5;url=https://w.hxb.yizuodi.cn"/>';
                    } else {
                        //删除保存的数据
                        $PdoMySQL->delete($table, 'id=' . $lastInsertId);
                        echo '提交验证请求失败，请稍后重试';
                        echo '5秒钟后跳转到验证请求页面';
                        echo '<meta http-equiv="refresh" content="5;url=index.php"/>';
                    }
                }
                catch(Swift_ConnectionException $e) {
                    echo 'e01 验证系统内部错误，请联系管理员。' . $e->getMessage();
                }
            } else {
                echo '失败';
                echo '<meta http-equiv="refresh" content="3;url=index.php#toregister"/>';
            }
        } 
    }else {
            echo "非法请求。";
        }
} elseif ($act === 'tovuser') {
    //addslashes() 过滤用户输入的内容
    $username = addslashes($_GET['username']);
    $row = $PdoMySQL->find($table, "username='{$username}'", 'status');
    $countrow = count($row);
    $countrow1 = 0;
    if ($countrow) {
        if($countrow==1){
            if ($row['status'] != 0) {
                echo $row['status'];
                $countrow1++;
            }
            else{
                echo "0";//未验证通过
            }
        }
        else{
            for ($i = 0;$i < $countrow;$i++) {
            if ($row[$i]['status'] != 0) {
                echo $row[$i]['status'];
                $countrow1++;
                break;
            }
            }
            if ($countrow1 == 0) {
                echo '0'; //未有一次验证通过
            }
        }
    } else {
        echo '0'; //用户不存在
        
    }
} elseif ($act === 'active') {
    //完成激活操作
    $token = addslashes($_GET['token']);
    $row = $PdoMySQL->find($table, "token='{$token}' AND status=0", array('id', 'token_exptime'));
    $now = time();
    if (!empty($row)) {
        if ($now > $row['token_exptime']) {
            echo '未在限定验证时间内验证，请提交新的验证请求';
        } else {
            $res = $PdoMySQL->update(array('status' => 1), $table, 'id=' . $row['id']);
            if ($res) {
                echo '验证成功,3秒钟后跳转到回旋镖系统';
                echo '<meta http-equiv="refresh" content="3;url=https://w.hxb.yizuodi.cn/my/v.php"/>';
            } else {
                echo '验证失败';
                echo '<meta http-equiv="refresh" content="3;url=index.php"/>';
            }
        }
    } else {
        echo '该邮箱已通过验证';
    }
}