<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="google" content="notranslate" />
	<title>jQueryの覚書</title>
	<link href="/note_prg/css/bootstrap.min.css" rel="stylesheet">
	<link href="/note_prg/css/common2.css" rel="stylesheet">

	<script src="/note_prg/js/jquery-1.11.1.min.js"></script>
	<script src="/note_prg/js/bootstrap.min.js"></script>
	<script src="/note_prg/js/livipage.js"></script>
	<script src="/note_prg/js/ImgCompactK.js"></script>

</head>
<body>
<div id="header" ><h1>jQueryの覚書</h1></div>
<div class="container">














<!-- --------------------------------------------------------------- -->
<div id="sec3-1" class="sec1">
	<h3>cssへセットと除去</h3>
	cssメソッドで、まとめてCSSスタイルを指定できる。<br>
	<br>

	<p>jquery source</p>
	<pre>
	$('#xxx').css({
		'color':'red',
		'font-size':'1.1em',
		'width':'100%',
		'height':'100%',
	});
	</pre><br>
	
	<p>除去する場合は「''」をセットする</p>
	<pre>
	$('#xxx').css({
		'color':'',
		'font-size':'',
		'width':'',
		'height':'',
	});
	</pre><br>
	
	<p>一つだけ指定する場合</p>
	<pre>
	$('#xxx').css('color':'blue');
	</pre><br>


