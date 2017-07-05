/**
 * livipage.js | ページ内リンク先プレビュー
 * 
 * ページ内リンクにカーソルを合わせると、リンク先をプレビュー表示する。
 * アンカーのclass属性にlivipageを追加するだけで使用可能。
 * 
 * 要素の予約語
 * class=livipage
 * id=livipage_tooltip
 * 
 * @version 1.0
 * @date 2016-1-14 ver 1.0
 * @date 2016-1-4 新規作成
 * @author wacgance 
 * 
 */
$( function() {
	//～読込イベント処理～
	
	//ツールチップ用DIV
	$(document.body).append("<div id='livipage_tooltip'></div>");
	
	//ツールチップの外をクリックするとツールチップを閉じる
	$(document).click(
			function (){
				$('#livipage_tooltip').hide();
			});
	
	//領域外クリックでツールチップを閉じるが、ツールチップ自体は領域内と判定させ閉じないようにする。
	$('.livipage').click(function(e) {
		e.stopPropagation();
	});

	//対象リンクにカーソルを合わせるとツールチップを表示させる。
	$('.livipage').click(
			function(){

				//マウスオーバーイベント
				
				//対象セレクタ
				var slt=$(this).attr('href');

				//対象要素の右上位置を取得
				var offset=$(this).offset();
				var left = offset.left;
				var top = offset.top;
		
				//対象要素の外幅を取得
				var width= $(slt).width();
				var height= $(slt).height();
				
				var tt_html=$(slt).html();
				
				//リンクを作成する
				var link_text=$(this).html();
				var link1="<a href='" + slt + "'>" + link_text + "</a><br>";
				
				tt_html = link1 + tt_html;
				
				$('#livipage_tooltip').show();
				
				$('#livipage_tooltip').css('z-index',2);
				$('#livipage_tooltip').css('background-color','white');
				$('#livipage_tooltip').css('position','absolute');
				$('#livipage_tooltip').css('border','solid 2px #ccb1bf');
				$('#livipage_tooltip').css('padding','5px');
				
				//ツールチップにHTMLをセット
				$('#livipage_tooltip').html(tt_html);
				
				//ツールチップの位置を算出
				var tt_left=left;
				//var tt_top=top + height;
				var tt_top=top + 16;

				//ツールチップ要素に位置をセット
				$('#livipage_tooltip').offset({'top':tt_top,'left':tt_left });
				
				return false;//リンク無効
			}
		);
	

	
});