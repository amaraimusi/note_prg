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
<div id="sec3-1" class="sec1" >
	<h3>重複を除いたデータ件数  COUNT( DISTINCT XXX )</h3>


	サンプルデータベース sales<br>
	<table border="1"><thead>
		<tr>
			<th>id</th>
			<th>animal_id</th>
			<th>shop_id</th>
		</tr></thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>1</td>
				<td>1</td>
			</tr>
			<tr>
				<td>2</td>
				<td>1</td>
				<td>2</td>
			</tr>
			<tr>
				<td>3</td>
				<td>1</td>
				<td>2</td>
			</tr>
			<tr>
				<td>4</td>
				<td>2</td>
				<td>2</td>
			</tr>
			<tr>
				<td>5</td>
				<td>3</td>
				<td>1</td>
			</tr>
			<tr>
				<td>6</td>
				<td>4</td>
				<td>3</td>
			</tr>
			<tr>
				<td>7</td>
				<td>4</td>
				<td>1</td>
			</tr>
			<tr>
				<td>8</td>
				<td>5</td>
				<td>2</td>
			</tr>
			<tr>
				<td>9</td>
				<td>6</td>
				<td>2</td>
			</tr>
			<tr>
				<td>10</td>
				<td>6</td>
				<td>3</td>
			</tr>
		</tbody>
	</table>


	<hr /><br><br>
	重複を除いたanimal_idの件数を数える。
	<pre>
	SELECT count(DISTINCT animal_id) FROM sales WHERE 1
	</pre>
	結果 → 6<br>

	<br><br>
	<div class="hosoku">
		GROUP BY とCOUNTの組み合わせでも重複を除いた件数を取得できるが、こちらがスマートである。
	</div>

</div>
<hr />





<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-2" class="sec1" >
	<h3>ページネーションとLIMIT</h3>
	一覧画面などでページネーションを使う場面はよくある。<br>
	ページネーションで関係してくる情報はレコードの取得位置と取得数である。<br>
	取得位置と取得数が分かれば、SQLのLIMITで必要なデータを取ってこれる。<br>
	SQLでのLIMITの使い方は以下のとおりである。<br>
	<br><br>

	<pre>
	SELECT * FROM tests LIMIT <span class="marker" >取得位置,取得数</span>;
	</pre>
	<div class="hosoku">※取得位置は0から始まる行の番号である。</div>
	<br><br>

	以下のような記述方法もある。
	<pre>
	SELECT * FROM tests LIMIT 取得数 OFFSET 取得位置;
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-3" class="sec1" >
	<h3>日付の日の部分で検索</h3>
	date型のフィールドに対して年、月、日を部分的に指定して検索できる。<br>
	<br>
	日(3日）で絞り込む場合<br>
	<pre>
	SELECT * FROM `nekos` WHERE DATE_FORMAT(test_date, '%d')=3;
	</pre>

	<br><br>
	年月（2014年4月)で絞込場合<br>
	<pre>
	SELECT * FROM `nekos` WHERE DATE_FORMAT(test_date, '%Y-%m')='2014-04';
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-4" class="sec1">
	<h3>phpMyAdminの認証ぎれ対策</h3>
	phpMyAdminをしばらく操作しないでいると、
	「1440 秒以上操作をしませんでした。ログインし直してください。」
	というメッセージが出て、再ログインがせままれる。<br>
	<br>
	有効期間を1440秒以上に増やしたい場合、以下の操作をする。<br>
	<ol>
		<li>phpMyAdminにログイン</li>
		<li>ホーム→設定→機能</li>
		<li>「ログインクッキーの有効期間」を増やす。</li>
	</ol>

