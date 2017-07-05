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
<div id="sec5-1" class="sec1" >
	<h3>データを倍にする</h3>
	<br><br>
	
	<p>サンプルテーブル(log_xs)</p>
	<table class="table" style="width:50%"> <thead> 	<tr> 		<th>フィールド</th><th>型</th><th>Null</th><th>主キー</th><th>デフォルト</th><th>コメント</th> 	</tr> </thead> <tbody><tr><td>id</td><td>int(11)</td><td>NO</td><td>PRI</td><td></td><td>ID</td></tr><tr><td>user_id</td><td>int(11)</td><td>NO</td><td></td><td></td><td>ユーザーID</td></tr><tr><td>event_no</td><td>int(11)</td><td>NO</td><td></td><td></td><td>イベント番号</td></tr><tr><td>event_cnt</td><td>int(11)</td><td>NO</td><td></td><td></td><td>イベント実行回数</td></tr><tr><td>created_ip_addr</td><td>varchar(40)</td><td>YES</td><td></td><td></td><td>生成IPアドレス</td></tr><tr><td>modfied_ip_addr</td><td>varchar(40)</td><td>NO</td><td></td><td></td><td>更新IPアドレス</td></tr><tr><td>created</td><td>datetime</td><td>NO</td><td></td><td></td><td>生成日時</td></tr><tr><td>modified</td><td>timestamp</td><td>YES</td><td></td><td>CURRENT_TIMESTAMP</td><td>更新日時</td></tr> </tbody> </table>

	<p>データを倍にするSQL</p>
	<pre>
	INSERT INTO log_xs(
		user_id
		,event_no
		,event_cnt
		,created_ip_addr
		,modfied_ip_addr
		,created)  
		(
			SELECT 
				user_id
				,event_no
				,event_cnt
				,created_ip_addr
				,modfied_ip_addr
				,created
			 FROM log_xs
		);
	</pre>
	
	1件レコードから上記のSQLを28回実行すると1億件レコードができあがる。（134217728件）<br>
	MySQLが初期設定のままだと、途中で容量オーバーになるので、
	<a href="#sec5-2">テーブルのサイズを大きくする</a>設定を行う。
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec5-2" class="sec1" >
	<h3>テーブルのサイズを大きくする</h3>
	巨大データを作成中に以下のエラーが表示された場合、テーブルのサイズを大きくする。
	<pre>The total number of locks exceeds the lock table size </pre>
	<br>
	
	MySQLのmy.iniを開き、以下のコードを書き換えて保存する。
	<pre>innodb_buffer_pool_size = 16M</pre>
	↓16Mから256Mに書き換え
	<pre>innodb_buffer_pool_size = 256M</pre>
	XAMPP Control PanelでMySQLを再起動する。<br>
	<br>
	
	<a href="http://shrine-bell.seesaa.net/article/24406528.html" class="ref_link" target="brank">参照</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec5-3" class="sec1" >
	<h3>パーティション</h3>
	
	パーティションによりテーブルを分割できる。<br>
	テーブルのデータが巨大になりそうなときに利用すると良い。<br>
	<br>
	
	<p>利点</p>
	探索SQLの実行速度が速くなる。無駄な処理を省いたり、キャッシュの有効活用により速くなるらしい。<br>
	一括削除が速くなる。巨大データの削除には時間がかかるが、分割した分をDROPでまるごと削除することにより高速になる。<br>
	<br>
	
	<p>欠点</p>
	分割する列を主キーにする必要がある。<br>
	主キーにしていない場合、以下のエラーが表示される。
	<pre>#1503 - A PRIMARY KEY must include all columns in the table's partitioning function </pre>
	<a href="http://qiita.com/hit/items/7ad0716e7c9fd6b15409" class="ref_link" target="brank">参考</a><br>
	<br>
	
	<p>データ分割方法</p>
	パーティションのデータ分割方法には、「RANGE、LIST、HASH、KEY」がある。<br>
	RANGEによる、日付を基準に分割する場面が多い。<br>
	<br>
	

	<h4>パーティションの例</h4>
	<p>サンプルテーブル log_ys</p>
	<table class='table' style="width:70%">
	  <thead>
	    <tr>
	      <th>フィールド</th>
	      <th>型</th>
	      <th>主キー</th>
	      <th>コメント</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <td>id</td>
	      <td>int(11)</td>
	      <td>PRI</td>
	      <td>ID(自動採番:auto increment)</td>
	    </tr>
	    <tr>
	      <td>user_id</td>
	      <td>int(11)</td>
	      <td></td>
	      <td>ユーザーID</td>
	    </tr>
	    <tr>
	      <td>event_no</td>
	      <td>int(11)</td>
	      <td></td>
	      <td>イベント番号</td>
	    </tr>
	    <tr>
	      <td>created<span class="ann">←分割基準</span></td>
	      <td>datetime</td>
	      <td><strong>PRI</strong><span class="ann">←分割基準にするため主キーとする</span></td>
	      <td>生成日時</td>
	    </tr>
	  </tbody>
	</table>
	<br>

	<p>log_ysのサンプルデータ</p>
	<div style="display:inline-block;height:200px;overflow: auto;">
	<table class="tbl2" >
		<thead>
			<tr><th>id</th><th>user_id</th><th>event_no</th><th>created</th></tr>
		</thead>
		<tbody>
			<tr><td>2204636</td><td>2</td><td>7</td><td>2015/9/2 00:00:00</td></tr>
			<tr><td>2204637</td><td>2</td><td>9</td><td>2015/10/2 00:00:00</td></tr>
			<tr><td>2204638</td><td>2</td><td>10</td><td>2015/8/2 00:00:00</td></tr>
			<tr><td>2204639</td><td>2</td><td>11</td><td>2015/7/2 00:00:00</td></tr>
			<tr><td>2204643</td><td>2</td><td>12</td><td>2015/6/2 00:00:00</td></tr>
			<tr><td>2204644</td><td>2</td><td>13</td><td>2015/5/2 00:00:00</td></tr>
			<tr><td>2204645</td><td>2</td><td>14</td><td>2015/4/2 00:00:00</td></tr>
			<tr><td>2204646</td><td>2</td><td>15</td><td>2015/3/2 00:00:00</td></tr>
			<tr><td>2204647</td><td>2</td><td>16</td><td>2015/2/2 00:00:00</td></tr>
			<tr><td>2204648</td><td>2</td><td>17</td><td>2015/1/2 00:00:00</td></tr>
			<tr><td>2204649</td><td>2</td><td>18</td><td>2014/12/2 00:00:00</td></tr>
			<tr><td>2204650</td><td>2</td><td>19</td><td>2013/12/2 00:00:00</td></tr>
			<tr><td>2204651</td><td>8</td><td>8</td><td>0000-00-00 00:00:00</td></tr>
			<tr><td>2204634</td><td>2</td><td>6</td><td>2015/11/2 00:00:00</td></tr>
			<tr><td>1</td><td>2</td><td>3</td><td>2015/12/2 00:00:00</td></tr>
			<tr><td>2204632</td><td>2</td><td>4</td><td>2015/12/3 00:00:00</td></tr>
			<tr><td>2204633</td><td>2</td><td>5</td><td>2015/12/31 00:00:00</td></tr>
			<tr><td>2204652</td><td>7</td><td>7</td><td>2015/12/31 00:00:00</td></tr>
		</tbody>
	</table>
	</div><br>
	<br>
	
	<p>パーティション分割をするSQL</p>
	<pre>
	ALTER TABLE log_ys
	PARTITION BY RANGE COLUMNS(created) 
	(
		PARTITION p20150901 VALUES LESS THAN ('2015-09-01') ENGINE = InnoDB,
		PARTITION p20151001 VALUES LESS THAN ('2015-10-01') ENGINE = InnoDB,
		PARTITION p20151101 VALUES LESS THAN ('2015-11-01') ENGINE = InnoDB,
		PARTITION p20151201 VALUES LESS THAN ('2015-12-01') ENGINE = InnoDB,
		PARTITION pmax VALUES LESS THAN MAXVALUE ENGINE=InnoDB
	);
	</pre>
	※日付は昇順にすること。
	<br>
	
	<p>パーティションを確認するSQL</p>
	<pre>
	SELECT TABLE_SCHEMA,TABLE_NAME,PARTITION_NAME,PARTITION_ORDINAL_POSITION,TABLE_ROWS
	FROM INFORMATION_SCHEMA.PARTITIONS
	WHERE TABLE_NAME='log_ys';
	</pre>
	出力
	<table class="tbl2">
		<thead>
			<tr><th>TABLE_SCHEMA</th><th>TABLE_NAME</th><th>PARTITION_NAME</th><th>PARTITION_ORDINAL_POSITION</th><th>TABLE_ROWS</th></tr>
		</thead>
		<tbody>
			<tr><td>cake_demo</td><td>log_ys</td><td>p20150901</td><td>1</td><td>11</td></tr>
			<tr><td>cake_demo</td><td>log_ys</td><td>p20151001</td><td>2</td><td>0</td></tr>
			<tr><td>cake_demo</td><td>log_ys</td><td>p20151101</td><td>3</td><td>0</td></tr>
			<tr><td>cake_demo</td><td>log_ys</td><td>p20151201</td><td>4</td><td>0</td></tr>
			<tr><td>cake_demo</td><td>log_ys</td><td>pmax</td><td>5</td><td>3</td></tr>
		</tbody>
	</table>
	<br>
	
	<p>パーティションを解除するSQL</p>
	<pre>
	ALTER TABLE log_ys REMOVE PARTITIONING;
	</pre>
	<br>
	
	<p>パーティションを削除</p>
	※データごと削除
	<pre>
	ALTER TABLE log_ys DROP PARTITION p20151101;
	</pre>
	<br>
	
	<p>パーティションを挿入</p>
	<pre>
	ALTER TABLE log_ys REORGANIZE PARTITION pmax INTO (
	PARTITION p20160101 VALUES LESS THAN ('2016-01-01'),
	PARTITION pmax VALUES LESS THAN MAXVALUE);
	</pre>
	<br>
		
	<p>パーティション挿入でエラーになる例</p>
	最後のパーティションが「2016-01-01」であるなら、この日付以降の日付で分割しなければならない。<br>
	以前日「2014-02-01」でパーティションを作ろうとするとエラーになる。<br>
	以降日「2016-02-01」でパーティションを作成可能。<br>
	<pre>
	ALTER TABLE log_ys REORGANIZE PARTITION pmax INTO (
	PARTITION p20140101 VALUES LESS THAN ('2014-02-01'),
	PARTITION pmax VALUES LESS THAN MAXVALUE);
	</pre>
	エラー
	<pre>#1493 - VALUES LESS THAN value must be strictly increasing for each partition </pre>
	<br>
	
	
	
	<h4>参考サイト</h4>
	<ul>
		<li><a href="http://liginc.co.jp/programmer/archives/3832" class="ref_link" target="brank">高速処理化！MySQLのパーティショニング機能を使ってみよう</a></li>
		
		<li><a href="http://d.hatena.ne.jp/masayuki14/20120717/1342482553" class="ref_link" target="brank">Mysqlでログ系テーブルを運用するときやっておきたいこと</a></li>
		
		<li><a href="http://www.brycen.co.jp/topics/no_81/index.html" class="ref_link" target="brank">ブライセンSI部の技術研究ユニットがMySQL Partitioningの性能検証を行いました</a></li>
		
		<li><a href="http://qiita.com/satomin/items/d81c6daff4800d735bdc" class="ref_link" target="brank">MySQLパーティショニングの設定、追加、削除、再構成</a></li>
		
		<li><a href="http://mysql.manual.php.to/partitioning.html#partitioning-management" class="ref_link" target="brank">15.3. パーティショニング管理</a></li>
	</ul>

