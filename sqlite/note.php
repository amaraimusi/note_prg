<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="google" content="notranslate" />
		<title>ワクガンス　|　AungularJSの覚書</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
		<link rel="stylesheet" type="text/css" href="../css/common2.css"  />
		<script>



		</script>

		<style type="text/css">

		</style>

	</head>
	<body>
		<div id="page1">
		<h1 id="header">AungularJSの覚書</h1>
		<div id="content" >









<!-- --------------------------------------------------------------- -->
<div id="a1" class="sec1">
	<div class="title">SQLiteについて</div>
	<ul>
		<li>SQLiteはリレーショナルデータベース。</li>
		<li>ビュー、トリガー、トランザクションなどの機能を備える。</li>
		<li>.Net,Java,PHP,Rubyなど幅広く対応</li>
		<li>手軽であることが最大の利点</li>
		<li>データベースサーバーは不要。</li>
		<li>大規模データには向かない。</li>
		<li>ユーザーごとのアクセス権限の概念がない。</li>
		<li>データ型のチェックを行わない。</li>
		<li>バージョン２とバージョン３に互換性はない。</li>
		<li>小規模データベース向き。</li>
		<li>SQL文の最後に必ずセミコロンをつけること。</li>
		<li>スペルを間違ってもエラーにならない。</li>
		<li>バージョン２のデータ型は数値型と文字列型の2種類しかない。</li>
		<li>１つのデータベースに１つのファイル。</li>
		<li>データ管理はコマンドプロンプトで行われる。</li>
		<li>サードパーティによるGUIツールもある。</li>
		<li>オートナンバー、外部結合、UNIONもサポート。交差結合も。</li>
	</ul>

</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="a2" class="sec1">
	<div class="title">SQLiteについて2</div>


	<ul>
		<li>INTEGERフィールドに文字列を格納することが可能。</li>
		<li>幾種類かの関数も容易されている。</li>
		<li>演算子もある。</li>
		<li>UTF8とUTF16のエンコードに対応</li>
		<li>レコードを大量に削除しても、ファイルサイズが小さくはならない。</li>
		<li>ファイルサイズを小さくするにはVACUUMコマンドを実行する必要がある。</li>
		<li>VACUUMを自動化することができる。</li>
		<li>コメント。/* test */     -- Test</li>
		<li>LIMITが使用可能</li>
		<li>サブクエリーが使用可能。</li>
		<li>サブクエリーを使ったInsert,Updateが可能。</li>
		<li>インデックスはレコードの多く、参照が中心であるテーブルに指定すると良い。</li>
		<li>レコードが少なかったり、追加、削除の多いテーブルでインデックスを指定すると逆に遅くなる。</li>
		<li>トリガーも利用できる。変更履歴テーブルを作る時に便利。</li>
		<li>複数のデータベース用に、ATTACHコマンドがある。DETACHで切り離し。</li>
		<li>主キー CREATE TBALE hoge (a INTEGER PRIMARY KEY,b varchar(20));</li>
		<li>外部キーの機能がある。デフォルトでは使用しない。</li>
		<li>ユニーク制約をかけられる。</li>
		<li>NOT NULL制約をかけられる。</li>
		<li>DEFAULT制約をかけられる。</li>
		<li>CHECH制約をかけられる。入力チェック。</li>
		<li>テンポラリテーブルを作成可能。（一時的なテーブル）</li>
		<li>テーブル名の変更が可能。</li>
		<li>フィールドの追加が可能。</li>
		<li>インデックスを作成できる。巨大データの参照速度を上げる。</li>
		<li>ロック機能がある。</li>
		<li>セーブポイント。ロールバックでどこまで、取り消すか調整できる。開放も可能。</li>
		<li>csvファイルをインポートするコマンドがある。</li>
		<li>制約違反が発生した時の挙動を指定できる。</li>

	</ul>
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="a3" class="sec1">
	<div class="title">SQLiteでできないこと</div>

	<ul>
		<li>ALTER TABLEコマンドは使えないが、フィールド追加コマンドは使用可能。</li>
		<li>右外部結合と完全外部結合はできない。（交差結合は可能）</li>
		<li>ビューへの書き込みもできない。</li>
		<li>GRANTおよびREVOKEコマンド</li>
		<li>複数のユーザーがデータベースにアクセスして更新することはできない。（参照は可能）</li>

	</ul>
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="a4" class="sec1">
	<div class="title">命令</div>
	<dl>
	<dt>◇DISTINCT</dt>
	<dd>重複を取り除いてデータを取得</dd>

	<dt>◇HAVING</dt>
	<dd>グルーピング集計の絞りこみにはWHEREではなくHAVINGを使う。</dd>

	<dt>◇Replace Into</dt>
	<dd>データの置き換え</dd>

	<dt>◇EXPLAIN</dt>
	<dd>SELECT文と合わせて使う。出力データの使用されているインデックスを確認できる。</dd>

	<dt>◇COPY</dt>
	<dd>CSVや、他のデータベースをインポートできる。</dd>

	<dt>◇ON CONFLICT</dt>
	<dd>制約違反が発生した時の挙動を指定できる。</dd>

	<dt>◇VACUUM</dt>
	<dd>不要領域を開放。DBファイルサイズも小さくなる。</dd>

	</dl>
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="a5" class="sec1">
	<div class="title">SQLiteの独自コマンド</div>
	<dl>
		<dt>出力画面のフィールド幅を調整できる。</dt>
		<dt>ヘッダーを表示する</dt>
		<dt>NULL表記の変更</dt>
		<dt>◇.show</dt>
			<dd>現在設定値を表示。</dd>
		<dt>◇.mode</dt>
			<dd>テーブルの表示方法を設定</dd>
		<dt>◇.echo ON|OFF</dt>
			<dd>実行したコマンドが、結果に表示されます。</dd>
		<dt>◇.tables</dt>
			<dd>テーブル一覧を表示。</dd>
		<dt>◇.indices</dt>
			<dd>インデックス一覧を表示</dd>
		<dt>◇schema</dt>
			<dd>スキーマを表示</dd>
		<dt>◇.database</dt>
			<dd>データベースとファイル名を表示</dd>
		<dt>◇PRAGMAコマンド</dt>
			<dd>様々な情報を取得できる。</dd>
	</dl>

