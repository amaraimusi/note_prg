<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="google" content="notranslate" />
   	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>テンプレート | ワクガンス</title>
	<link rel='shortcut icon' href='/home/images/favicon.ico' />
	
	<link href="/note_prg/css/jquery-ui.min.css" rel="stylesheet">
	<link href="/note_prg/css/bootstrap.min.css" rel="stylesheet">
	<link href="/note_prg/css/highlight/default.css" rel="stylesheet">
	<link href="/note_prg/css/common2.css" rel="stylesheet">

	<script src="/note_prg/js/jquery3.js"></script>	<!-- jquery-3.3.1.min.js -->
	<script src="/note_prg/js/jquery-ui.min.js"></script>
	<script src="/note_prg/js/bootstrap.min.js"></script>
	<script src="/note_prg/js/highlight.pack.js"></script>
	<script src="/note_prg/js/livipage.js"></script>
	<script src="/note_prg/js/ImgCompactK.js"></script>

	<script>hljs.initHighlightingOnLoad();</script>
</head>
<div id="header" ><h1>C++の覚書 | ワクガンス</h1></div>
<div class="container">










<!-- --------------------------------------------------------------- -->
<div id="sec1-1" class="sec1" >
	<div class="title">雑記メモ</div>


	<div class="sec3">

	</div>




	<div class="sec3">

	</div>


	<div class="sec3">

	</div>






</div>
<hr />
<!-- --------------------------------------------------------------- -->




<div id="sec1-1" class="sec4" >
	<h3>クロスコンパイラ（Cross GCC）とは</h3>

	<ul>
	<li>いろんなプラットフォームでプログラムを実行させるためのコンパイラ。</li>
	<li>複数のプラットフォームでシステムを動かすときに利用される。</li>
	<li>JavaのJVMと似ている。</li>
	<li>組込み系（冷蔵庫のコンピュータ）で実行するシステムにも使われる。</li>
	<li>複数のOSと、そのOSの複数バージョンに対応させることができる。</li>
	<li>暇なマシンが別のサーバーのためにコンパイルする技術。</li>
	<li>新開発中プラットフォームやエミュレータのコンパイラとして。</li>
	</ul>
	<br><time>2015-6-9</time>
</div>




<div id="sec1-2" class="sec4">
	<h3>GCCとは</h3>

	<ul>
	<li>GCCは、いろんなコンパイラを集めたフリーウェア。</li>
	<li>クロスコンパイル用に設定する必要があるようだ。</li>
	<li>不完全版が多い。</li>
	<li>GCCはプラットフォーム毎binutilsを必要とする。</li>
	<li>プラットフォームにはビルドプラットフォーム、ホストプラットフォーム、ターゲットプラットフォームがある。（GNUが呼び分け）</li>
	<li>ビルドプラットフォームは開発環境を表し、ホストプラットフォームは端末デバイスを指す。ターゲットプラットフォームは自分自身（GCC)のコンパイル用である。</li>
	<li>GCCはシェルでbinutilsにコマンド（target...)を渡し、ホストプラットフォームで動かすのに必要なアセンブラを作る。</li>
	<li>コマンドはeclipseでも入力する。</li>
	<li>ホストプラットフォームには標準Ｃライブラリを搭載させる必要があるが、大きすぎて搭載しきれない場合、newlibという必要最低限な部分だけ搭載する方法がある。</li>

	</ul>
	<br><time>2015-6-9</time>
</div>




<div id="sec1-3" class="sec4" >
	<h3>カナディアンクロスとは</h3>

	<ul>
	<li>クロスコンパイラを次のプラットフォームで役割分担している。build（ビルドプラットフォーム）、host(ホストプラットフォーム)、(target)ターゲットプラットフォーム。</li>
	<li>各プラットフォームで連鎖的にコンパイラを作っていく技術。</li>
	<li>カナダに３つの大きな政党があったことが由来。</li>
	</ul>
	<br><time>2015-6-9</time>
</div>




<div id="sec1-4" class="sec4">
	<h3>過去ログ</h3>

	<pre class="console">
	■実行方法（コンソール）
	F5キー実行
		コンソール画面はすぐに閉じられる。
		※プログラムの最後に getchar();　を入れると、すぐにコンソールが閉じられることはない。
	
	Ctrlキーを押しながらF5キーを押して実行する。
		コンソールは何かボタンを押すまで閉じられない
	
	
	■省略機能using namespace
	
	例）
	#include <iostream>
	using namespace std;
	int main(){
	  cout << "Hello world." << endl;
	  return 0;
	}
	
	
	■コンソール出力
	#include <iostream>
	using namespace std;
	
	int main(){
	//using namespace stdとしていることでstdが不要になる。
	 //std.cout << "Hello world." << std.endl;
	
	  cout << "Hello world." << endl;
	
	  return 0;
	}
	
	※printfも普通に使えるので、これを使ったほうが便利かと思われる
	
	■動的配列
	int *p;     //配列用のポインタ
	p = new int[n];
	delete[] p;
	※・new演算子で確保したメモリは、「delete[] 解放するオブジェクト」で解放します。
	
	■ヘッダーファイルとは
	
	Cで関数を使用する場合、プロトタイプ宣言をする。
		※Ｃは上から順番にコードをコンパイルする。そのため、下段側に存在する関数を、上側にあるコードが使用すると、未知の関数となりコンパイルエラーとなる。そのためプロトタイプ宣言というものが必要である。
	プロトタイプ宣言をまとめたのがヘッダーファイルである。
	
		補足情報
			「#if !defined(TEST)～#endif 」は一回だけヘッダー情報を読込むようにするための仕組み
			ヘッダーファイルにも上から順の法則が働くため、ヘッダーの宣言に順番を意識する必要がある。
		
		参考サイト
			http://www.kab-studio.biz/Programing/Codian/Cpp/02.html

	</pre>

	<br><time>2015-6-9</time>
</div>




<div id="sec1-0" class="sec4" style="display:none">
	<h3>xxx</h3>


	<br><time>2015-6-9</time>
</div>






<div class="yohaku"></div>
<ol class="breadcrumb">
	<li><a href="/">ホーム</a></li>
	<li><a href="/note_prg">プログラミングの覚書</a></li>
	<li><a href="/note_prg/cpp/">C++の覚書</a></li>
</ol>
</div><!-- content -->
<div id="footer">(C) kenji uehara 2003-1-1 | 2015-6-9</div>
</body>
</html>