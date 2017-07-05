<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="google" content="notranslate" />
		<title>ワクガンス　|　情報技術の覚書</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
		<link rel="stylesheet" type="text/css" href="../css/common2.css"  />
		<script src="../js/jquery-1.11.1.min.js"></script>
		<script>



		</script>

		<style type="text/css">

		</style>

	</head>
	<body>
		<div id="page1">
		<h1 id="header">情報技術の覚書</h1>
		<div id="content" >








<!-- --------------------------------------------------------------- -->
<div id="sec1-1" class="sec1">
	<h3>覚書テスト用に使えるドメイン</h3>

	以下のドメインは例示用でありテストに使うことができる。<br>
	第三者に影響を及ぼすことがない。<br>
	<ul>
		<li>example.com</li>
		<li>example.net</li>
		<li>example.org</li>
	</ul>

</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec1-1-2" class="sec1">
	<h3>最長の住所</h3>

	<p>日本一長い住所</p>
	郵便番号:<strong>602-8368</strong><br>
	<pre>京都府京都市東山区三条通南二筋目白川筋西入ル二丁目北木之元町</pre>
	<br>

	<br><time>2016-7-26</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec1-2" class="sec1" >
	<h3>Google Maps APIキーを作成する手順【2015年】</h3>


	<ol>
	<li>URLへアクセス→ <a href="https://code.google.com/apis/console">https://code.google.com/apis/console</a></li>
	<li>gmailのアカウントでログイン</li>

	<li>左メニューの「APIと認証」→「API」を選択</li>
	<li>Google Maps APIで「Google Maps JavaScript API」をクリック→APIを有効にする。</li>
	<li>左メニューの「認証情報」を開く</li>
	<li>公開APIへのアクセスの「新しいキーを作成」ボタンを押すとAPIキーが作成される。リファラ（遷移元ページ）の制限設定も可能。</li>

	</ol>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec1-3" class="sec1" >
	<h3>改行コードについて</h3>

	改行コードはLF（改行）とCR（復帰）の2種類が存在する。<br>
	OS環境ごとに採用している改行コードは異なる。<br>
	<br>
	
	<p>OS環境ごとの改行コード</p>
	<table class="tbl2">
		<thead>
			<tr><th></th><th>改行コード</th><th>OS</th><th>char</th><th>文字コード</th><th>説明</th></tr>
		</thead>
		<tbody>
			<tr><td></td><td>LF</td><td>UNIX </td><td>0x0A</td><td>\n</td><td>「改行」または、ラインフィードと呼ばれる。EOLという別名もある。</td></tr>
			<tr><td></td><td>CR</td><td>MacOS(昔)</td><td>0x0D</td><td>\r</td><td>「復帰」または、キャリッジリターンと呼ばれる。</td></tr>
			<tr><td></td><td>CR+LF</td><td>WINDOWS</td><td></td><td>\r\n</td><td>Windowsでは両方を使う。</td></tr>
	
		</tbody>
	</table>
	<br>
	
	<p>CSVファイルの改行コード</p>
	Excel、Cassava EditorではCSVの改行を以下ように扱っている<br>
	<ul>
		<li>行末は「CR+LF」</li>
		<li>セル内改行は「LF」</li>
	</ul>
	<br>
	
	<p>補足</p>
	LFとCRはタイプライターの時代までさかのぼる。<br>
	タイプライターでLFは紙を上に送る操作であり、CRはキャリッジ（印字装置）を左端に戻す操作である。<br>
	<br>
	
	
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec1-4" class="sec1" >
	<h3>シンボリックリンク | Link Shell Extension</h3>

	Link Shell Extensionとはシンボリックリンクを作成するソフトである。<br>
	シンボリックリンクは、あるディレクトリを別のディレクトリにあるかのように見せかけることができる。<br>
	つまりフォルダに別のパス名を付けてアクセスすることができる。<br>
	ディレクトリだけでなくファイルにシンボリックリンクを作成することも可能である。<br>
	<br>
	
	シンボリックリンクはLinuxなどで良く使わる技術であるが、Windowsには元々ない機能である。<br>
	しかし、「Link Shell Extension」をインストールすれば、Windowsでも使えるようになる。<br>
	<br>
	
	<p>ショートカットとは似ているが異なる。</p>
	他のプログラムでショートカットへのパスを指定した場合、ショートカットファイルそのものを指定してしまう。<br>
	しかし、シンボリックリンクへの別パスを指定した場合、本体のディレクトリおよびファイルを指し示す。<br>
	また、シンボリックリンク（フォルダ）を開くと、エクスプローラ上部のファイルパスは別パスになっている。<br>
	<br>
	
	
	<p>ハードリンクとジャンクション</p>
	シンボリックリンクの他に、ハードリンク、ジャンクションが存在するがWin 7の場合、シンボリックリンクだけで十分と思われる。<br>
	<table class="tbl2">
		<thead>
			<tr><th>種別</th><th>説明</th></tr>
		</thead>
		<tbody>
			<tr><td>シンボリックリンク</td><td>ファイルおよびフォルダに別名を付ける。Vista,7が対応している。</td></tr>
			<tr><td>ハードリンク</td><td>ファイルに別名を付ける</td></tr>
			<tr><td>ジャンクション</td><td>フォルダに別名を付ける</td></tr>
	
		</tbody>
	</table>
	<br>
	
	<h4>応用</h4>
	シンボリックリンクを使うとマイドキュメント内フォルダを、Apacheサーバーで動かすような芸当も容易にできる。<br>
	マイドキュメント内フォルダのシンボリックリンクをApacheのhtdocsフォルダ内に作れば、マイドキュメント内フォルダをApacheサーバーで動かせる。<br>
	<br>
	
	
	<h4>インストール（Windows7 64bitの場合）</h4>
	<ol>
		<li>
			<a href="http://schinagl.priv.at/nt/hardlinkshellext/hardlinkshellext.html#contact">公式サイト</a>
			のLink Shell Extension(3.83Mb)リンクから、HardLinkShellExt_X64.exeをダウンロードする。
		</li>
	
		<li>HardLinkShellExt_X64.exeをクリックで実行する</li>
	
		<li>言語japaneseを選択し、あとは道なりに操作すれば、インストール完了</li>
	
		<li>適当なフォルダまたはファイルを右クリックしたとき、ポップアップメニューに「リンク元として選択」が表示されれば成功である。</li>
	</ol>
	<br>
	
	<h4>シンボリックリンクの作成手順</h4>
	<ol>
		<li>シンボリックリンクの元となるフォルダまたはファイルを右クリックする。</li>
		<li>「リンク元として選択」を選択。</li>
		<li>リンク先のフォルダを開く。（シンボリックリンクの作成先）</li>
		<li>適当な空白箇所を右クリックし、ポップアップメニューから「リンクを作成」→「シンボリックリンク」と操作する。</li>
		<li>ノートンなどアンチウィルスソフトをインストールしている場合、警告が出ることがあるので許可する。</li>
		<li>以上でシンボリックリンクを作成完了。</li>
		<li>シンボリックリンクにアクセスし本体が開くことを確認する。</li>
	</ol>
	<br>
	
	
	<a href="http://www.gigafree.net/system/explorer/hardlinkshellextension.html">参考サイト</a>
	
	
