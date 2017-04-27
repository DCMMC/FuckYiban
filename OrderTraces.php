<?php
//电商ID
defined('EBusinessID') or define('EBusinessID', '1285334');
//电商加密私钥，快递鸟提供，注意保管，不要泄漏
defined('AppKey') or define('AppKey', 'bd3ae20d-ec9c-4eea-ac3d-d13ce3b3633e');
//请求url
//测试地址
//defined('ReqURL') or define('ReqURL', 'http://testapi.kdniao.cc:8081/Ebusiness/EbusinessOrderHandle.aspx');
//正式地址
defined('ReqURL') or define('ReqURL', 'http://api.kdniao.cc/Ebusiness/EbusinessOrderHandle.aspx');

 //单号识别 & 查询订单物流轨迹
//-------------------------------------------------------------
//从前端获取快递单号
$logisticCode = $_GET["logisticCode"];

$logisticShippersResult = getOrderShippersByJson($logisticCode);

//***********解析JSON, 并且得到几种可能的ShipperCodes(按照大数据排序的)***********//
$ShippersArr = json_decode($logisticShippersResult, true);
//var_dump($ShippersArr);
//echo $ShippersArr["Shippers"] . "\n";

$index = 0;

//创建创建一个空的数组
$ShipperCodes = array();
$ShipperNames = array();

foreach ($ShippersArr["Shippers"] as $Shipper) {
    // code...
    //echo "快递" . $index . " : " . $Shipper["ShipperName"] . "\n";
	$ShipperNames[$index] = $Shipper["ShipperName"];
    $ShipperCodes[$index++] = $Shipper["ShipperCode"];
}



//var_dump($ShipperCodes);

$ResultTracesJsons = ‘[’;
$count = 0;

//************将所有的可能性按照顺序得到OrderTraces, 并把这些Traces组合成一个数组构成的JSON*****************//
foreach ($ShipperCodes as $ShipperCode)	{
	$ResultTracesJsons . getOrderTracesByJson($ShipperCode, $LogisticCode) . ',';
}

//去掉最后那多出来的逗号&加上一个]
echo substr_replace($ResultTracesJsons, '', -1 , 1) . ']';

//-------------------------------------------------------------

/**
 * Json方式 单号识别
 */
function getOrderShippersByJson($Code){
	//$requestData= "{'LogisticCode':'1000745320654'}";
	$requestData = "{'LogisticCode':'" . $Code . "'}";
	$datas = array(
        'EBusinessID' => EBusinessID,
        'RequestType' => '2002',
        'RequestData' => urlencode($requestData) ,
        'DataType' => '2',
    );
    $datas['DataSign'] = encrypt($requestData, AppKey);
	$result=sendOrderPost(ReqURL, $datas);

	//根据公司业务处理返回的信息......

	return $result;
}
/**
 * Json方式 查询订单物流轨迹
 */
function getOrderTracesByJson($ShippCode, $LogisCode){
	//$requestData= "{'OrderCode':'','ShipperCode':'YTO','LogisticCode':'12345678'}";
	$requestData = "{'OrderCode':'','ShipperCode':'" . $ShippCode . "','LogisticCode':'" . $LogisCode . "'}";

	$datas = array(
        'EBusinessID' => EBusinessID,
        'RequestType' => '1002',
        'RequestData' => urlencode($requestData) ,
        'DataType' => '2',
    );
    $datas['DataSign'] = encrypt($requestData, AppKey);
	$result=sendShipperPost(ReqURL, $datas);

	//根据公司业务处理返回的信息......

	return $result;
}

/**
 *  post提交数据 单号识别
 * @param  string $url 请求Url
 * @param  array $datas 提交的数据
 * @return url响应返回的html
 */
function sendOrderPost($url, $datas) {
    $temps = array();
    foreach ($datas as $key => $value) {
        $temps[] = sprintf('%s=%s', $key, $value);
    }
    $post_data = implode('&', $temps);
    $url_info = parse_url($url);
	if(empty($url_info['port']))
	{
		$url_info['port']=80;
	}
    $httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
    $httpheader.= "Host:" . $url_info['host'] . "\r\n";
    $httpheader.= "Content-Type:application/x-www-form-urlencoded\r\n";
    $httpheader.= "Content-Length:" . strlen($post_data) . "\r\n";
    $httpheader.= "Connection:close\r\n\r\n";
    $httpheader.= $post_data;
    $fd = fsockopen($url_info['host'], $url_info['port']);
    fwrite($fd, $httpheader);
    $gets = "";
	$headerFlag = true;
	while (!feof($fd)) {
		if (($header = @fgets($fd)) && ($header == "\r\n" || $header == "\n")) {
			break;
		}
	}
    while (!feof($fd)) {
		$gets.= fread($fd, 128);
    }
    fclose($fd);

    return $gets;
}


/**
 *  post提交数据 查询订单物流轨迹
 * @param  string $url 请求Url
 * @param  array $datas 提交的数据
 * @return url响应返回的html
 */
function sendShipperPost($url, $datas) {
    $temps = array();
    foreach ($datas as $key => $value) {
        $temps[] = sprintf('%s=%s', $key, $value);
    }
    $post_data = implode('&', $temps);
    $url_info = parse_url($url);
	if(empty($url_info['port']))
	{
		$url_info['port']=80;
	}
    $httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
    $httpheader.= "Host:" . $url_info['host'] . "\r\n";
    $httpheader.= "Content-Type:application/x-www-form-urlencoded\r\n";
    $httpheader.= "Content-Length:" . strlen($post_data) . "\r\n";
    $httpheader.= "Connection:close\r\n\r\n";
    $httpheader.= $post_data;
    $fd = fsockopen($url_info['host'], $url_info['port']);
    fwrite($fd, $httpheader);
    $gets = "";
	$headerFlag = true;
	while (!feof($fd)) {
		if (($header = @fgets($fd)) && ($header == "\r\n" || $header == "\n")) {
			break;
		}
	}
    while (!feof($fd)) {
		$gets.= fread($fd, 128);
    }
    fclose($fd);

    return $gets;
}

/**
 * 电商Sign签名生成
 * @param data 内容
 * @param appkey Appkey
 * @return DataSign签名
 */
function encrypt($data, $appkey) {
    return urlencode(base64_encode(md5($data.$appkey)));
}

?>