</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec5-4" class="sec1" >
	<h3>重複レコードを無視 | INSERT IGNORE</h3>

	IGNOREを指定するとINSERTにする際、重複する値があれば、新規レコード追加をキャンセルする。（SQLエラーにならず）<br>
	ただしユニーク（PRIMARYかUNIQUE）のフィールドのみ重複チェックする。<br>
	ユニークでなければ、普通に追加されてしまう。<br>
	<br>
	
	<p>IGNORE指定の例</p>
	<pre>INSERT <strong>IGNORE</strong> INTO nekos (id,text1) VALUES(2,'kani');</pre>
	<br>
	<hr>
	
	<h4>検証</h4>
	<p>nekosテーブル idはPRIMARY</p>
	<table class="tbl2">
		<thead>
			<tr><th>id</th><th>val1</th><th>text1</th><th>test_date</th><th>test_dt</th></tr>
		</thead>
		<tbody>
			<tr><td>1</td><td>1</td><td>neko</td><td>2014/4/1</td><td>2014/12/12 0:00</td></tr>
			<tr><td>2</td><td>2</td><td>kani</td><td>2014/4/2</td><td>2014/12/12 0:00</td></tr>
			<tr><td>4</td><td>4</td><td>buta</td><td>2014/4/4</td><td>2014/12/12 0:00</td></tr>
			<tr><td>5</td><td>3</td><td>yagi</td><td>2014/4/3</td><td>2014/12/12 0:00</td></tr>
	
		</tbody>
	</table>
	<br>
	
	
	<pre>INSERT IGNORE INTO nekos (id,text1) VALUES(2,'kani');</pre>
	idがユニーク（PRIMARY）であり、id=2はテーブル上に存在するため、新規レコードは追加されない。なおエラーにはならない。<br>
	<br>
	
	<pre>INSERT IGNORE INTO nekos (id,text1) VALUES(12,'kani');</pre>
	idがユニークであり、id=12はテーブル上に存在しないので、新規レコードは追加される。<br>
	<br>
	
	<pre>INSERT IGNORE INTO nekos (val1,text1) VALUES(2,'kani');</pre>
	val1,text1は重複値であるが、どちらもユニークでないため、新規レコードは追加される。<br>
	<br>
	
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec5-5" class="sec1" >
	<h3>テーブルサイズ取得 | テーブルデータ量情報を取得するSQL</h3>

	<p>テーブルデータ量を取得するSQL</p>
	<pre>
	SELECT
		table_name,
		engine,
		table_rows,
		avg_row_length,
		(data_length + index_length) AS all_length,
		data_length,
		index_length
	FROM
	    information_schema.tables 
	where table_schema = 'データベース名'
	</pre>
	<br>
	
	
	<p>テーブルデータ量の例</p>
	<table class="table">
		<thead>
			<tr><th>engine</th><th>table_name</th><th>table_rows</th><th>avg_row_length</th><th>all_length</th><th>data_length</th><th>index_length</th></tr>
		</thead>
		<tbody>
			<tr><td>InnoDB</td><td>kanis</td><td>10</td><td>1638</td><td>16384</td><td>16384</td><td>0</td></tr>
			<tr><td>InnoDB</td><td>log_xs</td><td>120997206</td><td>82</td><td>10022289408</td><td>10022289408</td><td>0</td></tr>
			<tr><td>InnoDB</td><td>log_ys</td><td>20</td><td>5734</td><td>229376</td><td>114688</td><td>114688</td></tr>
			<tr><td>InnoDB</td><td>nekos</td><td>9</td><td>1820</td><td>16384</td><td>16384</td><td>0</td></tr>

		</tbody>
	</table>
	<br>
	
	
	<p>説明表</p>
	<table class="table">
		<thead>
			<tr><th>フィールド</th><th>説明</th></tr>
		</thead>
		<tbody>
			<tr><td>table_name</td><td>テーブル名</td></tr>
			<tr><td>engine</td><td>innoDB,MyISAMなど</td></tr>
			<tr><td>table_rows</td><td>レコード件数であるが、innoDBである場合、正確値でなく見積もり値となる。</td></tr>
			<tr><td>avg_row_length</td><td>平均レコードサイズ(byte)</td></tr>
			<tr><td>all_length</td><td>合計データ量(データ量＋インデックスサイズ)</td></tr>
			<tr><td>data_length</td><td>データ量(byte)</td></tr>
			<tr><td>index_length</td><td>インデックスサイズ(byte)。テーブル内のインデックスが占めるサイズ。</td></tr>
	
		</tbody>
	</table>
	<br>
	
	

	<a href="http://www.rexent.co.jp/blog/mysql-%E5%90%84%E3%83%86%E3%83%BC%E3%83%96%E3%83%AB%E6%AF%8E%E3%81%AB%E5%AE%B9%E9%87%8F%E3%82%92%E7%A2%BA%E8%AA%8D%E3%81%99%E3%82%8B" class="ref_link" target="brank">参考:Rexent Blog</a>