</div>
<hr />
<!-- --------------------------------------------------------------- -->










<!-- --------------------------------------------------------------- -->
<div id="sec1-5" class="sec1">
	<h3>プログラミングの命名記法</h3>

	プログラミングの命名記法には複数の記法が存在する。いくつか有名なものを列挙する。
	
	<table class="table">
	<thead>
		<tr><th>記法</th><th>説明</th><th>例</th></tr>
	</thead>
	<tbody>
		<tr><td>ハンガリアン記法</td><td>変数に意味のある接頭辞を付加する。</td><td>CNeko   g_neko   m_neko</td></tr>
		<tr><td>キャメルケース</td><td>複合語の要素を先頭大文字にする</td><td>getBigCat</td></tr>
		<tr><td>スネークケース</td><td>複合語の要素をアンダースコアで連結。</td><td>get_big_cat</td></tr>
		<tr><td>チェインケース</td><td>複合語の要素をハイフンで連結。</td><td>get-bit-cat</td></tr>

	</tbody>
</table>

</div>
<hr />
<!-- --------------------------------------------------------------- -->










<!-- --------------------------------------------------------------- -->
<div id="sec1-6" class="sec1" >
	<h3>サーバー名を分け、localhost以外でもアクセスする | Apache | VirtualHost</h3>

	開発環境は「localhost」であるが、「localhost-animal」など、別名ドメインのURLでもアクセスできるように設定する。<br>
	また、最初に表示する初期ページも変更できる。<br>
	<br>
	
	<table class="tbl2">
		<thead>
			<tr><th>URL</th><th>初期ページ</th></tr>
		</thead>
		<tbody>
			<tr><td>http://localhost/</td><td>C:\xampp\htdocs</td></tr>
			<tr><td>http://localhost-animal/</td><td>C:\xampp\htdocs\kemono</td></tr>
	
		</tbody>
	</table>
	<br>
	
	
	
	<h4>設定手順</h4>
	
	<p>大まかな手順</p>
	<ol>
		<li>Windowsシステムファイル内のhostファイルを編集する</li>
		<li>Apacheのhttpd-vhosts.confを修正する</li>
	</ol>
	<br>
	
	<p>Windowsシステムファイル内のhostファイルを編集する</p>
	メモ帳を管理者権限で実行する。（メモ帳を右クリックして「管理者権限で実行」を選択）<br>
	起動したメモ帳で「C:\Windows\System32\drivers\etc\host」を開く。hostは拡張子のないファイルである。<br>
	hostファイルを以下のように編集して保存する。<br>
	<br>
	
	設定前<br>
	<pre>
	# localhost name resolution is handled within DNS itself.
	#	127.0.0.1       localhost
	#	::1             localhost
	</pre>
	<br>
	
	設定後<br>
	<pre>
	# localhost name resolution is handled within DNS itself.
		127.0.0.1       localhost
		<strong>127.0.0.1       localhost-animal</strong>
	#	::1             localhost
	</pre>
	<br>
	
	
	<p>Apacheのhttpd-vhosts.confを修正する</p>
	先にhttpd.confを開き、httpd-vhosts.confを有効にする。<br>
	「C:\xampp\apache\conf\httpd.conf」を開く。<br>
	以下のように「#」をはずして有効にし、保存する。<br>
	<br>
	
	設定前-無効<br>
	<pre>#Include conf/extra/httpd-vhosts.conf</pre>
	<br>
	
	設定後-有効<br>
	<pre>Include conf/extra/httpd-vhosts.conf</pre>
	<br>
	
	次にhttpd-vhosts.confを編集する<br>
	「C:\xampp\apache\conf\extra/httpd-vhosts.conf」を開く。<br>
	末尾あたりに次のコードを追加記述する。<br>
	<br>
	
	<pre>
	&lt;VirtualHost localhost:80&gt; 
	    DocumentRoot "C:/xampp/htdocs/kemono" 
	    ServerName localhost_animal
	&lt;/VirtualHost&gt;
	
	
	&lt;VirtualHost localhost:80&gt; 
	    DocumentRoot "C:/xampp/htdocs/" 
	    ServerName localhost
	&lt;/VirtualHost&gt;
	</pre>
	<br>
	
	XAMPP Control PanelでApacheを再Startすれば完了である。<br>
	「http://localhost-animal/」にアクセスするとkemonoページを表示するようになる。<br>
	<br>

