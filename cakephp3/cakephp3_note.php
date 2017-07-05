<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="google" content="notranslate" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CakePHP3の覚書</title>
	<link href="/note_prg/css/bootstrap.min.css" rel="stylesheet">
	<link href="/note_prg/css/common2.css" rel="stylesheet">

	<script src="/note_prg/js/jquery-1.11.1.min.js"></script>
	<script src="/note_prg/js/bootstrap.min.js"></script>
	<script src="/note_prg/js/livipage.js"></script>
	<script src="/note_prg/js/ImgCompactK.js"></script>

	<!-- ソースコードをハイライト表示する -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.0.0/styles/default.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.0.0/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>
</head>
<body>
<h1 id="header">CakePHP3の覚書</h1>
<div class="container">









<div id="s1-1" class = "sec4" >
	<h3>デバッグ関数 | debug</h3>
	
	デバッグ方法はdebug関数を用いることができます。画面にデバッグ内容が表示される。
	<pre>debug('test');</pre>
	<br>
	
	<p>CakePHP2との違い</p>
	「Debugger::dump('test=');」はデフォルトで使えなくなった。<br>
	<br>
	
	<time>2016-6-22</time>
</div>









<div id="s1-2" class="sec4" >
	<h3>CakePHP3のトランザクション</h3>
	
	モデルからconnection()を通して、トランザクション関数を呼び出す。<br>
	下記はモデル名がAnimalsのサンプル。<br>
	<br>
	
	<pre><code>
	$this->Animals-><strong>connection()->begin</strong>();//トランザクション開始
	
	～  DBへの保存処理 ～
	
	$this->Animals-><strong>connection()->commit</strong>();//コミット
	</code></pre>
	<br>
	
	ロールバック
	<pre>$this->Animals->connection()->rollback();</pre>
	<br>
	
	<time>2016-6-24</time>
</div>









<div id="s1-3" class="sec4">
	<h3>複数データを一括でINSERTする</h3>
	
	<br>
	
	一回のINSERTで複数行を登録するサンプル。
	<pre><code>
	$data=[
			['animal_name'=&gt;'ライオン','animal_value'=&gt;1001],
			['animal_name'=&gt;'サイ','animal_value'=&gt;1002],
	];

	$query = $this-&gt;Animals-&gt;query();
	$query-&gt;insert(['animal_name', 'animal_value']);
	
	foreach ($data as $row) {
		$query-&gt;values($row);
	}
	
	$this-&gt;Animals-&gt;connection()-&gt;begin();//トランザクション開始
	
	$query-&gt;<strong>execute</strong>();//SQL実行
	
	$this-&gt;Animals-&gt;connection()-&gt;commit();//コミット
	</code></pre>
	<br>
	
	<p>Sql Log</p>
	<pre class="output_data"><code>
	INSERT INTO animals (animal_name, animal_value) 
	VALUES 
	  ('ライオン', 1001), 
	  ('サイ', 1002)
	</code></pre>
	<img src="img/note/s1-3.png" alt="" class="img_compact_k" /><br>
	<br>

	<a href="http://qiita.com/KeijiYONEDA/items/8c2f0e2a8f9cfbf08eeb" target="blank">参考サイト</a><br>
	<br>
	
	<time>2016-6-24</time>
</div>