</div>
<hr />
<!-- --------------------------------------------------------------- -->






<!-- --------------------------------------------------------------- -->
<div id="sec5-6" class="sec1" >
	<h3>レコードのコピー</h3>
	レコードをコピーするSQLの例
	<pre>INSERT INTO nekos (val1,text1,test_date,test_dt) (select val1,text1,test_date,test_dt FROM nekos WHERE id = 5);</pre>
	<br>
	
	
	
	<h4>検証</h4>
	id=5のレコードをコピーして新しいレコードを作成する。<br>
	nekosテーブルは、idは主キーかつ自動である。<br>
	<br>
	
	<p>SQL実行前のnekosテーブル</p>
	<table class="tbl2">
		<thead>
			<tr><th>id</th><th>val1</th><th>text1</th><th>test_date</th><th>test_dt</th></tr>
		</thead>
		<tbody>
			<tr><td>4</td><td>4</td><td>buta</td><td>2014/4/4</td><td>2014/12/12 0:00</td></tr>
			<tr><td>5</td><td>3</td><td>yagi</td><td>2014/4/3</td><td>2014/12/12 0:00</td></tr>
			<tr><td>6</td><td>3</td><td>ari</td><td>2014/4/3</td><td>2014/12/12 0:00</td></tr>
	
		</tbody>
	</table>
	<br>
	
	<p>SQLを実行する</p>
	<pre>INSERT INTO nekos (val1,text1,test_date,test_dt) (select val1,text1,test_date,test_dt FROM nekos WHERE id = 5);</pre>
	<br>
	
	<p>SQL実行後のnekosテーブル</p>
	<table class="tbl2">
		<thead>
			<tr><th>id</th><th>val1</th><th>text1</th><th>test_date</th><th>test_dt</th></tr>
		</thead>
		<tbody>
			<tr><td>4</td><td>4</td><td>buta</td><td>2014/4/4</td><td>2014/12/12 0:00</td></tr>
			<tr><td>5</td><td>3</td><td>yagi</td><td>2014/4/3</td><td>2014/12/12 0:00</td></tr>
			<tr><td>6</td><td>3</td><td>ari</td><td>2014/4/3</td><td>2014/12/12 0:00</td></tr>
			<tr><td>15</td><td>3</td><td>yagi</td><td>2014/4/3</td><td>2014/12/12 0:00</td></tr>
	
		</tbody>
	</table>
	<br>
	
	
	
	<p>誤</p>
	以下のSQLでは主キーのエラーが起こる
	<pre>INSERT INTO nekos  (select * FROM nekos WHERE id = 5);</pre>
	<br>


