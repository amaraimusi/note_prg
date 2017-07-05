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
<div id="sec5-1" class="sec1" >
	<h3>プロパティ（属性）の追加および除去 | prop,removeProp</h3>
	
	prop関数でプロパティの追加および除去ができる。<br>
	<br>

	ソースコード<br>
	<pre><code>
	$('#xxx').prop("checked",false);// checkedプロパティを要素から除去する。
	$('#xxx').prop("checked",true);// checkedプロパティを要素から除去する。
	</code></pre>
	<br>

	
	「 animal="neko" 」を追加する場合<br>
	<pre><code>	$('#xxx').prop("animal","neko");</code></pre>
	<br>

	<aside>
	※要素除去の別の方法 → jQuery.removeProp('checked') <br>
	ただ、十分検証していないが、バージョンによっては動かない場合もあるかもしれない。<br>
	</aside>
	<br>
	
	<br><time>2016-10-19</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec5-2" class="sec1" >
	<h3>jQuery.UI | テーブル行を並べ替え</h3>
	
	<a href="/sample/js/a003/table_sortable/table_sortable_demo1.html" class="btn btn-info">サンプル</a><br>
	<br>
	
	ソースコード
	<pre><code>
	&lt;script src="jquery.min.js"&gt;&lt;/script&gt;
	&lt;script src="jquery-ui.min.js"&gt;&lt;/script&gt;
	
	&lt;script&gt;
	$(function(){
		$('#sort1').<strong>sortable</strong>();
		$('#sort1').<strong>disableSelection</strong>();
	});
	&lt;/script&gt;
	
	～省略～
	
	&lt;table&gt;
		&lt;thead&gt;
			&lt;tr&gt;&lt;th&gt;id&lt;/th&gt;&lt;th&gt;コード&lt;/th&gt;&lt;th&gt;名前&lt;/th&gt;&lt;th&gt;備考&lt;/th&gt;&lt;/tr&gt;
		&lt;/thead&gt;
		&lt;tbody id="<strong>sort1</strong>"&gt;
			&lt;tr&gt;&lt;td&gt;1&lt;/td&gt;&lt;td&gt;neko&lt;/td&gt;&lt;td&gt;猫&lt;/td&gt;&lt;/tr&gt;
			&lt;tr&gt;&lt;td&gt;2&lt;/td&gt;&lt;td&gt;yagi&lt;/td&gt;&lt;td&gt;山羊&lt;/td&gt;&lt;td&gt;草食&lt;/td&gt;&lt;/tr&gt;
			&lt;tr&gt;&lt;td&gt;3&lt;/td&gt;&lt;td&gt;same&lt;/td&gt;&lt;td&gt;鮫&lt;/td&gt;&lt;/tr&gt;
			&lt;tr&gt;&lt;td&gt;4&lt;/td&gt;&lt;td&gt;wasi&lt;/td&gt;&lt;td&gt;鷲&lt;/td&gt;&lt;/tr&gt;
			&lt;tr&gt;&lt;td&gt;5&lt;/td&gt;&lt;td&gt;goki&lt;/td&gt;&lt;td&gt;御器&lt;/td&gt;&lt;/tr&gt;
	
		&lt;/tbody&gt;
	&lt;/table&gt;
	</code></pre>
	<br>
	
	<p>参考先リンク</p>
	<a href="http://stacktrace.jp/jquery/ui/interaction/sortable.html" target="blank">jQueryで簡単にドラッグ＆ドロップのソートを実装する方法</a><br>
	<a href="http://blog.asial.co.jp/1021" target="blank">プログラミングに関する雑多なStackの形跡 Sortable</a><br>
	<br>

	<br><time>2016-11-2</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec5-3" class="sec1" >
	<h3>jQuery.UI | テーブル行を並べ替え：コールバック</h3>
	
	<a href="/sample/js/a003/table_sortable/table_sortable_demo2.html" class="btn btn-info">サンプル</a><br>
	<br>
	
	ソースコード
	<pre><code>
	&lt;script src="jquery-ui.min.js"&gt;&lt;/script&gt;
	
	&lt;script&gt;
	$(function(){
		tbodyElm = $('#tbl1 tbody');
		tbodyElm.sortable();
		tbodyElm.disableSelection();

		// 並べ替え前に呼び出すコールバック関数。
		tbodyElm.bind('<strong>sortstart</strong>', function (e, ui) {
		
			// ドラッグ中の要素を取得
			var tr = $(ui.item);
	
			// indexを出力(並べ替える前の順番）
			console.log('前= ' + tr.context.sectionRowIndex);
	
			
		});
	
		// 並べ替え後に呼び出すコールバック関数。
		tbodyElm.bind('<strong>sortstop</strong>', function (e, ui) {
	
			// ドラッグ中の要素を取得
			var tr = $(ui.item);
	
			// indexを出力（並べ替えた後の順番）
			console.log('後= ' + tr.context.sectionRowIndex);
	
			
		});
	});
	&lt;/script&gt;
	
	&lt;table id="tbl1"&gt;
		&lt;thead&gt;
			&lt;tr&gt;&lt;th&gt;id&lt;/th&gt;&lt;th&gt;コード&lt;/th&gt;&lt;th&gt;名前&lt;/th&gt;&lt;th&gt;備考&lt;/th&gt;&lt;/tr&gt;
		&lt;/thead&gt;
		&lt;tbody&gt;
			&lt;tr&gt;&lt;td&gt;1&lt;/td&gt;&lt;td&gt;neko&lt;/td&gt;&lt;td&gt;猫&lt;/td&gt;&lt;/tr&gt;
			&lt;tr&gt;&lt;td&gt;2&lt;/td&gt;&lt;td&gt;yagi&lt;/td&gt;&lt;td&gt;山羊&lt;/td&gt;&lt;td&gt;草食&lt;/td&gt;&lt;/tr&gt;
			&lt;tr&gt;&lt;td&gt;3&lt;/td&gt;&lt;td&gt;same&lt;/td&gt;&lt;td&gt;鮫&lt;/td&gt;&lt;/tr&gt;
			&lt;tr&gt;&lt;td&gt;4&lt;/td&gt;&lt;td&gt;wasi&lt;/td&gt;&lt;td&gt;鷲&lt;/td&gt;&lt;/tr&gt;
			&lt;tr&gt;&lt;td&gt;5&lt;/td&gt;&lt;td&gt;goki&lt;/td&gt;&lt;td&gt;御器&lt;/td&gt;&lt;/tr&gt;
	
		&lt;/tbody&gt;
	&lt;/table&gt;
	</code></pre>
	<br>

	<br><time>2016-11-2 | 2016-11-18</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec5-4" class="sec1">
	<h3>表示順の入れ替え</h3>


	a要素の前にb要素を移動する
	<pre><code>	$('#a').before($('#b'));</code></pre>
	<br>
	
	a要素の後にc要素を移動する
	<pre><code>	$('#a').after($('#c'));</code></pre>
	<br>
	
	<a href="/sample/js/a003/jq_change_places/jq_change_places.html" class="btn btn-info">応用サンプル</a><br>
	<br>
	<hr>
	
	<p>関数版</p>
	<a href="/sample/js/a003/jq_change_places/jq_change_places_demo2.html" class="btn btn-info">サンプル・デモ2</a><br>
	<br>
	
	ソースコード
	<pre><code>
	&lt;script&gt;
	// 「ヤンバルクイナ」を5番に移動するサンプル。
	function test1(){
		var groupSlt = "#animals div";
		var moveElm = $('#animal2');
		var indexTo = 4;
		<strong>changePlace</strong>(groupSlt,moveElm,indexTo);
	}
	
	
	/**
	 * 要素を入れ替え移動する
	 * 
	 * @note
	 * 引数のgroupSltである移動要素のグループセレクタは「移動要素の親セレクタ + 移動要素のタグ」を指定する。（グループをあらわすclass名でもよい）
	 *  
	 * @param groupSlt 移動要素のグループセレクタ
	 * @param moveElm 移動要素&lt;jQueryオブジェクト&gt;
	 * @param indexTo 移動先のインデックス
	 */
	function <strong>changePlace</strong>(groupSlt,moveElm,indexTo){
	
		// 移動元のインデックスを取得
		var indexFrom = $(groupSlt).index(moveElm);
		
		var neighbor = $(groupSlt).eq(indexTo);// 移動先の隣り要素
		
		// 移動先隣り要素の前後に対象要素を移動する
		if(indexFrom &gt; indexTo){
			neighbor.before(moveElm);
		}else if(indexFrom &lt; indexTo){
			neighbor.after(moveElm);
		}
	
	}
	&lt;/script&gt;
	
	
	&lt;input type="button" class="btn btn-success" value="test1" onclick="test1()" /&gt;
	&lt;hr&gt;
	&lt;div id="animals"&gt;
		&lt;div id="animal1"&gt;1  イリオモテヤマネコ&lt;/div&gt;
		&lt;div id="animal2"&gt;2  ヤンバルクイナ&lt;/div&gt;
		&lt;div id="animal3"&gt;3  イボイモリ&lt;/div&gt;
		&lt;div id="animal4"&gt;4  リュウキュウヤマガメ&lt;/div&gt;
		&lt;div id="animal5"&gt;5  ノグチゲラ&lt;/div&gt;
		&lt;div id="animal6"&gt;6  ムラサキ オカヤドカリ&lt;/div&gt;
	&lt;/div&gt;
	</code></pre>
	<br>

	<br><time>2016-11-7</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec5-5" class="sec1" >
	<h3>要素を削除する | jquery.remove</h3>

	<pre>$('#xxx').<strong>remove</strong>();</pre><br>
	<br>


	<br><time>2016-11-7</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec5-6" class="sec1" >
	<h3>要素数を取得する | jQuery</h3>
	
	
	<pre>	var len1 = $('.test1').<strong>length</strong>;</pre>
	
	セレクタで指定した要素が存在しない場合、0件として取得される。<br>
	<br>
	
	<a href="/sample/js/a003/count_elements/count_elements.html" class="btn btn-info">サンプル</a><br>
	<br>


	<br><time>2016-11-14</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec5-7" class="sec1" >
	<h3>親要素内からname属性またはclass属性を指定して要素を取得する</h3>
	
	ソースコード
	<pre><code>
	/**
	 * 親要素内からname属性またはclass属性を指定して要素を取得する
	 * @param parElm 親要素
	 * @param key name属性名またはclass属性名
	 * @return 要素&lt;jquery object&gt;
	 */
	function getElmByNameOrClass(parElm,key){
		var elm = parElm.find("[name='" + key + "']");
		if(!elm[0]){
			elm = parElm.find('.' + key);
		}
		return elm;
		
	}
	</code></pre>
	<br>


	<br><time>2016-12-5</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec5-8" class="sec1" >
	<h3>親要素内からname属性またはclass属性を指定して値を取得する</h3>
	
	ソースコード
	<pre><code>
	/**
	 * 親要素内からname属性またはclass属性を指定して値を取得する
	 * @param parElm 親要素
	 * @param key name属性名またはclass属性名
	 * @return 値
	 */
	function getValueByNameOrClass(parElm,key){
		var v = undefined;
		var elm = parElm.find("[name='" + key + "']");
		if(elm[0]){
			v = elm.val();
		}else{
			elm = parElm.find('.' + key);
			if(elm[0]){
				v = elm.text();
			}
		}
		return v;
	}
	</code></pre>
	<br>


	<br><time>2016-12-5</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec5-9" class="sec1" >
	<h3>指定要素を数える | jQuery</h3>

	<pre>	$('.xxx').<strong>length</strong>;</pre>

	<br><time>2017-2-9</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->










<!-- --------------------------------------------------------------- -->
<div id="sec5-10" class="sec1" >
	<h3>テーブルの行数を数える</h3>
	
	<p>サンプル1</p>
	<pre>
	var rowCnt = $('#tbl1').children('tbody').children('tr').length;
	</pre>
	<hr>

	<p>サンプル2</p>
	<pre>
	var tbl = $('#tbl1');
	var tBody = tbl.children('tbody');
	var rowCnt = tBody.children('tr').length;// テーブル行数
	</pre>
	<aside>
	※<br>
	tbl1はテーブルのid属性。<br>
	テーブル内に別の入れ子のテーブルが存在していても正確に行数を数えることが可能である。<br>
	</aside>
	<br><time>2017-2-9 | 2017-3-17</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec5-0" class="sec1" style="display:none">
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
<div id="footer">(C) kenji uehara 2016-10-19</div>
</body>
</html>