</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="a6" class="sec1">
	<div class="title">SQLiteのダウンロードとインストール</div>
	<ol>
		<li><a href="http://www.sqlite.org/">http://www.sqlite.org/</a>からダウンロード</li>
		<li>zipファイルをダウンロードする。</li>
		<li>zipファイルを解凍してexeファイルに。</li>
		<li>exeファイルをコマンドプロンプトで実行。</li>
		<li>以上で終わり。</li>
	</ol>
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="a7" class="sec1">
	<div class="title">コマンドプロンプトでの基本操作</div>
◇SQLite起動、テーブル作成、データ入力、dbファイル確認。<br>
<pre>
	//dbファイル名を指定して、sqlite3.exeを実行する。
	C:\Documents and Settings\Administrator>C:\Project\sqlite\sqlite3.exe C:\Project\sqlite\test.db
	「；」コマンドを入力。
	sqlite> create table neko(a,b);
	sqlite> insert into neko(a,b) values(1,'timo');
	sqlite> select * from neko;
	//閉じる。
	sqlite> exit;
</pre>
「C:\Project\sqlite」フォルダに「test.db」が作成されていることを確認する。<br>


</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="a8" class="sec1">
	<div class="title">ODBCドライバ</div>
	<ul>
		<li><a href="http://www.ch-werner.de/sqliteodbc/">WEBサイト</a>からダウンロード。</li>
		<li>exeファイルを実行してインストール</li>
		<li>あとは管理ツールからのODBCに設定可能。</li>
		<li>文字化けするのが弱点。</li>
	</ul>

</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="a9" class="sec1">
	<div class="title">Firefoxのアドイン | SQLite Manager</div>

	<ol>
		<li>Firefoxを起動</li>
		<li><a href="https://addons.mozilla.org/ja/firefox/addon/sqlite-manager/">WEBサイト</a>よりアドオンを追加。「+ Firefoxへ追加」ボタンを押すのみ。</li>
		<li>右上のメニューを選択→カスタマイズを選択→SQLite Managerをメニューに登録する。</li>
		<li>もう一度メニューを開くと、SQLite Managerのアイコンがあるのでクリックして起動するだけ。</li>
	</ol>

	<br><br>
	旧Firefoxのバージョンの場合。<br>
		使い方はアドインをインストール後、「ツール」⇒「SQLite Manager」を選択するだけ。<br>
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="a10" class="sec1">
	<div class="title">Android SDKでdbファイルを取得する手順</div>

	◇手順<br>

	<ol>
		<li>Androidエミュレータを起動</li>
		<li>Eclipeの右上にあるDDMSパースペクティブをクリック。</li>
		<li>通常は左側にある「Devices」ビューで、対象デバイスを選択。</li>
		<li>通常は右側にある「ファイルエクスプローラー」ビューにファイル一覧が表示されることを確認。</li>
		<li>対象のプロジェクトファイルを開く。</li>
		<li>databasesフォルダの中にあるファイルがdbファイル。</li>
		<li>dbファイルを選択して、Eclipse右上にあるフロッピーディスクアイコンをクリックするとdbファイルをダウンロードできる。</li>
	</ol>
	※エミュレータのみ対象。<br>
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="a0" class="sec1">
	<div class="title">xxx</div>

	<pre>
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->
























		</div><!-- content -->
		<div id="footer">(C) kenji uehara 2013/09/03</div>
		</div><!-- page1 -->
	</body>
</html>