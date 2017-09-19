<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="google" content="notranslate" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MySQLの覚書</title>
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













<!-- --------------------------------------------------------------- -->
<div id="sec6-1" class="sec1" >
	<h3>連番を作る</h3>
	
	
	<p>UPDATEで連番に変更する場合</p>
	<pre>
	SET <strong>@i</strong> := 0;
	UPDATE animals SET value1= (@i := @i +1) WHERE animal_type=4;
	</pre>
	animal_type=4で絞り込んだデータのvalue1に連番をセット更新する。連番は1から始まる。<br>
	<br>
	
	<p>SELECTで連番を作る場合</p>
	<pre>
	SET <strong>@a = 0</strong>;
	SELECT id,<strong> @a := @a + 1 AS new_id</strong>, diary_date,diary_note FROM diarys ORDER BY diary_date ASC;	
	</pre>
	diarysテーブルをdiary_dateでソートする。<br>
	ソートした表に対して、連番を新たに振る(new_id)。<br>
	<br>

	<br><time>2016-10-17 | 2017-1-11</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->





<!-- --------------------------------------------------------------- -->
<div id="sec6-2" class="sec1" >
	<h3>IDを振りなおす</h3>
	
	テーブルのIDを直接、振り直しすることはできない。<br>
	しかし、IDを振りなおしたテーブルのコピーを作ることは可能である。<br>
	<br>
	
	<pre>
	SET <strong>@a = 0</strong>;
	insert into diarys2 SELECT <strong>@a := @a + 1 AS id</strong>, diary_date,diary_note FROM diarys ORDER BY diary_date ASC;		
	</pre>

	<br><time>2016-10-17</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec6-3" class="sec1" >
	<h3>UPDATEとJOINの組み合わせ</h3>
	
	<pre>
	UPDATE animals
	LEFT JOIN foods
	ON animals.food_id = foods.id
	SET animals.animal_name = food.animal_name2
	</pre>

	<br><time>2017-1-11</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec6-4" class="sec1">
	<h3>重複を調べる</h3>
    
	<p>animalsテーブル</p>
	<table class="tbl2">
		<thead>
			<tr><th>idID</th><th>animal_name</th><th>animal_value</th><th>animal_date</th><th>delete_flg</th><th>modified</th></tr>
		</thead>
		<tbody>
			<tr><td>34</td><td>ライオン</td><td>1001</td><td>0000-00-00</td><td>0</td><td>2016/6/24 14:50</td></tr>
			<tr><td>35</td><td>サイ</td><td>1002</td><td>0000-00-00</td><td>0</td><td>2016/6/24 14:50</td></tr>
			<tr><td>58</td><td>クワガタ</td><td>NULL</td><td>0000-00-00</td><td>0</td><td>2016/6/29 15:11</td></tr>
			<tr><td>59</td><td>ライオン</td><td>123</td><td>0000-00-00</td><td>0</td><td>2017/4/10 17:44</td></tr>
			<tr><td>60</td><td>ライオン</td><td>245</td><td>0000-00-00</td><td>0</td><td>2017/4/10 17:44</td></tr>
			<tr><td>61</td><td>クワガタ</td><td>NULL</td><td>0000-00-00</td><td>0</td><td>2016/6/29 15:11</td></tr>
	
		</tbody>
	</table>
	<br>
	
	<p>重複を調べる</p>
	animal_nameの重複を調べる
	<pre><code>
	SELECT MAX(id) AS max_id,animal_name FROM animals WHERE delete_flg=0 GROUP BY animal_name having count(*) >= 2
	</code></pre>
	結果
	<table class="tbl2">
		<thead>
			<tr><th>max_id</th><th>animal_name</th></tr>
		</thead>
		<tbody>
			<tr><td>61</td><td>クワガタ</td></tr>
			<tr><td>60</td><td>ライオン</td></tr>
		</tbody>
	</table>
	<br>
	
	<hr>
	<p>応用：重複の無効化（弱点あり）</p>
	重複レコードのうち、IDが大きい方のdelete_flgを1にする。<br>
	3件以上の重複があっても1件しか無効にできない弱点がある。<br>
	<pre><code>
	UPDATE
	    animals T1,
	    (
			select MAX(id) AS max_id
			from animals GROUP BY animal_name having count(*) >= 2
	    ) T2
	SET 
	    T1.delete_flg = 1
	WHERE
	    T1.id = T2.max_id
	</code></pre>

	<br><time>2017-4-10</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec6-5" class="sec1" >
	<h3>最新レコードを取得する</h3>
	
	<pre><code>	SELECT * FROM animals ORDER BY id DESC LIMIT 1</code></pre>

	<br><time>2017-5-9</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec6-6" class="sec1">
	<h3>WHERE 1=1の利点</h3>
	
	「WHERE 1=1」はAND部分をプログラムで書きやすくする利点がある。<br>
	<br>
	
	「WHERE 1=1」を使わない場合
	<pre>
	SELECT *
	FROM animals 
	WHERE 
		<span class="text-danger">value1 = 1
		AND value2 = 9
		AND value3 = 99</span>
	</pre>
	value1だけANDが付いておらず不揃い。<br>
	プログラムでSQL文を組み立てる時にソースコードが少し冗長になる。<br>
	<br>
	
	「WHERE 1=1」を使う場合
	<pre>
	SELECT *
	FROM animals 
	WHERE 
		WHERE 1=1
		<strong>AND value1 = 1
		AND value2 = 9
		AND value3 = 99</strong>
	</pre>
	すべての条件にANDが付いており揃っている。<br>
	プログラムでSQL文を組み立てる時にソースコードを短くできる。	<br>
	<br>

	<br><time>2017-5-9</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec6-7" class="sec1" >
	<h3>SQL_CALC_FOUND_ROWSとFOUND_ROWSを用いてLIMITがかかっていないデータ件数を取得する</h3>

	LIMITで行数制限をかけたデータを取得すると共にLIMITがかかっていないデータ件数が取得したい場合、
	SQL_CALC_FOUND_ROWSとFOUND_ROWSを使えば良い。<br>
	<br>
	
	<pre><code>
	# LIMITで行数制限をかけたデータを取得する
	SELECT <strong>SQL_CALC_FOUND_ROWS</strong> *
	FROM animals
	WHERE delete_flg = 0
	<strong>LIMIT</strong> 5;
	
	# LIMITがかかっていないデータ件数を取得する。上記のSQL実行後に実行する。
	SELECT <strong>FOUND_ROWS</strong>();
	</code></pre>
	
	<h4>注意</h4>
	上記のSQLはphpMyAdminで検証することはできない。<br>
	MySQLのコマンドラインや、phpなどのプログラム中で検証できる。<br>
	<br>

	<br><time>2017-5-23</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec6-8" class="sec1" >
	<h3>タブ、改行、ダブルクォート、シングルクォート、コンマ、改行を含む文字列の扱い | 「&yen;t」「&yen;n」「"」「'」「,」</h3>


	<pre><code>
	SELECT * FROM animals WHERE text1 LIKE '%&yen;t%';
	SELECT * FROM animals WHERE text1 LIKE '%&yen;n%';
	SELECT * FROM animals WHERE text1 LIKE '%"%';
	SELECT * FROM animals WHERE text1 LIKE '%&yen;'%';
	SELECT * FROM animals WHERE text1 LIKE '%,%';
	</code></pre>

	<br><time>2017-5-30</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec6-9" class="sec1" >
	<h3>FOR UPDATEによる排他制御 | LOCKの一種</h3>
	
	SELECT文にFOR UPDATEを付けると、トランザクションのコミットが終わるまで他スレッドを待たせることができるらしい。<br>
	インポート機能やバッチ処理で活用できる。<br>
	<br>
	
	バッチ処理などでは最初にSELECTを実行することが多いが、その際、FOR UPDATEをSELECT文の末尾につけるだけで排他制御ができるようである。<br>
	詳しく検証したわけではない。<br>
	<br>
	
	<p>使用例</p>
	<pre><code>	SELECT * FROM animals WHERE id=99 <strong>FOR UPDATE</strong></code></pre><br>

	<br><time>2017-8-31</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->









<!-- --------------------------------------------------------------- -->
<div id="sec6-0" class="sec1" style="display:none">
	<h3>XXX</h3>

	<br><time></time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->








<ol class="breadcrumb">
	<li><a href="/">ホーム</a></li>
	<li><a href="/note_prg">プログラミングの覚書目次</a></li>
	<li><a href="/note_prg/mysql/">MySQLの覚書目次</a></li>
</ol>
</div><!-- content -->
<div id="footer">(C) kenji uehara 2016-10-17</div>
</body>
</html>