</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-5" class="sec1" >
	<h3>1つのテーブルでツリー構造データを扱う</h3>
	parent_idと自分自身をLEFT JOINすることによりツリー構造データを再現する。<br>
	<br>

	サンプルデータ：1行目は親要素で残りは子要素<br>
	<table border="1"><thead>
		<tr>
			<th>id</th>
			<th>title</th>
			<th>category_id1</th>
			<th>parent_id</th>
		</tr></thead>
		<tbody>
			<tr>
				<td>1028</td>
				<td>テスト・タイトル</td>
				<td>99</td>
				<td>NULL</td>
			</tr>
			<tr>
				<td>1029</td>
				<td>テスト2</td>
				<td>99</td>
				<td>1028</td>
			</tr>
			<tr>
				<td>1030</td>
				<td>テスト3</td>
				<td>99</td>
				<td>1028</td>
			</tr>
			<tr>
				<td>1031</td>
				<td>テスト4</td>
				<td>99</td>
				<td>1028</td>
			</tr>
			<tr>
				<td>1032</td>
				<td>テスト5</td>
				<td>99</td>
				<td>1028</td>
			</tr>
		</tbody>
	</table>

	<br>
	ツリー構造データとして取得するＳＱＬ<br>
	<pre>
	SELECT C.id,C.title,C.parent_id,P.title
	FROM recs AS C
	LEFT JOIN recs AS P ON C.parent_id=P.id
	WHERE
		C.category_id1=99
	</pre>

	ツリー構造データ。一覧に親要素のタイトルが付加されている。
	<table border="1"><thead>
	<tr>
		<th>id</th>
		<th>title</th>
		<th>parent_id</th>
		<th>title</th>
	</tr></thead>
	<tbody>
		<tr>
			<td>1028</td>
			<td>テスト・タイトル</td>
			<td>NULL</td>
			<td>NULL</td>
		</tr>
		<tr>
			<td>1029</td>
			<td>テスト2</td>
			<td>1028</td>
			<td>テスト・タイトル</td>
		</tr>
		<tr>
			<td>1030</td>
			<td>テスト3</td>
			<td>1028</td>
			<td>テスト・タイトル</td>
		</tr>
		<tr>
			<td>1031</td>
			<td>テスト4</td>
			<td>1028</td>
			<td>テスト・タイトル</td>
		</tr>
		<tr>
			<td>1032</td>
			<td>テスト5</td>
			<td>1028</td>
			<td>テスト・タイトル</td>
		</tr>
	</tbody>
	</table>

</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-6" class="sec1" >
	<h3>新規追加と更新を自動判別 | ON DUPLICATE KEY UPDATE </h3>

	「 ON DUPLICATE KEY UPDATE 」を使うと、通常はINSERTによる行追加だが、プライマリーキーやユニーク成約で重複する場合はUPDATEによる行更新となる。

	<pre>
	INSERT INTO animals (id, name,price)
	VALUES (9, 'キノボリトカゲ', 9000)
	<span class="marker">ON DUPLICATE KEY UPDATE</span> id=9, name='キノボリトカゲ', price=9100
	</pre>

	<table border="1">
	<thead>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>price</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<td>6</td>
			<td>オオヒラタクワガタ</td>
			<td>3500</td>
		</tr>
		<tr>
			<td>7</td>
			<td>リュウキュウノコギリクワガタ</td>
			<td>800</td>
		</tr>
		<tr>
			<td>8</td>
			<td>タテヅノマルバネクワガタ</td>
			<td>10000</td>
		</tr>
		<tr>
			<td>9</td>
			<td>キノボリトカゲ</td>
			<td>9100</td>
		</tr>
	</tbody>
</table>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-7" class="sec1">
	<h3>複数行のデータをコンマで連結して1行にまとめる | GROUP_CONCAT</h3>

	<div style="padding-bottom:40px">
		◇サンプルデータ nekosテーブル<br>
		<table border="1"><thead>
			<tr>
				<th>id</th>
				<th>val1</th>
				<th>text1</th>
			</tr></thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>1</td>
					<td>neko</td>
				</tr>
				<tr>
					<td>2</td>
					<td>2</td>
					<td>kani</td>
				</tr>
				<tr>
					<td>4</td>
					<td>4</td>
					<td>buta</td>
				</tr>
				<tr>
					<td>5</td>
					<td>3</td>
					<td>yagi</td>
				</tr>
				<tr>
					<td>6</td>
					<td>3</td>
					<td>ari</td>
				</tr>
				<tr>
					<td>7</td>
					<td>3</td>
					<td>tori</td>
				</tr>
				<tr>
					<td>8</td>
					<td>3</td>
					<td>kame</td>
				</tr>
				<tr>
					<td>9</td>
					<td>111</td>
					<td></td>
				</tr>
				<tr>
					<td>10</td>
					<td>123</td>
					<td>PANDA</td>
				</tr>
				<tr>
					<td>11</td>
					<td>124</td>
					<td>risu</td>
				</tr>
			</tbody>
		</table>




	</div>




	<div style="padding-bottom:40px">
		◇サンプル：基本
		<pre>SELECT <span class="marker">GROUP_CONCAT</span>(id  SEPARATOR ', ')  FROM nekos</pre>
		<table border="1"><thead>
			<tr><th>GROUP_CONCAT(id SEPARATOR ', ')</th></tr></thead>
			<tbody>
				<tr><td>1, 2, 4, 5, 6, 7, 8, 9, 10, 11</td><tr>
			</tbody>
		</table>
	</div>




	<div style="padding-bottom:40px">
		◇サンプル：応用
		<pre>
