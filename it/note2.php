<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="google" content="notranslate" />
	<title>ワクガンス　|　情報技術の覚書</title><link rel='shortcut icon' href='/home/images/favicon.ico' />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
	<link rel="stylesheet" type="text/css" href="../css/common2.css"  />
	<script src="../js/jquery-1.11.1.min.js"></script>

</head>
<body>
<div id="header" ><h1>情報技術の覚書</h1></div>
<div class="container">










<!-- --------------------------------------------------------------- -->
<div id="sec2-1" class="sec1">
	<h3>Chromeでスマホ用画面をエミュレートする</h3>

	Chromeでスマートフォン用のページを表示させることができる。<br>
	<br>
	
	＜例＞Yahooページをスマートフォン用の画面にしてみる。
	<ol>
		<li>Chromeで画面を開く。</li>
		<li>F12キーを押して、デベロッパーツールを開く。</li>
		<li>
			デベロッパーツールのメニューから左から2番目のアイコンをクリックする。<br>
			<img src="img/note2/sec2-1a.png" class = "img-responsive" />
		</li>
	
		<li>画面がスマホサイズに合わせて小さくなっているがPC版のままである。</li>
		<li>
			画面上にある「Pesponsive▼」をNexsus5やiPhoneに切り替える。
			<img src="img/note2/sec2-1b.png" class = "img-responsive" />
		</li>
			
		<li>F5キーを押してブラウザをリロードする。</li>
		<li>
			以上でスマホ用の画面が表示される。
			<img src="img/note2/sec2-1c.png" class = "img-responsive" />
		</li>
	</ol>
	
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec2-2" class="sec1" >
	<h3>開いているwebサイトをPDFで保存する | Chrome</h3>

	ChromeでwebサイトをPDFに変換しPCに保存できる。<br>
	<br>
	
	<p>手順</p>
	<ol>
		<li>右上のメニューアイコン → 印刷ボタン</li>
		<li>送信先の「変更」ボタンを押し、「PDFに保存を選択」</li>
		<li>保存ボタン（保存先フォルダ指定）</li>
		<li>以上でPDFが保存先フォルダに保存される</li>
	</ol>
	<br>
	<img src="img/note2/sec2-2.png" class = "img-responsive" />

