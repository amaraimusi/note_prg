<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google" content="notranslate" />
	
	<title>Angularのチュートリアル</title>

	<link href="/note_prg/css/bootstrap.min.css" rel="stylesheet">
	<link href="/note_prg/css/common2.css" rel="stylesheet">

	<script src="/note_prg/js/jquery-1.11.1.min.js"></script>
	<script src="/note_prg/js/bootstrap.min.js"></script>
	<script src="/note_prg/js/livipage.js"></script>
	<script src="/note_prg/js/ImgCompactK.js"></script>

	<!-- ソースコードをハイライト表示する -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.0.0/styles/default.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.0.0/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>

</head>
<body>
<div id="header" ><h1>Angularについて</h1></div>
<div class="container">
	





<div class="btn-group">
	<a href="https://angularjs.org/" target="brank" class="btn btn-link btn-sm">公式サイト</a>
</div>
		
	
	
	
<h2>目次</h2>
<ol >
	
	<li><a href="#s1" >Angularの特徴</a></li>
	<li><a href="#s2" >最初の基本</a></li>

</ol>











<div id="s1" class = "sec4" >
	<h3>Angularの特徴</h3>
	
	
	Angular.jsはMVCフレームワークである。<br>
	HTMLを拡張しており、「ng-model」などAngular特有の属性が存在する。<br>
	<br>
	
	初期化コードは少なく、コールバック周りもシンプルである。<br>
	jQueryとの競合箇所は少なく、併用も可能であるとのこと。<br>
	<br>
	
	クライアント側とサーバ側は切り分けされているためテストがしやすい。<br>
	<br>
	
	
	
	<p>文法の特徴</p>
	<ol>
	<li>{{}}によるデータのバインディング。</li>
	<li>DOMの一部分の繰り返すイテレータ機能。イテレータにフィルタを組み込むことも可能。</li>
	<li>バリデーション機能</li>
	<li>コンポーネントとして再利用するために、HTMLグループ化する</li>
	</ol>
	<br>
	

	<a class="ref_link" href="http://js.studio-kingdom.com/angularjs/guide/concepts" target="blank">参考サイト</a><br>
	
	<time>2013-9-3</time>
</div>










<div id="s2" class = "sec4" >
	<h3>最初の基本</h3>
	最初にAngularが管轄する範囲を決める。<br>
	範囲となる要素に「ng-app」属性を記述する。<br>
	<br>
	
	<p>Angularの基本</p>
	INPUT要素と表示要素をバインドするのが基本である。<br>
	バインドするには、まずINPUT要素の「ng-model」属性にプロパティを定義する。<br>
	あとは任意の表示箇所に  {{プロパティ}} を記述するだけである。<br>
	以上でバインドは完了である。INPUT要素に文字を入力すると、表示箇所にも文字が連動して表示されるようになる。<br>
	<br>
	
	ソースコード
	<pre><code>
	&lt;html&gt;
	&lt;head&gt;
		&lt;script src="angular.min.js"&gt;&lt;/script&gt;
	&lt;/head&gt;
	&lt;body&gt;
		&lt;div <strong>ng-app</strong>&gt;
			&lt;input type="text" <strong>ng-model="hoge"</strong>&gt;
			&lt;div&gt;Test <strong>{{hoge}}</strong>&lt;/div&gt;
		&lt;/div&gt;
	&lt;/body&gt;
	&lt;/html&gt;
	</code></pre>
	<br>
	
	<a href="/sample/angular/basic/first.html" class="btn btn-info">サンプル</a><br>
	<br>
	
	<time>2016-6-27</time>
</div>




















<div id="sxxx" class = "sec4" style="display:none">
	<h3>テンプレート</h3>
</div>





	
	





<div class="yohaku"></div>
<ol class="breadcrumb">
	<li><a href="/">ホーム</a></li>
	<li><a href="/note_prg">プログラミングの覚書</a></li>
	<li><a href="/note_prg/JavaScript/">JavaScriptの覚書</a></li>
	<li><a href="/note_prg/angular/">Angularの覚書</a></li>
	<li>チュートリアル</li>
</ol>
</div><!-- container  -->
<div id="footer"  ><a href="/">(c)kenji uehara</a> 2016-6-27</div>
</body>
</html>