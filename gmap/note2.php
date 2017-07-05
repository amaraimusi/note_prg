<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="google" content="notranslate" />
	<title>ワクガンス　|　Google Maps APIの覚書</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
	<link rel="stylesheet" type="text/css" href="../css/common2.css"  />


</head>
<body>
<div id="header" ><h1>Google Maps APIの覚書の覚書</h1></div>
<div class="container">









<!-- --------------------------------------------------------------- -->
<div id="sec2-1" class="sec1">
	<div class="title">GMapを画像にして自サーバーに保存する</div>
	<a href="https://hpneo.github.io/gmaps/">gmaps.js</a>を使って、gmapの静的URLを取得し、AjaxでPHP側（自サーバー）へ送る。<br>
	PHP側で送られてきたURLを元に地図画像を自サーバーに作成する。<br>
	<br>
	<br>



	<p>HTMLソース</p>
	<pre>

	～略～
	&lt;script src="jquery-1.11.1.min.js"&gt;&lt;/script&gt;
	&lt;script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=○○○○&amp;sensor=false"&gt;&lt;/script&gt;
	&lt;script src="gmaps.js"&gt;&lt;/script&gt;

	～略～

	&lt;div&gt;
		&lt;input type="button" value="保存実行" onclick="test1()" /&gt;&lt;br&gt;
		&lt;img id="img1" src="" /&gt;
	&lt;/div&gt;

	～略～
	</pre>

	<p>JSソース</p>
	<pre>
	function test1(){

		var gmap_url = GMaps.staticMapURL({
			  size: [500, 500],
			  lat: 26.651139717347082,
			  lng: 127.94837594032288,

			});

		//サーバーサイドURL
		var url='php/save_gmap_to_myserver.php';

		//サンプルデータ
		var ary=new Array();
		ary[0]=gmap_url;


		$.post(
		url ,
		{"ary" : ary} ,
			function(msg){
				$("#img1").attr('src',"php/img/test.png");//自サーバーに保存した画像を表示
				alert(msg);

			}
		).error(function() {//PHP側で何らかのバグ発生。存在しないURLを指定したりすると発生。

			alert('サーバーサイドのエラー');
		});
	}
	</pre>

	<p>PHPソース(save_gmap_to_myserver.php)</p>
	<pre>
	$url =$_POST['ary'][0];

	//自サーバー内に画像ファイルを作成
	$data = file_get_contents($url);
	file_put_contents('img/test.png',$data);
	echo "success";
	</pre>

	<a class="ref_link" href="http://amaraimusi.sakura.ne.jp/sample/js/gmap_v3/save_gmap_to_myserver.html">サンプル</a>

</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec2-2" class="sec1" >
	<div class="title">各種コントローラの無効化</div>


	<pre>
	var latlng = new google.maps.LatLng(m_data.mm_lat,m_data.mm_lng);
	var opts = {
		zoom: 17,//ズーム
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scaleControl: false,	//スケール無効化
		scrollwheel: false,		//マウスホイールによる拡大縮小を無効化
		draggable: false,		//ドラッグ移動を無効化
		disableDoubleClickZoom:true,//ダブルクリックズームを無効
		panControl:false,		//移動コントロールを無効化
		zoomControl:false,		//拡大縮小バーを無効化
		mapTypeControl:false,	//航空写真切替を無効化
		streetViewControl:false,//ストリートビューを無効化
	};
	m_map = new google.maps.Map(document.getElementById("gmap"), opts);
	</pre>
	<a class="ref_link" href="http://zxcvbnmnbvcxz.com/google-map-api-v3-zoom/">参考</a>

</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec2-0" class="sec1" style="display: none">
	<div class="title">xxx</div>

	<pre>
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->
























</div><!-- content -->
<div id="footer">(C) kenji uehara 2015/6/9</div>
</body>
</html>