SELECT
	GROUP_CONCAT(id  SEPARATOR ',') AS ids
	,GROUP_CONCAT(text1  SEPARATOR ',') AS texts
FROM nekos
GROUP BY val1
		</pre>

		<table border="1"><thead>
			<tr>
				<th>ids</th>
				<th>texts</th>
			</tr></thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>neko</td>
				</tr>
				<tr>
					<td>2</td>
					<td>kani</td>
				</tr>
				<tr>
					<td>8,7,6,5</td>
					<td>kame,tori,ari,yagi</td>
				</tr>
				<tr>
					<td>4</td>
					<td>buta</td>
				</tr>
				<tr>
					<td>9</td>
					<td></td>
				</tr>
				<tr>
					<td>10</td>
					<td>PANDA</td>
				</tr>
				<tr>
					<td>11</td>
					<td>risu</td>
				</tr>
			</tbody>
		</table>

	</div>




	<div style="padding-bottom:30px">
		◇サンプル：応用2：コンマで連結した文字を並べる
<pre>
SELECT
	GROUP_CONCAT(id  SEPARATOR ',') AS ids
	,GROUP_CONCAT(text1 <span class="marker">order by text1</span> SEPARATOR ',') AS texts
FROM nekos
GROUP BY val1
</pre>


		<table border="1"><thead>
			<tr>
				<th>ids</th>
				<th>texts</th>
			</tr></thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>neko</td>
				</tr>
				<tr>
					<td>2</td>
					<td>kani</td>
				</tr>
				<tr>
					<td>8,7,6,5</td>
					<td>ari,kame,tori,yagi</td>
				</tr>
				<tr>
					<td>4</td>
					<td>buta</td>
				</tr>
				<tr>
					<td>9</td>
					<td></td>
				</tr>
				<tr>
					<td>10</td>
					<td>PANDA</td>
				</tr>
				<tr>
					<td>11</td>
					<td>risu</td>
				</tr>
			</tbody>
		</table>

	</div>



	<a class="ref_link" href="http://d.hatena.ne.jp/kkz_tech/20100803/1280802260">参考</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-8" class="sec1">
	<h3>行の作成日時と更新日時を自動化する</h3>

	作成日`created`フィールドを追加するSQLの例
	<pre>
	ALTER TABLE  `tests` ADD  `created` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT  '作成日時'
	</pre><br><br>


	更新日`modified`フィールドを追加するSQLの例
	<pre>
	ALTER TABLE  `tests` ADD  `modified` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT  '更新日時'
	</pre><br><br>

	注意：CURRENT_TIMESTAMPは1つのカラムにしか適用できないため、上記の2種類を同時に定義することはできない。（どちらか片方のみ）
	トリガーを使う方法があるらしい。
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-9" class="sec1">
	<h3>他のテーブルのSELECT結果をUPDATEする</h3>
	下記の例では動物テーブルのspeedに魚テーブルのswim_speedをまとめてセットする例。<br>
	テーブルの紐づけ条件はWHERE部分で行う。<br>
	<pre>
	UPDATE
	    animals,
	    fishs
	SET
	    animals.speed = fishs.swim_speed
	WHERE
	    animals.fish_id = fishs.id
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-10" class="sec1" >
	<h3>月別で集計するSQL</h3>
	日を月別で集計するフィールドの例。<br>
	<br>
	売上sale_amountを月毎に集計する。件数もついでに取得。<br>
	2015年で絞込。<br>
	test_dateはyyyy-mm-dd型の日付フィールド<br>
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
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="sec3-0" class="sec1" style="display:none">
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