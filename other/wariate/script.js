
$(()=>{
	
	let text = $('#main_content').text();
	console.log(text);//■■■□□□■■■□□□
	
	let str_count = text.length;
	
	
	let one_min_cnt = 290;// 1分290文字
	let sec = 60 * str_count / one_min_cnt;
	
	let time_a = timeFormat(sec);
	
	$('#str_count').html(str_count + '文字');
	$('#time_a').html(time_a);
	$('#note_a').html(`1分あたり${one_min_cnt}文字`);
	
	
})

function timeFormat (timeSec){
    timeSec = timeSec || 0
    const hh = ("00"+ ~~(timeSec / 3600)).slice(-2)
    const mm = ("00"+ ~~(~~(timeSec / 60) % 60)).slice(-2)
    const ss = ("00"+ ~~(timeSec % 60)).slice(-2)
    return hh +":"+ mm +":"+ ss ;
  }