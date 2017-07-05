<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="google" content="notranslate" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CakePHP3の覚書</title>
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
<h1 id="header">CakePHP3の覚書</h1>
<div class="container">











<div id="s2-1" class="sec4" >
	<h3>bakeコンソールの使い方</h3>
	
	bakeコンソールでnekosテーブルからCRUDを自動生成する。<br>
	<br>
	
	<p>batファイル</p>
	<pre>
	@echo off
	ECHO CRUD CREATE.
	
	SET phpdir=C:\xampp\php\
	%phpdir%php.exe C:\xampp\htdocs\my_proj1\<strong>bin\cake.php</strong> bake all nekos
	
	ECHO Create CRUD is end.
	PAUSE > NUL
	</pre>
	<br>
	
	<aside>
	CakePHP3プロジェクト内の bin\cake.php がbakeの本体である。
	</aside>
	
	<br><time>2016-7-26</time>
	
</div>








<div id="s2-0" class="sec4" style="display:none">
	<h3>XXX</h3>
	
	<br>
	
</div>










<div class="yohaku"></div>
<ol class="breadcrumb">
	<li><a href="/">ホーム</a></li>
	<li><a href="/note_prg">プログラミングの覚書</a></li>
	<li><a href="/note_prg/php/">PHPの覚書</a></li>
	<li><a href="/note_prg/cakephp3/">CakePHP3の覚書</a></li>
</ol>
</div><!-- content -->
<div id="footer">(C) kenji uehara 2016-7-26</div>	
</body>
</html>