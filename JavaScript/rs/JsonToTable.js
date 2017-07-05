/**
 * JSONからHTMLテーブルを生成する
 * ★履歴
 * 2015-8-7 new
 *
 * MIT License
 * kenji uehara
 */
var JsonToTable =function(){


	/**
	 * ★JSONからHTMLテーブルを生成する
	 * @param table_selector テーブル出力先の要素名（例→#tbl1)
	 * @param str_json JSON文字列
	 * @param clmOptions 列設定
	 * @param attributes テーブルの属性設定
	 *
	 */
	this.create=function(table_selector,str_json,clmOptions,attributes) {
		var data=JSON.parse(str_json);

		//データからHTMLテーブルを作成。
		var html=this.createHtmlTable_jtt(data,clmOptions,attributes);


		$(table_selector).html(html);
	};




	//データからHTMLテーブルを作成。
	this.createHtmlTable_jtt=function(data,clmOptions,attributes){


		if(data==null || Object.keys(data).length==0){
			return '';
		}

		var ths=[];
		var ent0=data[0];
		var clms=[];
		for(var key in ent0){

			var option=clmOptions[key];
			var clmName=key;
			var visible=true;//表示フラグ
			if(option!=null){

				//表示フラグがOFFなら、列表示しない。
				if(option['visible']===false){
					continue;
				}

				if(option['name']!=null){
					clmName=option['name'];
				}

			}


			ths.push("<th>" + clmName + "</th>");
			clms.push(key);


		}
		var thead="<tr>" + ths.join('') + "</tr>";



		var trs=[];
		for(var i in data){
			var ent=data[i];
			var tds=[];
			for(var c_i=0; c_i<clms.length; c_i++){
				var clm=clms[c_i];

				var v=ent[clm];

				var option=clmOptions[clm];
				if(option!=null){

					//XSSサニタイズオプションの処理
					if(option['sanitaize']==true){
						v=this.xssSanitaizeEncode(v);
					}

					//マッピングオプション
					if(option['mapping']!=null){
						v=option['mapping'][v];
						if(v==undefined){
							v='';
						}
					}



					//貨幣オプション＝日本円
					if(option['currency']=='jpy'){
						if(v==null || v==''){
							v=0;
						}else{
							//3桁区切りに変換
							v= String(v).replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,' );
						}
						v='&yen' + v;

					}


					//バイト容量
					if(option['byte_size']!=null){
						if(v==null || v==''){
							v='0Byte';
						}else if(!isNaN(v)){
							if(option['byte_size']==true){
								if(v >= 1000000000){
									v=v/1000000000;
									v=Math.floor(v * 100) / 100;
									v=v + 'GB';
								}else if(v >= 1000000){
									v=v/1000000;
									v=Math.floor(v * 100) / 100;
									v=v + 'MB';
								}else if(v >= 1000){
									v=v/1000;
									v=Math.floor(v * 100) / 100;
									v=v + 'KB';
								}else{
									v=v + 'Byte'
								}

							}
						}
					}


				}

				tds.push("<td>" + v + "</td>");

			}
			trs.push("<tr>" + tds.join('') + "</tr>");

		}

		var tbody=trs.join('');

		var attrs=[];
		for(var key in attributes){
			var n=attributes[key];
			attrs.push(key + '="' + n + '"');

		}
		var str_attr=attrs.join(' ');

		var table="<table " + str_attr + "><thead>" + thead +  "</thead><tbody>" + tbody + "</tbody></table>";

		return table;


	};



	//XSSサニタイズエンコード
	this.xssSanitaizeEncode=function(str){
		return str.replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#39;');
	};

	//XSSサニタイズデコード
	this.xssSanitaizeDecode=function(str){
		return str.replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&quot;/g, '"').replace(/&#39;/g, '\'').replace(/&#039;/g, '\'');
	};

};
