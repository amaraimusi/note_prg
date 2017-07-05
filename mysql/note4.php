<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="google" content="notranslate" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ワクガンス　|　MySQLの覚書</title>
		<link href="/note_prg/css/bootstrap.min.css" rel="stylesheet">
		<link href="/note_prg/css/common2.css" rel="stylesheet">

		<script src="/note_prg/js/jquery-1.11.1.min.js"></script>
		<script src="/note_prg/js/bootstrap.min.js"></script>
		<script src="/note_prg/js/livipage.js"></script>
		<script src="/note_prg/js/ImgCompactK.js"></script>
		<script>



		</script>

		<style type="text/css">

		</style>

	</head>
	<body>
		<div id="page1">
		<h1 id="header">MySQLの覚書</h1>
		<div class="container" >
















<!-- --------------------------------------------------------------- -->
<div id="sec4-1" class="sec1" >
	<h3>GROUP BY と ORDER BYの組み合わせ</h3>
	集計結果でソートすることが可能である。<br>
	<br>
	集計値であるcountでソートする例<br>
	<pre>
	SELECT
	    DATE_FORMAT(test_date, '%Y-%m') as test_ym,
	    COUNT(id) as <strong>count</strong>,
	    SUM(sale_amount) as sum_sale_amount,
	FROM
	    shops
	WHERE
	    DATE_FORMAT(test_date, '%Y') = '2015'
	GROUP BY
	    DATE_FORMAT(test_date, '%Y-%m')
	ORDER BY <strong>count</strong>
	</pre>

	<br>
	SELECTに定義していないフィールドでもソートすることが可能だが、
	idなど一意のフィールドのみが対象である。<br>
	SELECTで定義していないidでソートする例<br>
	<pre>
	SELECT
	    DATE_FORMAT(test_date, '%Y-%m') as test_ym,
	    COUNT(id) as count,
	    SUM(sale_amount) as sum_sale_amount,
	FROM
	    shops
	WHERE
	    DATE_FORMAT(test_date, '%Y') = '2015'
	GROUP BY
	    DATE_FORMAT(test_date, '%Y-%m')
	ORDER BY <strong>id</strong>
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec4-2" class="sec1">
	<h3>IN句にNULLを含めることはできるか？ | IN(NULL)</h3>
	結論からいうとできない。<br>
	<br>
	× status_id=NULLのデータは取得はできない。(status_id=2または3のデータのみ）<br>
	<pre>SELECT * FROM animals WHERE status_id IN(2,3,<span class="marker">NULL</span>) </pre>
	<br>
	代替手段<br>
	<pre>SELECT * FROM animals WHERE status_id IN(2,3)  <span class="marker">|| status_id IS NULL</span></pre>



</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec4-3" class="sec1" >
	<h3>月別集計</h3>

	年月別で集計するSQL<br>
	<pre>
	SELECT
	    DATE_FORMAT(test_date, '%Y-%m') as test_ym,
	    COUNT(*) as count,
	    SUM(val1)
	FROM
	    nekos
	GROUP BY
	    DATE_FORMAT(test_date, '%Y-%m')
	</pre>
	<br>
	並び替えもできる<br>
	<pre>
	SELECT
	    DATE_FORMAT(test_date, '%Y-%m') as test_ym,
	    COUNT(*) as count,
	    SUM(val1)
	FROM
	    nekos
	GROUP BY
	    DATE_FORMAT(test_date, '%Y-%m')
	ORDER BY count
	</pre>
	<br>
	年で集計する場合<br>
	<pre>
	SELECT
	    DATE_FORMAT(test_date, '%Y') as test_y,
	    COUNT(*) as count,
	    SUM(val1)
	FROM
	    nekos
	GROUP BY
	    DATE_FORMAT(test_date, '%Y')
	ORDER BY count
	</pre>

</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec4-4" class="sec1" >
	<h3>0埋めによる桁数固定 | lpad</h3>

	lpad関数を使って、0埋めによる桁固定ができる。<br>
	<pre>
	select lpad(id,2,'0') from animals;
	</pre>
	例：3→03<br>
	<br><br>

	rpad関数は右側を指定文字で埋める。<br>
	<pre>
	select rpad(id,2,'0') from animals;
	</pre>
	例：3→30<br>
	<br>



</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec4-5" class="sec1" >
	<h3>MySQLのパスワード変更（変更によるアクセス拒否対応）</h3>
	
	<ol>
	<li>
		phpMyAdminのパスワード変更画面を開く<br>
		任意のデータベースを選択→特権→任意のユーザーの「特権を編集」→上部にある「パスワードを変更する」
	</li>
	<li>パスワード変更画面でパスワードを入力</li>
	</ol>
	
	<br>
	<img src="img/note4/note4-5-1.png" class="img-responsive" ><br><br>
	<hr>
	<img src="img/note4/note4-5-2.png" class="img-responsive" ><br><br>
	<br>
	
	<hr>
	
	<strong>注意：パスワード変更後、以下のようなメッセージが表示されたら・・・</strong><br>
	<div style="color:#ea3a3d">
	MySQL サーバに接続しようとしましたが拒否されました。config.inc.php のホスト、ユーザ名、パスワードが MySQL サーバの管理者から与えられた情報と一致するか確認してください
	</div>
	phpMyAdminのconfig.inc.phpファイルを修正せねばならない。<br>
	<ol>
		<li>
			config.inc.phpを開く。<br>
			場所の例→C:\xampp\phpMyAdmin\config.inc.php
		</li>
		<li>
			config.inc.phpファイル内の下記項目のパスワードを変更する。
			<pre>
	/* Authentication type and info */
	$cfg['Servers'][$i]['auth_type'] = 'config';
	$cfg['Servers'][$i]['user'] = 'root';
	$cfg['Servers'][$i]['password'] = '<span class="marker">変更したパスワード</span>';
	$cfg['Servers'][$i]['extension'] = 'mysqli';
	$cfg['Servers'][$i]['AllowNoPassword'] = true;
	$cfg['Lang'] = '';
			</pre>
		</li>
	</ol>
	
	<a href="http://www.dbonline.jp/phpmyadmin/user/index3.html" class="ref_link" target="brank">パスワード設定方法の参照：DBOnline IT技術全般の学習サイト</a><br>
	<a href="http://php1st.com/435/" class="ref_link" target="brank">パスワード設定後の拒否対策：PHPプログラミングの教科書 [php1st.com]</a><br>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec4-6" class="sec1" >
	<h3>日時フィールドを日付で検索するときの注意点</h3>
	
	日時フィールド「created→2015-10-06 16:17:54」を「日付」で検索する場合の注意点<br>
	<br>
	
	以下のように日付を日時に対して直接指定しても取得できない。<br>
	<pre>SELECT * FROM animals WHERE created='2015-10-06'</pre>
	「2015-10-06」は「2015-10-06 00:00:00」と同じであるためである。<br>
	<br>
	日付で日時を検索する場合、以下のようにする。<br>
	<pre>SELECT * FROM animals WHERE created &gt;= '2015-10-06 00:00:00' AND created &lt;= '2015-10-06 23:59:59'</pre>
	<br>
	以下の方法でも可<br>
	<pre>SELECT * FROM animals WHERE created &gt;= '2015-10-06' AND created &lt; '2015-10-07'</pre>
	

</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec4-7" class="sec1" >
	<h3>浮動小数floatのフィールドをWHERE検索する方法</h3>
	DECIMALにCASTしてから検索すればよい。
	<pre>SELECT * FROM animal WHERE CAST(price AS DECIMAL) = CAST(123.45 AS DECIMAL);</pre>
	<aside>※price is float</aside>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec4-8" class="sec1" >
	<h3>テーブルコピー</h3>
	テーブルコピーは構造コピーとデータコピーで分ける。<br>

	<h4>nekosテーブルをkanisテーブルとしてコピーする例</h4>
	<pre>
	/* 構造コピー */
	CREATE TABLE kanis LIKE nekos;
	
	/* データコピー */
	INSERT INTO kanis SELECT * FROM nekos;
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec4-8-2" class="sec1" >
	<h3>カラムを指定してテーブルコピー</h3>
	データコピーする際、カラムを指定することができる。<br>
	<br>

	<p>nekosテーブルをkanisテーブルとしてコピーする例</p>
	<pre>
	/* 構造コピー */
	CREATE TABLE kanis LIKE nekos;
	
	/* データコピー */
	INSERT INTO kanis(<strong>id, kani_name,value1</strong>) SELECT <strong>id,neko_name,value1</strong> FROM nekos;
	</pre>
	
	<br><time>2017-2-3</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec4-9" class="sec1" >
	<h3>MySQL:テーブル一覧を表示</h3>
	SQL「SHOW TABLES FROM DB名」を実行するとテーブル一覧を表示できる。
	
	<h4>SQLの例</h4>
	DB:cake_demoのテーブル一覧を表示するSQL
	<pre>SHOW TABLES FROM cake_demo</pre>

</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec4-10" class="sec1" >
	<h3>フィールド一覧を表示</h3>
	SQL「SHOW FULL COLUMNS FROM テーブル名」を実行すると、
	指定したテーブルに属するフィールド一覧を表示できる。
	
	<h4>SQLの例</h4>
	animalsテーブルのフィールド一覧を表示するSQL
	<pre>SHOW FULL COLUMNS FROM animals</pre>
	<aside>※FULLを省略すると、コメントなど一部の情報は取得しない→「SHOW COLUMNS FROM テーブル名」</aside>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec4-0" class="sec1" style="display:none">
	<h3>TEST</h3>
	テスト
	<pre>
	</pre>
	<img src="img/imori.jpg" class="img-responsive" >
	<a href="xxx" class="ref_link" target="brank">xx</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->











			<ol class="breadcrumb">
				<li><a href="/">ホーム</a></li>
				<li><a href="/note_prg">プログラミングの覚書目次</a></li>
				<li><a href="/note_prg/mysql/">MySQLの覚書目次</a></li>
			</ol>



		</div><!-- content -->
		<div id="footer">(C) kenji uehara 2015/05/27</div>
		</div><!-- page1 -->
	</body>
</html>