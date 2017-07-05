<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="google" content="notranslate" />
		<title>ワクガンス　|　C++の覚書</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"  />
		<link rel="stylesheet" type="text/css" href="../css/common2.css"  />
		<script>



		</script>

		<style type="text/css">

		</style>

	</head>
	<body>
		<div id="page1">
		<h1 id="header">C++の覚書</h1>
		<div id="content" >









<!-- --------------------------------------------------------------- -->
<div id="sec1-1" class="sec1" >
	<div class="title">雑記メモ</div>


	<div class="sec3">
		<p>クロスコンパイラ（Cross GCC）とは</p>

		<ul>
		<li>いろんなプラットフォームでプログラムを実行させるためのコンパイラ。</li>
		<li>複数のプラットフォームでシステムを動かすときに利用される。</li>
		<li>JavaのJVMと似ている。</li>
		<li>組込み系（冷蔵庫のコンピュータ）で実行するシステムにも使われる。</li>
		<li>複数のOSと、そのOSの複数バージョンに対応させることができる。</li>
		<li>暇なマシンが別のサーバーのためにコンパイルする技術。</li>
		<li>新開発中プラットフォームやエミュレータのコンパイラとして。</li>
		</ul>
	</div>




	<div class="sec3">
		<p>GCCとは</p>

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
	</div>


	<div class="sec3">
		<p>カナディアンクロスとは</p>

		<ul>
		<li>クロスコンパイラを次のプラットフォームで役割分担している。build（ビルドプラットフォーム）、host(ホストプラットフォーム)、(target)ターゲットプラットフォーム。</li>
		<li>各プラットフォームで連鎖的にコンパイラを作っていく技術。</li>
		<li>カナダに３つの大きな政党があったことが由来。</li>
		</ul>
	</div>






</div>
<hr />
<!-- --------------------------------------------------------------- -->







<!-- --------------------------------------------------------------- -->
<div id="sec1-0" class="sec1" style="display: none">
	<div class="title">xxx</div>

	<pre>
	</pre>
</div>
<hr />
<!-- --------------------------------------------------------------- -->
























		</div><!-- content -->
		<div id="footer">(C) kenji uehara 2015/6/9</div>
		</div><!-- page1 -->
	</body>
</html>