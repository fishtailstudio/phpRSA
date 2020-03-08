<?php
if(!isset($_POST['private_key'])||!isset($_POST['text'])){
    echo json_encode([
        'status'=>1
    ]);
}
$private_key=$_POST['private_key'];
$text=$_POST['text'];

//私钥加密
openssl_private_encrypt($text,$encrypted,$private_key);
//加密后的内容通常含有特殊字符，需要base64编码转换下
$encrypted = base64_encode($encrypted);
echo json_encode([
    'status'=>0,
    'data'=>$encrypted
]);;