<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="google" content="notranslate" />
		<title>ワクガンス　|　Androidの覚書</title>
		<link href="/note_prg/css/bootstrap.min.css" rel="stylesheet">
		<link href="/note_prg/css/common2.css" rel="stylesheet">

		<script src="/note_prg/js/jquery-1.11.1.min.js"></script>
		<script src="/note_prg/js/bootstrap.min.js"></script>
		<script>



		</script>

		<style type="text/css">

		</style>

	</head>
	<body>
		<h1 id="header">Androidの覚書</h1>
		<div class="container">








<!-- --------------------------------------------------------------- -->
<div id="sec1-1" class="sec1">
	<h3>Androidでスクリーンショットを撮影（ハードコピー）</h3>
	スマートフォンの「電源ボタン」と「音量下げるボタン」を同時に押す

</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec1-2" class="sec1" >
	<h3>開発者向けオプションを表示される方法</h3>

	<p>開発者向けオプションを表示する手順</p>
	<ol>
		<li>「設定→端末情報」と操作して端末情報を表示する。</li>
		<li>
			端末情報の下側にある「ビルド番号」を連続でタップし続けると、
			デベロッパーなんとかのメッセージが表示され、開発者向けオプションを開くことができるようになる。
		</li>
		<li>設定画面に戻ると、下あたりに開発者向けオプションが表示されている。</li>
	</ol>
	<br>
	
	
	<p>確認した端末の情報</p>
	Xperia SO-01E<br>
	Androidバージョン 4.1.2<br>


</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec1-3" class="sec1">
	<h3>Android端末のChromeをPC側Chromeでデバッグする</h3>

	Android端末Chromeで開いたページのJavaScriptを、PC側のChromeデベロッパーツールでデバッグ可能です。<br>
	Android4.0以上から対応しています。<br>
	<br>
	
	<p>Android端末Chromeを、PC側Chromeでデバッグする手順</p>
	<ol>
		<li>Android端末の開発者向けオプション※からUSBデバッグにチェックを入れます。</li>
		<li>PCとAndroid端末をUSBでつなぎます。</li>
		<li>Android側Chromeでデバッグ対象のページを開きます。</li>
		<li>PC側Chromeのアドレスバーに「<strong>chrome://inspect/#devices</strong>」を入力検索します。</li>
		<li>PC側ChromeにAndroid端末情報と、デバッグ対象ページの情報が表示されます。</li>
		<li>デバッグ対象ページの情報の「<strong>inspect</strong>」をクリックすると、Chromeデベロッパーツールが立ち上がりデバッグできるようになります。</li>
	</ol>
	<aside>※開発者向けオプションについては上記の「開発者向けオプションを表示される方法」を参照</aside>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec1-4" class="sec1" >

	<h3>スクリーンショットの場所</h3>
	Xperia AX の場合、Androidのスクリーンショットは以下のディレクトリに配置されている。
	<pre class="kata">内部ストレージ\Pictures\Screenshots</pre>
	<br>
	
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec1-0" class="sec1" style="display: none">
	<h3>xxx</h3>

	<pre>
	</pre>
	<a class="ref_link" href="xxx">xxx</a>

</div>
<hr />
<!-- --------------------------------------------------------------- -->























		<div class="yohaku"></div>
		<ol class="breadcrumb">
			<li><a href="/">ホーム</a></li>
			<li><a href="/note_prg">プログラミングの覚書</a></li>
			<li><a href="/note_prg/android/">Androidの覚書</a></li>
		</ol>
		</div><!-- content -->
		<div id="footer">(C) kenji uehara 2013/09/03</div>
	</body>
</html>