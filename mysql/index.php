<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="google" content="notranslate" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>MySQLの覚書</title><link rel='shortcut icon' href='/home/images/favicon.ico' />
	<link href="/note_prg/css/bootstrap.min.css" rel="stylesheet">
	<link href="/note_prg/css/common2.css" rel="stylesheet">

	<script src="/note_prg/js/jquery-1.11.1.min.js"></script>
	<script src="/note_prg/js/bootstrap.min.js"></script>
	<script src="/note_prg/js/livipage.js"></script>
	<script src="/note_prg/js/ImgCompactK.js"></script>

</head>
<body>
<div id="header" ><h1>MySQLの覚書</h1></div>
<div class="container">

<h2 id="public">目次</h2>
<ul>
	<li><a href="#useful_index">よく使うコマンド一覧</a></li>
	<li><a href="#public_note">一般</a></li>
	<li><a href="#cmd_note_index">MySQLコマンド</a></li>
</ul>
<hr>

<h2 id="useful_index">よく使うコマンド一覧</h2>
<table class="table">
	<thead><tr><th>コマンド</th><th>説明</th></tr></thead>
	<tbody>
		<tr>
			<td>mysql -uユーザー名 -pパスワード</td>
			<td>
				ログイン<br>
				例→<pre class="console">mysql -uroot -pxxxx</pre>
			</td>
		</tr>
		<tr>
			<td>SHOW DATABASES;</td>
			<td>
				データベース一覧を表示。
			</td>
		</tr>
		<tr>
			<td>USE データベース名</td>
			<td>
				データベースにアクセス。（データベースにアタッチ）
				<pre class="console">USE animals</pre>
			</td>
		</tr>
		
		<tr>
			<td>show tables;</td>
			<td>
				テーブル一覧を表示する。<br>
			</td>
		</tr>
		
		<tr>
			<td>CREATE DATABASE データベース名</td>
			<td>
				データベースを新しく生成する。<br>
				下記SQLはすでに同じ名前のデータベースが存在してもエラーにならない。また文字コードも指定。
				<pre class="console">CREATE DATABASE IF NOT EXISTS animals DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;</pre>
			</td>
		</tr>
		
		<tr>
			<td></td>
			<td>
			</td>
		</tr>
	</tbody>
</table>



