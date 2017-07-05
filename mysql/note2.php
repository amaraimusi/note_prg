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
<div id="sec2-1" class="sec1" >
	<h3>集計系画面の集計、結合、検索条件、ソートの組み合わせについて</h3>

	集計系画面でも検索機能を組み込んだり、他のテーブルと結合させてその値を表示させたり、
	並べ替えを行いたい場合がある。<br>
	<br>
	それが１つのSQLで実現可能か検証した。<br>



	<hr>
	サンプルテーブルは以下の2種類。<br>
	<br>

	animalsテーブル
	<table border="1"><thead>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>price</th>
		</tr></thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>ヘラクレスオオカブト</td>
				<td>7000</td>
			</tr>
			<tr>
				<td>2</td>
				<td>タイワンカブト</td>
				<td>1000</td>
			</tr>
			<tr>
				<td>3</td>
				<td>リュウキュウカブト</td>
				<td>1200</td>
			</tr>
			<tr>
				<td>4</td>
				<td>カブトムシ</td>
				<td>400</td>
			</tr>
			<tr>
				<td>5</td>
				<td>ヒラタクワガタ</td>
				<td>2000</td>
			</tr>
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
		</tbody>
	</table>




	<br><br>

	salesテーブル
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

<hr>

	<br><br>



	まずは普通に結合をしてみる。
	<pre>
	SELECT sales.id as sale_id,sales.animal_id,sales.shop_id,
		animals.id as animal_id2,animals.name,animals.price
	FROM sales
	LEFT JOIN
		animals ON(sales.animal_id=animals.id)
	</pre>
	<table border="1"><thead>
		<tr>
			<th>sale_id</th>
			<th>animal_id</th>
			<th>shop_id</th>
			<th>animal_id2</th>
			<th>name</th>
			<th>price</th>
		</tr></thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>1</td>
				<td>1</td>
				<td>1</td>
				<td>ヘラクレスオオカブト</td>
				<td>7000</td>
			</tr>
			<tr>
				<td>2</td>
				<td>1</td>
				<td>2</td>
				<td>1</td>
				<td>ヘラクレスオオカブト</td>
				<td>7000</td>
			</tr>
			<tr>
				<td>3</td>
				<td>1</td>
				<td>2</td>
				<td>1</td>
				<td>ヘラクレスオオカブト</td>
				<td>7000</td>
			</tr>
			<tr>
				<td>4</td>
				<td>2</td>
				<td>2</td>
				<td>2</td>
				<td>タイワンカブト</td>
				<td>1000</td>
			</tr>
			<tr>
				<td>5</td>
				<td>3</td>
				<td>1</td>
				<td>3</td>
				<td>リュウキュウカブト</td>
				<td>1200</td>
			</tr>
			<tr>
				<td>6</td>
				<td>4</td>
				<td>3</td>
				<td>4</td>
				<td>カブトムシ</td>
				<td>400</td>
			</tr>
			<tr>
				<td>7</td>
				<td>4</td>
				<td>1</td>
				<td>4</td>
				<td>カブトムシ</td>
				<td>400</td>
			</tr>
			<tr>
				<td>8</td>
				<td>5</td>
				<td>2</td>
				<td>5</td>
				<td>ヒラタクワガタ</td>
				<td>2000</td>
			</tr>
			<tr>
				<td>9</td>
				<td>6</td>
				<td>2</td>
				<td>6</td>
				<td>オオヒラタクワガタ</td>
				<td>3500</td>
			</tr>
			<tr>
				<td>10</td>
				<td>6</td>
				<td>3</td>
				<td>6</td>
				<td>オオヒラタクワガタ</td>
				<td>3500</td>
			</tr>
		</tbody>
	</table>
<hr>




	<br><br>



	結合状態でグルーピングによる集計を行ってみる。<br>
	下記の例では店舗毎に価格を集計。<br>
	<pre>
	SELECT COUNT(sales.id) AS cnt ,sales.shop_id,
		SUM(animals.price) AS SUM_PRICE
	FROM sales
	LEFT JOIN
		animals ON(sales.animal_id=animals.id)
	GROUP BY sales.shop_id
	</pre>

	<table border="1"><thead>
		<tr>
			<th>cnt</th>
			<th>shop_id店舗ID</th>
			<th>SUM_PRICE</th>
		</tr></thead>
		<tbody>
			<tr>
				<td>3</td>
				<td>1</td>
				<td>8600</td>
			</tr>
			<tr>
				<td>5</td>
				<td>2</td>
				<td>20500</td>
			</tr>
			<tr>
				<td>2</td>
				<td>3</td>
				<td>3900</td>
			</tr>
		</tbody>
	</table>
