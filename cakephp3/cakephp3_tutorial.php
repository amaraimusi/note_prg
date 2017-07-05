<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google" content="notranslate" />
	
	<title>CakePHP3のチュートリアル</title>

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
<div id="header" ><h1>CakePHP3について</h1></div>
<div class="container">
	





<div class="btn-group">
	<a href="http://cakephp.jp/" target="brank" class="btn btn-link btn-sm">公式サイト</a>
	<a href="http://api.cakephp.org/3.2/" target="brank" class="btn btn-link btn-sm">公式ドキュメント API</a>
	<a href="http://book.cakephp.org/3.0/ja/index.html" target="brank" class="btn btn-link btn-sm">公式チュートリアル</a>
</div>
	



<h2>目次</h2>
<ol >
	
	<li><a href="#s1" >CakePHP3の概要</a></li>
	<li><a href="#s2" >インストール手順</a></li>
	<li><a href="#s3" >最初のDB設定</a></li>
	<li><a href="#s4" >POSTの基本</a></li>
	<li><a href="#s5" >Sql Logなどのデバッグ情報を確認する方法</a></li>
	<li><a href="#s6" >CakePHP3の命名規則について</a></li>
	<li><a href="#s7" >バリデーションの基本</a></li>
	<li><a href="#s10" >DBからデータを取得し一覧表示 | find</a></li>
	<li><a href="#s11" >LEFT JOIN</a></li>
	<li><a href="#s20" >基本的なDB保存</a></li>
	<li><a href="#s21" >複数データのDB保存</a></li>
	<li><a href="#s31" >Entityクラス | モデル</a></li>

</ol>











<div id="s1" class = "sec4" >
	<h3>CakePHP3の概要</h3>
	
	CakePHP3はPHP5.5.9以上で動作する。<br>
	また、php_intl.dllが必要。<br>
	<br>
	
	Composerでインストールすることが推奨されているが、zip形式での<a href="https://github.com/cakephp/cakephp/tags" target="blank">ダウンロード</a>
	も可能である。<br>
	なお、Composerでインストールするときは、php.iniを開き「php_intl.dll」を有効にする必要がある。<br>
	<br>
	
	
	<p>CakePHP2.X系との相違点</p>
	フォルダや設定ファイルの名前が変わっている。<br>
	<br>
	
	<time>2016-6-20</time>
</div>










<div id="s2" class = "sec4" >
	<h3>インストール手順</h3>

	
	以下の手順はファイル一式をダウンロードして展開する方法。<br>
	<aside>Composerでのインストールが推奨されている。</aside>
	<br>
	
	
	<p>手順</p>
	<ol class="list_large">
	
		<li>
			PHPのバージョンが5.5.9以上であることを確認する。<br>
			<img src="img/tutorial/s2a1.png"  class="img_compact_k" />
			<aside>phpinfo()</aside>
			
		</li>
	
		<li>
			php.iniをテキストエディタで開き、「;」を外して「extension=php_intl.dll」を有効にする。
			<aside>有効後はApacheを再起動すること</aside>
			<img src="img/tutorial/s2a2.png"  class="img_compact_k" /><br>
			<aside>Composerでインストールするときにも必要な手順である。</aside>
		</li>
	
		<li>
			GithubからCakePHP3をダウンロードする。<br>
			<a href="https://github.com/cakephp/cakephp/tags" target="blank">CakePHP3のダウンロードサイト</a><br>
			<img src="img/tutorial/s2a3.png"  class="img_compact_k" />
		</li>
	
		<li>
			ダウンロードファイルを解凍し、解凍したファイル一式をApacheのルートティレクトリ（htdocs）に配置する。
		</li>
	
		<li>
			フォルダ名をプロジェクト名に変えて、Eclipseに新プロジェクトとして認識させる。<br>
			<img src="img/tutorial/s2a5.png"  class="img_compact_k" />
			<aside>サンプルのプロジェクト名はcake3_demo。</aside>
		</li>
	
		<li>
			「http://localhost/cake3_demo」にアクセスして、CakePHPの画面が表示されたら、インストールは成功である。
			<br>
			<img src="img/tutorial/s2a6.png"  class="img_compact_k" />

		</li>
		
	</ol>
	
	<time>2016-6-21</time>
