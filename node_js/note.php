<!DOCTYPE html>
<html lang="ja">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ワクガンス | Node.jsの覚書</title>


		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
		<link rel="stylesheet" type="text/css" href="../css/common2.css"  />

		<script src="../js/jquery-1.11.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>


		<style>

		</style>
	</head>

<body>
<div class="container">

	<div class="row">
		<div id="header" class="col-lg-12" >
			<h1>ワクガンス | Node.jsの覚書</h1>
			<p></p>
		</div>
	</div>






	<!-- --------------------------------------------------------------- -->
	<div id="sec1-1" class="sec1" >
		<div class="title">Node.jsの導入手順(Eclipse）</div>

		<ol>
			<li>
				<a href="http://nodejs.jp/" target="brank">Node.js 日本ユーザグループ</a>
				のサイトから最新の安定版をダウンロードする。<br>
				インストーラ用のパッケージ（msiファイル）をダウンロードする。
			</li>
			
			<li>
				msiを開いて、一般Windowsアプリケーションのようにして、node.jsをインストールする。<br>
				インストールする場所はどこでもよい。（マイドキュメントでも問題ない）<br>
				※少し注意：ウィザードの最初の画面でスペースキーを押すこと。<br>
			</li>
			
			<li>
				node.jsに対応したフレームワークであるexpressをインストールする。
				コマンドプロンプトを立ち上げ以下のコマンドを実行するだけ。<br>
				<pre>npm install express</pre>
				npmコマンドはnode.jsをインストールすると使えるようになる。<br>
				npmはNode Version Managerの略で、node.jsと関連したサードパーティ製のモジュールをひとまとめに管理している。
				簡単なコマンドだけで関連モジュールをインストールしたりアンインストールすることができる。<br>
				関連モジュールにはexpressのほかにもmongoDBなどがある。<br>
			</li>
			
			<li>
				リクエストボディを解析するモジュールである body-parser をインストールします。（上記と同様の方法）
				<pre>npm install body-parser</pre>
			</li>
			
			<li>
				続いてEclpseへの設定。Eclipseを立ち上げ「install new software」画面を開く。<br>
				Help→install new software
			</li>
			
			<li>
				Work Withに以下のURLを入力してaddボタンを押し、適当な名前を付けて保存する。
				<pre>http://dl.bintray.com/nodeclipse/nodeclipse/</pre>
			</li>
			
			
			<li>
				一覧に表示されたパッケージにチェックを入れ、インストールする。これでnodeプロジェクトが作成できるようになる。<br>
				<img src="img/note/sec1-1a.png" class="img-responsive" />
				※すべてのパッケージにチェックする。
				
			</li>
			
			<li>
				新プロジェクト Node Projectを立ちあげます。<br>
				File→New→Other→Node→Node Project<br>
				<img src="img/note/sec1-1b.png" class="img-responsive" />
			</li>
			
			<li>
				hello-world-server.jsを実行して、試に動かします。<br>
				実行はhello-world-server.jsを選択し、メニューから「Run→Run→Node Application」と操作します。<br>
				Eclipseのコンソールに、以下のメッセージが表示されればOKです。<br>
				<pre>Server running at http://127.0.0.1:1337/</pre>
				実行はメニューの実行ボタン（緑三角）からも可能です。<br>
			</li>
			
			<li>
				上記で実行されている状態で、ブラウザに「http://127.0.0.1:1337/」を入力します。<br>
				Hello Worldとブラウザの画面に表示されればOKです。<br>
				<br>
				※修正するときの注意点。<br>
				hello-world-server.jsファイルを修正した場合、node.jsを再実行します。<br>
				node.jsを再実行は、コンソールにある赤い四角ボタンを押して、node.jsを止めた後、メニューの実行ボタンを押します。<br>
			</li>
			
		</ol>

	
		<a href="http://qiita.com/naga3/items/e63144e17cb1ab9e03e9" class="ref_link" target="brank" >参考：Oiita:MongoDB+Express+AngularJS+Node.jsでシンプルなCRUDアプリ作成</a>
	</div>
	<hr />
	<!-- --------------------------------------------------------------- -->




	<!-- --------------------------------------------------------------- -->
	<div id="sec1-0" class="sec1" style="display: none">
		<div class="title">xxx</div>

		<pre>
		</pre>
		<img src="img/note/xxx.png" class="img-responsive" />
		<a href="xxx" class="ref_link" target="brank" >xxx</a>
	</div>
	<hr />
	<!-- --------------------------------------------------------------- -->






	<!-- draw.io -->
	<script type="text/javascript" src="../js/embed-static.min.js"></script>
	<br><br>
	<a href="http://amaraimusi.sakura.ne.jp/" class="btn btn-link btn-xs">ホームページ</a>
	<br><br>

	<div class="row">
		<div id="footer" class="col-md-12"  >
			<p>(c)wacgance 2015-07-12</p>
		</div>
	</div>

</div><!-- container  -->
</body>
</html>