</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec2-3" class="sec1" >
	<h3>587番ポートについて</h3>
	587番ポートとは、サブミッションポートとも呼ばれるメール送信用ポートである。<br>
	<br>
	
	<p>587番ポートが使われるようになった理由</p>
	電子メールを送信するとき、元々は25番ポート（SMTP）を使っていた。<br>
	しかし25番ポートは認証が不要であるため、悪徳業者に利用され大量のSPAMメールが出回ることになってしまった。<br>
	そのため多くのプロバイダは25番ポートをブロックするようになった。<br>
	代わりに、587番ポートが使われるようになった。（SMTP-AUTH）<br>
	587ポートはメール送信する際、ユーザーIDとパスワードによる認証が必須である。<br>
	認証が必要になったおかげで、SPAMは大幅に減った。<br>
	<br>

	<time>2016-6-8</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec2-4" class="sec1" >
	<h3>SOAP通信</h3>
	
	
	
	SOAPとはサーバーと通信する技術の一つである。<br>
	Web APIサービスでよく使われている。<br>
	様々な会社や団体は、SOAP APIという形でWEB API サービスを提供してきた。<br>
	だが、すでに時代遅れになっており、REST APIにとって代わられるようになった。<br>
	<br>
	
	<p>SOAP APIサービス</p>
	<table class="tbl2">
		<thead><tr><th>会社/団体</th><th>SOAP API</th></tr></thead>
		<tbody>
			<tr>
				<td>Google</td>
				<td><a href="https://developers.google.com/soap-search/">SOAP Search API</a>(すでに終了）</td>
			</tr>
			<tr>
				<td>Yahoo</td>
				<td><a href="http://developer.yahoo.co.jp/changelog/2012-02-08-auctions110.html">オークションSOAP</a>(すでに終了）</td>
			</tr>
			<tr>
				<td>Amazon</td>
				<td>すでに終了</td>
			</tr>
			<tr>
				<td>NTT</td>
				<td>すでに終了</td>
			</tr>
		</tbody>
	</table>
	<br>
	
	<p>REST</p>
	現在、WEB APIといえばREST APIのことを指している状況である。<br>
	Yahoo APIやGoole API , Wikipedia API などがある。<br>
	<br>

	<p>AJAXとの関係</p>
	SOAPはAJAXの非同期通信で利用できる。<br>
	SOAPでサーバーのデータやりとりを行う。<br>
	データ形式はXMLである。<br>
	しかし、現在ではSOAPの代わりに、JSONを使うのが主流となっている。<br>
	<br>
	
	<p>PHPとの関係</p>
	PHPからWEB APIサービスにアクセスしてデータを取得できるように、<br>
	PHPからSOAP APIサービス（UDDIという）にアクセスしてデータを取得できる。<br>
	<br>
	
	<p>POSTとの違い</p>
	POSTはリクエストとしてサーバーとデータをやりとりする。<br>
	SOAPはAJAX（非同期通信）としてサーバーとデータをやりとりする。（クロスドメイン可能）<br>
	<br>
	
	
	<p>セキュリティ</p>
	HTTP、HTTPSプロトコルを利用しているので、セキュリティレベルはHTTPと同等である。<br>
	<br>
	
	<p>メリット</p>
	今現在ではもはや時代遅れでメリットはない。<br>
	代わりにREST + JSONを使う。<br>
	<br>
	
	<p>廃れた理由</p>
	データ構造がRESTと比較すると複雑である。そのためJavaScriptなどでSOAP形式データを扱うのはたいへんであった。<br>
	RESTは柔軟な構造である上、ブラウザにURLを入力してデータを表示させることができる大きなメリットがある。<br>
	<br>
	
	REST APIの例：<a href="https://ja.wikipedia.org/w/api.php?format=xml&action=query&prop=info&titles=%E3%83%A4%E3%83%B3%E3%83%90%E3%83%AB%E3%82%AF%E3%82%A4%E3%83%8A">Wikipedia API</a><br>
	<br>
	
	<time>2016-6-28</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec2-5" class="sec1" >
	<h3>リアクティブプログラミングとは</h3>

	リアクティブプログラミングはリアクティブなシステムを作成するアーキテクチャである。<br>
	リアクティブシステムは即応性、弾力性、耐障害性、メッセージ駆動を備えているシステムである。<br>
	<br>
	
	<table class="tbl2">
		<caption>リアクティブシステムの特徴</caption>
		<thead>
			<tr><th>特徴</th><th>説明</th></tr>
		</thead>
		<tbody>
			<tr><td>即応性</td><td>レスポンスが速い。並列処理（分散処理）により全体の処理を速くする。</td></tr>
			<tr><td>弾力性</td><td>小さい負荷でも大きい負荷でも応答時間を一定にする。負荷が大きい場合はメモリやリソースを多めに確保したり分散処理を行う。負荷を監視して、負荷を減らす処理も備える良い。</td></tr>
			<tr><td>耐障害性</td><td>障害に強い。部分的に障害が発生しても、システム全体を危険な状態にしない。また自動的に復旧できるようにする。</td></tr>
			<tr><td>メッセージ駆動</td><td>コンポーネント間をメッセージつまり分かりやすい引数でやりとりする。またAjaxを用いる。</td></tr>

		</tbody>
	</table>
	
	<time>2017-11-29</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->










<!-- --------------------------------------------------------------- -->
<div id="sec2-6" class="sec1" >
	<h3>タッチパッドの操作方法</h3>

	Surfaceのタッチパッドの場合（ノートPCの種類によっては使用できない操作あり）

	<table class="table">
		<thead>
			<tr><th>操作</th><th>アクション</th></tr>
		</thead>
		<tbody>
			<tr><td>2本指タップ</td><td>マウスの右クリックと同等</td></tr>
			<tr><td>3本指で上方向へスワイプ</td><td>仮想デスクトップを表示</td></tr>
			<tr><td>左パッドボタンを押しなら指移動</td><td>ドラッグ</td></tr>
			<tr><td>ダブルタップして指移動 </td><td>タップ アンド ハーフ</td></tr>
			<tr><td>２本指で垂直または水平移動</td><td>スクロール</td></tr>
			<tr><td>ピンチまたはストレッチ</td><td>拡大縮小など</td></tr>
	
		</tbody>
	</table>
	
	<time>2018-2-2</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->










<!-- --------------------------------------------------------------- -->
<div id="sec2-7" class="sec1" >
	<h3>Windows10でドットから始まるファイルまたはフォルダ名を入力する方法</h3>

	
	Windows10でドットから始まるファイルを入力しようとすると「ファイル名を入力してください」とエラーが表示される。<br>
	「.htaccess」などのドットから始まるファイル名にしたい場合「<strong>.htaccess.</strong>」と、末尾にドットを追加すれば良い。フォルダ名も同様に修正ができる。<br>
	<br>
	
	<time>2018-2-5</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->










<!-- --------------------------------------------------------------- -->
<div id="sec2-0" class="sec1" style="display: none">
	<h3>xxx</h3>

	<pre>
	</pre><br>
	
	<time></time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->





















<div class="yohaku"></div>
<ol class="breadcrumb">
	<li><a href="/">ホーム</a></li>
	<li><a href="/note_prg">プログラミングの覚書</a></li>
	<li><a href="/note_prg/it/">情報技術</a></li>
</ol>
</div><!-- content -->
<div id="footer">(C) kenji uehara 2015/6/9</div>
</body>
</html>