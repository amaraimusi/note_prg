


$(() =>{
	
	var lang_json = $('#lang_json').val();
	var data = JSON.parse(lang_json);
	
	var table_html = createTableHtml(data);
	$('#lang_div').html(table_html);
});


function createTableHtml(data){
	var head = data[0];
	var fields = Object.keys(head);

	var html = "<table class='table'><thead><tr>";
	for(var i in fields){
		var field = fields[i];
		html += '<th>' + field + '</th>';
	}
	html += "</thead><tbody>";
	
	for(var i in data){
		html += '<tr>';
		var ent = data[i];
		for(var key in fields){
			var field = fields[key];
			html += '<td>' + ent[field] + '</td>';
		}
		html += '</tr>';
	}
	
	html += "</tbody></html>";
	return html;
}