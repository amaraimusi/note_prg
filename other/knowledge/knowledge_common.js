/**
 * Common javascript for knowledge.
 * @version 1.0
 * @date 2017-1-8
 * @auther kenji uehara
 */

var learnCounterK;
var m_category_code;

function init_knowledge(category_code){
	
	var m_category_code = category_code;
		
	// CakePHPによるAjax認証
	var alwc = new AjaxLoginWithCake();
	var option = {'form_slt':'#ajax_login_with_cake'}
	alwc.loginCheckEx(callBack1,option);
	
	
	// 隠しメニューを作成
	createKakusiMenu();
}



function callBack1(auth_flg){
	if(auth_flg==0){
		return;
	}
	
	// 学習カウンター
	learnCounterK = new LearnCounterK({'category_code':m_category_code});
	
	$("#kakusi_menu").show();
	
}




// 隠しメニューを作成
function createKakusiMenu(){
	var menu_html = 
		"<a href='kl_work.html?a=1' class='btn btn-info btn-sm'>仕事</a>" +
		"<a href='kl_work2.html?a=1' class='btn btn-info btn-sm'>仕事2</a>" +
		"<a href='kl_osie.html?a=1' class='btn btn-info btn-sm'>教え</a>" +
		"<a href='kl_osie2.html?a=1' class='btn btn-info btn-sm'>教え2</a>" +
		"<a href='kl_osie3.html?a=1' class='btn btn-info btn-sm'>教え3</a>" +
		"<a href='kl_osie4.html?a=1' class='btn btn-info btn-sm'>教え4</a>" +
		"<a href='kl_ministry.html?a=1' class='btn btn-info btn-sm'>宣教</a>" +
		"<a href='clean_room.html?a=1' class='btn btn-info btn-sm'>片付</a>" +
		"<a href='../wariate' class='btn btn-info btn-sm'>割当</a>" +
		"<a href='/zss_rec/developer/' class='btn btn-info btn-sm'>ZSS</a>" +
		"<a href='/zss_rec/rec_x/index?a=1&i=1' class='btn btn-info btn-sm'>農記</a>" +
		'' ;
	
	$("#kakusi_menu").html(menu_html);
	
	
}
