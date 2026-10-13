"use strict";
const records=JSON.parse(document.getElementById("archive-data").textContent);
const $=id=>document.getElementById(id);
const esc=s=>String(s??"").replace(/[&<>"']/g,c=>({"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;"}[c]));
let current=0, filtered=[];const pageSize=12;
for(const c of [...new Set(records.map(r=>r.category))].sort()){const o=new Option(c,c);$("category").add(o);}
for(const y of [...new Set(records.flatMap(r=>{let a=+r.period_start.slice(0,4),b=+r.period_end.slice(0,4);return Array.from({length:b-a+1},(_,i)=>String(a+i));}))].sort().reverse())$("year").add(new Option(y,y));
function render(reset=true){if(reset)current=0;const q=$("q").value.trim().normalize("NFKC").toLowerCase();const cat=$("category").value,year=$("year").value;
filtered=records.filter(r=>(!cat||r.category===cat)&&(!year||(r.period_start.slice(0,4)<=year&&r.period_end.slice(0,4)>=year))&&(!q||[r.code,r.title,r.summary,r.crops,r.detail,r.subtitle,r.related_code].join(" ").normalize("NFKC").toLowerCase().includes(q)));
const mode=$("sort").value;filtered.sort((a,b)=>mode==="code"?a.code[0].localeCompare(b.code[0])||(parseInt(a.code.slice(1))||0)-(parseInt(b.code.slice(1))||0)||a.id.localeCompare(b.id):mode==="old"?a.period_start.localeCompare(b.period_start):b.period_start.localeCompare(a.period_start));
const pages=Math.max(1,Math.ceil(filtered.length/pageSize));current=Math.min(current,pages-1);
$("count").textContent=`${records.length}件中 ${filtered.length}件を表示対象にしています`;
$("results").innerHTML=filtered.slice(current*pageSize,(current+1)*pageSize).map(r=>`<article class="card" id="${esc(r.id)}"><span class="tag">${esc(r.category)}</span><span class="code">${esc(r.code)}</span><h2>${esc(r.title)}</h2><div class="meta">${esc(r.period)}</div><p>${esc(r.summary)}</p>${r.crops?`<p class="crops"><strong>登場する作物</strong>　${esc(r.crops)}</p>`:""}<details><summary>詳しい記録と時期の根拠</summary><pre>${esc(r.detail)}</pre><p class="meta">管理ID：${esc(r.id)} ／ 代表字幕：${esc(r.representative_file)} ／ 字幕ファイル：${r.file_count}件<br>関連コード：${esc(r.related_code||"—")} ／ 更新日時：${esc(r.modified)}</p>${r.warnings?`<p class="notice">${esc(r.warnings)}</p>`:""}</details><details><summary>字幕テキストを読む（原文・時刻付き）</summary><pre>${esc(r.subtitle)}</pre></details></article>`).join("")||'<section class="panel">該当する記録がありません。条件を変えてお試しください。</section>';
$("page").textContent=`${current+1} / ${pages}`;$("prev").disabled=current===0;$("next").disabled=current>=pages-1;
}
for(const id of ["q","category","year","sort"])$(id).addEventListener(id==="q"?"input":"change",()=>render());
$("prev").addEventListener("click",()=>{current--;render(false);$("count").scrollIntoView();});$("next").addEventListener("click",()=>{current++;render(false);$("count").scrollIntoView();});render();
