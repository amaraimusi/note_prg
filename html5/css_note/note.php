<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="google" content="notranslate" />
		<title>ワクガンス　|　CSSの覚書</title>
		<link rel="stylesheet" type="text/css" href="../common1.css"  />
		<script>



		</script>

		<style type="text/css">

		</style>

	</head>
	<body>
		<div id="page1">
		<h1 id="header">CSSの覚書</h1>
		<div id="content" >








<!-- --------------------------------------------------------------- -->
<div id="sec1-1" class="sec1">
	<div class="title">1行で文字を左右に分ける</div>

	<pre>
	&ltdiv style="width:500px;background-color:#ceedc5"&gt
		&ltdiv style="<span style="color:red">float:left</span>" &gt左の文字&lt/div&gt
		&ltdiv style="<span style="color:red">text-align:right</span>"&gt右の文字&lt/div&gt
	&lt/div&gt
	</pre>
	<a class="ref_link" href="http://amaraimusi.sakura.ne.jp/sample/css/text_left_right/text_left_right.html">サンプル</a>

</div>
<hr />
<!-- --------------------------------------------------------------- -->




<!-- --------------------------------------------------------------- -->
<div id="sec1-2" class="sec1">
	<div class="title">ブロックレベルで中央揃え</div>



	<h3>ブロックレベルで中央揃えするサンプルコード</h3>
	<pre>
	&ltdiv style="margin-left : auto ; margin-right : auto ;" &gtTEST&lt/div&gt
	</pre>
	<h3>中央揃えのデモ</h3>
	<div style="width:190px;width:50px;background-color:red;margin-left : auto ; margin-right : auto ;" >TEST</div>


</div>
<hr />
<!-- --------------------------------------------------------------- -->




<!-- --------------------------------------------------------------- -->
<div id="sec1-3" class="sec1" >
	<div class="title">位置指定 | position</div>


	<table border="1">
		<thead><tr><th>CSS</th><th>説明/サンプル</th></tr></thead>
		<tbody>
			<tr><td>position:relative</td><td><a class = "ref_link" href="http://amaraimusi.sakura.ne.jp/sample/css/position_relative/position_relative.html">相対位置配置</a></td></tr>
			<tr><td>position:absolute</td><td><a class = "ref_link" href="http://amaraimusi.sakura.ne.jp/sample/css/position_absolute/position_absolute.html">絶対位置配置</a></td></tr>
			<tr><td>position:fixed</td><td><a class = "ref_link" href="http://amaraimusi.sakura.ne.jp/sample/css/position_fixed/position_fixed.html">スクロール固定</a></td></tr>
		</tbody>
	</table>
</div>
<hr />
<!-- --------------------------------------------------------------- -->




<!-- --------------------------------------------------------------- -->
<div id="sec1-4" class="sec1">
	<div class="title">ボタンに画像を貼り付ける</div>



	<pre>
	&ltstyle&gt
	#sample4{
		border:0px;
		width:15px;
		height:15px;
		background-image: url('img/sec1-4-off.png') ;"
	}

	#sample4:hover{
	    border:0px;
		width:15px;
		height:15px;
		background-image: url('img/sec1-4-on.png') ;"
	}
	&lt/style&gt
	&ltinput type="button" id="sample4" value="" /&gt
	</pre>

	<style>
	#sample4{
		border:0px;
		width:15px;
		height:15px;
		background-image: url('img/sec1-4-off.png') ;"
	}

	#sample4:hover{
	    border:0px;
		width:15px;
		height:15px;
		background-image: url('img/sec1-4-on.png') ;"
	}
	</style>

	<strong>サンプル→</strong>
	<input type="button" id="sample4" value="" />



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
		<div id="footer">(C) kenji uehara 2013/09/03</div>
		</div><!-- page1 -->
	</body>
</html>