<h2 id="public_note">一般</h2>
<ol>
	<li><a href="note.php#sec1-1" >phpMyAdminで日本語をINSERTすると文字化け</a></li>
	<li><a href="note.php#sec1-2" >MySQLにフィールドを追加する方法</a></li>
	<li><a href="note.php#sec1-3" >集計と演算とソートを組みわせる</a></li>
	<li><a href="note.php#sec1-4" >フィールドを削除する方法</a></li>
	<li><a href="note.php#sec1-6" >集計値に絞込をかける。～HAVING</a></li>
	<li><a href="note.php#sec1-7" >Null及び空文字の検索</a></li>
	<li><a href="note.php#sec1-8" >WHEREのIF文？</a></li>
	<li><a href="note.php#sec1-9" >リストで比較 ― IN句とNOT IN句の使い方</a></li>
	<li><a href="note2.php#sec2-1" >集計系画面の集計、結合、検索条件、ソートの組み合わせについて</a></li>
	<li><a href="note3.php#sec3-1" >重複を除いたデータ件数  COUNT( DISTINCT XXX )</a></li>
	<li><a href="note3.php#sec3-2" >ページネーションとLIMIT</a></li>
	<li><a href="note3.php#sec3-3" >日付の日の部分で検索</a></li>
	<li><a href="note3.php#sec3-4" >phpMyAdminの認証ぎれ対策</a></li>
	<li><a href="note3.php#sec3-5" >1つのテーブルでツリー構造データを扱う</a></li>
	<li><a href="note3.php#sec3-6" >新規追加と更新を自動判別 | ON DUPLICATE KEY UPDATE</a></li>
	<li><a href="note3.php#sec3-7" >複数行のデータをコンマで連結して1行にまとめる | GROUP_CONCAT</a></li>
	<li><a href="note3.php#sec3-7-2" >フィールドを連結して検索 | CONCAT</a></li>
	<li><a href="note3.php#sec3-8" >行の作成日時と更新日時を自動化する | DEFAULT CURRENT_TIMESTAMP</a></li>
	<li><a href="note3.php#sec3-9" >他のテーブルのSELECT結果をUPDATEする</a></li>
	<li><a href="note3.php#sec3-10" >月別で集計するSQL</a></li>
	<li><a href="note4.php#sec4-1" >GROUP BY と ORDER BYの組み合わせ</a></li>
	<li><a href="note4.php#sec4-2" >IN句にNULLを含めることはできるか？ | IN(NULL)</a></li>
	<li><a href="note4.php#sec4-3" >月別集計</a></li>
	<li><a href="note4.php#sec4-4" >0埋めによる桁数固定 | lpad</a></li>
	<li><a href="note4.php#sec4-5" >MySQLのパスワード変更（変更によるアクセス拒否対応）</a></li>
	<li><a href="note4.php#sec4-6" >日時フィールドを日付で検索するときの注意点</a></li>
	<li><a href="note4.php#sec4-7" >浮動小数floatのフィールドをWHERE検索する方法</a></li>
	<li><a href="note4.php#sec4-8" >テーブルコピー</a></li>
	<li><a href="note4.php#sec4-8-2" >カラムを指定してテーブルコピー</a></li>
	<li><a href="note4.php#sec4-8-3" >別データベースのテーブルをコピーする</a></li>
	<li><a href="note4.php#sec4-9" >テーブル一覧を表示</a></li>
	<li><a href="note4.php#sec4-10" >フィールド一覧を表示</a></li>
	<li><a href="note5.php#sec5-1" >データを倍にする</a></li>
	<li><a href="note5.php#sec5-2" >テーブルのサイズを大きくする</a></li>
	<li><a href="note5.php#sec5-3" >パーティション</a></li>
	<li><a href="note5.php#sec5-4" >重複レコードを無視 | INSERT IGNORE</a></li>
	<li><a href="note5.php#sec5-5" >テーブルの容量サイズを取得 （ついでに行数や平均行容量も）</a></li>
	<li><a href="note5.php#sec5-5-2" >DBのサイズ（容量）を取得する</a></li>
	<li><a href="note5.php#sec5-6" >レコードのコピー</a></li>
	<li><a href="note5.php#sec5-6-2" >id以外のレコードをコピーする</a></li>
	<li><a href="note5.php#sec5-7" >SQLに変数名を組み込む | 動的SQL</a></li>
	<li><a href="note5.php#sec5-8" >phpMyAdminで大容量ファイルをインポートできるようにする</a></li>
	<li><a href="note5.php#sec5-9" >最大値のレコードを取得（すべてのフィールドを取得）</a></li>
	<li><a href="note5.php#sec5-10" >idが存在しないテーブルにidと連番を入力する</a></li>
	<li><a href="note6.php#sec6-1" >連番を作る</a></li>
	<li><a href="note6.php#sec6-2" >IDを振りなおす</a></li>
	<li><a href="note6.php#sec6-2-1" >オートインクリメントのリセット</a></li>
	<li><a href="note6.php#sec6-3" >UPDATEとJOINの組み合わせ</a></li>
	<li><a href="note6.php#sec6-4" >重複を調べる</a></li>
	<li><a href="note6.php#sec6-5" >最新レコードを取得する</a></li>
	<li><a href="note6.php#sec6-6" >WHERE 1=1の利点</a></li>
	<li><a href="note6.php#sec6-7" >SQL_CALC_FOUND_ROWSとFOUND_ROWSを用いてLIMITがかかっていないデータ件数を取得する</a></li>
	<li><a href="note6.php#sec6-8" >タブ、改行、ダブルクォート、シングルクォート、コンマ、改行を含む文字列の扱い | 「&yen;t」「&yen;n」「"」「'」「,」</a></li>
	<li><a href="note6.php#sec6-9" >FOR UPDATEによる排他制御 | LOCKの一種</a></li>
	<li><a href="note6.php#sec6-10" >テーブル名を変更する</a></li>
	<li><a href="note7.html#sec7-1" >条件が異なる複数の集計</a></li>
	<li><a href="note7.html#sec7-2" >分岐： CASE WHEN ～ THEN | AND条件</a></li>
	<li><a href="note7.html#sec7-4" >分岐： CASE WHEN ～ THEN | 入れ子</a></li>
	<li><a href="note7.html#sec7-5" >SQL文（クエリ）の最大長さは？</a></li>
	<li><a href="note7.html#sec7-6" >データベースを作成する</a></li>
	<li><a href="note7.html#sec7-8" >旧覚書：MySQLのインストールとＯＤＢＣへの登録について</a></li>
	<li><a href="note7.html#sec7-9" >INで指定した順に取得する</a></li>
	<li><a href="note7.html#sec7-10" >リストアのよくあるエラー　Fatal error: Allowed memory size of 402653184 bytes exhausted</a></li>
	<li><a href="note8.html#sec8-1" >INSERTしたレコードのidを取得（AUTO_INCREMENT 型のidである場合） | LAST_INSERT_ID()</a></li>
	<li><a href="note8.html#sec8-2" >緯度経度フィールドを含むサンプルデータを100万件作成</a></li>
	<li><a href="note8.html#sec8-3" >緯度経度による検索を早くするためのチューニング</a></li>
	<li><a href="note8.html#sec8-4" >Alterで列の変更や追加ができない | #1067-'post_date' | sql_mode</a></li>
	<li><a href="note8.html#sec8-5" >文字を置換する | REPLACE</a></li>
	<li><a href="note8.html#sec8-6" >MySQLのスキーマ</a></li>
	<li><a href="note8.html#sec8-7" >rootのパスワードを変更→ phpMyAdminで接続できません mysqli::real_connect(): (HY000/1045) ...</a></li>
	<li><a href="note8.html#sec8-8" >DockerコンテナとMySQLのバックアップおよびリストア(インポート)</a></li>
	<li><a href="note8.html#sec8-9" >テストデータ作成に役立つSQL | サンプルデータ</a></li>
	<li><a href="note9/note9-1.html" >XAMPP MySQL起動エラー「MySQL shutdown unexpectedly」の対処法</a></li>
	
