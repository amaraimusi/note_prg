/**
 * 文章と話術の覚書
 * @date 2016-4-19 LearnCounterK.js 組み込み
 */


$(function(){
	
	// 覚えモード切り替えのイベント組み込み
	addLearnModeEvent();
	
	// 覚えモード
	learnMode();
	
});

/**
 * 覚えモード切り替えのイベント組み込み
 */
function addLearnModeEvent(){
	
	$('#all_index').click(function(e){
		location.href="?learn=1";
	});
	
}

/**
 * 覚えモード
 */
function learnMode(){
	
	var querys = getUrlQuery();
	if(querys['learn'] != undefined){
		learn_counter_k();
	}
	
}


/**
 * URLクエリデータを取得する
 * 
 * @return object URLクエリデータ
 */
function getUrlQuery(){
	query = window.location.search;
	
	if(query =='' || query==null){
		return {};
	}
	var query = query.substring(1,query.length);
	var ary = query.split('&');
	var data = {};
	for(var i=0 ; i<ary.length ; i++){
		var s = ary[i];
		var prop = s.split('=');
		
		data[prop[0]]=prop[1];

	}	
	return data;
}
