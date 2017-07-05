/**
 * 覚書用の目次生成ツール
 * 
 * @version 1.0
 * @date 2016-1-18 新規作成
 * 
 */

$( function() {
	
	note_index_execution();
});

//覚書用の目次を作成する。
function note_index_execution(){
	
	var h_lis ='<ol>';
		
	$('.sec_b1').each(function(){
		
		//表示状態がnoneであれば、次のループへ。
		var display = $(this).css('display');
		if(display == 'none'){
			return;
		}
		
		//ID属性を取得
		var id = $(this).attr('id');
		
		//タイトルを取得
		var h3=$(this).children("h3");
		var t = h3.html();
		
		//liを組み立て
		h_lis += "<li><a href='#" + id + "'>" + t + "</a></li>\n"

	});
	
	h_lis += '</ol>';
	
	$('#note_index').html(h_lis);
}