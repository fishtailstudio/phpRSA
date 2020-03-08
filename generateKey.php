<?php

$config = array(
    "digest_alg" => "sha512",//摘要算法或签名哈希算法
    "private_key_bits" => 1024,//生成私钥的位数，512、1024、2048、4096等
    "private_key_type" => OPENSSL_KEYTYPE_RSA,//加密类型
    'config' => 'openssl.cnf'
  );
$res = openssl_pkey_new($config); 

//提取私钥
openssl_pkey_export($res, $private_key, null, $config);

//生成公钥
$public_key = openssl_pkey_get_details($res);
$public_key=$public_key["key"];

// var_dump($private_key);//私钥
// var_dump($public_key);//公钥
$return=[
    'private_key'=>$private_key,
    'public_key'=>$public_key
];
echo json_encode($return);