</div>










<div id="s3" class = "sec4" >
	<h3>最初のDB設定</h3>
	
	CakePHP2系にあった「database.php」は、CakePHP3に存在しない。<br>
	代わりに「config/app.php」にDB設定を記述する。<br>
	<br>
	
	<p>DB設定の方法</p>
	configのapp.phpファイルを開く。<br>
	「Datasources」項目のdefaultを以下のように修正する。<br>
	<br>
	
	app.php
	<pre>
	  ～ 省略 ～      
	
    'Datasources' => [
        'default' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Mysql',
            'persistent' => false,
            'host' => 'localhost',
            /**
             * CakePHP will use the default DB port based on the driver selected
             * MySQL on MAMP uses port 8889, MAMP users will want to uncomment
             * the following line and set the port accordingly
             */
            //'port' => 'non_standard_port_number',
            'username' => '<strong>root</strong>',
            'password' => '<strong>xxx</strong>',
            'database' => '<strong>cake_demo</strong>',
            'encoding' => 'utf8',
            'timezone' => 'UTC',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => false,
            
	  ～ 省略 ～      
	</pre>
	<img src="img/tutorial/s3a1.png" class="img_compact_k" /><br>
	<br>
	
	
	CakePHP3をインストール直後のトップ画面でDB接続が成功したかどうかが分かる。<br>
	<aside>トップ画面→ http://localhost/cake3_demo</aside>
	<div style="display:inline-block">
		<img src="img/tutorial/s3a2.png" class="img_compact_k" />
		<aside>DB設定失敗</aside>
	</div>
	<div style="display:inline-block">
		<img src="img/tutorial/s3a3.png" class="img_compact_k" />
		<aside>DB設定成功</aside>
	</div><br>
	<br>
	
	<time>2016-6-21</time>
</div>










<div id="s4" class = "sec4" >
	<h3>POSTの基本</h3>
	POSTの基本的ソースコードである。<br>
	index画面のデータをPOSTでreg画面に送る。<br>
	<br>

	
	<p>コントローラ</p>
	<pre><code>
	&lt;?php

	namespace App\Controller;
	
	class AnimalController extends AppController
	{
	
		public function index(){
	
		}
		
		public function reg(){
			$animal_name = $this-&gt;request-&gt;data['animal_name'];
			$this-&gt;set(array(
					'animal_name'=&gt;$animal_name
			));
		}
	}
	</code></pre>
	<br>
	
	<p>ビュー</p>
	index.ctp
	<pre><code>
	&lt;?php 
	echo $this-&gt;Form-&gt;create('Animal' , ['type'=&gt;'post','url'=&gt;['action'=&gt;'reg']] );
	echo $this-&gt;Form-&gt;text('animal_name');
	echo $this-&gt;Form-&gt;submit('送信');
	echo $this-&gt;Form-&gt;end();
	?&gt;
	</code></pre>
	<aside>
		※別のURL指定方法
		<pre>echo $this->Form->create('Animal' , ['type'=>'post','url'=>'<strong>/animal/reg</strong>'] );</pre>
	</aside>
	<br>
	
	reg.ctp
	<pre><code>
	動物名：&lt;?php echo $animal_name?&gt;
	</code></pre>
	<br>
	
	
	
	
	<p>画面の動き</p>
	<img src="img/tutorial/s4a1.png" class="img_compact_k" />
	<img src="img/tutorial/s4a2.png" class="img_compact_k" />
	<br><br>
	
	
	
	
	<p>CakePHP2との相違点</p>
	CakePHP2と似ていますが、異なる箇所があります。<br>
	「$this->Form->create」のurl属性の指定方法が変わった。<br>
	また、「$this->request->data[モデル名][フィールド]」となっていたが、モデル名が省かれ「$this->request->data[フィールド]」と簡略化された。<br>
	<br>
	
	
	
	<time>2016-6-22</time>
</div>





















<div id="s5" class = "sec4" >
	<h3>Sql Logなどのデバッグ情報を確認する方法</h3>
	
	<ul class="list_large">
		<li>
			CakePHP3で作成した任意のページを開く。
		</li>
		
		<li>
			ページ右下のアイコンをクリックすると、デバッグ情報に関するメニューが表示される。<br>
			<img src="img/tutorial/s5a2.png" class="img_compact_k" />
		</li>
		
		<li>
			メニューから「Sql Log」を選択すると、実行されたSQLを確認することができる。<br>
			<img src="img/tutorial/s5a3-1.png" class="img_compact_k" />
			<img src="img/tutorial/s5a3-2.png" class="img_compact_k" />
		</li>
		
	</ul>
	
	<time>2016-6-24</time>
</div>





















<div id="s6" class = "sec4" >
	<h3>CakePHP3の命名規則について</h3>
	
	テーブル名、コントローラ名、アクション名、モデル名、ビュー名、URLの命名規則は変わった。<br>
	<br>

	<p>テーブル名とモデル名（コントローラ名）の命名変更点</p>
	CakePHP2ではテーブル名は複数系、モデル名は単数形である。<br>
	複数形のテーブル名は英文のルールに従っており、単純に「s」を付ければいいわけではなかった。<br>
	<br>
	
	CakePHP3からは複数形、単数形の違いがなくなった。<br>
	例えばテーブル名が「animals」ならモデル名およびコントローラは「Animals」「AnimalsController」である。<br>
	<br>
	
	
	CakePHP2
	<table class="tbl2">
		<thead>
			<tr><th>DBテーブル名</th><th>モデル名</th><th></th></tr>
		</thead>
		<tbody>
			<tr><td>big_cats</td><td>BigCat</td></tr>
			<tr><td>statuses</td><td>Status</td></tr>
			<tr><td>fish</td><td>Fish</td></tr>
			<tr><td>fishs</td><td>英文の複数形ルールとして正しくないのでエラー（fishの複数形はfish)</td></tr>
	
		</tbody>
	</table>
	<br>
	
	CakePHP3
	<table class="tbl2">
		<thead>
			<tr><th>DBテーブル名</th><th>モデル名</th></tr>
		</thead>
		<tbody>
			<tr><td>big_cats</td><td>BigCats</td></tr>
			<tr><td>statuses</td><td>Statuses</td></tr>
			<tr><td>fish</td><td>Fish</td></tr>
			<tr><td>fishs</td><td>Fishs</td></tr>
	
		</tbody>
	</table>
	<br>
	
	
	<p>アクション名の変更点</p>
	アクション名は必ずキャメル記法で記載しなければならなくなった。スネーク記法は禁止された。<br>
	<br>
	
	正しいアクション名
	<pre>function fishReg() {...</pre>
	<br>
	
	誤ったアクション名
	<pre class="output_data">function fish_reg() {...</pre>
	<br>
	
	<p>ビュー名の変更</p>
	従来のビューはViewフォルダでなくTemplateに作成するようになった。<br>
	フォルダ名はコントローラおよびモデルと同じパターンである。<br>
	<pre>src/<strong>Template/OkinawaFishs</strong>/fish_reg.ctp</pre>
	<br>
	
	ビュー（ctp）のファイル名はスネーク記法である。キャメル記法やチェーン記法だとエラーになる。<br>
	アクション名がfishRegであるとき、ビューファイル名は「fish_reg.ctp」となる。<br>
	<br>
	正しいビュー名
	<pre>fish_reg.ctp</pre>
	<br>
	誤まり
	<pre class="output_data">fishReg.ctp</pre>
	<pre class="output_data">fish-reg.ctp</pre>
	<br>
	
	
	
	
	<p>URLはチェーン記法で表されるようになった</p>
	<pre>http://localhost/cake3_demo/<strong>okinawa-fishs/fish-reg</strong></pre>
	<br>
	
	<aside>
		※URLのコントローラ名に該当する部分はキャメル記法しても、URLアクセスが可能である。<br>
		ただし、アクション名部分はキャメル記法にすることができない。<br>
		http://localhost/cake3_demo/OkinawaFishs/fish-reg<br>
		http://localhost/cake3_demo/okinawaFishs/fish-reg<br>
	</aside>
	<br>
	
	<p>サンプル</p>
	OkinawaFishsController (DBテーブル名：okinawa_fishs)
	<pre>
	&lt;?php

	namespace App\Controller;
	
	class OkinawaFishsController extends AppController
	{
	
		public function index(){
	
		}
		
		public function fishReg(){
			$name = $this-&gt;request-&gt;data['name'];
			
			$ent = $this-&gt;OkinawaFishs-&gt;newEntity($this-&gt;request-&gt;data);
			$this-&gt;OkinawaFishs-&gt;save($ent);
			
			$this-&gt;set(array(
					'name'=&gt;$name
			));
		}
	}
	</pre>
	<br>
	
	
	
	<img src="img/tutorial/s6a1.png" class="img_compact_k" /><br>
	<br>
	
	<time>2016-6-24</time>
</div>





















<div id="s7" class = "sec4" >
	<h3>バリデーションの基本</h3>
	
	基本的な方法として、バリデーション条件はテーブルクラスに記述する。<br>
	エンティティのerrorsメソッドを実行すると、バリデーションが実行され、入力エラー情報も取得できる。<br>
	saveを実行した時にもバリデーションが実行されているようであり、入力エラーがあるならDB保存されない。<br>
	<aside>
	saveメソッドは入力エラーがある場合、falseを返しDB保存を行わない。
	入力エラーがなければ、trueを返しDB保存を行う。
	</aside>
	<br>
	
	DBテーブルと関連しないバリデーションをコントローラ内で組み込むことも可能である。
	（参考：<a href="cakephp3_note.php#s1-5">テーブルクラス不要のバリデーション</a>）<br>
	<br>
	
	<aside>
	このバリデーションの記述方法は2016年6月時点の方法です。<br>
	他サイトの説明とは記述方法が異なっているかもしれません。
	</aside>
	<br>
	
	<p>ソースコード</p>
	コントローラ:AnimalsController.php
	<pre>
	namespace App\Controller;
	use Cake\Validation\Validator;
	class AnimalsController extends AppController
	{
		public function index(){
			
		}
		
		public function reg(){
	
			$animal_name = $this-&gt;request-&gt;data['animal_name'];
	
			$ent = $this-&gt;Animals-&gt;newEntity($this-&gt;request-&gt;data);
			<strong>$errors = $ent-&gt;errors();</strong>
			if(empty($errors)){
				$this-&gt;Animals-&gt;save($ent);
			}
	
			$this-&gt;set(array(
					'animal_name'=&gt;$animal_name,
					'errors'=&gt;$errors
			));
		}
	}
	</pre>
	<br>
	
	テーブルクラス:AnimalsTable.php
	<pre>
	namespace App\Model\Table;
	use Cake\ORM\Table;
	use Cake\Validation\Validator;
	class AnimalsTable extends Table{

		public function <strong>validationDefault</strong>(Validator $validator)
		{
	
			$validator
				-&gt;<strong>notEmpty</strong>('animal_name','動物名は必須入力です。')
				-&gt;<strong>maxLength</strong>('animal_name', 4,'動物名は4文字以内です。')
			;
				
			return $validator;
		}
	
	}
	</pre>
	<br>
	
	ビュー:index.php
	<pre>
	&lt;?php 
	echo $this-&gt;Form-&gt;create('Animals' , ['type'=&gt;'post','url'=&gt;['action'=&gt;'reg']] );
	echo $this-&gt;Form-&gt;text('animal_name');
	echo $this-&gt;Form-&gt;submit('送信');
	echo $this-&gt;Form-&gt;end();
	?&gt;
	</pre>
	<br>
	
	ビュー:reg.ctp
	<pre>
	&lt;h2&gt;CakePHP3 | Animal | reg&lt;/h2&gt;
	
	動物名：&lt;?php echo $animal_name?&gt;&lt;br&gt;
	&lt;br&gt;
	
	&lt;p&gt;バリデーション&lt;/p&gt;
	&lt;?php var_dump(<strong>$errors</strong>)?&gt;
	&lt;br&gt;
	</pre>
	<br>
	
	<p>ファイル構造</p>
	<img src="img/tutorial/s7a1.png" alt="バリデーションのファイル構造" class="img_compact_k" /><br>
	<br>
	
	<p>挙動</p>
	<img src="img/tutorial/s7a2-1.png"  class="img_compact_k" />
	<img src="img/tutorial/s7a2-2.png"  class="img_compact_k" />
	<br><br>
	
	
	<time>2016-6-29</time>
</div>





















<div id="s10" class = "sec4" >
	<h3>DBからデータを取得し一覧表示 | find</h3>
	
	<p>コントローラ</p>
	<pre><code>
	namespace App\Controller;
	use Cake\ORM\TableRegistry;
	
	class OkinawaFishsController extends AppController
	{
		public function fishList(){
			$okinawaFishs = TableRegistry::get('OkinawaFishs');
			$data = $okinawaFishs-&gt;getFishList1();
			$this-&gt;set(array(
					'data'=&gt;$data
			));
		}
	}
	</code></pre>
	<br>
	
	
	
	<p>テーブルクラス（モデル）</p>
	<pre><code>
	namespace App\Model\Table;
	use Cake\ORM\Table;
	
	class OkinawaFishsTable extends Table
	{
	
		public function initialize(array $config)
		{
	
		}
		
		public function getFishList1(){
	
			$data = $this-&gt;find()-&gt;
				where(['fish_value'=&gt;102])-&gt;
				order(['fish_date DESC'])-&gt;
				limit(10)-&gt;
				all();
	
			return $data;
			
		}
	
	}
	</code></pre>
	<br>
	
	
	
	<p>テンプレート（ビュー）</p>
	<pre><code>
	&lt;table&gt;
	&lt;thead&gt;&lt;tr&gt;&lt;th&gt;id&lt;/th&gt;&lt;th&gt;fish_name&lt;/th&gt;&lt;th&gt;fish_date&lt;/th&gt;&lt;th&gt;fish_value&lt;/th&gt;&lt;/tr&gt;&lt;/thead&gt;
	&lt;tbody&gt;
	&lt;?php 
	foreach ($data as $ent){
		echo "&lt;tr&gt;&lt;td&gt;{$ent-&gt;id}&lt;/td&gt;";
		echo "&lt;td&gt;{$ent-&gt;fish_name}&lt;/td&gt;";
		echo "&lt;td&gt;{$ent-&gt;fish_date-&gt;format('Y-m-d')}&lt;/td&gt;";
		echo "&lt;td&gt;{$ent-&gt;fish_value}&lt;/td&gt;&lt;/tr&gt;&yen;n";
		
	}
	?&gt;
	&lt;/tbody&gt;
	&lt;/table&gt;
	</code></pre>
	<br>
	
	
	
	<time>2016-7-22</time>
</div>





















<div id="s11" class = "sec4" >
	<h3>LEFT JOIN</h3>
	
	
	
	<p>ソースコード</p>
	<pre><code>
	$query = $this-&gt;find()
	-&gt;join([
			'OkinawaFishs' =&gt; [
					'table' =&gt; 'okinawa_fishs',
					'type' =&gt; 'LEFT',
					'conditions' =&gt; 'FishingRecs.fish_id = OkinawaFishs.id',
			],
	]);
	
	$query-&gt;select([
			"id"=&gt;"FishingRecs.id",
			"catch_count"=&gt;"FishingRecs.catch_count",
			"fishing_rec_date"=&gt;"FishingRecs.fishing_rec_date",
			"fish_name"=&gt;"OkinawaFishs.fish_name",
	]);

	$data = $query-&gt;all();
	</code></pre>
	<br>
	

	
	<p>SQLログ</p>
	<pre><code>
	SELECT 
	  FishingRecs.id AS `id`, 
	  FishingRecs.catch_count AS `catch_count`, 
	  FishingRecs.fishing_rec_date AS `fishing_rec_date`, 
	  OkinawaFishs.fish_name AS `fish_name` 
	FROM 
	  fishing_recs FishingRecs 
	  LEFT JOIN okinawa_fishs OkinawaFishs ON FishingRecs.fish_id = OkinawaFishs.id
	</code></pre>
	<br>
	
	
	
	
	
	<br><time>2016-7-22</time>
</div>






















<div id="s20" class = "sec4" >
	<h3>基本的なDB保存</h3>
	
	配列データをnewEntityでエンティティに変換してから、saveでDB保存する。<br>
	エンティティはオブジェクト型である。<br>
	<br>
	
	<p>モデル名について</p>
	テーブル名がanimalsである場合、モデル名は「Animals」である。<br>
	CakePHP2と同様、モデルクラスを作らなくてもモデルを使用できる。<br>
	モデルクラスを作成していない場合、内部的にテーブル名からモデルを自動生成している。<br>
	<br>
	
	<p>サンプル</p>
	<aside>※ Animalsクラスはなくても動く</aside>
	<pre>
	namespace App\Controller;
	class AnimalsController extends AppController
	{
		public function reg(){
			$data=array('animal_name'=>'タヌキ');
			$ent = $this->Animals-><strong>newEntity</strong>($data);
			$this->Animals-><strong>save</strong>($ent);
	
		}
	}
	</pre>
	<br>
	
	<p>animalsテーブル</p>
	<table class="tbl2">
		<thead>
			<tr><th>id</th><th>animal_name</th><th>animal_value</th><th>animal_date</th><th>modified</th></tr>
		</thead>
		<tbody>
			<tr><td>3</td><td>タヌキ</td><td>NULL</td><td>0000-00-00</td><td>2016/6/23 10:53</td></tr>
	
		</tbody>
	</table>
	CakePHP2と同様、idを省略すればINSERTとされ、idを指定すればUPDATEになる。<br>
	<br>
	
	<aside>
		UPDATEする場合
		<pre>$data=array(<strong>'id'=&gt;3</strong>,'animal_name'=&gt;'キツネ');</pre>
	</aside>
	<br>
	
	<br>
	<time>2016-6-23</time>
</div>





















<div id="s21" class = "sec4" >
	<h3>複数データのDB保存</h3>
	
	CakePHP3ではsaveAllが廃止されてしまった。<br>
	代わりに、配列データからnewEntitiesでエンティティリストを作成し、ループしながらエンティティを保存する方法になった。<br>
	この方法にトランザクションを組み入れることも可能である。<br>
	<br>
	
	<pre>
	namespace App\Controller;
	class AnimalsController extends AppController
	{
		public function reg(){
			$data=array(
					array('animal_name'=&gt;'オオカミ'),
					array('animal_name'=&gt;'クマ'),
			);
			
			$animals = $this-&gt;Animals-&gt;<strong>newEntities</strong>($data);
			
			$this-&gt;Animals-&gt;connection()-&gt;begin();//トランザクション開始
			
			foreach ($animals as $animal) {
				$this-&gt;Animals-&gt;<strong>save</strong>($animal);
			}
			
			$this-&gt;Animals-&gt;connection()-&gt;commit();//コミット
	
	}
	</pre>
	<br>
	
	<p>animalsテーブル</p>
	<table class="tbl2">
		<thead>
			<tr><th>id</th><th>animal_name</th><th>animal_value</th><th>animal_date</th><th>modified</th></tr>
		</thead>
		<tbody>
			<tr><td>12</td><td>オオカミ</td><td>NULL</td><td>0000-00-00</td><td>2016/6/23 12:55</td></tr>
			<tr><td>13</td><td>クマ</td><td>NULL</td><td>0000-00-00</td><td>2016/6/23 12:55</td></tr>
	
		</tbody>
	</table>
	<br>
	
	<aside>
		※ INSERT or UPDATE<br>
		$dataからidを省略すればINSERT、idを含めれればUPDATEになる。<br>
		上記のサンプルではidを省略しているのでINSERTである。
	</aside>
	<br>
	
	<time>2016-6-23</time>
</div>





















<div id="s31" class = "section" >
	<h3>Entityクラス | モデル</h3>
	2.xまでのModelクラスは、3.xではTableクラスとEntityクラスに分離される。<br>
	Tableクラスは2.x系のModelクラスと同様な働きであるが、
	Entityクラスは行とプロパティに特化したクラスである。<br>
	DBの行を取得、編集、追加するときに使われる。<br>
	Tableクラスのfind()で取得したデータの行要素はEntityクラスになっている。<br>
	Eager ローディングとLazy ローディングという概念もある。<br>
	<br>
	
	<p>Entityクラスでできること</p>
	<ol>
		<li><a href="http://book.cakephp.org/3.0/ja/orm/entities.html#id5" target="blank">
			アクセサー（Getter)とミューテーター（Setter)をカスタマイズできる。
		</a></li>
		
		<li><a href="http://book.cakephp.org/3.0/ja/orm/entities.html#id6" target="blank">
			テーブルには存在しない仮想フィールドを作ることができる。（アクセサーカスタマイズの応用）
		</a></li>
		
		<li><a href="http://book.cakephp.org/3.0/ja/orm/entities.html#id7" target="blank">
			エンティティが変更されたかどうかが分かる。
		</a></li>
		
		<li><a href="http://book.cakephp.org/3.0/ja/orm/entities.html#id8" target="blank">
			フィールド単位でバリデーション（エラー情報）を取得することができる。
		</a></li>
		
		<li><a href="http://book.cakephp.org/3.0/ja/orm/entities.html#mass-assignment" target="blank">
			一括代入ができる。また、一括代入を禁止するプロパティを定義することも可能。
		</a></li>
		
		<li><a href="http://book.cakephp.org/3.0/ja/orm/entities.html#id12" target="blank">
			エンティティが示す行がデータベース上にすでに存在するかチェックする。
		</a></li>
		
		<li><a href="http://book.cakephp.org/3.0/ja/orm/entities.html#id13" target="blank">
			複数のエンティティクラス間で共通するロジックを使う場合、トレイトという仕組みがある。
		</a></li>
		
		<li><a href="http://book.cakephp.org/3.0/ja/orm/entities.html#json" target="blank">
			エンティティから配列や JSON への変換できる。(変換するプロパティを定義することも可能）
		</a></li>
		
	</ol>
	<br>
	
	<p>リンク</p>
	<a href="http://book.cakephp.org/3.0/ja/orm/entities.html" target="blnak">公式ドキュメント</a><br>
	<br>
	
	<br><time>2016-7-21</time>
</div>





















<div id="sxxx" class = "sec4" style="display:none">
	<h3>テンプレート</h3>
</div>





	
	
	
<div style="width:auto;height:400px">
</div>





<div class="yohaku"></div>
<ol class="breadcrumb">
	<li><a href="/">ホーム</a></li>
	<li><a href="/note_prg">プログラミングの覚書</a></li>
	<li><a href="/note_prg/php/">PHPの覚書</a></li>
	<li><a href="/note_prg/cakephp3/">CakePHP3の覚書</a></li>
	<li>チュートリアル</li>
</ol>
</div><!-- container  -->
<div id="footer"  ><a href="/">(c)kenji uehara</a> 2016/6/22</div>
</body>
</html>