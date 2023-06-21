
/**
 * 言語切替機能クラス
 * @since 2023-6-21
 * @version 1.0.0
*/
class LangChanger{
	
	/**
	* コンストラクタ
	* @param {} params
	*     - string def_lang_code デフォルト言語コード    省略時は日本語を示す'ja'の文字がセットされる
	* 
	*/
	constructor(params){
		if(params == null) params = {};
		if(params.def_lang_code == null) params.def_lang_code = 'ja';
		
		if(params.langList == null){
			params.langList = ['ja', 'en', 'hi', 'bn', 'sn'];
		}
		
		// 言語データを生成する
		this.langData = this._createLangData(params.langList);

		this.params = params;
		
		
	}
	
	
	
	/**
	 * 初期化:初回の言語切替を行う
	 * 
	 */
	init(){

		// URLクエリデータを取得する
		let querys = this._getUrlQuery();
		
		// URLクエリデータから言語コードを取得する
		let lang_code = this._getLangCode(querys);
		
		// 言語を切り替えます。
		this.changeLang(lang_code);

	}
	
	/**
	 * 言語を切り替えます。
	 * @param string act_lang_code アクティブ言語コード
	 */
	changeLang(act_lang_code){
		
		if(this.langData[act_lang_code] == null) return;

		// 表示切替
		for(let lang_code in this.langData){
			let langEnt = this.langData[lang_code];
			let slt = langEnt.slt;
			if(act_lang_code == lang_code){
				jQuery(slt).show();
			}else{
				jQuery(slt).hide();
			}
			
		}
		
		
	}
	
	
	// 言語データを生成する
	_createLangData(langList){
		
		let langData = {};
		for(let i in langList){
			let lang_code = langList[i];
			let slt = `.lng-${lang_code}`;
			langData[lang_code] = {'slt':slt};
		}
		return langData;
	}
	
	
	// URLクエリデータから言語コードを取得する
	_getLangCode(querys){
		let lang_code = null;
		if(querys.lang) lang_code = querys.lang;
		if(querys.lg) lang_code = querys.lg;
		if(lang_code == null) lang_code = this.params.def_lang_code;
		
		return lang_code;

	}
	
	
	/**
	 * URLクエリデータを取得する
	 * 
	 * @return object URLクエリデータ
	 */
	_getUrlQuery(){
		var query = window.location.search;
		if(query =='' || query==null) return {};
		query = query.substring(1,query.length);
		var ary = query.split('&');
		var data = {};
		for(var i=0 ; i<ary.length ; i++){
			var s = ary[i];
			var prop = s.split('=');
			data[prop[0]]=prop[1];
		}	
		return data;
	}
	
	
	
}