</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec5-7" class="sec1">
	<h3>SQLに変数名を組み込む | 動的SQL</h3>

	SQLに変数名を指定することができる。
	<pre>
	SET @a1='neko';
	SELECT * FROM nekos WHERE text1 = @a1;
	</pre>
	このSQLの用い方は、動的SQL、ダイナミックSQL、ストアドプロシージャとも呼ばれる。
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec5-8" class="sec1" >
	<h3>phpMyAdminで大容量ファイルをインポートできるようにする</h3>
	
	phpMyAdminのインポートで大容量SQLファイルを読み込もうとするとエラーになる。<br>
	この場合、<a href="/note_prg/php/note8.php#sec8-7">アップロード容量を増やすPHP.iniの設定</a>をすれば良い。<br>
	<br>
	
	<img src="img/note5/sec5-8.png" class="img_compact_k" /><br>
	<br>
	
	
	phpMyAdminからインポートしたsqlファイルには、INSERT文以外にも様々な短いSQL文が存在する。<br>
	データ投入するだけならINSERT文以外のSQLは削除しても良い。<br>
	なおsqlファイルを編集すると、一部の文字が文字化けすることがあるので注意。（<a href="/note_prg/it/note.php#sec1-8">「～」全角チルダと波ダッシュの文字化け</a>を参考）<br>
	<br>
	
	
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec5-9" class="sec1" >
	<h3>最大値のレコードを取得（すべてのフィールドを取得）</h3>
	

	nekosテーブル
	<table class="tbl2">
		<thead>
			<tr><th>id</th><th>neko_val</th><th>neko_name</th><th>neko_date</th><th>neko_group</th><th>neko_dt</th><th>note</th></tr>
		</thead>
		<tbody>
			<tr><td>1</td><td>1</td><td>ルドルフ</td><td><span class="marker2">2014/4/1</span></td><td>2</td><td>2014/12/12 0:00</td><td>字を学ぶ</td></tr>
			<tr><td>2</td><td>25</td><td>吾輩は猫</td><td>2016/6/24</td><td>1</td><td>2014/12/12 0:00</td><td>名前はまだない</td></tr>
			<tr><td>4</td><td>4</td><td>100万回生きた猫</td><td>2014/4/4</td><td>4</td><td>2014/12/12 0:00</td><td>100万回死んだ。</td></tr>
			<tr><td>9</td><td>111</td><td>イッパイアッテナ</td><td><span class="marker2">2014/4/1</span></td><td>3</td><td>2014/4/28 10:04</td><td>識字者</td></tr>
			<tr><td>13</td><td>99</td><td>ピーター</td><td><span class="marker">2016/6/25</span></td><td>6</td><td>2016/1/25 12:12</td><td>畑を荒らすウサギ</td></tr>
			<tr><td>14</td><td>200</td><td>ロイヤルアナロスタン</td><td>2016/2/8</td><td>5</td><td>NULL</td><td>荒野を生き抜いた。</td></tr>
	
		</tbody>
	</table>
	<br>
	
	<p>最大値のレコードを取得するSQL</p>
	最大日付のレコードを、すべてのフィールドと共に取得する。
	<pre><code>
	SELECT *
	FROM nekos
	WHERE (neko_date) IN
	(SELECT MAX(neko_date) FROM nekos );
	</code></pre>
	<br>
	
	出力
	<table class="tbl2">
		<thead>
			<tr><th>id</th><th>neko_val</th><th>neko_name</th><th>neko_date</th><th>neko_group</th><th>neko_dt</th><th>note</th></tr>
		</thead>
		<tbody>
			<tr><td>13</td><td>99</td><td>ピーター</td><td><span class="marker">2016/6/25</span></td><td>6</td><td>2016/1/25 12:12</td><td>畑を荒らすウサギ</td></tr>

		</tbody>
	</table>
	<br>
	
	
	<p>注意：最大値や最小値が複数存在する場合</p>
	最小日付のレコードが２つあれば、取得されるレコードも２つである。
	<pre>
	SELECT *
	FROM nekos
	WHERE (neko_date) IN
	(SELECT MIN(neko_date) FROM nekos );
	</pre>
	<br>
	
	出力
	<table class="tbl2">
		<thead>
			<tr><th>id</th><th>neko_val</th><th>neko_name</th><th>neko_date</th><th>neko_group</th><th>neko_dt</th><th>note</th></tr>
		</thead>
		<tbody>
			<tr><td>1</td><td>1</td><td>ルドルフ</td><td><span class="marker2">2014/4/1</span></td><td>2</td><td>2014/12/12 0:00</td><td>字を学ぶ</td></tr>
			<tr><td>9</td><td>111</td><td>イッパイアッテナ</td><td><span class="marker2">2014/4/1</span></td><td>3</td><td>2014/4/28 10:04</td><td>識字者</td></tr>

		</tbody>
	</table>
	<br>

	<time>2016-6-29</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec5-10" class="sec1" >
	<h3>idが存在しないテーブルにidと連番を入力する</h3>

	<pre>
	ALTER TABLE many_todos ADD id int not null primary key auto_increment;
	ALTER TABLE many_todos MODIFY id int FIRST;
	</pre>
	<br>
	
	1番目のSQLで、id列追加と連番入力する。<br>
	2番目のSQLで、列の先頭にid列を移動する。<br>
	<br>
	
	
	<time>2016-7-6</time>
</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec5-0" class="sec1" style="display:none">
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
<div id="footer">(C) kenji uehara 2015/12/28</div>
</body>
</html>