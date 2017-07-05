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
<div id="sec1-1" class="sec1">
	<h3>phpMyAdminで日本語をINSERTすると文字化け</h3>

	phpMyAdminで日本語文字をINSERT使用とすると??となり文字化けしてしまう問題を解決する。<br /><br />

	・解決方法
	<ol>
		<li>phpMyAdminでとりあえず文字化けするテーブルを表示する。</li>
		<li>構造タブをクリック。</li>
		<li>文字列系のフィールドの照合順序をutf32_general_ciに変更する。(マスにチェックを入れ変更リンクを押せば変更可能）</li>
	</ol>
	<span class="hosoku">※一度、文字化けしたデータは一旦削除して再投入する必要がある。</span>

	<br /><br />
	<img src="img/phpMyAdmin_mojibake.png" />
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec1-2" class="sec1">
	<h3>MySQLにフィールドを追加する方法</h3>
	ALTER TABLE テーブル名 ADD カラム名 型情報;<br />
	<br />
	例：test_tblテーブルにtest_noフィールドを追加する場合。<br />
	<pre>
	ALTER TABLE test_tbl ADD test_no int;
	</pre><br><br>

	指定フィールドの後ろに新しいフィールドを挿入する場合。<br>
	下記の例ではrecsテーブルのnoteフィールドの後ろにcategory_id1フィールドを追加する場合。
	<pre>
	ALTER TABLE recs ADD category_id1 int AFTER note;
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec1-3" class="sec1">
	<h3>集計と演算とソートを組みわせる</h3>
	集計フィールドを演算し、さらにその値で並び替える。
	<pre>
	select
	    aa_id,
	    sum (sales) as sum_sales,
	    sum (imp) as sum_imp,
	    (sum (sales) / sum (imp)) as xxx
	from
	    sales
	group by
	    aa_id
	order by
	    xxx desc
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec1-4" class="sec1">
	<h3>フィールドを削除する方法</h3>
	以下の例ではrecsテーブルからcreate_dateフィールドを削除する。
	<pre>
	ALTER TABLE recs DROP create_date
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec1-5" class="sec1">
	<h3>グループの中の最大値のデータを取得</h3>
	シンプルなSQLではできない模様。
	<a class="ref_link" href="http://onlineconsultant.jp/pukiwiki/?MySQL%E3%80%80%E3%82%B0%E3%83%AB%E3%83%BC%E3%83%97%E3%81%AE%E4%B8%AD%E3%81%AE%E6%9C%80%E5%A4%A7%E5%80%A4%E3%81%AE%E3%83%87%E3%83%BC%E3%82%BF%E3%82%92%E5%8F%96%E5%BE%97">参考サイト</a>
	<pre>
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec1-6" class="sec1">
	<h3>集計値に絞込をかける。～HAVING</h3>
	グルーピングによる集計値に対して絞込ができる。<br>
	※WHEREでは集計値に絞込はできない。<br>
	※HAVINGは集計値以外のカラムに対しても絞込ができるが、無駄に時間かかるため、通常のカラムに対してはWHEREを使うべき。<br>
	<pre>
	SELECT
	    anim_id,COUNT (id) as cnt,
	    anim_id
	FROM
	    animals
	GROUP BY
	    anim_id
	<span class="marker">HAVING cnt > 1</span>
	</pre>
	<br><br>
	ダメな例<br>
	<pre>
	SELECT
	    COUNT (id) as cnt,
	    anim_id
	FROM
	    animals
	<span class="marker">WHERE COUNT (id) > 1</span>
	GROUP BY
	    anim_id
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec1-7" class="sec1">
	<h3>Null及び空文字の検索</h3>

	Nullと空文字は扱いが異なる。<br>
	<br><br>
	NULLで検索<br>
	<pre>SELECT * FROM tests WHERE animal IS NULL</pre>
	<br><br>
	NULL以外で検索<br>
	<pre>SELECT * FROM tests WHERE animal NOT IS NULL</pre>
	<br><br>
	空文字で検索<br>
	<pre>SELECT * FROM tests WHERE animal = ''</pre>
	<br><br>
	空文字以外で検索<br>
	<pre>SELECT * FROM tests WHERE animal ！= ''</pre>
	<br><br>
	NULLもしくは空文字で検索<br>
	<pre>SELECT * FROM tests WHERE (animal IS NULL OR animal = '')</pre>
	<br><br>
	NULL以外かつ空文字以外<br>
	<pre>SELECT * FROM tests WHERE animal IS NOT NULL AND animal != ''</pre>

</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec1-8" class="sec1">
	<h3>WHEREのIF文？</h3>
	IF文はないが、代わりとなる記述方法はある。<br>

	<br>
	titleが空でないならflg_a=3で検索、<br>
	titleが空ならflg_a = 4で検索する場合、<br>
	以下のSQLのようになる。<br>
	<pre>

	SELECT * FROM tests WHERE
	<span class="marker">
	(
		(title IS NOT NULL AND flg_a = 3)
		OR
		(title IS NULL AND flg_a = 4)
	)
	</span>

	</pre>

	<div class="hosoku">IF文の代わりについては、他にも「CASE WHEN ～」文が存在する。</div>
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec1-9" class="sec1" >
	<h3>リストで比較 ― IN句とNOT IN句の使い方</h3>


	idのリスト「1,4,6」で比較し、一致するデータを取得する。<br>
	<pre>
	SELECT * FROM nekos WHERE id IN (1,4,6);
	</pre>
	<br>
	idのリスト「1,4,6」以外で比較し、リストに一致しないデータをすべて取得する。<br>
	<pre>
	SELECT * FROM nekos WHERE id NOT IN (1,4,6);
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec1-0" class="sec1" style="display:none">
	<h3>TEST</h3>
	テスト
	<pre>
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->











			<ol class="breadcrumb">
				<li><a href="/">ホーム</a></li>
				<li><a href="/note_prg">プログラミングの覚書目次</a></li>
				<li><a href="/note_prg/mysql/">MySQLの覚書目次</a></li>
			</ol>



		</div><!-- content -->
		<div id="footer">(C) kenji uehara 2013/09/03</div>
		</div><!-- page1 -->
	</body>
</html>