</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec3-2" class="sec1">
	<h3>要素の縦横サイズを取得 | width,height,outerWidth,outerHeight</h3>
	
	<p>width,height</p>
	CSSのwidth,heightと同じ値を取得する
	<pre>
	var w = $('#xxx').width();
	var h = $('#xxx').height();
	</pre>
	
	<p>outerWidth,outerHeight</p>
	width,heightのそれぞれにpaddingとborderを加算した幅を取得する。<br>
	marginは無視される。<br>
	<pre>
	var w = $('#xxx').outerWidth();
	var h = $('#xxx').outerHeight();
	</pre>
	
	<a href="http://amaraimusi.sakura.ne.jp/sample/js/src_size/get_width_height.html" >サンプル</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec3-3" class="sec1">
	<h3>要素の位置を取得 | position,offset</h3>
	
	
	
	位置情報を得るにはoffsetメソッドを使うこと。<br>
	<br>
	positionメソッドは親要素からの相対座標と言われているが、正確には誤りである。<br>
	親要素のCSSにposition:relative(もしくはabsolute,fixed)が指定されている場合のみ相対位置である。
	指定していない場合は絶対位置となる。<br>
	<br>
	
	<pre>
	//絶対位置を取得（HTMLドキュメントの右端からの位置）
	var offset=$('#test1').<strong>offset()</strong>;
	var o_top=offset.top;
	var o_left=offset.left;

	//親要素からの相対位置を取得。（親要素にrelative等が指定されていない場合は絶対位置）
	var pos=$('#test1').position();
	var p_top=pos.top;
	var p_left=pos.left;
	</pre>

	<a href="http://amaraimusi.sakura.ne.jp/sample/js/position_offset/position_offset.html" >サンプル</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec3-4" class="sec1">
	<h3>マウスオーバーイベント | jQuery hover</h3>
	
	<pre>$(セレクタ).hover(オーバーイベント,アウトイベント);</pre>
	マウスオーバーイベントはオーバーイベントとアウトイベントの２つから構成される。<br>
	オーバーイベントはセレクタで指定した要素範囲内に、マウスカーソルが入った瞬間、１回発動する。
	要素内をマウスで動かしても、連続でマウスオーバーイベントは起きない。<br>
	アウトイベントは要素からはずれたときに発動する。<br>
	
	<p>html source</p>
	<pre>
	&lt;div id="test1" style="width:50px;height:50px;background-color:#dff0cb"&gt;&lt;/div&gt;
	&lt;div id="res1"&gt;&lt;/div&gt;
	</pre>
	
	<p>javascript source</p>
	<pre>
	$('#test1').hover(
		function(){
			console.log('over');
			$('#res1').html('over');
		},
		function(){
			console.log('out');
			$('#res1').html('out');
		}
	);
	</pre>
	
	<a href="http://amaraimusi.sakura.ne.jp/sample/js/hover/hover.html" >サンプル</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec3-5" class="sec1">
	<h3>リストの並び替え | jquery-ui-sortable</h3>
	
	jquery-ui-sortableはjQuery UIの一機能です。<br>
	リストをマウスドラッグで入れ替えることができます。<br>
	<br>
	
	<input type="button" value="source" onclick="$('#source3-5').toggle()" class="btn btn-primary btn-xs" />
	<pre id="source3-5" style="display:none">
	&lt;!DOCTYPE html&gt;
	&lt;html lang="ja"&gt;
		&lt;head&gt;
			&lt;meta charset="utf-8"&gt;
			&lt;link href="jquery-ui.min.css" rel="stylesheet"&gt;
			&lt;script src="jquery-1.11.1.min.js"&gt;&lt;/script&gt;
			&lt;script src="jquery-ui.min.js"&gt;&lt;/script&gt;
			&lt;script&gt;
				$( function() {
					$( "#xxx" ).sortable();
					$( "#xxx" ).disableSelection();
				});
			&lt;/script&gt;
		&lt;/head&gt;
		&lt;body&gt;
			&lt;ul id="xxx"&gt;
				&lt;li&gt;Item 1&lt;/li&gt;
				&lt;li&gt;Item 2&lt;/li&gt;
				&lt;li&gt;Item 3&lt;/li&gt;
				&lt;li&gt;Item 4&lt;/li&gt;
				&lt;li&gt;Item 5&lt;/li&gt;
				&lt;li&gt;Item 6&lt;/li&gt;
				&lt;li&gt;Item 7&lt;/li&gt;
			&lt;/ul&gt;
		&lt;/body&gt;
	&lt;/html&gt;
	</pre>
	<br><br>
	
	<a href="http://localhost/sample/js/jqu_sortable/" target="brank" class="btn btn-link btn-xs">サンプル</a><br>
	
	<a href="https://jqueryui.com/sortable/" target="brank" class="btn btn-link btn-xs">参考サイト</a><br>
	<a href="http://alphasis.info/2011/05/jquery-ui-sortable/" target="brank" class="btn btn-link btn-xs">参考サイト2</a><br>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec3-6" class="sec1">
	<h3>キーボードのイベント| keydown keypress keyup</h3>
	
	window（画面全体）やテキストエリア、input要素にキーイベントを組み込むことができる。
	div要素には組み込めないようである。<br>
	キーイベントにはkeydown,keyup,keypressの3種類が存在する。<br>
	<br>
	
	<P>keypressについて</P>
	shift+「Caps Lock」で小文字入力、大文字入力を切り替えたとき、キーコードの値も変化する。<br>
	keydown,keyupのキーコードは大文字入力のキーコードと同じ値である。<br>
	<br>
	
	また、keypressにはshiftキー同時押しの概念が存在する。<br>
	大文字入力扱いなので、keydown,keyupのキーコードと同値になる。<br>
	<br>
	
	<table class="tbl2">
		<thead>
			<tr><th>イベント</th><th>説明</th></tr>
		</thead>
		<tbody>
			<tr><td>keydown</td><td>キーを押しこんだ時のイベント</td></tr>
			<tr><td>keyup</td><td>キーを話した時のイベント</td></tr>
			<tr><td>keypress</td><td>
				キー押下イベント。<br>
				keydownとkeyupを併せ持つ。<br>
				shiftキーの概念が存在する。<br>
				小文字入力モードのときキーコードはkeydown、keyupと異なるが、
				大文字入力モードやshiftキー同時押しで同じキーコードになる。<br>
			</td></tr>
	
		</tbody>
	</table>
		
	イベント発動順はkeydown,keypress,keyupである。<br>
			
	<p>ソースコード</p>
	<pre>
	～略～
	&lt;script src="jquery.js"&gt;&lt;/script&gt;
	
	&lt;script&gt;
	$(function(){
		// キーを離したときのイベント
		$('#test1').keyup(function(e){
			var str = 'keyup:' + e.keyCode + '&lt;br&gt;';
			$('#res').append(str);
		});
		
		// キーを押しこんだときのイベント
		$('#test1').keydown(function(e){
			var str = 'keydown:' + e.keyCode + '&lt;br&gt;';
			$('#res').append(str);
		});
		
		// キーを押下イベント（keydownとkeyupを組み合わせたイベント）
		$('#test1').keypress(function(e){
			var str = 'keypress:' + e.keyCode + '&lt;br&gt;';
			$('#res').append(str);
		});
		
	});
	&lt;/script&gt;
	～略～
	&lt;textarea id="test1"&gt;&lt;/textarea&gt;
	&lt;div id="res" &gt;
	～略～
	</pre>
	<p>出力（小文字入力モードで「A」キーを押した時）</p>
	<div class="output_data">
	keydown:65<br>
	keypress:97<br>
	keyup:65<br>
	</div>
	<br>
	
	windowにキー押下イベントを組み込む場合、以下のように記述する。<br>
	<pre>
	$(window).keypress(function(e){
		console.log(e.keyCode);
	});
	</pre>
	<br>
	
	<hr>





	<a href="/sample/js/jq_keydown/jq_keydown.html" >サンプル</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec3-7" class="sec1" >
	<h3>フォーカスしたときに値を全選択する</h3>
	入力フォームをフォーカスしたとき、内部の文字列を全選択する。<br>
	<bR>
	
	<h2>サンプル</h2>
	
	<p>html</p>
	<pre>
	&lt;input id="test1" type="text" value="ネコがネズミを食べる" /&gt;
	</pre><br>
	
	<p>javascript/jquery</p>
	<pre>
	$(function(){
		$("#test1").focus(function() {
		    $(this).select();
		});
	});
	</pre>
	
	<a href="/sample/js/textarea_select/focus_and_all_select.html" >サンプル</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-8" class="sec1" >
	<h3>子要素を取得する</h3>
	
	要素オブジェクトから子要素を取得にはfindメソッドを使う。<br>
	子要素だけでなく、孫要素なども取得できる。<br>
	<br>
	
	html
	<pre>
	&lt;div id="animal"&gt;
		&lt;div id="cat"&gt;
			&lt;span id="kuro-neko"&gt;黒猫&lt;/span&gt;
			&lt;aside id="siam-cat"&gt;シャム猫&lt;/aside&gt;
		&lt;/div&gt;
		&lt;div class="dog"&gt;犬&lt;/div&gt;
	&lt;/div&gt;
	</pre>
	<br>
	
	js source
	<pre>
	var elm1 = $('#animal');
	var siam_cat = elm1.<strong>find</strong>('#siam-cat').html();
	console.log(siam_cat);
	</pre>
	
	出力
	<pre id="res" class="output_data">
	シャム猫
	</pre>
	<br>
	
	<p>childrenメソッド</p>
	childrenメソッドは直下の子要素のみ取得可能。<br>
	孫要素は取得できない。<br>
	<br>
	
	js source
	<pre>
	var elm2 = $('#animal');
	var dog = elm1.<strong>children</strong>('.dog');// 直下の子要素のみ取得可能
	console.log(dog);
	</pre>
	
	出力
	<pre id="res2" class="output_data">
	犬
	</pre>
	<br>
	
	<time>2016-6-17</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-9" class="sec1" >
	<h3>タグ名を取得する</h3>

	要素からタグ名を取得するには、「tagName」属性を取得すればよい。<br>
	<br>
	
	html
	<pre>&lt;input id="hoge" type="text"  /&gt;</pre>
	<br>
	
	jquery
	<pre>var tagName = $('#hoge').get(0).<strong>tagName</strong>;</pre><br>
	<br>
	
	以下の方法でも取得できる。
	<pre>var tagName = $('#hoge').prop("tagName"); </pre>
	<br>

	<time>2016-6-17</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-10" class="sec1" >
	<h3>別ページである外部HTMLからDOMを取得</h3>
	
	外部のHTMLファイルを読み込み、findで内部コンテンツを検索する。<br>
	<br>
	
	<aside>
		※divで囲まれていない要素は、findで取得できない。
		（<a href="#sec3-11" class="livipage">HTML文字列をDOM扱いで検索</a>を参考）
	</aside>
	<br>
	
	外部ファイルは同じサーバー内のものだけである。
	クロスドメインには対応しておらず。（読込先がクロスドメインを許可している場合は別）<br>
	<br>
	

	JavaScript
	<pre><code>
	var url = "<strong>sample1.html</strong>";
	
	$.ajax({
		type: "GET",
		url: url,
		cache: false,
		dataType: "text",
		success: function(text, type) {

			var obj = <strong>$.parseHTML(text);</strong>

			var res = $(obj).find('#test2').html();
			
			console.log(res);

		},
		error: function(xmlHttpRequest, textStatus, errorThrown){
			
			alert(textStatus);
		}
	});	
	</code></pre>
	<br>
	
	sample1.html(外部HTML)
	<pre><code>
	&lt;!DOCTYPE html&gt;
	&lt;html&gt;
	&lt;head&gt;
	&lt;meta charset="UTF-8"&gt;
	&lt;title&gt;Insert title here&lt;/title&gt;
	&lt;script src="/note_prg/js/jquery-1.11.1.min.js"&gt;&lt;/script&gt;
	&lt;script&gt;
	$(function(){
		alert('セキュリティエラー：外部HTMLのスクリプトが実行された');
	});
	&lt;/script&gt;
	&lt;/head&gt;
	&lt;body&gt;
	&lt;div&gt;
		&lt;div id='test1'&gt;Hello World! 壱&lt;/div&gt;<strong>&lt;div id="test2"&gt;Hello World! 弐&lt;/div&gt;</strong>&lt;/div&gt;
	&lt;/body&gt;
	&lt;/html&gt;
	</code></pre>
	<br>
	
	出力
	<pre class="output_data"><code>Hello World! 弐</code></pre>
	<br>

	<a href="/sample/js/get_dom_from_outer/get_dom_from_outer.html" class="btn btn-info" >サンプル</a><br>
	<br>
	
	<p>$.parseHTML();</p>
	「$.parseHTML(text);」でパースすると外部HTML内に埋め込まれているJavaScriptを実行しません。<br>
	「$(text)」でもパースできますが、JavaScriptが実行される危険があります。<br>
	<br>
	
	<time>2016-7-12</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-11" class="sec1" >
	<h3>HTML文字列をDOM扱いで検索 | $.parseHTML</h3>
	
	HTML文字列をパースし、任意の要素をfindで検索する。<br>
	<br>	
	
	
	サンプル
	<pre>
	var text = "<strong>&lt;div&gt;</strong>&lt;div id='test1'&gt;Hello World! 壱&lt;/div&gt;&lt;div id='test2'&gt;Hello World! 弐&lt;/div&gt;<strong>&lt;/div&gt;</strong>";
	var obj = <strong>$.parseHTML(text);</strong>
	var res = $(obj).find('#test2').html();
	console.log(res);
	</pre>
	<aside>※HTML文字列はdivなどのタグでラップする必要がある。</aside>
	<br>
	
	コンソール出力
	<pre class="output_data">Hello World! 弐</pre><br>
	<br>
	
	パース後のオブジェクトは、DOMへ追加やセットができる。
	<pre>	$('body').append(obj);</pre>
	<br>
	
	<hr>
	<p>取得できないケース</p>
	「div」などタグでラップされていないとfindで取得することはできない。
	<pre>
	var text = "&lt;div id='test1'&gt;Hello World! 壱&lt;/div&gt;&lt;div id='test2'&gt;Hello World! 弐&lt;/div&gt;";
	var obj = $.parseHTML(text);
	var res = $(obj).find('#test2').html();// <span class="ann">← 空となり取得できず</span>
	</pre>
	<br>
	
	「body」の直下でも取得できない。間にラップとなるタグが必要である。<br>
	<pre>
	var text = "<strong>&lt;body&gt;</strong>&lt;div id='test1'&gt;Hello World! 壱&lt;/div&gt;&lt;div id='test2'&gt;Hello World! 弐&lt;/div&gt;<strong>&lt;/body&gt;</strong>";
	var obj = $.parseHTML(text);
	var res = $(obj).find('#test2').html();// <span class="ann">← 空となり取得できず</span>
	</pre>
	<br>
	
	
	<p>$.parseHTMLの利点</p>
	「$.parseHTML(text);」でパースすると外部HTML内に埋め込まれているJavaScriptを実行しません。<br>
	「$(text)」でもパースできますが、JavaScriptが実行される危険があります。<br>
	<br>
	
	<time>2016-7-12</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-0" class="sec1" style="display:none">
	<h3>TEST</h3>
	テスト
	<pre>
	</pre>
	<a href="#" class="ref_link" target="brank">xxx</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->














<div class="yohaku"></div>
<ol class="breadcrumb">
	<li><a href="/">ホーム</a></li>
	<li><a href="/note_prg">プログラミングの覚書</a></li>
	<li><a href="/note_prg/JavaScript/">JavaScriptの覚書</a></li>
</ol>
</div><!-- content -->
<div id="footer">(C) kenji uehara 2015/12/17</div>
</body>
</html>