<div id="s1-4" class="sec4" >
	<h3>配列形式のPOST</h3>
	
	配列形式のデータをPOSTする方法は、CakePHP2の仕様と基本的に変わらない。
	<aside>※ requestにモデル名は含まれない</aside>
	<br>
	
	index.ctp(Templateビュー）
	<pre>
	&lt;?php 
	echo $this-&gt;Form-&gt;create('Animals' , ['type'=&gt;'post','url'=&gt;['action'=&gt;'reg']] );
	echo $this-&gt;Form-&gt;text('animal_name');
	echo $this-&gt;Form-&gt;text(<strong>'yagi.2.text_a'</strong>);
	echo $this-&gt;Form-&gt;text('yagi.2.text_b');
	echo $this-&gt;Form-&gt;submit('送信');
	echo $this-&gt;Form-&gt;end();
	?&gt;
	</pre>
	<br>
	
	Controller
	<pre>
	class AnimalsController extends AppController
	{
		public function reg(){
			debug($this-&gt;request-&gt;data);
	～ 省略 ～
	</pre>
	<br>
	
	出力
	<pre class="output_data">
	[
		'animal_name' => '',
		'<strong>yagi</strong>' => [
			(int) <strong>2</strong> => [
				'<strong>text_a</strong>' => 'あいうえお',
				'text_b' => 'かきくけこ'
			]
		]
	]
	</pre>
	<br>
	
	<time>2016-6-27</time>
</div>










<div id="s1-5" class="sec4" >
	<h3>テーブルクラス不要のバリデーション</h3>
	
	コントローラにバリデーションを記述することができる。<br>
	<br>
	
	
	コントローラ
	<pre>
	namespace App\Controller;
	use <strong>Cake\Validation\Validator</strong>;
	class AnimalsController extends AppController
	{
		public function vldDemo1(){
			
			// バリデーションを定義する
			$validator = new <strong>Validator</strong>();
			$validator
				-&gt;integer('no_a','番号Aは数値でありません。')
				-&gt;maxLength('text_b', 4,'テキストBは4文字以内です。');
			
			// サンプルデータ
			$data=
				[
				'no_a' =&gt; 'a',
				'text_b' =&gt; 'あいうえお'
				];
	
			
			// バリデーションを実行して、入力エラー情報を取得する
			<strong>$errors = $validator-&gt;errors($data);</strong>
	
			var_dump($errors);
			
		}
	}
	</pre>
	<br>
	
	出力
	<pre class="output_data"><code>
	array (size=2)
	  'no_a' => 
	    array (size=2)
	      'integer' => string '番号Aは数値でありません。' (length=37)
	      '番号Aは数値でありません。' => string 'The provided value is invalid' (length=29)
	  'text_b' => 
	    array (size=1)
	      'maxLength' => string 'テキストBは4文字以内です。' (length=38)
	</code></pre>
	<br>
	
	
	<time>2016-6-28</time>
</div>










<div id="s1-6" class="sec4" >
	<h3>バリデーションの種類</h3>
	
	Validatorクラスは各種バリデーションを行うメソッドを備えている。<br>
	<a href="#s1-5" class="livipage">Validatorの使用例</a><br>
	<a href="http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html" target="blank">Validatorの公式ドキュメント</a><br>
	<br>
	
	以下に各種バリデーションメソッドを列挙する。
	<table class="table">
		<thead>
			<tr>
				<th>メソッド</th>
				<th>説明</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_alphaNumeric' target='blank'>alphaNumeric()</a></td>
				<td>半角英数字のバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_blank' target='blank'>blank()</a></td>
				<td>空であるか判定する。半角スペースやタブのみも空とみなす。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_containsNonAlphaNumeric' target='blank'>containsNonAlphaNumeric()</a></td>
				<td>一つ以上の半角英数字を含んでいるか判定する。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_custom' target='blank'>custom()</a></td>
				<td>正規表現による入力チェック。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_date' target='blank'>date()</a></td>
				<td>日付の検証。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_datetime' target='blank'>datetime()</a></td>
				<td>日時の検証。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_decimal' target='blank'>decimal()</a></td>
				<td>小数値のチェックする。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_email' target='blank'>email()</a></td>
				<td>Eメール用のバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_equalTo' target='blank'>equalTo()</a></td>
				<td>指定した値と正確に一致するか判定する。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_extension' target='blank'>extension()</a></td>
				<td>ファイル拡張子のバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_fileSize' target='blank'>fileSize()</a></td>
				<td>ファイルサイズのバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_geoCoordinate' target='blank'>geoCoordinate()</a></td>
				<td>地理座標のバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_inList' target='blank'>inList()</a></td>
				<td>値がリスト内に存在するか判定する。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_ip' target='blank'>ip()</a></td>
				<td>IPアドレスのバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_isInteger' target='blank'>isInteger()</a></td>
				<td>整数のバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_latitude' target='blank'>latitude()</a></td>
				<td>緯度のバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_lengthBetween' target='blank'>lengthBetween()</a></td>
				<td>文字列の長さを範囲チェックする。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_localizedTime' target='blank'>localizedTime()</a></td>
				<td>地域を考慮した日時チェックらしい。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_longitude' target='blank'>longitude()</a></td>
				<td>経度のバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_luhn' target='blank'>luhn()</a></td>
				<td>Luhnアルゴリズムを利用したバリデーション。Luhnアルゴリズムは識別番号の入力ミスを防ぐためのアルゴリズムである。識別番号にはクレジット番号などがある。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_maxLength' target='blank'>maxLength()</a></td>
				<td>文字列の最大長チェック。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_mimeType' target='blank'>mimeType()</a></td>
				<td>ファイルのMIME TYPEを判定する。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_minLength' target='blank'>minLength()</a></td>
				<td>文字列の最小長チェック。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_money' target='blank'>money()</a></td>
				<td>値が金額であるかチェックする。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_multiple' target='blank'>multiple()</a></td>
				<td>複数選択用のバリデーション。最大選択数、最小選択数などのチェックができるらしい。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_naturalNumber' target='blank'>naturalNumber()</a></td>
				<td>自然数のバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_notBlank' target='blank'>notBlank()</a></td>
				<td>空白文字以外が含まれているかチェックする。半角スペースやタブは空白文字と見なされていないようである。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_notEmpty' target='blank'>notEmpty()</a></td>
				<td>notBlankのラッパークラス。2016年6時点ではこちらを使った方が良いかもしれない。notBlank は任意のエラーメッセージを表示しないからである。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_numeric' target='blank'>numeric()</a></td>
				<td>数値のバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_range' target='blank'>range()</a></td>
				<td>数値範囲のバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_time' target='blank'>time()</a></td>
				<td>時間のバリデーション。時分までは検証するが、秒は検証対象外である。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_uploadError' target='blank'>uploadError()</a></td>
				<td>ファイルアップロードでエラーが起きていないかチェックする。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_uploadedFile' target='blank'>uploadedFile()</a></td>
				<td>アップロードファイルのバリデーション。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_url' target='blank'>url()</a></td>
				<td>URLのバリデーション</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_userDefined' target='blank'>userDefined()</a></td>
				<td>ユーザー定義のバリデーション</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_utf8' target='blank'>utf8()</a></td>
				<td>utf8であるかチェックする。</td>
			</tr>
			<tr>
				<td><a href='http://api.cakephp.org/3.2/class-Cake.Validation.Validation.html#_uuid' target='blank'>uuid()</a></td>
				<td>UUIDのバリデーション。</td>
			</tr>
		</tbody>
	</table>
	<br>
	
	<time>2016-6-28</time>
</div>










<div id="s1-7" class="sec4" >
	<h3>find:従来の配列方式で取得する方法</h3>
	
	<pre><code>
	$query = $this->find()->
		where(['fish_value'=>102])->
		order(['fish_date DESC'])->
		<strong>hydrate(false)</strong>->
		limit(10);
	
	$data = $query->all();
	</code></pre>
	
	<br><time>2016-7-25</time>
	
</div>










<div id="s1-8" class="sec4" >
	<h3>idを指定してEntityを取得</h3>
	
	
	<pre>	$ent = $this-&gt;get(99);</pre>
	<aside>※ テーブルクラスに記述する場合</aside>
	<br>
	
	
	<br><time>2016-7-25</time>
	
</div>










<div id="s1-0" class="sec4" style="display:none">
	<h3>XXX</h3>
	
	<br>
	
</div>










<div class="yohaku"></div>
<ol class="breadcrumb">
	<li><a href="/">ホーム</a></li>
	<li><a href="/note_prg">プログラミングの覚書</a></li>
	<li><a href="/note_prg/php/">PHPの覚書</a></li>
	<li><a href="/note_prg/cakephp3/">CakePHP3の覚書</a></li>
</ol>
</div><!-- content -->
<div id="footer">(C) kenji uehara 2016-6-22</div>	
</body>
</html>