</div>
<hr />
<!-- --------------------------------------------------------------- -->











<!-- --------------------------------------------------------------- -->
<div id="sec1-7" class="sec1" >
	<h3>メールのTO、CC、BCCの違い</h3>

	<table class = "tbl2">
		<thead>
			<tr><th>入力項目</th><th>名称</th><th>説明</th></tr>
		</thead>
		<tbody>
			<tr><td>TO</td><td>宛先</td><td>
				基本的に１対１でメールするときは、こちらに相手のメールアドレスを入力し、メール送信をする。<br>
				複数のメールアドレス入力による複数人送信も可能である。<br>
			</td></tr>
			
			<tr><td>CC</td><td>Carbon copy</td><td>
				CCは、TOにメールを送ったことを第三者に知らせる場合に、第三者のメールアドレスを入力する。<br>
				複数人へ送信した場合、受信者は複数人すべてのメールアドレスを見れる。<br>
			</td></tr>
			
			<tr><td>BCC</td><td>Blind Carbon Copy</td><td>
				CCと基本的に同じ用途である。<br>
				複数人へ送信した場合、CCと異なり受信者は他者のメールアドレスを見れない。<br>
			</td></tr>
		</tbody>
	</table>
	<br>
	
	※複数にメールアドレスを入力するときは「,」か「;」で区切る。<br>
	<br>
	