<hr>




	<br><br>


	集計の関係上、SELECTには含めることができない項目で検索ができる。<br>
	下記の例ではSELECTに含めることのできない動物名で部分一致検索。
	<pre>
	SELECT COUNT(sales.id) AS cnt ,sales.shop_id,
		SUM(animals.price) AS SUM_PRICE
	FROM sales
	LEFT JOIN
		animals ON(sales.animal_id=animals.id)
	WHERE
		animals.name LIKE '%カブト%'
	GROUP BY sales.shop_id
	</pre>
	<table border="1"><thead>
		<tr>
			<th>cnt</th>
			<th>shop_id</th>
			<th>SUM_PRICE</th>
		</tr></thead>
		<tbody>
			<tr>
				<td>3</td>
				<td>1</td>
				<td>8600</td>
			</tr>
			<tr>
				<td>3</td>
				<td>2</td>
				<td>15000</td>
			</tr>
			<tr>
				<td>1</td>
				<td>3</td>
				<td>400</td>
			</tr>
		</tbody>
	</table>

	<br>
	※注意<br>
	集計値で検索する場合はHAVING句を使わねばならない。<br>
	上記の例ではcntとSUM_PRICEで検索する場合。<br>


<hr>




	<br><br>


	上記の注意書きでも書いたが、集計値で検索する例を以下に示す。<br>
	cntに検索条件をかける。
	<pre>
	SELECT COUNT( sales.id ) AS cnt, sales.shop_id,
		SUM( animals.price ) AS SUM_PRICE
	FROM sales
	LEFT JOIN animals ON ( sales.animal_id = animals.id )
	GROUP BY sales.shop_id
	HAVING cnt >2
	</pre>

	<table border="1"><thead>
		<tr>
			<th>cnt</th>
			<th>shop_id</th>
			<th>SUM_PRICE</th>
		</tr></thead>
		<tbody>
			<tr>
				<td>3</td>
				<td>1</td>
				<td>8600</td>
			</tr>
			<tr>
				<td>5</td>
				<td>2</td>
				<td>20500</td>
			</tr>
		</tbody>
	</table>
	※注意<br>
	HAVINGは集計値以外の通常フィールド（shop_id)を指定することも可能のようである。<br>
	ただ処理に無駄に時間がかかるので、WHEREをなるべく使うこと。<br>
	WHEREを使った場合、絞込を行ってから集計するが、<br>
	HAVINGは集計してから絞込を行うため、時間がかかるようである。（集計は時間がかかる処理なので）<br>



<hr>



	<br><br>



	さらに集計値でソートできる。
	<pre>
	SELECT COUNT(sales.id) AS cnt ,sales.shop_id,
		SUM(animals.price) AS SUM_PRICE
	FROM sales
	LEFT JOIN
		animals ON(sales.animal_id=animals.id)
	WHERE
		animals.name LIKE '%カブト%'
	GROUP BY sales.shop_id
	ORDER BY SUM_PRICE DESC
	</pre>
	<table border="1"><thead>
		<tr>
			<th>cnt</th>
			<th>shop_id</th>
			<th>SUM_PRICE </th>
		</tr></thead>
		<tbody>
			<tr>
				<td>3</td>
				<td>2</td>
				<td>15000</td>
			</tr>
			<tr>
				<td>3</td>
				<td>1</td>
				<td>8600</td>
			</tr>
			<tr>
				<td>1</td>
				<td>3</td>
				<td>400</td>
			</tr>
		</tbody>
	</table>


	<hr>
	<br><br>

	<strong>集計と結合、検索条件、ソートの組み合わせについての結論</strong><br>
	集計系の画面でも、他のテーブルと結合、検索機能、ソート機能を１つのSQLで実現できる。<br>
	そしてSQLには処理順番がある。そして処理順番は以下の通りである。<br>

	<ol>
		<li>WHEREによる通常フィールドでの絞込</li>
		<li>GROUP BYによる集計処理</li>
		<li>HAVINGによる集計値への絞込</li>
		<li>ODER BYによる並び替え</li>
	</ol>

	<br>
	集計系の画面を作るときには上記のことを念頭に置いておこうと思う。
















</div>
<hr />
<!-- --------------------------------------------------------------- -->








<!-- --------------------------------------------------------------- -->
<div id="a0" class="sec1" style="display:none">
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