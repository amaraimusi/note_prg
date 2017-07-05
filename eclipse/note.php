<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="google" content="notranslate" />
	<title>ワクガンス　|　Eclipseの覚書</title>
	
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
	<link rel="stylesheet" type="text/css" href="../css/common2.css"  />
	<script>



	</script>

	<style type="text/css">

	</style>

</head>
<body>
<div id="header" ><h1>Eclipseの覚書</h1></div>
<div class="container">







<!-- --------------------------------------------------------------- -->
<div id="sec1-0-1" class="sec1" >
	<h3>eclipseの導入手順(php用)</h3>

	<ol>
		<li>javaをダウンロードする。<a href="https://java.com/ja/download/" target="brank" >ダウンロード先</a></li>
		
		<li>
			javaをインストール<br>
			c:\javaにインストールするとよい。
		</li>
		
		<li>
			eclipseをダウンロードする。<a href="https://eclipse.org/downloads" target="brank" >ダウンロード先</a><br>
			<a href="http://mergedoc.osdn.jp/" target="brank" >日本語化されているeclipseのディストリビューション</a>
		</li>
		<li>
			解凍し、eclipseフォルダを所定位置に配置。<br>
			cドライブ直下に配置すると便利。
		</li>
		
		<li>
			eclipse.iniを開き、vm(javaバーチャルマシン）の設定をする。<br>
			C:\eclipse\eclipse.iniを開き、先頭あたりに以下を記述。<br>
			<pre>
			-vm
			C:\java\bin\javaw.exe
			</pre>
		</li>
		
		<li>文字コードをutf-8にする。<a href="#sec1-4">参照</a></li>
		
		<li>PHPのタイムスケールを日本時間にする<a href="#sec1-5">参照</a></li>

		<li>ctpファイルを専用エディターと関連づける。<a href="#sec1-2">参照</a></li>

		<li>全角スペースを表示する。<a href="#sec1-6">参照</a></li>
	
	</ol>
	
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="sec1-1" class="sec1" >
	<h3>ある日Eclipseがワークスペース内のプロジェクトを認識しなくなった</h3>

	ある朝、Window7を起動すると昨日（2015/3/4）のWindowsアップデートに失敗したのかごちゃごちゃとした処理をしていた。<br>
	index,entry,directryなどのメッセージを出しながら20分近く処理を行い続けている。<br>
	やっとWindow7が起動したが、Chromeが立ち上がらないなどの異常があったので、とりあえずWindow7を再起動する。<br>
	Chromeは立ち上がったが、Eclipseを起動してみるとなんと真っ白になっている。<br>
	「ファイル→ワークスペースの切替」あたりをいじってみたが変わらない。<br>
	「ファイル→インポート→一般→既存のプロジェクトをワークスペースへ」で画面を開き、<br>
	「ルート・ディレクトリーの選択」で作成中プロジェクトのパスを指定し、プロジェクト（P）のフォームをクリックし、「完了」ボタンを押す。<br>
	これでなんとか復活できた。<br>
	以上の手順をプロジェクトの数だけ繰り返した。<br>
	GITと関連付けたプロジェクトあったが、インポート後、数分待つとGIT HUBサーバーと連携とれるようになった。<br>

	<a class="ref_link" href="http://blog.rutake.com/techmemo/2013/05/18/eclipse-%E3%83%AF%E3%83%BC%E3%82%AF%E3%82%B9%E3%83%9A%E3%83%BC%E3%82%B9%E3%81%AB%E3%83%97%E3%83%AD%E3%82%B8%E3%82%A7%E3%82%AF%E3%83%88%E3%81%8C%E3%81%82%E3%82%8B%E3%81%AE%E3%81%AB%E8%AA%8D%E8%AD%98/">参考サイト</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="sec1-2" class="sec1" >
	<h3>ctpをコンテンツ・タイプに対応したエディターと関連づける</h3>
	
	eclipseをインストールしたてである場合、ctpファイルはただのテキストエディターと関連づけられている。<br>
	コンテンツ・タイプに対応したエディターと関連づけるには以下の手順の通りに設定する。<br>

	
	<dl>
		
		<dt>1.Content Types画面を開く</dt>
		<dd>Window→Prefarences→Generalの矢印アイコン→Content Types</dd>
		
		<dt>2.PHP Content Typeの項目を表示させる。</dt>
		<dd>
			Content Types画面でPHP Content Typeの項目を表示させる。<br>
			上段項目内のTextの矢印アイコン→PHP Content Type
		</dd>
		
		<dt>3.Addボタンから「*.ctp」を追加。</dt>
		<dd>File associationsが表示されればOK。</dd>

		<dt>4.eclipseを再起動</dt>
		<dd>
			eclipseで開いているctpファイルをすべて閉じる。<br>
			eclipseを再起動し、ctpファイルを再度開き、コンテンツタイプに対応したエディターで開かれていることを確認して終わり。
		</dd>
	</dl>
	
	<hr>
	<img src="img/note/note1-2.png" class="img-responsive" />
	<br>
	
	<aside>
		※今回試したEclipseのバージョン<br>
		Eclipse for PHP Developers<br>
		Version: Mars Release (4.5.0)<br>
		Build id: 20150621-1200<br>
	</aside>
	
	<a href="http://d.hatena.ne.jp/ngtn/20080204/1202142255" class="ref_link" target="brank">参考：Hatena::ブログ(Diary)</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="sec1-3" class="sec1" >
	<h3>既存プロジェクトの立ち上げ方</h3>

	<ol>
		<li>eclipseのワークスペース内にプロジェクトのフォルダを配置する</li>
		<li>
			Create a PHP Project画面を開く<br>
			File→New→PHP Project
		</li>
		
		<li>「Create new project in workspace」にチェックを入れる。</li>
		<li>「Project name」に既存のプロジェクト名を入力する。（ワークスペース内に配置されているプロジェクトのフォルダ名を入力）</li>
	
	</ol>
	注意：複数の既存プロジェクトを読み込む場合、上記の手順を最初から繰り返すこと。
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="sec1-4" class="sec1" >
	<h3>文字コードの設定方法</h3>
	
	<ol>
		<li>
			Workspace設定画面を開く<br>
			Window→Preferences→General→Workspace
		</li>
		
		<li>
			下段あたりにある「Text file encoding」のotherをutf-8にする。<br>
			デフォルトでは、MS932 になっているので、utf-8を選択する。
		</li>
	</ol>
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="sec1-5" class="sec1" >
	<h3>PHPのタイムスケールを日本時間にする</h3>

	<ol>
		<li>
			php.iniを開く<br>
			php.iniの場所の例→C:\xampp\php\php.ini
		</li>
		
		<li>
			php.iniを開きdate.timezoneの項目を以下のように設定する。<br>
			<pre>date.timezone = Asia/Tokyo</pre>
		</li>
	</ol>
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="sec1-6" class="sec1" >
	<h3>eclipse:全角スペースを表示する</h3>

	<ol>
		<li>
			設定画面を開く<br>
			Window→Preferences→General→Editor→Texts Editors
		</li>
		<li>
			「Show whitespace characters」にチェックを入れOKを押す。<br>
			<img src="img/note/note1-6-1.png" width="30%" >
		</li>
		<li>
			上記のとなりにある「configure visibility」リンクをクリック<br>
		</li>
		<li>
			全角スペースである「Ideographic space」の行すべてにチェックを入れる。<br>
			<img src="img/note/note1-6-2.png" width="50%" >
		</li>
		<li>
			以上で完了。<br>
			エディターを開き全角スペースを入力すると「°」が表記されるようになる。
		</li>
		
	</ol>

</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="sec1-7" class="sec1" >
	<h3>検索/置換で正規表現を使い、タグを置き換える | Find/Replace by Regular expressions</h3>
	<br>
	<p>「&lt;div class="title"&gt;」タグを「h3」タグに置換する手順</p>
	<ol>
		<li>「Ctrl + F」で「検索/置換」画面を開く</li>
		<li>正規表現（Regular expressions）にチェックを入れる</li>
		<li>検索に入力→<strong>&lt;div class="title"&gt;\s*(.+)&lt;/div&gt;</strong></li>
		<li>「次で置換」に入力→<strong>&lt;h3&gt;$1&lt;/h3&gt;</strong></li>
		<li>置換実行</li>
	</ol>
	<br><br>
	
	以下のように置換される
	<pre>&lt;div class="title"&gt;いろは&lt;/div&gt;</pre>
	置換 ↓
	<pre>&lt;h3&gt;いろは&lt;/h3&gt;</pre>
	<br><br>
	<img src="img/note/sec1-7.png" class="img-responsive" >


	<a href="http://propg.ee-mall.info/it/eclipse%E3%81%AE%E6%A4%9C%E7%B4%A2%E7%BD%AE%E6%8F%9B%E3%81%A7%E6%AD%A3%E8%A6%8F%E8%A1%A8%E7%8F%BE%E3%82%92%E4%BD%BF%E3%81%86/" class="ref_link" target="brank">参考サイト</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="sec1-8" class="sec1" >
	<h3>Compare Withによるファイル比較で、空白と改行を無視する設定</h3>

	「Compare With」で２つのファイルを比較するとき、改行や空白を無視するには以下の次の設定をする。<br>
	<br>
	
	設定手順<br>
	<ol>
		<li>「Window→Prefarences→General→Compare/Patch」と操作し、「Compare/Patch」画面を開く。</li>
		<li>「Ignore white space」にチェックを入れて、Applyボタンを押して適用する。</li>
		<li>以上で空白と改行を無視した比較ができるようになる。</li>
	</ol>
	<br>
	
	設定画面<br>
	<img src="img/note/sec1-8.png" class="img-responsive" ><br>
	<br>
	
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="sec1-0" class="sec1" style="display: none">
	<h3>xxx</h3>

	<pre>
	</pre>
	<img src="" class="img-responsive" >
	<a href="xxx" class="ref_link" target="brank">xx</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->
















<div class="yohaku"></div>
<ol class="breadcrumb">
	<li><a href="/">ホーム</a></li>
	<li><a href="/note_prg">プログラミングの覚書目次</a></li>
	<li><a href="/note_prg/eclipse/">Eclipseの覚書目次</a></li>
</ol>
</div><!-- content -->
<div id="footer">(C) kenji uehara 2015/03/04</div>
</body>
</html>