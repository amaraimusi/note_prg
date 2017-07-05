<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="google" content="notranslate" />
	<title>jQueryの覚書</title>
	<link href="/note_prg/css/bootstrap.min.css" rel="stylesheet">
	<link href="/note_prg/css/highlight/default.css" rel="stylesheet">
	<link href="/note_prg/css/common2.css" rel="stylesheet">

	<script src="/note_prg/js/jquery-1.11.1.min.js"></script>
	<script src="/note_prg/js/bootstrap.min.js"></script>
	<script src="/note_prg/js/highlight.pack.js"></script>
	<script src="/note_prg/js/livipage.js"></script>
	<script src="/note_prg/js/ImgCompactK.js"></script>
	
	<!-- ソースコードをハイライト表示する -->
	<script>hljs.initHighlightingOnLoad();</script>
</head>
<body>
<div id="header" ><h1>jQueryの覚書</h1></div>
<div class="container">








<!-- --------------------------------------------------------------- -->
<div id="sec6-1" class="sec1" >
	<h3>複数の非同期通信を制御する | $.Deferred</h3>
	
	以下のサンプルは３つの非同期処理（async1,async2,async3)がすべて終えたら、最後の処理を実行するサンプルである。<br>
	async1～3は数秒後にテキストをはきだす非同期処理であり、制御用の機能である$.Deferredが組み込まれている<br>
	すべての非同期処理が終わったらdoneで最後の処理を実行する。<br>
	これらはjQueryの標準機能である。<br>
	<br>

	<a href="/sample/js/a004/jquery_deferred/jquery_deferred.html" class="btn btn-info">検証</a><br>
	<br>

	HTML
	<pre>
	&lt;input type="button"  onclick="test1()" value="TEST1" /&gt;
	&lt;div id="res"&gt;&lt;/div&gt;
	</pre>
	<br>
	
	JavaScript
	<pre><code>
	function test1(){
		$('#res').append('TEST&lt;br&gt;');
		
		<strong>$.when</strong>(
			async1(),
			async2(),
			async3()
		).<strong>done</strong>(
			function(){
				$('#res').append('すべての非同期処理を実行しました。');
			}
		).fail(function(){
			alert('非同期処理の失敗');
		})
	}
	
	
	function async1(){
		var dfd = <strong>$.Deferred</strong>();
		window.setTimeout(function(){
			$('#res').append("&lt;div class='text-success'&gt;①ネコ&lt;/div&gt;");
			dfd.<strong>resolve</strong>();
		}, 1000);
		return dfd.<strong>promise</strong>();
	}
	
	
	function async2(){
		var dfd = $.Deferred();
		window.setTimeout(function(){
			$('#res').append("&lt;div class='text-warning'&gt;②ヤギ&lt;/div&gt;");
			dfd.resolve();
		}, 300);
		return dfd.promise();
	}
	
	
	function async3(){
		var dfd = $.Deferred();
		window.setTimeout(function(){
			$('#res').append("&lt;div class='text-danger'&gt;③カニ&lt;/div&gt;");
			dfd.resolve();
		}, 1200);
		return dfd.promise();
	}
	</code></pre>
	<br>
	
	
	<aside>
	$.ajaxなどjQueryのいくつかの関数では、$.Deferredがデフォルトで組み込まれている。<br>
	これらの関数では$.Deferredの記述は不要である。
	</aside>
	
	

	<br><time>2017-2-13</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec6-2" class="sec1" >
	<h3>タグ種類を問わずに要素から値を取得する | getValueEx</h3>

	<pre>
	var v = _getValueEx($('#xxx'));
	
	/**
	 * タグ種類を問わずに要素から値を取得する
	 * @param elm 要素
	 * @returns 要素の値
	 */
	function _getValueEx(elm){
		
		var v = undefined;
		var tagName = elm.prop("tagName"); 
		
		if(tagName == 'INPUT' || tagName == 'SELECT' || tagName=='TEXTAREA'){
			// type属性を取得する
			var typ = elm.attr('type');
			
			
			if(typ=='checkbox'){
				
				v = 0;
				if(elm.prop('checked')){
					v = 1;
				}
				
			}
			
			else if(typ=='radio'){
				var opElm = form.find("[name='" + f + "']:checked");
				v = 0;
				if(opElm[0]){
					v = opElm.val();
				}
	
			}
			
			else{
				v = elm.val();

			}
			
		}else{
			v = elm.html();
		}
		return v;
	}
	</pre>

	<br><time>2017-2-14 | 2017-3-3</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec6-3" class="sec1" >
	<h3>テーブル行内の任意要素から行番（行インデックス）を取得する</h3>
	
	<a href="/sample/js/a004/get_tr_index/get_tr_index.html" class="btn btn-info">デモ</a><br>
	<br>


	サンプル
	<pre><code>
	&lt;script&gt;
	function test1(btn){
		var btnElm = $(btn);
		var trElm = btnElm.parents('tr');
		var row_index = trElm.index();
		alert('行番=' + row_index);
	}
	&lt;/script&gt;
	
	&lt;table class="tbl2"&gt;
		&lt;thead&gt;
			&lt;tr&gt;&lt;th&gt;id&lt;/th&gt;&lt;th&gt;コード&lt;/th&gt;&lt;th&gt;名前&lt;/th&gt;&lt;th&gt;備考&lt;/th&gt;&lt;/tr&gt;
		&lt;/thead&gt;
		&lt;tbody&gt;
			&lt;tr&gt;&lt;td&gt;1&lt;/td&gt;&lt;td&gt;neko&lt;/td&gt;&lt;td&gt;猫&lt;/td&gt;&lt;td&gt;&lt;input type="button" onclick="test1(this)" value="test1" /&gt;&lt;/td&gt;&lt;/tr&gt;
			&lt;tr&gt;&lt;td&gt;2&lt;/td&gt;&lt;td&gt;yagi&lt;/td&gt;&lt;td&gt;山羊&lt;/td&gt;&lt;td&gt;&lt;input type="button" onclick="test1(this)" value="test1" /&gt;&lt;/td&gt;&lt;/tr&gt;
			&lt;tr&gt;&lt;td&gt;3&lt;/td&gt;&lt;td&gt;same&lt;/td&gt;&lt;td&gt;鮫&lt;/td&gt;&lt;td&gt;&lt;input type="button" onclick="test1(this)" value="test1" /&gt;&lt;/td&gt;&lt;/tr&gt;
			&lt;tr&gt;&lt;td&gt;4&lt;/td&gt;&lt;td&gt;wasi&lt;/td&gt;&lt;td&gt;鷲&lt;/td&gt;&lt;td&gt;&lt;input type="button" onclick="test1(this)" value="test1" /&gt;&lt;/td&gt;&lt;/tr&gt;
			&lt;tr&gt;&lt;td&gt;5&lt;/td&gt;&lt;td&gt;goki&lt;/td&gt;&lt;td&gt;御器&lt;/td&gt;&lt;td&gt;&lt;input type="button" onclick="test1(this)" value="test1" /&gt;&lt;/td&gt;&lt;/tr&gt;
	
		&lt;/tbody&gt;
	&lt;/table&gt;
	</code></pre>



	<br><time>2017-3-8</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec6-4" class="sec1" >
	<h3>jQueryオブジェクトであるか判別する</h3>

	<pre>
	if(obj1 <strong>instanceof jQuery</strong>){
		console.log('jQueryオブジェクト');
	}else{
		console.log('別のオブジェクト');
	}
	</pre>


	<br><time>2017-3-21</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec6-0" class="sec1" style="display:none">
	<h3>TEST</h3>



	<br><time></time>
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
<div id="footer">(C) kenji uehara 2017-2-13</div>
</body>
</html>