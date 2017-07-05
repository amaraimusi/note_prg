/**
 * 指定要素に指定ファイルのソースコードを表示する
 * 
 * @note
 * 使い方：ボタン要素のonclickから当関数を呼び出す。
 * 表示するソースコードはXSSサニタイズが施される。
 * 
 * ■■■□□□■■■□□□■■■□□□　JSファイルのソースコードが表示できないバグあり。
 * 
 * @version 0.1
 * @date 2016-11-18 | 2017-6-29
 * 
 * @param slt 指定要素のセレクタ
 * @param path 指定ファイルのパス
 */
function open_src(slt,path){
	console.log('test=3');//■■■□□□■■■□□□■■■□□□)
	var outElm = $(slt);
	var display = outElm.css('display');
	if(display != 'none'){
		outElm.hide();
		return;
	}

	$.ajax({
		
		url: path,
		cache: false,
		dataType: "text",
		processData : false,
		contentType : false,
		success: function(txt, type) {

			txt=txt.replace(/</g,'&lt');
			txt=txt.replace(/>/g,'&gt');
			console.log('test=2');//■■■□□□■■■□□□■■■□□□
			outElm.html(txt);
			outElm.show();
			

		},
		error: function(xmlHttpRequest, textStatus, errorThrown){
			console.log(xmlHttpRequest.responseText);
			
			alert(textStatus);
		}

	});

}