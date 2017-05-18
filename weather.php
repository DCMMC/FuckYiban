<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!--
        	作者：@xiaoping  http://blog.csdn.net/xiaoping0915
        	时间：2017-02-27
        	描述：提供天气查询和公交信息查询的便民服务
        -->
        <!--解决移动设备的适配问题
        -->
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />

		<title></title>
		<style type="text/css">
			#index,#bus {
				font-family: "微软雅黑";
			}
		</style>

		 <link rel="stylesheet" type="text/css" href="jquery.mobile.flatui.css" />

	</head>
	<body>
		<div data-role="page" id="index">
			<div data-role="header" data-position="fixed">
				<h1>天气查询</h1>
			</div>
			<div data-role="content">
				<div class="ui-field-contain">
					<label>城市</label>
					<p id="tips" style="color: red;" hidden="hidden">填写您所要搜索的城市名</p>
					<input type="text" id="keyword" />
				</div>
				<a id="btnSearch" data-role="button" data-icon="search" data-iconpos="right">搜索</a>
				<div>
					<ul id="result" data-role="listview" data-inset="true">
					</ul>
					<br>
					<table id="table" class="ui-responsive  table-stroke" data-role="table">

					</table>

				</div>
			</div>
			<div data-role="footer" data-position="fixed">
				<div data-role="navbar">
					<ul>
						<li>
							<a href="#index" id="index"  class="ui-btn-active" data-icon="home">查天气</a>
						</li>
						<li>
							<a href="#bus" id="bus"  data-icon="star">查公交</a>
						</li>
						<li>
							<a href="#kuaidi"  id="kuaidi" data-icon="gear">查快递</a>
						</li>
						<li>
							<a href="#english"  id="english" data-icon="gear">查四六级</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div data-role="page" id="bus">
			<div data-role="header" data-position="fixed">
				<h1>公交查询</h1>
			</div>
			<div data-role="content">
				<div class="ui-field-contain">
					<label>城市</label>
					<p id="tip1" style="color: red;" hidden="hidden">填写您所要搜索的城市名</p>
					<input type="text" id="city" /><br />
					<label>线路</label>
					<p id="tip2" style="color: red;" hidden="hidden">填写您所要搜索的路线</p>
					<input type="text" id="road" />
				</div>
				<a id="btnSearchBus" data-role="button" data-icon="search" data-iconpos="right">搜索</a>
				<div>
					<ul id="resultBus" data-role="listview" data-inset="true">
					</ul>
					<br>

				</div>
			</div>
			<div data-role="footer" data-position="fixed">
				<div data-role="navbar">
					<ul>
						<li>
							<a href="#index" id="index" data-icon="home">查天气</a>
						</li>
						<li>
							<a href="#bus" id="bus" class="ui-btn-active" data-icon="star">查公交</a>
						</li>
						<li>
							<a href="#kuaidi"  id="kuaidi" data-icon="gear">查快递</a>
						</li>
						<li>
							<a href="#english"  id="english" data-icon="gear">查四六级</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div data-role="page" id="kuaidi">
			<div data-role="header" data-position="fixed">
				<h1>快递查询</h1>
			</div>
			<div data-role="content">
				<div class="ui-field-contain">
					<label>单号</label>
					<p id="tipCode" style="color: red;" hidden="hidden">填写您的快递单号</p>
					<input type="text" id="LogisticCode" /><br />
				</div>
				<a id="btnSearchOrder" data-role="button" data-icon="search" data-iconpos="right">搜索</a>
				<div>
					<ul id="resultOrderTraces" data-role="listview" data-inset="true">
					</ul>
					<br>

				</div>
			</div>
			<div data-role="footer" data-position="fixed">
				<div data-role="navbar">
					<ul>
						<li>
							<a href="#index" id="index" data-icon="home">查天气</a>
						</li>
						<li>
							<a href="#bus" id="bus" class="ui-btn-active" data-icon="star">查公交</a>
						</li>
						<li>
							<a href="#kuaidi"  id="kuaidi" data-icon="gear">查快递</a>
						</li>
						<li>
							<a href="#english"  id="english" data-icon="gear">查四六级</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div data-role="page" id="english">
			<div data-role="header" data-position="fixed">
				<h1>英语四六级成绩查询</h1>
			</div>
			<div data-role="content">
				<div class="ui-field-contain">
					<label>准考证号</label>
					<p id="tipID" style="color: red;" hidden="hidden">填写您的全国大学英语四、六级笔试或口试准考证号</p>
					<input type="text" id="cetID" /><br />
					<label>姓名</label>
					<p id="tipName" style="color: red;" hidden="hidden">填写您的姓名</p>
					<input type="text" id="name" />
				</div>
				<a id="btnSearchCET" data-role="button" data-icon="search" data-iconpos="right">查询</a>
				<div>
					<ul id="resultCET" data-role="listview" data-inset="true">
					</ul>
					<br>

				</div>
			</div>
			<div data-role="footer" data-position="fixed">
				<div data-role="navbar">
					<ul>
						<li>
							<a href="#index" id="index" data-icon="home">查天气</a>
						</li>
						<li>
							<a href="#bus" id="bus" class="ui-btn-active" data-icon="star">查公交</a>
						</li>
						<li>
							<a href="#kuaidi"  id="kuaidi" data-icon="gear">查快递</a>
						</li>
						<li>
							<a href="#english"  id="english" data-icon="gear">查四六级</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- JavaScript 放置在文档最后面可以使页面加载速度更快 -->
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script type="text/javascript">
			//服务端获取ip 上线使用
			//var client_ip = '223.167.1.41';
			//前端测试使用 上线屏蔽
			//var client_ip = '59.172.105.58';
			//cors跨域代理  了解详情 -> http://blog.csdn.net/xiaoping0915/article/details/57557206
			//跨域代理已经失效
			var cors_url = 'http://proxy.e12e.com/?';

			var client_ip = "<?php
			function getIp(){
   				if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
       					$ip = getenv("HTTP_CLIENT_IP");
   				else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
       					$ip = getenv("HTTP_X_FORWARDED_FOR");
  				else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
       					$ip = getenv("REMOTE_ADDR");
  				else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
           					$ip = $_SERVER['REMOTE_ADDR'];
       				else
           					$ip = "unknown";
       				return($ip);
			}

            
			echo getIp();
			?>";

			//公交信息接口
			var bus_url = 'http://op.juhe.cn/189/bus/busline?dtype=&key=1198ca7b9b559f7536b5b824c7fae885&city=';
			//客户所在城市
			var client_city ;
			//快递查询api
			var kuaidi_url = '39f4b145382a4e29b7c3c3e44af1ed92';
			//在index页面创建前去请求接口拿数据
			$(document).on("pagebeforecreate","#index", function() {
				$.getJSON("getCity.php", function(data, status) {
					//异步调用ip接口获取城市信息
					client_city = data.data.city;
					$('#keyword').val(data.data.city);
					$('#city').val(client_city);
					getCityWeather(data.data.city);
				});
			});
			//在index页面第一次加载完成后执行
			$(document).on('pageinit', "#index", function() {
				//校验input是否合法后搜索天气
				function sw(){
					var $key = $('#keyword').val();
					var $tips = $('#tips');
					if($key === '') {
						$tips.fadeIn();
						return;
					}
					$tips.fadeOut();
					//显示正在加载的图片
					$.mobile.loading("show");
					//查询天气
					getCityWeather($key);
				}
				//绑定按钮点击和回车键按下的事件
				$('#btnSearch').on('click', function() {
					sw();
				});
				$(this).on('keypress',function(even){
					if(even.keyCode === 13){
						sw();
					};
				});
			});
			//在bus页面第一次加载完成后执行
			$(document).on('pageinit','#bus',function(){
				//校验input是否合法后搜索公交路线信息
				function sbus(){
					var $city = $('#city').val();
					var $road = $('#road').val();
					//var $
					var $tip1 = $('#tip1');
					var $tip2 = $('#tip2');
					if($city === '') {
						$tip1.fadeIn();
						return;
					}else if($road === ''){
						$tip2.fadeIn();
						return;
					}
					$tip1.fadeOut();
					$tip2.fadeOut();
					$.mobile.loading("show");
					//查询公交
					getCityBus($city,$road);
				}
				//绑定按钮点击和回车键按下的事件
				$('#btnSearchBus').on('click', function() {
					sbus();
				});
				$(this).on('keypress',function(even){
					if(even.keyCode === 13){
						sbus();
					};
				});
			});

			//在kuaidi页面第一次加载完成后执行
			$(document).on('pageinit','#kuaidi',function() {
				function sKuaidi() {
					var $LogisticCode = $('#LogisticCode').val();
					var $tipCode = $('#tipCode');
					if($LogisticCode === '') {
						$tipCode.fadeIn();
						return;
					}
					$tipCode.fadeOut();
					//显示正在加载的图片
					$.mobile.loading("show");
					//查询快递
					getOrderTraces($LogisticCode);
				}
				//绑定按钮点击和回车键按下的事件
				$('#btnSearchOrder').on('click', function() {
					sKuaidi();
				});
				$(this).on('keypress',function(even){
					if(even.keyCode === 13){
						sKuaidi();
					};
				});
			});

			//在english页面第一次加载完成后执行
			$(document).on('pageinit','#english',function() {
				function sCET() {
					var $ID = $('#cetID').val();
					var $name = $('#cetID').val();
					//var $
					var $tipID = $('#tipID');
					var $tipName = $('#tipName');
					if($ID === '') {
						$tipID.fadeIn();
						return;
					}else if($name === ''){
						$tipName.fadeIn();
						return;
					}
					$tipID.fadeOut();
					$tipName.fadeOut();
					$.mobile.loading("show");
					//查询CET成绩
					getCET(ID, name);
				}
				//绑定按钮点击和回车键按下的事件
				$('#btnSearchCET').on('click', function() {
					sCET();
				});
				$(this).on('keypress',function(even){
					if(even.keyCode === 13){
						sCET();
					};
				});
			});
			//天气查询
			function getCityWeather(cityName) {
				//拿到list和table元素并清空
				var $list = $('#result');
				$list.html('');
				var $table = $('#table');
				$table.html('');
				//异步调用查询天气接口
				$.getJSON("juheWeather.php", {city:cityName}, function(data, status) {
					//回调后让加载的小菊花隐藏起来
					$.mobile.loading("hide");
					//JSON对象的操作方式就是 使用 .  的方式链式寻找
					if(data.resultcode != "200") {
						//如果返回数据中error_code 不等于 0 则说明调用接口不成功没有得到目标城市的天气信息
						alert(data.reason);
						return;
					}
					//拼接我们所需要的信息
					var $res = '<li><h1>' + data.result.today.city + ' ' + data.result.today.date_y + data.result.sk.time + ' ' + '</h1></li>' +
						'<li>实时湿度  ' + data.result.sk.humidity + '</li>' +
						'<li>实时风向  ' + data.result.sk.wind_direction + ' ' + data.result.sk.wind_strength +
						'<li>实时气温  ' + data.result.sk.temp + '</li>' +
						'<li>今日天气  ' + data.result.today.weather + '</li>' +
						'<li>今日气温  ' + data.result.today.temperature + '℃</li>' +
						'<li>今日风向  ' + data.result.today.wind + '</li>' +
						'<li>UV指数    ' + data.result.today.uv_index  + '</li>' + 
						'<li>穿衣建议  ' + data.result.today.dressing_advice + '</li>';


					var $tbl = '<thead>' +
							'<tr>'+
								'<th data-priority="6">日期</th>'+
								'<th>天气</th>'+
								'<th data-priority="1">温度范围</th>'+
								'<th data-priority="2">风向</th>'+
								'<th data-priority="3">风级</th>'+
							'</tr>'+
						'</thead><tbody>' ;
					//遍历一个JsonArray
					for(var index in data.result.future) {
						$tbl +='<tr>' +
                        				'<td>'+data.result.future[index]date + ' ' + data.result.future[index]week+'</td>' +
                        				'<td>'+data.result.future[index]weather+'</td>'+
                        				'<td>'+data.result.future[index]temperature+'</td>' +
                        				'<td>'+data.result.future[index]wind+'</td>' +
                        				'<tr/>';
					}
                    				$tbl+='</tbody>';
                    				
                    				//填充数据并刷新样式
					$list.append($res).listview("refresh");
					$table.append($tbl).table('refresh');
				});
			}
			//查询公交信息
			function getCityBus(cName,roadNum){
				//拿到list元素并清空
				var $list = $('#resultBus');

				//DCMMC
				//get Sid
				var sid;
				var mes = '当前到站: null';
				var returnHtml = '';

    			$.ajax({
    				url: 'http://shanghaicity.openservice.kankanews.com/public/bus/get',
    				type: 'post',
   					data: {
        				idnum:"55%E8%B7%AF"
    				},
    				success: function (data) {
        				//var dataall = JSON.parse(data);
						//sid = dataall.sid;
						sid = data.sid;
    				}
				}).done( function() {
    				$.post('http://shanghaicity.openservice.kankanews.com/public/bus/mes/sid/' + sid,
    				function(response) {
    					returnHtml = response;
    				});
    			});

    			/*
    			$.ajax({
        			type:'POST',
        			url:"http://shanghaicity.openservice.kankanews.com/public/bus/Getstop",
        			data:{ stoptype:0,stopid:2.,sid:"1fee54ae0a655028a71acfc1bd8aeec9" },
        			success: function(response){
						var dataall = JSON.parse(response);

					var data = dataall[0];

					if(typeof(data)=="undefined"){
						mes = '等待发车';
					}
					if((typeof(data.error) != "undefined") && (data.error!='')){
						if(data.error=='-2' || data=="undefined"){
							mes = '等待发车';
						}else{
						alert('error');
						return false;
						}
					}else if(typeof(data.time)=="undefined" || data.time==null ||  data.time=="null"){
						mes = '等待发车';
					}else{
					var tx = data.time;

					if(tx.indexOf("分钟")>0){
						mes = data.terminal+' 还有'+data.stopdis+'站, 约'+data.time;
					}else{
						mes = data.terminal+' 还有'+data.stopdis+'站, 约'+Math.ceil(data.time/60)+'分钟';
						}
					}
        			}
    			});
    			*/

				$list.html('');
				//异步调用查询公交信息接口
				$.getJSON(cors_url + bus_url + cName + '&bus=' + roadNum,function(data, status){
					//隐藏小菊花
					$.mobile.loading("hide");
					if(data.error_code != 0) {
						alert(data.reason);
						return;
					}
					//获得需要的数据并填充
					var $res = '<li><h1>' + data.result[0].key_name + data.result[0].terminal_name + '~' + data.result[0].front_name + '</h1><h2>' + mes + '</h2></li>';
					//var $res = '<li><h1>' + data.result[0].key_name + data.result[0].terminal_name + '~' + data.result[0].front_name + '</h1></li>';
					$(data.result[0].stationdes).each(function (index, obj) {
						$res += '<li> 第' + obj.stationNum + '站： '  + obj.name + '</li>';
					});
					$list.append($res).listview("refresh");
					$list.before(returnHtml);
				});
			}

			//快递查询
			function getOrderTraces(orderCode) {
				var $list = $('#resultOrderTraces');
				$list.html('');
				var $res = '';
				$.getJSON("OrderTraces.php", {logisticCode:orderCode}, function(data, status) {
					//隐藏小菊花
					$.mobile.loading("hide");
					//解析JSON
					//var Traces = JSON.parse(data);

					//将Json转化为Array
					//var TracesArray = JSON.parse(data);
					//修复Uncaught SyntaxError: Unexpected token o in JSON 
					//Your data is already an object. No need to parse it. The javascript interpreter has already parsed it for you.

					//遍历这个JsonArray
					for(var index in data) {
						$res += '<li><h1>快递公司 : '+data[index]["ShipperCode"]+'</h1></li>';
						if(data[index]["State"] != '0') {
							data[index]["Traces"].forEach(function(Site) {
								$res += '<li>' + Site.AcceptTime + "</li><li>"+ Site.AcceptStation + '</li>';
									$res += "<li></li>";
    								});
							} else {
								$res += '<li><h2>' + data[index]["Reason"] + '</h2></li>';
							}
							$res += '<li>################################################</li>';
						}

					//填充数据并刷新样式
					$list.append($res).listview("refresh");
					});
			}

			//CET查询
			function getCET(ID, name) {

			}

		</script>

	</body>

</html>
