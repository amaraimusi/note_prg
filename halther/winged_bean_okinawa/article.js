'use strict';
const data=JSON.parse(document.getElementById('climate-data').textContent);
const svg=document.getElementById('climate-chart');
const ns='http://www.w3.org/2000/svg';
function add(tag,attrs,text){const n=document.createElementNS(ns,tag);for(const [k,v] of Object.entries(attrs))n.setAttribute(k,v);if(text)n.textContent=text;svg.appendChild(n);return n;}
function draw(){
 svg.replaceChildren();
 const period=document.getElementById('period').value;
 const rows=data.filter(r=>r.period===period);
 svg.setAttribute('aria-label',period+'年の名護の月平均気温。1月から12月。20℃の線を比較。');
 const width=Math.max(300,svg.clientWidth),compact=width<600;
 svg.setAttribute('viewBox','0 0 '+width+' 280');
 const x=m=>46+(m-1)*(width-65)/11,y=t=>238-(t-14)*12;
 for(let t=15;t<=30;t+=5){add('line',{x1:42,x2:width-10,y1:y(t),y2:y(t),stroke:t===20?'#ad7e30':'#dce3d3','stroke-dasharray':t===20?'6 5':'0'});add('text',{x:3,y:y(t)+4},t+'℃');}
 add('polyline',{points:rows.map(r=>x(r.month)+','+y(r.mean_temperature_c)).join(' '),fill:'none',stroke:'#497440','stroke-width':3});
 for(const r of rows){add('circle',{cx:x(r.month),cy:y(r.mean_temperature_c),r:4,fill:'#497440'});if(!compact||r.month%2===0)add('text',{x:x(r.month),y:y(r.mean_temperature_c)-12,'text-anchor':'middle'},r.mean_temperature_c.toFixed(1));add('text',{x:x(r.month),y:264,'text-anchor':'middle'},String(r.month));}
 add('text',{x:8,y:264},'月');
}
document.getElementById('period').addEventListener('change',draw);window.addEventListener('resize',draw);draw();
document.getElementById('flower-date').addEventListener('input',event=>{
 const target=document.getElementById('harvest-result'),value=event.target.value;
 if(!value){target.textContent='開花日を入れると、12〜15日後の日付を表示します。';return;}
 const [y,m,d]=value.split('-').map(Number);
 const start=new Date(Date.UTC(y,m-1,d));
 const date=days=>{const n=new Date(start);n.setUTCDate(n.getUTCDate()+days);return n.getUTCFullYear()+'年'+(n.getUTCMonth()+1)+'月'+n.getUTCDate()+'日';};
 target.textContent=date(12)+'〜'+date(15)+'に莢の柔らかさを確認';
});