</ol>
<hr><br><br><br>	
			


<h2 id="cmd_note_index">MySQLコマンド</h2>
<ol>
	<li><a href="cmd_note.html#sec1-1" >MySQLのコマンドを動かす | ローカル</a></li>
	<li><a href="cmd_note.html#sec1-1-2" >MySQLのコマンドを動かす | Git Bash |Git for windowsのBash | xampp</a></li>
	<li><a href="cmd_note.html#sec1-1-3" >MySQLのコマンドを動かす | SHELL</a></li>
	<li><a href="cmd_note.html#sec1-2" >MySQLをコマンドで動かす | サーバー（さくらサーバー）</a></li>
	<li><a href="cmd_note.html#sec1-3" >DBをバックアップ（エクスポート）する | mysqldump </a></li>
	<li><a href="cmd_note.html#sec1-3-1" >DBをバックアップ、Windowsの場合 | mysqldump </a></li>
	<li><a href="cmd_note.html#sec1-4" >リモートでバックアップする | さくらサーバー</a></li>
	<li><a href="cmd_note.html#sec1-4-2" >リモートでバックアップする | SHELL</a></li>
	<li><a href="cmd_note.html#sec1-5" >DBのリストア【ローカル】 </a></li>
	<li><a href="cmd_note.html#sec1-6" >DBのリストア【リモート】 </a></li>
	<li><a href="cmd_note.html#sec1-7" >テーブルだけバックアップ </a></li>
	<li><a href="cmd_note.html#sec1-8" >テーブル名一覧を取得しテキストファイルに出力する</a></li>
	<li><a href="cmd_note.html#sec1-9" >wp_から始まるテーブル一覧をテキストファイルに出力する</a></li>
	<li><a href="cmd_note.html#sec1-10" >ファイル名に日付を含める</a></li>
	<li><a href="cmd_note.html#sec1-11" >テキストファイルを読み込み変数にセット</a></li>
	<li><a href="cmd_note.html#sec1-12" >改行を半角スペースに変換しながらテキストファイルを読み込む</a></li>
	<li><a href="cmd_note.html#sec1-13" >wp_から始まるテーブルだけエクスポートする</a></li>
	<li><a href="cmd_note2.html#sec2-1" >mysql本体の場所を探す</a></li>
	<li><a href="cmd_note2.html#sec2-2" >最大許可パケットを調べる　max_allowed_packet</a></li>
	<li><a href="cmd_note2.html#sec2-3" >ミラーDB作成シェル | データベースを複製する</a></li>
	<li><a href="cmd_note2.html#sec2-4" >「wp_」から始まるテーブルをすべて削除するシェル</a></li>
	<li><a href="cmd_note2.html#sec2-5" >「wp_」から始まるテーブルを列挙するシェル</a></li>
	<li><a href="cmd_note2.html#sec2-6" >PowerShellのシェルファイルであるps1ファイルを実行する方法</a></li>
	<li><a href="cmd_note2.html#sec2-7" >PowerShellで、MySQLに登録されている、すべてのデータベースをループし、sqlファイルとしてエクスポートする方法</a></li>
	
</ol>
			
			
			
			
<div class="yohaku"></div>
<ol class="breadcrumb">
	<li><a href="/">ホーム</a></li>
	<li><a href="/note_prg">プログラミングの覚書目次</a></li>
</ol>
</div><!-- content -->
<div id="footer">(C) kenji uehara 2014/4/24</div>
</body>
</html>