</div>
<hr />
<!-- --------------------------------------------------------------- -->











<!-- --------------------------------------------------------------- -->
<div id="sec1-8" class="sec1">
	<h3>「～」全角チルダと波ダッシュの文字化け</h3>
	
	<p>よくある文字化けのパターン</p>
	Macでテキストファイルに波ダッシュを入力しUTF-8で保存する。<br>
	そのテキストファイルをWindowsの一般的テキストエディタ（Terapad,さくらエディタなど）で開くと波ダッシュが文字化けするというパターンである。<br>
	phpMyAdminでデータをエクスポートしたデータをテキストエディタで開くときによく起こる問題である。<br>
	<br>
	
	
	<p>文字化けの経緯</p>
	波ダッシュと全角チルダの仕様がUnicode,Windows,Macで異なり、さらにはブラウザ、テキストエディタでも異なるため。<br>
	<br>
	
	<p>全角チルダと波ダッシュはどちらを使うべきか？</p>
	日本語や一般常識としては波ダッシュのほうが正しいようだが、Windowsのソフトウェアでは全角チルダで対応していることが多い。<br>
	phpでも文字コードUTF-8に変換すると波ダッシュは全角チルダに変換されるらしい。（未確認）<br>
	どちらを使ったほうがよいかは五分五分である。<br>
	<br>

	<p>HTMLでの記述方法</p>
	<table class="tbl2">
		<thead>
			<tr><th>文字</th><th>名称</th><th>文字参照</th></tr>
		</thead>
		<tbody>
			<tr><td>&#12316;</td><td>波ダッシュ</td><td>&amp;#12316</td></tr>
			<tr><td>&#65374;</td><td>全角チルダ</td><td>&amp;#65374</td></tr>
		</tbody>
	</table>
	Chromeなどの最新ブラウザでは、波ダッシュと全角チルダは、見た目が同じである。<br>
	上記の表をテキストエディタにコピペすると文字化けが起きたり、見た目が変わる。<br>
	<br>
	
	<p>波ダッシュを編集するのに適しているテキストエディタ</p>
	波ダッシュはいくつかのテキストエディタで文字化けを起こす。メモ帳では起こらない。<br>
	なお、Chromeでは見た目は同じである。<br>
	<br>
	
	メモ帳(notepad)<br>
	<img src="img/sec1-8a.png" />
	波ダッシュは文字化けしない。このエディタは他の問題が多いが・・・。<br>
	<br>
	
	oedit<br>
	<img src="img/sec1-8b.png" />
	波ダッシュは文字化けする。<br>
	<br>
	
	terapad<br>
	<img src="img/sec1-8c.png" />
	波ダッシュは文字化けする。<br>
	<br>
	
	tmEditer<br>
	<img src="img/sec1-8d.png" />
	文字化けしないが、会社で使う場合、ライセンス問題がありそうである。<br>
	<br>
	
	Notepad++<br>
	<img src="img/sec1-8e.png" />
	波ダッシュと全角チルダの両方に対応している。GPLライセンスなので無料。<br>
	<br>
	
	<br><br>
	波ダッシュが存在するテキストはNotepad++で編集したほうが無難のようである。<br>
	全角ハイフンでも似たような文字化け問題が起こるらしいので注意。<br>
	<br>

	

</div>
<hr />
<!-- --------------------------------------------------------------- -->











<!-- --------------------------------------------------------------- -->
<div id="sec1-9" class="sec1" >
	<h3>ブラウザをメモ書きに使う</h3>
	以下をブラウザのURLに入力すると、ちょっとしたメモ帳になる。<br>
	<pre>data:text/html, &lt;html contenteditable&gt;</pre>
	<br>
	
	ただし、保存やテキストファイルを開いたりはできない。<br>
	contenteditableは要素内を編集可能にするHTMLタグの属性であり、この機能を利用した小技のようである。<br>
	<br>
</div>
<hr />
<!-- --------------------------------------------------------------- -->























<!-- --------------------------------------------------------------- -->
<div id="sec1-0" class="sec1" style="display: none">
	<h3>xxx</h3>

	<pre>
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->






















		</div><!-- content -->
		<div id="footer">(C) kenji uehara 2015/6/9 <a href="http://amaraimusi.sakura.ne.jp/">HOME</a></div>
		</div><!-- page1 -->
	</body>
</html>