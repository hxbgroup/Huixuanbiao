<?php
$Data = strval(file_get_contents("php://input"));
if($Data =="oauthcvyr71_qar33455tt=e2s3ef"){
    echo "弱验证已完成";
    $vbool=1;
}else{
    echo "非法请求 错误编码0000";
}
?>