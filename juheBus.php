<?php 
//公交信息接口
$bus_url = 'http://op.juhe.cn/189/bus/busline?dtype=&key=22cf2ec9b5c1caecc453a3c9c5f01bbf&city=';

$cName = $_GET["cName"];
$roadNum = $_GET["roadNum"];

echo _httpGet(bus_url + cName + '&bus=' + roadNum);


function _httpGet($url){

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
        // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }