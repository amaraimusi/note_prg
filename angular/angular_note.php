<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="google" content="notranslate" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Angularの覚書</title>
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
		<h1 id="header">Angularの覚書</h1>
		<div class="container">




			






<div id="s1-1" class = "sec4" >
	<h3>デバッグ関数 | debug</h3>
	
	デバッグ方法はdebug関数を用いることができます。画面にデバッグ内容が表示される。
	<pre>debug('test');</pre>
	<br>
	
	<p>CakePHP2との違い</p>
	「Debugger::dump('test=');」はデフォルトで使えなくなった。<br>
	<br>
	
	<time>2016-6-22</time>
</div>









<div id="s1-2" class="sec4" >
	<h3>Angularのトランザクション</h3>
	
	モデルからconnection()を通して、トランザクション関数を呼び出す。<br>
	下記はモデル名がAnimalsのサンプル。<br>
	<br>
	
	<pre><code>
	$this->Animals-><strong>connection()->begin</strong>();//トランザクション開始
	
	～  DBへの保存処理 ～
	
	$this->Animals-><strong>connection()->commit</strong>();//コミット
	</code></pre>
	<br>
	
	ロールバック
	<pre>$this->Animals->connection()->rollback();</pre>
	<br>
	
	<time>2016-6-24</time>
</div>









<div id="s1-3" class="sec4">
	<h3>複数データを一括でINSERTする</h3>
	
	<br>
	
	一回のINSERTで複数行を登録するサンプル。
	<pre><code>
	$data=[
			['animal_name'=&gt;'ライオン','animal_value'=&gt;1001],
			['animal_name'=&gt;'サイ','animal_value'=&gt;1002],
	];

	$query = $this-&gt;Animals-&gt;query();
	$query-&gt;insert(['animal_name', 'animal_value']);
	
	foreach ($data as $row) {
		$query-&gt;values($row);
	}
	
	$this-&gt;Animals-&gt;connection()-&gt;begin();//トランザクション開始
	
	$query-&gt;<strong>execute</strong>();//SQL実行
	
	$this-&gt;Animals-&gt;connection()-&gt;commit();//コミット
	</code></pre>
	<br>
	
	<p>Sql Log</p>
	<pre class="output_data"><code>
	INSERT INTO animals (animal_name, animal_value) 
	VALUES 
	  ('ライオン', 1001), 
	  ('サイ', 1002)
	</code></pre>
	<img src="img/note/s1-3.png" alt="" class="img_compact_k" /><br>
	<br>

	<a href="http://qiita.com/KeijiYONEDA/items/8c2f0e2a8f9cfbf08eeb" target="blank">参考サイト</a><br>
	<br>
	
	<time>2016-6-24</time>
</div>









<div id="s1-0" class="sec4" style="display:none">
	<h3>XXX</h3>
	
	<br>
	
</div>










			<div class="yohaku"></div>
			<ol class="breadcrumb">
				<li><a href="/">ホーム</a></li>
				<li><a href="/note_prg">プログラミングの覚書</a></li>
				<li><a href="/note_prg/JavaScript/">JavaScriptの覚書</a></li>
				<li><a href="/note_prg/angular/">Angularの覚書</a></li>
			</ol>

		</div><!-- content -->
		<div id="footer">(C) kenji uehara 2013-9-3</div>
		
	</body>
</html>